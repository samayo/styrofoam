<?php

/**
 * PdoWrapper as the name suggests, is  a tiny PDO Wrapper Class,
 * to handle simple PDO-based CRUD statements with one or two lines of coding.
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @copyright  Copyright (c) 2013 Simon _eQ
 * @license    Public domain. Do anything you want with it.
 *
 */


class PdoWrapper extends PDO
{


    /*
     * Catch and exit after any dsn-related error occur with PDO.     *
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
     *
     * Using one method to execute to types queries, according to the parameter numbers
     * if $query & $value are initialized, the we treat this method as a prepare query
     * if only $query is initialized, then only we can call the query method from PDO.
     * referencing $error allow us to catch the error during run time, by checking
     * the variable itself.
     *
     * @param $query  the query statement to pass
     * @param null $value the values to execute, in the case for prepare() event
     * @param null $error assign error for later error checking.
     * @return $this|array if query is SELECT we fetch an array of the object statement,
     *                     if query is not SELECT then, chain the class, or do nothing.
     */
    public function doSimple($query, $value = null, &$error = null)
    {
        if($value == null)
        {
            if(parent::query($query) == false)
            {
                $error = 'Query failed. Use proper PDO with try/catch to find out why :)';
                return $this;
            }
        }


        $stmt = parent::prepare($query);
        $stmt->execute($value);

        /**
         * this method allows us to know what kind of query was passed throw the
         * argument.
         */
        if(stripos('SELECT', $query) < 5)
        {
            if((int)$stmt->errorCode())
            {
                $error = $stmt->errorInfo();
                return $this;
            }else{
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }


        if((int) $stmt->errorCode()){
            $error = $stmt->errorCode();
            return $this;
        }

        return $this;

    }

}










































































