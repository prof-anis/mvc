<?php

namespace App\Utility\Database;

class WhereBuilder implements BuilderInterface
{
    private QueryBuilder $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function build(): string
    {
       return $this->prepareWhereClause();
    }

    protected function prepareWhereClause()
    {
        $where = $this->queryBuilder->getWhere();

        if ($where == null) {
            return "";
        }

        $sql = " WHERE ";

        $counter = 1;

        foreach ($where as $eachWhereInstance) {
            $sql .= $this->prepareSingleWhere($eachWhereInstance);

            if ($counter != count($where)) {
                $sql .= " AND ";
            }

            $counter++;
        }

        return $sql;
    }

    protected function prepareSingleWhere(array $where)
    {
        if (count($where) == 2 && !is_array($where[0])) {
            return $this->prepareSimpleWhereClause($where);
        }

        if (count($where) === 3 && !is_array($where[0])) {
            return $this->prepareWhereClauseWithCondition($where);
        }

        if (is_array($where[0])) {
            return $this->prepareWhereClauseWithArrayOption($where);
        }
    }

    private function prepareSimpleWhereClause(array  $where)
    {
        return sprintf("%s = %s", ...$where);
    }

    private function prepareWhereClauseWithCondition(array $where)
    {
        return sprintf("%s %s %s", ...$where);
    }

    private function prepareWhereClauseWithArrayOption(array $where)
    {
        $sql = "";

        $counter = 1;

        foreach ($where as $eachWhere) {
            if (count($eachWhere) == 1) {
                $sql .= sprintf("%s = %s", $this->prepareFields($eachWhere), $this->prepareValues($eachWhere));

            } elseif(count($eachWhere) === 3) {
                $sql .= sprintf("%s %s %s", ...$eachWhere);

            }

            if ($counter != count($where)) {
                $sql .= " AND ";
            }

            $counter++;
        }

        return $sql;
    }

    protected function extractFields(array $insert)
    {
        return array_keys($insert);
    }

    protected function prepareFields(array $insert)
    {
        return implode(',', $this->extractFields($insert));
    }

    protected function prepareValues(array $selects)
    {
        return implode(',', $this->extractValues($selects));
    }

    protected function extractValues(array $insert)
    {
        return array_values($insert);
    }

}
