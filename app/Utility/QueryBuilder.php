<?php

namespace App\Utility;

class QueryBuilder
{
    protected string $sql;

    private $table;

    public function table(string $table)
    {
         $this->table = $table;

         return $this;
    }

    public function insert(array $inserts)
    {
        $this->sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $this->table,
            $this->prepareFields($inserts),
            $this->prepareValues($inserts)
        );

        return $this;
    }

    protected function extractFields(array $insert)
    {
        return array_keys($insert);
    }

    protected function extractValues(array $insert)
    {
        return array_values($insert);
    }

    protected function prepareFields(array $insert)
    {
        return implode(',', $this->extractFields($insert));
    }

    protected function prepareValues(array $insert)
    {
        return implode(',', $this->extractValues($insert));
    }

    public function toSql()
    {
        return $this->sql;
    }
}
