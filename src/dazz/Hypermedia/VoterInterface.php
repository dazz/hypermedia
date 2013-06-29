<?php
namespace dazz\Hypermedia;

/**
 * Interface VoterInterface
 */
interface VoterInterface
{
    const ALLOW   = 1;
    const DENY    = -1;

    public function setToken($token);

    public function vote($resource);
}
