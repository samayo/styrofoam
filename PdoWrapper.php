<?php

/**
 * PdoWrapper: A small class to wrap PDO's prepare/query methods and the constructor
 * to handle simple PDO-based CRUD statements with one or two lines of coding.
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @copyright  Copyright (c) 2013 Simon _eQ
 * @license    Public domain. Do anything you want with it.
 *
 */


class PdoWrapper extends PDO
{
    /**
     * Catch and exit after any dsn-related error occur From PDO side.
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
     * allow doSimple to take in statements for both prepare/query methods
     *
     * @param $query  the query statement to pass
     * @param null $value the values to execute 
     * @param null $error assign error for later error checking.
     * @return $this|array if query is SELECT we fetch an array of the object statement     *              
     */
    public function doSimple($query, $value = null, &$error = null)
    {
        /**
         *  if $value is empty/null, then execute as a query() statement
         */
        if($value == null)
        {
            if(parent::query($query) == false)
            {
                $error = 'Query failed. Use proper PDO with try/catch to find out why :(';
            }
            
            /**
             * if the error no errors, return the PDO statement itself.
             */
            return parent::query($query);
        }


        /**
         *  if $value is not empty, then use prepare method, by passing $value to be executed
         */
        $stmt = parent::prepare($query);
        $stmt->execute($value);


        /**
         * Checking for string 'SELECT' allows us to know what kind of query was passed
         * therefore, if it was SELECT we can return the result, otherwise only execute
         * 
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
         * remeber errorCode gives '0000' if there are no errors, so
         * casting it to int will give '0' meaning there is not error. 
         * but if there is an error, then $error will be initialized
         */
         
         $error = (int)$stmt->errorCode();

         return $this;

    }

}
