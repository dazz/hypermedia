<?php
namespace  dazz\Hypermedia\Link;

interface LinkInterface
{
    public function getRoutePattern();

    public function getTitle();
}