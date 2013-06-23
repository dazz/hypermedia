<?php
namespace dazz\Tests\Hypermedia\fixtures;

use dazz\Hypermedia\Link\LinkInterface;

/**
 * Class PersonListLink
 *
 * @package dazz\Tests\Hypermedia\fixtures
 */
class PersonListLink implements LinkInterface
{

    public function getRelation()
    {
        return 'users';
    }

    public function getUriTemplate()
    {
        return'/user';
    }

    public function getUriParams()
    {
        return [];
    }
}