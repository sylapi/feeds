<?php

namespace Sylapi\Feeds\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Feeds\Contracts;
use Sylapi\Feeds\Contracts\ProductSerializer;
use Sylapi\Feeds\FeedGenerator;
use Sylapi\Feeds\Parameters;
use Sylapi\Feeds\Feed;
use Sylapi\Feeds\Models\Product;

class FeedGeneratorTest extends PHPUnitTestCase
{

    private $feedGenerator;

    public function setUp():void
    {
        $this->feedGenerator =  new FeedGenerator();
    }

    public function testStoragePath()
    {
        $feedGenerator = $this->feedGenerator;

        $this->assertEquals(FeedGenerator::DEFAULT_STORAGE_PATH, $feedGenerator->getStoragePath());

        $path = '/home/storage/path/';
        $feedGenerator->setStoragePath($path);

        $this->assertEquals($path, $feedGenerator->getStoragePath());
    }

    public function testFeed()
    {
        $feedGenerator = $this->feedGenerator;
        $this->assertInstanceOf(Contracts\Feed::class, $feedGenerator->getFeed());
        $feedGenerator->setFeed(new Feed(Parameters::create([])));
        $this->assertInstanceOf(Feed::class, $feedGenerator->getFeed());
    }

    public function testSerializer()
    {
        $feedGenerator = $this->feedGenerator;
        $this->assertInstanceOf(\JMS\Serializer\Serializer::class, $feedGenerator->getSerializer());
    }

    public function testFilePath()
    {
        $feedGenerator = $this->feedGenerator;
        $path = '/home/storage/path/';
        $feedGenerator->setStoragePath($path);
        $filePath = $path.$feedGenerator->getFeed()->getFileName().'.xml';
        $this->assertEquals($filePath, $feedGenerator->filePath());
    }


    public function testTransformProduct()
    {
        $feedGenerator = $this->feedGenerator;
        $product = new Product();
        $productTransform = $feedGenerator->transformProduct($product);
        $this->assertInstanceOf(ProductSerializer::class, $productTransform);
        $productClassName = ($feedGenerator->getFeed()->getProductInstance())::class;
        $this->assertInstanceOf($productClassName, $productTransform);
    }

    public function testProductXML()
    {
        $feedGenerator = $this->feedGenerator;
        $product = new Product();
        $product->setId('1234567890');
        $productXML = $feedGenerator->productXML($product);
        $this->assertXmlStringEqualsXmlFile(__DIR__.'/Mock/product.xml', $productXML);
    }

    public function testCreateDOMFragment()
    {
        $feedGenerator = $this->feedGenerator;
        $productXML = '<item><id><![CDATA[1234567890]]></id></item>';
        $item = $feedGenerator->createDOMFragment($productXML);
        $this->assertInstanceOf(\DOMDocumentFragment::class, $item);
    }
}