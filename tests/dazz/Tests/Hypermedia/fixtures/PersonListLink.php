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

    public function getRoutePattern()
    {
        return [
            'pattern' => '/persons',
            'params' => [],
        ];
    }

    public function getTitle()
    {
        return 'person-list';
    }
}