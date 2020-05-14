# Poczta Polska Bundle
Poczta Polska integration for Symfony.  
Documentation regarding integration of a shop with pickup points can be found here: https://odbiorwpunkcie.poczta-polska.pl/integracja-sklepu/.

Installation
------------

* install with Composer
```
composer require answear/poczta-polska-bundle
```

`Answear\PocztaPolskaBundle\AnswearPocztaPolskaBundle::class => ['all' => true],`  
should be added automatically to your `config/bundles.php` file by Symfony Flex.

Usage
------------
1. Fetch array of Poczta Polska Pickup Points
```php
use Answear\PocztaPolskaBundle\Request\FetchPickupPointsRequest;

// ...

/**
 * @var FetchPickupPointsRequest
 */
private $fetchPickupPointsRequest;

public function __construct(
    ...
    FetchPickupPointsRequest $fetchPickupPointsRequest
) {
    ...
    $this->fetchPickupPointsRequest = $fetchPickupPointsRequest;
}

...

public function pickupPoints(): Response
{
    $pickupPoints = $this->fetchPickupPointsRequest->request();
    ...
}
```

Final notes
------------

Feel free to open pull requests with new features, improvements or bug fixes. The Answear team will be grateful for any comments.

