<?php

namespace ShawonCollections\Services;

use ShawonCollections\Interfaces\CollectionContract;

class Collections implements CollectionContract
{
    private $collect;

    /**
     * Collections constructor.
     * @param array $collect
     */
    public function __construct(array $collect)
    {
        $this->collect = $collect;
    }

    /**
     * @param array $collect
     * @return Collections
     */
    public static function make(array $collect): CollectionContract
    {
        return new self($collect);
    }

    /**
     * @param callable $callback
     * @return $this
     */
    public function filter(callable $callback): CollectionContract
    {
        $collections = [];
        foreach ($this->collect as $key => $value) {
            if ($callback($key, $value)) {
                $collections[] = $value;
            }
        }

        $this->collect = $collections;
        return $this;
    }

    /**
     * @param callable $callback
     * @return $this
     */
    public function map(callable $callback): CollectionContract
    {
        $collections = [];
        foreach ($this->collect as $key => $value) {
            $collections[] = $callback($value, $key);
        }

        $this->collect = $collections;
        return $this;
    }

    /**
     * @return false|mixed|string
     */
    public function toJson(): mixed
    {
        return json_encode($this->collect);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array)$this->collect;
    }

    /**
     * @return object
     */
    public function first(): object
    {
        return (object)$this->collect[0];
    }

    /**
     * @return $this
     */
    public function get(): CollectionContract
    {
        return $this;
    }
}