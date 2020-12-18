<?php

namespace Devlau\Runrunit\Resources;

class Resource implements \JsonSerializable, \Serializable
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
    private function fill(array $data = null)
    {
        $sourceData = $data ?? $this->attributes;

        foreach ($sourceData as $key => $value) {
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
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $attributes = [];

        foreach ($this->attributes as $property => $value) {
            $key = $this->camelCase($property);

            if (property_exists($this, $key)) {
                $attributes[$key] = $this->{$key};
            }
        }

        return $attributes;
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     *
     * @throws \RuntimeException
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException(json_last_error_msg());
        }

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function serialize()
    {
        return serialize($this->jsonSerialize());
    }

    public function unserialize($data)
    {
        $this->fill(unserialize($data));
    }
}
