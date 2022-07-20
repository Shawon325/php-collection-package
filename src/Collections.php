<?php

namespace ShawonCollections;

use ShawonCollections\Interfaces\CollectionContract;

class Collections implements CollectionContract
{
    /**
     * @var array
     */
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
        return new static($collect);
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
     * @param callable $callback
     */
    public function each(callable $callback)
    {
        foreach ($this->collect as $value) {
            $callback($value);
        }
    }

    /**
     * @return false|mixed|string
     */
    public function toJson()
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
    public function first()
    {
        return (object)$this->collect[0];
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return (array)$this->collect;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return (array)$this->collect;
    }

    /**
     * @param string $type
     * @param string $key
     * @return CollectionContract
     */
    public function orderBy(string $type, string $key): CollectionContract
    {
        $type = strtoupper($type);

        usort($this->collect, function ($a, $b) use ($type, $key) {
            if ($type === 'ASC') {
                return $a[$key] > $b[$key];
            }
            if ($type === 'DESC' || $type === 'DSC') {
                return $a[$key] < $b[$key];
            }
        });

        return $this;
    }

    /**
     * @param string $key
     * @return array
     */
    public function pluck(string $key): array
    {
        return (array)$this->collect = array_column($this->collect, $key);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->collect);
    }

    /**
     * @param string $key
     * @return CollectionContract
     */
    public function groupBy(string $key): CollectionContract
    {
        $arr = [];
        foreach ($this->collect as $index => $item) {
            $arr[$item[$key]][$index] = $item;
        }
        ksort($arr, SORT_NUMERIC);
        $this->collect = $arr;

        return $this;
    }

    /**
     * @return array
     */
    public function flip(): array
    {
        return (array)array_flip($this->collect);
    }
}