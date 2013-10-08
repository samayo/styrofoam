<?php

/**
 * PdoNoodle is tiny PDO Wrapper Class, to handle simple PDO-based
 * CRUD statements with one or two lines of coding.
 *
 * Available = PHP 5 >= 5.1.0, PECL pdo >= 0.1.0
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @copyright  Copyright (c) 2013 Simon _eQ
 * @license    free as in a free hug
 * @version    1.0.0
 *
 */
 
 //    (--./)               *
 //	   /..)<               ()
 //	  (o o),\      ___    // 
 //	   `--.\(\____/   \__//
 //	        \ `---'  .  )/
 //		     )       \  < o  
 //			 | >--( .)  /  o
 //			 |/_|    / /|   o
 //			/_|_|   /_|_\  oOo 
 //        fork me or fork you
 



class PdoNoodle {


    /**
     * Get statement type or CRUD type
     * @var
     */
    private $statement;


    /**
     * Check for errors
     * @var
     */
    private $classError = array();


    /**
     * Inject the PDO connection resource
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }


    /**
     * Get query (CRUD) type and allow access of method
     *
     * @param $statement - get query type
     * @return $this - enables access of methods as method()->method2();
     *
     */
    public function doLazy($statement)
    {
        $this->statement = $statement;
        return $this;
    }


    /**
     * Captures the 'WHERE..' statement for both UPDATE & DELETE
     *
     * @param $taskDirective - ex: where id = ?
     * @param $valuesToExecute - values that go through execute() method
     * @return bool|string  - if Query fails, pass reason to error
     *
     */
    public function where($taskDirective, $valuesToExecute )
    {

        try{
            $stmt = $this->db->prepare($this->statement.' WHERE '.$taskDirective);
            $stmt->execute($valuesToExecute);
        }catch (PDOException $e){
            return $this->classError = $e->getMessage();
        }
  	
        if(strpos($this->statement, 'DELETE') !== false){
            return (!$stmt->rowCount()) ? $this->classError = 'Query Failed at line '. __LINE__ : true;
        }

        return ($stmt->rowCount()) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $this->classError = 'Failed Query at line '. __LINE__ ;

    }


    /**
     * Capture values for the 'SET' part of an Update statement.
     *
     * @param $rowsToAffect - this mentioned which rows to update
     * @param $valuesToUpdate - this is an array to execute
     * @return bool|string - error, or bool.
     *
     */
    public function set($rowsToAffect, $valuesToUpdate)
    {

        try{
            $stmt = $this->db->prepare($this->statement. ' SET ' .$rowsToAffect);
            $stmt->execute($valuesToUpdate);
        }catch(PDOException $e){
            return $this->classError = 'Update Failed: '.$e->getMessage();
        }

        return ($stmt->rowCount()) ? true : $this->classError = 'Query failed at line '. __LINE__;
    }



    /**
     * This handles VALUES(...) for the INSERT Method/
     *
     * @param $indetifyRows - for named or ? placeholders
     * @param $valuesToExecute - array to execute
     * @param $requestLastInsertId - if true, after insert retun lastInsertId
     * @return string
     *
     */
    public function values($indetifyRows, $valuesToExecute, $requestLastInsertId)
    {

        try{
            $stmt = $this->db->prepare($this->statement.' VALUES '.$indetifyRows);
            $stmt->execute($valuesToExecute);
        }catch (PDOException $e){
            return $this->classError = 'Insert Query Failed '.$e->getMessage();
        }

        if($stmt->rowCount() && $requestLastInsertId === true){
            return $this->db->lastInsertId();
        }

        return (!$stmt->rowCount()) ? 'Query failed at line '. __LINE__ : true; 
    }



    /**
     * Check for possible errors
     * @return array|string
     *
     */
    public function errorChecking()
    {

        if($this->classError){
            return $this->classError;
        }

        return 'No errors Found';

    }




}




