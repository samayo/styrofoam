<?php 

/**
 * A tiny PDO-Wrapper class
 * 
 * @category MyQuery
 * @license  Luke 3:11
 * @version  1.0.0
 * @link     https://github.com/bivoc/MyQuery
 * @author   bivoc. ~ The force is strong with this one.
 */
class MyQuery extends \PDO
{
    public  function __call($func, $args)
    {
        if(!in_array($func, array("select", "update", "delete", "insert"))){
            throw new Exception($func." is unknown mysql statement");
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
         
        $$func = true; 

        if($select){
            return $stmt->fetchAll();
        }

        if($insert){
            return $stmt->dbh->lastInsertId();
        }

        return $stmt->rowCount();
    }
}