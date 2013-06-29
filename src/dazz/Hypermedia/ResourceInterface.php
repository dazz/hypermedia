<?php
namespace dazz\Hypermedia;

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