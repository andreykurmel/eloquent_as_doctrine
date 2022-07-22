<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example\Models;

use AndreyKurmel\EloquentAsDoctrine\Example\Collections\TableCollection;
use AndreyKurmel\EloquentAsDoctrine\Example\Entities\TableEntity;
use AndreyKurmel\EloquentAsDoctrine\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TableModel extends Model
{
    protected $entity = TableEntity::class;
    protected $table = 'data_tables';

    /**
     * @return HasMany
     */
    public function fields()
    {
        return $this->hasMany(FieldModel::class, 'table_id', 'id');
    }

    /**
     * @param array $models
     * @return TableCollection
     */
    public function newCollection(array $models = [])
    {
        return new TableCollection($models);
    }
}
