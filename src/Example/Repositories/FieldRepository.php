<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example\Repositories;

use AndreyKurmel\EloquentAsDoctrine\Example\Collections\TableCollection;
use AndreyKurmel\EloquentAsDoctrine\Example\Entities\TableEntity;
use AndreyKurmel\EloquentAsDoctrine\Example\Models\FieldModel;
use AndreyKurmel\EloquentAsDoctrine\Example\Models\TableModel;

class FieldRepository
{
    protected $model = FieldModel::class;

    /**
     * @param TableCollection|TableEntity $data
     * @param string $columns
     */
    public function loadFieldsForTable(TableCollection|TableEntity $data, string $columns = ''): void
    {
        TableModel::loadRelations($data, $columns ? "fields:$columns" : "fields");
    }
}
