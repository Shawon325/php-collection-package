<?php

namespace ShawonCollections\Interfaces;

interface CollectionContract
{
    /**
     * @param array $collect
     * @return CollectionContract
     */
    public static function make(array $collect): CollectionContract;

    /**
     * @param callable $callback
     * @return mixed
     */
    public function filter(callable $callback): CollectionContract;

    /**
     * @param callable $callback
     * @return mixed
     */
    public function map(callable $callback): CollectionContract;

    /**
     * @param callable $callback
     */
    public function each(callable $callback);

    /**
     * @return mixed
     */
    public function toJson();

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return object
     */
    public function first();

    /**
     * @return array
     */
    public function get(): array;

    /**
     * @param string $type
     * @param string $key
     * @return CollectionContract
     */
    public function orderBy(string $type, string $key): CollectionContract;
}