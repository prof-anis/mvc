<?php

namespace App\Utility\Database;

class InsertBuilder implements BuilderInterface
{

    public function __construct(protected QueryBuilder $queryBuilder)
    {

    }

    public function build(): string
    {
        return sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $this->queryBuilder->getTable(),
            $this->prepareFields($this->queryBuilder->getInserts()),
            $this->prepareValues($this->queryBuilder->getInserts())
        );
    }

    protected function prepareFields(array $insert)
    {
        return implode(',', $this->extractFields($insert));
    }

    protected function prepareValues(array $insert)
    {
        return implode(',', $this->extractValues($insert));
    }

    protected function extractFields(array $insert)
    {
        return array_keys($insert);
    }

    protected function extractValues(array $insert)
    {
        return array_values($insert);
    }



}
