<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example\Models;

use AndreyKurmel\EloquentAsDoctrine\Example\Collections\FieldCollection;
use AndreyKurmel\EloquentAsDoctrine\Example\Entities\FieldEntity;
use AndreyKurmel\EloquentAsDoctrine\Models\Model;

class FieldModel extends Model
{
    protected $entity = FieldEntity::class;
    protected $table = 'data_table_columns';

    /**
     * @param array $models
     * @return FieldCollection
     */
    public function newCollection(array $models = [])
    {
        return new FieldCollection($models);
    }
}
