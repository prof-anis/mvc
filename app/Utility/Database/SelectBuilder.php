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
            "SELECT %s  FROM %s, %s, %s ",
            $this->prepareFieldsToSelect(),
            $this->queryBuilder->getTable(),
            $this->queryBuilder->getWhere(),
            $this->queryBuilder->getLimit()
        );
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


}
