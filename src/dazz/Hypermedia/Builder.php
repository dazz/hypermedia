<?php
namespace dazz\Hypermedia;

/**
 * Class Builder
 *
 * @package dazz\Hypermedia\Builder
 */
class Builder
{
    /** @var VoterInterface */
    private $voter;

    public function __construct(VoterInterface $voter)
    {
        $this->voter = $voter;
    }

    public static function createBuilder(VoterInterface $voter = null, $token = null)
    {
        $voter = $voter ?:new SimpleVoter();
        $voter->setToken($token);
        return new Builder($voter);
    }

    public function build(ResourceInterface $resource, $value)
    {
        $output = [];
        /** @var LinkInterface $link */
        foreach ($resource->getPossibleLinks() as $link) {
            if ($this->voter->vote($link->getRelation()) == VoterInterface::DENY) {
                continue;
            }
            $output[] = [
                'href' => $this->getUrl($link, $value),
                'rel'  => $link->getRelation(),
            ];
        }

        return $output;
    }

    private function getUrl(LinkInterface $link, $value)
    {
        $pattern = $link->getUriTemplate();
        foreach ($link->getUriParams() as $param) {
            $pattern = str_replace(
                sprintf('{%s}', $param),
                $this->getValue($value, $param),
                $pattern
            );
        }
        return $pattern;
    }

    private function getValue($value, $name, $default = null)
    {
        if (is_array($value)) {
            return array_key_exists($name, $value) ? $value[$name] : $default;
        }

        if (get_class($value) == '\stdClass') {
            return $value->{$name};
        }

        $method = 'get'.ucfirst($name);
        return $value->$method();
    }
}