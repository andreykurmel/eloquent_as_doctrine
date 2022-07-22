<?php

namespace AndreyKurmel\EloquentAsDoctrine\Entities;

interface EloquentInterface
{
    /**
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set($key, $value);

    /**
     * @param $key
     * @return mixed
     */
    public function getAttribute($key);

    /**
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value);

    /**
     * @return mixed
     */
    public function getKey();

    /**
     * @param $relation
     * @return mixed|null
     */
    public function getRelation($relation);

    /**
     * @param $relation
     * @param $value
     * @return $this
     */
    public function setRelation($relation, $value);
}
