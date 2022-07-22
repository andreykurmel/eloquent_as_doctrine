<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example\Collections;

use AndreyKurmel\EloquentAsDoctrine\Collections\Collection;
use AndreyKurmel\EloquentAsDoctrine\Example\RepoFactory;

class TableCollection extends Collection
{
    /**
     * Syntax sugar, so developer can load relations easily.
     * @param string $columns
     */
    public function loadFields(string $columns = ''): void
    {
        RepoFactory::fields()->loadFieldsForTable($this, $columns);
    }
}
