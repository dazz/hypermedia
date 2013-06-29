<?php
/*
 * This file is part of some package.
 *
 * (c) Hakin Dazs <hakindazs@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace dazz\Hypermedia;

/**
 * Class SimpleVoter
 */
class SimpleVoter implements VoterInterface
{
    public function vote($resource)
    {
        return VoterInterface::ALLOW;
    }

    public function setToken($token)
    {
    }
}
