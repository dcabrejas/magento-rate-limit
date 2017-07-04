# magento-rate-limit

Magento 2 adapter for the [touhonoob/RateLimit](https://github.com/touhonoob/RateLimit) Library

## Installation

```bash
composer require dcabrejas/magento-rate-limit
```

## Usage

````php
//Inject the adapter via dependency injection
public function __construct(\Dcabrejas\RateLimit\Adapter\Magento $magentoAdapter)
{
  $this->magentoAdapter = $magentoAdapter;
}


$rateLimit = new \Touhonoob\RateLimit\RateLimit("myratelimit", 100, 3600, $this->magentoAdapter); // 100 Requests / Hour

$id = $_SERVER['REMOTE_ADDR']; // Use client IP as identity
if ($rateLimit->check($id) > 0) {
  echo "passed";
} else {
  echo "rate limit exceeded";
}
````
