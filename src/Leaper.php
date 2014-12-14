<?php 
/**
 * A tiny pdo-wrapper class.
 *
 * @category MyQuery
 * @license  Luke 3:11
 * @version  1.0.0
 * @link     https://github.com/samayo/MyQuery
 * @license  Luke 3:11 ( Free )
 */

class LeaperException extends \Exception {}

class Leaper extends \PDO
{

    public  function __call($func, $args)
    {
        if(!in_array($func, array("select", "update", "delete", "insert")))
        {
            throw new Exception($func." is not a valid mysql statement");
        }
        
        if(count($args) == 2){
            $stmt = parent::prepare($args[0]);
            $stmt->execute($args[1]);
        }else if($args){
            $stmt = parent::query($args[0]);
        }

        if((int)$stmt->errorCode()){
            throw new Exception($stmt->errorInfo()[2]);
        }
        
        if($func == 'select')
        {
            return $stmt->fetchAll();
        }

        if($func == 'insert')
        {
            return parent::lastInsertId();
        }

        return $stmt->rowCount();
    }
}
