<?php
namespace dazz\Hypermedia\Builder;

use dazz\Hypermedia\Resource\ResourceInterface;
use dazz\Hypermedia\Link\LinkInterface;
/**
 * Class Builder
 *
 * @package dazz\Hypermedia\Builder
 */
class Builder
{
    public function build(ResourceInterface $resource, $value)
    {
        $output = [];
        foreach ($resource->getPossibleLinks() as $link) {

            $output[] = [
                'href' => $this->getUrl($link, $value),
                'title' => $link->getTitle(),
            ];
        }

        return $output;
    }

    private function getUrl($link, $value)
    {
        $routePattern = $link->getRoutePattern();
        foreach ($routePattern['params'] as $param) {
            $routePattern['pattern'] = str_replace(
                sprintf('{%s}', $param),
                $this->getValue($value, $param),
                $routePattern['pattern']
            );
        }
        return $routePattern['pattern'];
    }

    public function getValue($value, $name, $default = null)
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