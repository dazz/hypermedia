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

        $this->assertCount(3, $output);
    }

    public function testBuildWithVoter()
    {
        $object = new fixtures\Person();
        $object->setId(1);
        $object->setGroupId(1);
        $resource = new fixtures\PersonResource();

        $securityToken = new fixtures\SecurityToken('fully');
        $voter = new fixtures\Voter();
        $builder = Builder::createBuilder($voter, $securityToken);
        $output = $builder->build($resource, $object);
        $this->assertCount(3, $output);

        $securityToken = new fixtures\SecurityToken('anonymously');
        $voter = new fixtures\Voter();
        $builder = Builder::createBuilder($voter, $securityToken);
        $output = $builder->build($resource, $object);
        $this->assertCount(2, $output);
    }
}