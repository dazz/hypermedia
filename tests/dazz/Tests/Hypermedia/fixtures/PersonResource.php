<?php
namespace dazz\Tests\Hypermedia\fixtures;

use dazz\Hypermedia\Resource\ResourceInterface;

/**
 * Class Person
 *
 * @package dazz\Tests\Hypermedia\fixtures
 */
class PersonResource implements ResourceInterface
{
    public function getPossibleLinks()
    {
        return [
            new PersonLink(),
            new PersonListLink(),
            new GroupLink(),
        ];
    }
}