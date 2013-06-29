<?php
namespace dazz\Tests\Hypermedia\Builder;

use dazz\Tests\Hypermedia\fixtures;
use dazz\Hypermedia\Builder;

class BuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $object = new fixtures\Person();
        $object->setId(1);
        $object->setGroupId(1);

        $resource = new fixtures\PersonResource();

        $builder = Builder::createBuilder();
        $output = $builder->build($resource, $object);

        print_r($output);

        $object = new fixtures\Person();
        $object->setId(2);
        $object->setGroupId(1);

        $output = $builder->build($resource, $object);
        print_r($output);
    }
}