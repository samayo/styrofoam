<?php

/**
 * PdoWrapper: A small class to wrap PDO's prepare/query methods
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @license    Public domain. Do anything you want with it.
 *
 */


class PdoWrapper extends PDO
{
    /**
     * for some reason, I can't catch the exception here, so if an error occurs just exit. 
     */
    public function __construct($dsn, $user, $pass)
    {
        try{
            parent::__construct($dsn, $user, $pass);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * this will take two arguments (+ 1 reference) for both query/prepare() methods
     *
     * @param $query  Build your statement query here
     * @param null $value pass the values as array for the execute() method
     * @param null $error assign error for later error checking.
     * @return $this|array if query was a SELECT statement, then we'll get the $stmt object
     */
    public function doSimple($query, $value = null, &$error = null)
    {
        /**
         *  if $value is empty/null, then do a query() statement
         */
        if($value == null)
        {
            if(parent::query($query) == false)
            {
                $error = 'Query failed. Use proper PDO with try/catch to find out why :(';
            }
            
           
             /**
              * if there aren't any errors, return the PDO statement itself.
              */
            return parent::query($query);
        }


        /**
         *  if $value is not empty, then use prepare method, by passing the $value to be executed
         */
        $stmt = parent::prepare($query);
        $stmt->execute($value);


        /**
         * 
         * Checking for string 'SELECT' allows us to know what kind of query was passed
         * therefore, if it was SELECT we can return the $stmt object
         */
        if(stripos('SELECT', $query) < 5)
        {
            $error = (int)$stmt->errorCode();
            
            if(!$error)
            {
                return $stmt;
            }
            else
            {
                return $this;
            }
        }
        

        /**
         * remeber errorCode gives '0000' if there are no errors, so only
         * casting it to int will give '0' or meaning there wasn't any error. 
         * othewise $error will be initialized. 
         */
         
         $error = (int)$stmt->errorCode();

         return $this;

    }

}
