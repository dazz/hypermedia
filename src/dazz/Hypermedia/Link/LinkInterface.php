<?php
namespace  dazz\Hypermedia\Link;

interface LinkInterface
{
    public function getUriTemplate();

    public function getUriParams();

    public function getRelation();
}