<?php

namespace ShawonCollections\Interfaces;

interface CollectionContract
{
    /**
     * @param callable $callback
     * @return mixed
     */
    public function filter(callable $callback);

    /**
     * @param callable $callback
     * @return mixed
     */
    public function map(callable $callback);

    /**
     * @return mixed
     */
    public function toJson();
}