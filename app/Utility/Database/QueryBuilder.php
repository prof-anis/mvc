<?php

namespace App\Utility\Database;

class QueryBuilder
{
    protected string $sql;
    private $where;
    private $table;
    private $limit;
    private $select;
    private array $inserts;

    public function table(string $table)
    {
         $this->table = $table;
         return $this;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getInserts()
    {
        return $this->inserts;
    }

    public function insert(array $inserts)
    {
        $this->inserts = $inserts;

        $insertBuilder = new InsertBuilder($this);

        $this->sql = $insertBuilder->build();

        return $this;
    }
    
    // public function where(string $id, int $num)
    // {
    //      $this->where = sprintf('WHERE %s = %s', $id, $num);

    //      return $this;
    // }
        public function where () 
        {
          $this->where = func_get_args();
            return $this;
        }    


    public function getWhere()
    {
        return $this->where;
    }

    public function limit (int $number)
    {
        $this->limit = sprintf('LIMIT = %s', $number);

        return $this;
    }

    public function getLimit()
    {
        return $this->limit;
    }


    public function select ()
    {
       $this->select = func_get_args();

        return $this;
    }

    public function getSelects()
    {
        return $this->select;
    }

    public function get()
    {
        $selectBuilder = new SelectBuilder($this);

        $this->sql =  $selectBuilder->build();

    }

    public function toSql()
    {
        return $this->sql;
    }
}
