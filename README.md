# Sylapi/Feeds

## Create Product

### Shipping

```php
$shipping = new Sylapi\Feeds\Models\Shipping();
$shipping->setCountry('PL')
        ->setRegion('Lubuskie')
        ->setService('COURIER_PICKUP')
        ->setCurrency('PLN')
        ->setPrice(12.00)
        ->setPriceCod(15.95)
        ->setMinHandlingTime(1)
        ->setMaxHandlingTime(4)
        ->setMinTransitTime(2)
        ->setMaxTransitTime(5);
```

### Tax

```php
$tax = new Sylapi\Feeds\Models\Tax;
$tax->setCountry('PL')
        ->setRegion('Lubuskie')
        ->setRate(5.00)
        ->setTaxShip(true);
```

### ProductDetail

```php
$productDetails = [];

$productDetail = new \Sylapi\Feeds\Models\ProductDetail();
$productDetail->setSectionName('Main')
        ->setAttributeName('name')
        ->setAttributeValue('Value');

$productDetails[] = $productDetail;
```

### Product

```php
$product = new \Sylapi\Feeds\Models\Product();
$product->setId('id-1234567890')
        ->setTitle('Product title')
        ->setDescription('Product description...')
        ->setLink('https://url.exmaple.com/products/id-1234567890/')
        ->setMobileLink('https://mobile.url.exmaple.com/products/id-1234567890/')
        ->setImageLink('https://url.exmaple.com/storage/images/products/id-1234567890/main.jpg')
        ->setAdditionalImageLinks([
            'https://url.exmaple.com/storage/images/products/id-1234567890/1.jpg',
            'https://url.exmaple.com/storage/images/products/id-1234567890/2.jpg',
            'https://url.exmaple.com/storage/images/products/id-1234567890/3.jpg'
        ])
        ->setAvailability('in_stock')
        ->setAvailabilityDate('2021-12-25T13:00-0800')
        ->setCurrency('PLN')
        ->setCostOfGoodsSold(9.00)
        ->setExpirationDate('2021-12-31T13:00-0800')
        ->setPrice(11.00)
        ->setSalePrice(9.95)
        ->setSalePriceEffectiveDateStart('2021-12-28T13:00-0800')
        ->setSalePriceEffectiveDateEnd('2021-12-31T13:00-0800')
        ->setUnitPricingMeasure('750 ml')
        ->setUnitPricingBaseMeasure('100 ml')
        ->setProductCategory([
            \Sylapi\Feeds\Example1\Feed::NAME => '2271',
            \Sylapi\Feeds\Example2\Feed::NAME => 'Gifts / Toys'
        ])
        ->setProductTypes([
            \Sylapi\Feeds\Example1\Feed::NAME => [
                '2271',
                '1123'
            ],
            \Sylapi\Feeds\Example2\Feed::NAME => [
                'Gifts / Toys',
            ]
        ])
        ->setCanonicalLink('https://url.exmaple.com/products/id-1234567890/')
        ->setManufacturer('ABC Manufacturer')
        ->setBrand('Brand XYZ')
        ->setGtin('9876543210')
        ->setMpn('M1234599PN')
        ->setIdentifierExists(true)
        ->setCondition('new')
        ->setAdult(true)
        ->setMultipack(6)
        ->setBundle(false)
        ->setAgeGroup('toddler')
        ->setColor('black')
        ->setSizeTypes([
            'petite',
            'maternity'
        ])
        ->setCustomLabels([
            'summer',
            'sale',
            'test'
        ])
        ->setExcludedDestinations([
            'Buy on listings',
            'Local inventory ads'
        ])
        ->setIncludedDestinations([
            'Shopping ads',
            'Free local listings'
        ])
        ->setTaxCategory('Clothes')
        ->setShoppingAdsExcludedCountry([
            'CH',
            'AT'
        ])
        ->setShipsFromCountry('PL')
        ->setProductHighlights([
            'Product highlight #1',
            'Product highlight #2',
            'Product highlight #3'
        ])
        ->setShipping($shipping)
        ->setShippingWeight(3.50)
        ->setShippingWeightUnit('kg')
        ->setTax($tax)
        ->setProductDetails([
            \Sylapi\Feeds\Example1\Feed::NAME => $productDetails,
            \Sylapi\Feeds\Example2\Feed::NAME => $productDetails
        ])
        ->setMinHandlingTime(3)
        ->setMaxHandlingTime(14)
        ->setItemGroupId('gid-12345')
        ->setQuantity(3)
        ->setWarranty('24 months');
```

## FeedGenerator

```php
$feedGenerator = new FeedGenerator();
$feedGenerator->setStoragePath('/home/xml/path/');

$feed->appendProduct($product);
$feed->appendProduct($product);
//...
$feed->appendProduct($product);
echo $feed->filePath();
```

```php
$feedExample1 = new FeedGenerator();
$feedExample1->setFeed(new Sylapi\Feeds\Example1\Feed(
    \Sylapi\Feeds\Parameters::create([])
));

$feedExample2 = new FeedGenerator();
$feedExample2->setFeed(new Sylapi\Feeds\Example2\Feed(
    \Sylapi\Feeds\Parameters::create([])
));

$feedReader = new FeedReader($feed->filePath());
while($product = $feedReader->getProduct()) {
    $feedExample1->appendProduct($product);
    $feedExample2->appendProduct($product);
}
$feedExample1->save();
$feedExample2->save();
```

## Commands

| COMMAND | DESCRIPTION |
| ------ | ------ |
| composer tests | Testy |
| composer phpstan |  PHPStan |
| composer coverage | PHPUnit Coverage |
| composer coverage-html | PHPUnit Coverage HTML (DIR: ./coverage/) |