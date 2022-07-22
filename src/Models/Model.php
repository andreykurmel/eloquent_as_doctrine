<?php

namespace AndreyKurmel\EloquentAsDoctrine\Models;

use AndreyKurmel\EloquentAsDoctrine\Collections\Collection;
use AndreyKurmel\EloquentAsDoctrine\Entities\HeavyEntity\Entity;
use AndreyKurmel\EloquentAsDoctrine\Models\Relations\BelongsTo;
use AndreyKurmel\EloquentAsDoctrine\Models\Relations\HasOne;
use AndreyKurmel\EloquentAsDoctrine\Models\Relations\HasOneThrough;
use AndreyKurmel\EloquentAsDoctrine\Models\Relations\MorphOne;
use Illuminate\Database\Eloquent\Builder;

class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $entity = Entity::class;

    /**
     * @param Collection|Entity $items
     * @param string $relations
     */
    public static function loadRelations($items, string $relations)
    {
        $collection = $items instanceof Collection ? $items : new Collection([$items]);
        $model = new static();
        $query = $model->newQueryWithoutRelationships()->with($relations);
        $collection->setItems($query->eagerLoadRelations($collection->all()));
    }

    /**
     * @param array $attributes
     * @param null $connection
     * @return mixed
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        $entity = new $this->entity();
        return $entity->newInstance($attributes);
    }

    /**
     * @param array $models
     * @return Collection
     */
    public function newCollection(array $models = [])
    {
        return new Collection($models);
    }

    //Just compatible relations with Entities

    /**
     * Instantiate a new HasOne relationship.
     *
     * @param Builder $query
     * @param \Illuminate\Database\Eloquent\Model $parent
     * @param string $foreignKey
     * @param string $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function newHasOne(Builder $query, \Illuminate\Database\Eloquent\Model $parent, $foreignKey, $localKey)
    {
        return new HasOne($query, $parent, $foreignKey, $localKey);
    }

    /**
     * Instantiate a new HasOneThrough relationship.
     *
     * @param Builder $query
     * @param \Illuminate\Database\Eloquent\Model $farParent
     * @param \Illuminate\Database\Eloquent\Model $throughParent
     * @param string $firstKey
     * @param string $secondKey
     * @param string $localKey
     * @param string $secondLocalKey
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    protected function newHasOneThrough(Builder $query, \Illuminate\Database\Eloquent\Model $farParent, \Illuminate\Database\Eloquent\Model $throughParent, $firstKey, $secondKey, $localKey, $secondLocalKey)
    {
        return new HasOneThrough($query, $farParent, $throughParent, $firstKey, $secondKey, $localKey, $secondLocalKey);
    }

    /**
     * Instantiate a new MorphOne relationship.
     *
     * @param Builder $query
     * @param \Illuminate\Database\Eloquent\Model $parent
     * @param string $type
     * @param string $id
     * @param string $localKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    protected function newMorphOne(Builder $query, \Illuminate\Database\Eloquent\Model $parent, $type, $id, $localKey)
    {
        return new MorphOne($query, $parent, $type, $id, $localKey);
    }

    /**
     * Instantiate a new BelongsTo relationship.
     *
     * @param Builder $query
     * @param \Illuminate\Database\Eloquent\Model $child
     * @param string $foreignKey
     * @param string $ownerKey
     * @param string $relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function newBelongsTo(Builder $query, \Illuminate\Database\Eloquent\Model $child, $foreignKey, $ownerKey, $relation)
    {
        return new BelongsTo($query, $child, $foreignKey, $ownerKey, $relation);
    }
}
