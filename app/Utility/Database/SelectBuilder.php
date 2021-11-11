<?php

namespace App\Utility\Database;

class SelectBuilder implements BuilderInterface
{
    public function __construct(protected QueryBuilder $queryBuilder)
    {

    }

    public function build(): string
    {
        return $this->sql = sprintf(
            "SELECT %s  FROM %s %s %s %s ",
            $this->prepareFieldsToSelect(),
            $this->queryBuilder->getTable(),
            $this->prepareWhereClause(),
            $this->prepareOrderClause(),
            $this->prepareLimitClause()
        );
    }

    protected function prepareLimitClause()
    {
        if ($this->queryBuilder->getLimit() == null) {
            return "";
        } else {
            return " LIMIT ".$this->queryBuilder->getLimit();
        }
    }

    protected function prepareOrderClause()
    {
        if ($this->queryBuilder->getOrderByField() == null) {
            return "";
        } else {
            return sprintf("ORDER BY %s %s", $this->queryBuilder->getOrderByField(), $this->queryBuilder->getOrderByDirection());
        }
    }

    protected function prepareValues(array $selects)
    {
        return implode(',', $this->extractValues($selects));
    }

    protected function extractValues(array $insert)
    {
        return array_values($insert);
    }

    protected function prepareFieldsToSelect()
    {
        $selects = $this->queryBuilder->getSelects();

        /**
         * If user uses an asterick or supplies no argument, we assume user wants all the fields in the database
         */
        if (empty($selects)) {
            return "*";
        }

        if (is_array($selects)) {
            return $this->prepareValues($selects);
        }

    }

    private function prepareWhereClause()
    {
        $whereBuilder = new WhereBuilder($this->queryBuilder);

        return $whereBuilder->build();
    }


}
