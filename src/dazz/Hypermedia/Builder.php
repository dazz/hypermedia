<?php
namespace dazz\Hypermedia;

/**
 * Class Builder
 *
 * @package dazz\Hypermedia\Builder
 */
class Builder
{

    public static function createBuilder()
    {
        return new Builder();
    }

    public function build(ResourceInterface $resource, $value)
    {
        $output = [];
        /** @var LinkInterface $link */
        foreach ($resource->getPossibleLinks() as $link) {
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