<?php
namespace dazz\Tests\Hypermedia\fixtures;

use dazz\Hypermedia\Link\LinkInterface;

class GroupLink implements LinkInterface
{

    public function getUriTemplate()
    {
        return '/groups/{groupId}';
    }

    public function getUriParams()
    {
        return [
            'groupId'
        ];
    }

    public function getRelation()
    {
        return 'group';
    }
}