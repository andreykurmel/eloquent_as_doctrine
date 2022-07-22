<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example\Repositories;

use AndreyKurmel\EloquentAsDoctrine\Example\Collections\TableCollection;
use AndreyKurmel\EloquentAsDoctrine\Example\Models\TableModel;

class TableRepository
{
    protected $model = TableModel::class;

    /**
     * @return TableCollection
     */
    public function all(): TableCollection
    {
        $rows = TableModel::query()->get();
        return new TableCollection($rows);
    }
}
