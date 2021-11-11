<?php

namespace App\Utility\Database;

use App\Utility\Database\Database;

class QueryBuilder
{
    protected string $sql;
    private $where;
    private $table;
    private $limit;
    private $select;
    private array $inserts;
    private $orderByField;
    /**
     * @var mixed|string
     */
    private mixed $orderByDirection;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

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

        return $this->database->query($this->toSql());
    }
    
    public function where()
    {
         $this->where[] = func_get_args();

         return $this;
    }

    public function getWhere()
    {
        return $this->where;
    }

    public function limit (int $number)
    {
        $this->limit = $number;

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

        if ($this->database->query($this->toSql())) {
            return $this->database->fetch();
        } else {
            return [];
        }

    }

    public function orderBy($field, $direction = "ASC")
    {
        $this->orderByField = $field;
        $this->orderByDirection = $direction;

        return $this;
    }

    public function getOrderByField()
    {
        return $this->orderByField;
    }

    public function getOrderByDirection()
    {
        return $this->orderByDirection;
    }

    public function toSql()
    {
        return $this->sql;
    }

    public function delete()
    {

    }

    public function update(array $data)
    {

    }
}
