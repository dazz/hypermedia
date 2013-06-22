<?php
namespace dazz\Tests\Hypermedia\Builder;

use dazz\Tests\Hypermedia\fixtures;
use dazz\Hypermedia\Builder\Builder;

class BuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testBuild()
    {
        $object = new fixtures\Person();
        $object->setId(1);

        $resource = new fixtures\PersonResource();

        $builder = new Builder();
        $output = $builder->build($resource, $object);

        print_r($output);

        $object = new fixtures\Person();
        $object->setId(2);

        $output = $builder->build($resource, $object);
        print_r($output);
    }
}