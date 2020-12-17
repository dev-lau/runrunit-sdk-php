<?php

namespace Devlau\Runrunit\Resources;

class Resource
{
    /**
     * The resource attributes.
     *
     * @var array
     */
    public $attributes;

    /**
     * The Runrunit SDK instance.
     *
     * @var \Devlau\Runrunit\Runrunit|null
     */
    protected $runrunit;

    /**
     * Create a new resource instance.
     *
     * @param  array $attributes
     * @param  \Devlau\Runrunit\Runrunit|null  $runrunit
     * @return void
     */
    public function __construct(array $attributes, $runrunit = null)
    {
        $this->attributes = $attributes;
        $this->runrunit = $runrunit;

        $this->fill();
    }

    /**
     * Fill the resource with the array of attributes.
     *
     * @return void
     */
    private function fill()
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Convert the key name to camel case.
     *
     * @param  $key
     *
     * @return mixed
     */
    private function camelCase($key)
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param  array  $collection
     * @param  string  $class
     * @param  array  $extraData
     * @return array
     */
    protected function transformCollection(array $collection, $class, array $extraData = [])
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this->runrunit);
        }, $collection);
    }
}
