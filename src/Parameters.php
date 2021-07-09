<?php

namespace Sylapi\Feeds;

class Parameters extends \ArrayObject
{
    /**
     * @param array<string, mixed> $parameters
     */
    public static function create(array $parameters): self
    {
        return new self($parameters, \ArrayObject::ARRAY_AS_PROPS);
    }

    /**
     * @param string $name
     */
    public function hasProperty(string $name)
    {
        return property_exists($this, $name);
    }
}