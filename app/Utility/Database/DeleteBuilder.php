<?php
namespace App\Utility\Database;

class DeleteBuilder implements BuilderInterface
{

public function __construct (protected QueryBuilder $queryBuilder)
{

}


public function build (): string 
{
   $sql = sprintf( "DELETE FROM %s %s", $this->queryBuilder->getTable(), 
    $this->prepareWhereClause() );
   return $sql;
}

private function prepareWhereClause()
{
    $whereBuilder = new WhereBuilder($this->queryBuilder);
     return $whereBuilder->build();

}



}





















?>