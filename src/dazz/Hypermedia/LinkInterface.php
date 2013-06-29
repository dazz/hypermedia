<?php
namespace  dazz\Hypermedia;

interface LinkInterface
{
    public function getUriTemplate();

    public function getUriParams();

    public function getRelation();
}