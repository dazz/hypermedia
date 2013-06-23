<?php
namespace dazz\Tests\Hypermedia\fixtures;

use dazz\Hypermedia\Link\LinkInterface;

class PersonLink implements LinkInterface
{

    public function getUriTemplate()
    {
        return '/user/{userId}';
    }

    public function getUriParams()
    {
        return [
            'userId'
        ];
    }


    public function getRelation()
    {
        return 'user';
    }
}