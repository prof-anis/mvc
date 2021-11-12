<?php

namespace App\Utility\Database;

class SelectBuilder implements BuilderInterface
{
    protected $stack = array ();
    private $stackExtracted;
    private $emeka;
    public function __construct(protected QueryBuilder $queryBuilder)
    {

    }

    public function build(): string
    {
        return $this->sql = sprintf(
            "SELECT %s  FROM %s %s %s ",
            $this->prepareFieldsToSelect(),
            $this->queryBuilder->getTable(),
           $this->WhereValue(),
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

    protected function WhereValue ()
    {
       $newValueArray = $this->queryBuilder->getWhere();
       foreach ( $newValueArray as $key ) {
           if(is_array($key)) {
         $this->stackExtract($key);
            }
            else {
           return $this->noneString($newValueArray);
            }
       }
    
        }

  public function stackExtract ($key) 
  {
    var_dump($this->stackExtracted = $this->getnewValue($key));
  }



    //   public function getstackExtractValue(){
    //  $this->stackExtracted;
    //     }

    protected function noneString ( $key) 
    {   
        
        if (count($key) == 2) {
             return  sprintf('WHERE %s = %s', $key[0], $key[1]);
        }
        if ( count($key) == 3) {
           return  $where = sprintf('WHERE %s %s %s', $key[0], $key[1], $key[2]);
        }
        else {
            return  sprintf('WHERE %s ', $this->prepareValues($key));
        }
      
    }


    public function checkkey ($key) 
    {  
       return $check = $this->prepareFields($key);
    }

    public function getnewValue ($key) 
    {   
         if(array_key_exists( $this->checkkey($key) , $key)){
          return $getnewValue2 = sprintf('WHERE %s = %s', $this->prepareFields($key), $this->prepareValues($key));
        
        }else {
        return $this->noneString($key);
        }
    }




    protected function prepareFields(array $insert)
    {
        return implode(',', $this->extractFields($insert));
    }

    protected function extractFields(array $insert)
    {
        return array_keys($insert);
    }

}
