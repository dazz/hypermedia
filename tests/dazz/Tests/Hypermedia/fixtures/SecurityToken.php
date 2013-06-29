<?php
namespace dazz\Tests\Hypermedia\fixtures;

/**
 * Class SecurityToken
 */
class SecurityToken
{
    /**
     * @var string
     */
    private $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}