<?php

namespace Sylapi\Feeds\Tests;

use Sylapi\Feeds\FeedReader;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Feeds\Models\Product;

class FeedReaderTest extends PHPUnitTestCase
{
    public function testReadIfFileNotExist()
    {
        $this->expectException(\Exception::class);
        new FeedReader('nonexistent_file.xml');
    }
    
    public function testRead()
    {
        $reader = new FeedReader(__DIR__.'/Mock/feed.xml');
        while( $item = $reader->getProduct() ) {
            $this->assertInstanceOf(Product::class, $item);
        }
    }
}