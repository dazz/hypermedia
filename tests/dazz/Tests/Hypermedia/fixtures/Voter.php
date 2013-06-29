<?php
/*
 * This file is part of some package.
 *
 * (c) Hakin Dazs <hakindazs@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace dazz\Tests\Hypermedia\fixtures;

use dazz\Hypermedia\VoterInterface;

/**
 * Class Voter
 */
class Voter implements VoterInterface
{
    /** @var SecurityToken */
    private $token;

    public function vote($resource)
    {
        $isCheckWorthy = in_array($resource, array('user',), true);

        if ($isCheckWorthy && $this->token->getRole() == 'anonymously') {
            return VoterInterface::DENY;
        }
        return VoterInterface::ALLOW;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}