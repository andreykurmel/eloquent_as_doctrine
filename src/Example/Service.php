<?php

namespace AndreyKurmel\EloquentAsDoctrine\Example;

class Service
{
    /**
     * @return array
     */
    public function tableWithFields(): array
    {
        $tables = RepoFactory::tables()->all();
        $tables->loadFields('id,table_id,field,ddl_id');
        $tables->makeHidden(['created_at', 'updated_at']);
        return $tables->toArray();
    }

    /**
     * @return array
     */
    public function withoutSyntaxSugar(): array
    {
        $tables = RepoFactory::tables()->all();
        RepoFactory::fields()->loadFieldsForTable($tables, 'id,table_id,field,ddl_id');
        return $tables->toArray();
    }
}