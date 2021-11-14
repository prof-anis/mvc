<?php
namespace App\Utility\Database;
use App\Utility\Database\WhereBuilder;

class  updateBuilder implements BuilderInterface
{
    
    public function __construct (protected QueryBuilder $queryBuilder )
    {

    }


    public function build(): string
    {
       $sql = sprintf(" UPDATE %s %s  %s ", $this->queryBuilder->getTable(),
                        $this->updateTable(),
                      $this->prepareWhereClause()
                        );

        return $sql;
   }
  
    protected function updateTable()
    {
        $sql = $this->queryBuilder->getUpdate();
        return $this->prepareUpdate($sql);
    }

    public function prepareUpdate($sql)
    {
        if(count($sql) == 1){
            return sprintf("SET '%s'", ...$sql);
        }
        else if (count($sql) == 2) {
            return sprintf("SET %s  = '%s' ",...$sql);
        }
        else {
            //  die('error');
        }
    }
    
    private function prepareWhereClause()
    {
        $whereBuilder = new WhereBuilder($this->queryBuilder);
         return $whereBuilder->build();
    
    }

}



?>