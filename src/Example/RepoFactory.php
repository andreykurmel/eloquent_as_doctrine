<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example;

use AndreyKurmel\EloquentAsDoctrine\Example\Repositories\FieldRepository;
use AndreyKurmel\EloquentAsDoctrine\Example\Repositories\TableRepository;

class RepoFactory
{
    /**
     * @return TableRepository
     */
    public static function tables(): TableRepository
    {
        return new TableRepository();
    }

    /**
     * @return FieldRepository
     */
    public static function fields(): FieldRepository
    {
        return new FieldRepository();
    }
}
