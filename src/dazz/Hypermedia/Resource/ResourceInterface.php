<?php
namespace dazz\Hypermedia\Resource;

/**
 * Interface ResourceInterface
 *
 * @package dazz\Hypermedia\Resource
 */
interface ResourceInterface
{
    /**
     * @return array of LinkInterface implementations
     */
    public function getPossibleLinks();
}