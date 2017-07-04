<?php

namespace Dcabrejas\RateLimit\Adapter;

use \Touhonoob\RateLimit\Adapter;
use Magento\Framework\App\CacheInterface;

/**
 * @author Diego Cabrejas <diego@wearejh.com>
 */
class Magento extends Adapter
{
    protected $lockWaitTimeout = 1000;

    /**
     * @var CacheInterface
     */
    protected $cacheClient;

    public function __construct(CacheInterface $cacheClient)
    {
        $this->cacheClient = $cacheClient;
    }

    public function set($key, $value, $ttl)
    {
        $this->cacheClient->save($value, $key, [], $ttl);
    }

    public function get($key)
    {
        return $this->cacheClient->load($key);
    }

    public function exists($key)
    {
        return (bool)$this->cacheClient->load($key);
    }

    public function del($key)
    {
        $this->cacheClient->remove($key);
    }
}
