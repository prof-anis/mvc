<?php

namespace App\Utility;

class QueryBuilder
{
    protected string $sql;
    private $where;
    private $table;
    private $limit;
    private $select;

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
    
    public function where(string $id, int $num)
    {
         $this->where = sprintf('WHERE %s = %s', $id, $num);
         return $this;
    }
    public function limit (int $number)
    {
        $this->limit = sprintf('LIMIT = %s', $number);
        return $this;
    }
    
    public function select (array $select)
    {
       $this->select = $this->prepareValues($select);
        return $this;
    }

    public function setvalue ()
    {
        $this->sql = sprintf("SELECT %s  FROM %s, %s, %s, %s ", $this->select, $this->table, $this->where, $this->limit );
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
