<?php

namespace ShawonCollections;

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
    public static function make(array $collect): Collections
    {
        return new self($collect);
    }

    /**
     * @param callable $callback
     * @return $this
     */
    public function filter(callable $callback): Collections
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
    public function map(callable $callback): Collections
    {
        $collections = [];
        foreach ($this->collect as $key => $value) {
            $collections[] = $callback($value, $key);
        }

        $this->collect = $collections;
        return $this;
    }

    public function toJson()
    {
        return json_encode($this->collect);
    }
}