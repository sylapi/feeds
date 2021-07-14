<?php

namespace Sylapi\Feeds\Tests;

use Sylapi\Feeds\FeedReader;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Feeds\Models\Product;
use Sylapi\Feeds\Parameters;

class ParametersTest extends PHPUnitTestCase
{

    public function testCreate()
    {
        $this->assertInstanceOf(Parameters::class, Parameters::create([]));
        $this->assertInstanceOf(\ArrayObject::class, Parameters::create([]));
    }

    public function testHasProperty()
    {
        $parameters = Parameters::create([
            'test1' => 'value1',
            'test2' => 'value2'
        ]);
        $this->assertTrue($parameters->hasProperty('test1'));
        $this->assertFalse($parameters->hasProperty('test3'));
    }
}