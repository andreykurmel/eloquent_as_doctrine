<?php

namespace AndreyKurmel\EloquentAsDoctrine\Models\Relations;

use Illuminate\Database\Eloquent\Model;

class MorphOne extends \Illuminate\Database\Eloquent\Relations\MorphOne
{
    /**
     * Get the default value for this relation.
     *
     * @param Model $parent
     * @return Model|null
     */
    protected function getDefaultFor($parent)
    {
        if (!$this->withDefault) {
            return;
        }

        $instance = $this->newRelatedInstanceFor($parent);

        if (is_callable($this->withDefault)) {
            return call_user_func($this->withDefault, $instance, $parent) ?: $instance;
        }

        if (is_array($this->withDefault)) {
            $instance->forceFill($this->withDefault);
        }

        return $instance;
    }
}
