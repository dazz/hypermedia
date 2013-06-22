<?php
namespace dazz\Tests\Hypermedia\fixtures;

use dazz\Hypermedia\Link\LinkInterface;

class PersonLink implements LinkInterface
{
    private $value;

    public function getRoutePattern()
    {
        return [
            'pattern' => '/persons/{id}',
            'params' => ['id'],
        ];
    }

    public function getTitle()
    {
        return 'person';
    }
}