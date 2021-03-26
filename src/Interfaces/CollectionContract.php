<?php

namespace ShawonCollections\Interfaces;

interface CollectionContract
{
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
     * @return mixed
     */
    public function toJson(): mixed;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return object
     */
    public function first(): object;

    /**
     * @return CollectionContract
     */
    public function get(): CollectionContract;
}