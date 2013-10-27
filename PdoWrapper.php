<?php

/**
 * PdoWrapper as the name suggests, is  atiny PDO Wrapper Class, 
 * to handle simple PDO-based CRUD statements with one or two.. 
 * lines of coding.
 *
 * Available = PHP 5 >= 5.1.0, PECL pdo >= 0.1.0
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @copyright  Copyright (c) 2013 Simon _eQ
 * @license    free as in a free hug
 * @version    1.0.0
 *
 */


class PdoWrapper extends PDO
{



    /**
     * Create PDO instance
     * @param $dsn
     * @param $user
     * @param $pass
     */
    public function __construct($dsn, $user, $pass){

        /**
         * Catch errors (if any) from -- new PDO() -- object
         */
        try{
            /**
             * Allow class constructor to fetch parent construct
             */
            parent::__construct($dsn, $user, $pass);

        }catch (PDOException $e){

            /**
             * If there is another query after PDO(); multiple errors will
             * be show, instead we have to echo one, and exit the script.
             */
            echo $e->getMessage(); exit; 
        }

    }



    /**
     * Allow method to accept query + value, to prepare & execute
	 
     * @param $query - the full query statement
     * @param null $value - the value to be executed. 
     * @return array|bool|string
     */
    public function doSimple($query, $value = null){
	

        /**
         * If second argument is empty, then treat it as
         * a simple query. i.e. non-parameterized query
         */
        if(empty($value)){

            // as usually, catch for any errors
            try{
                foreach(parent::query($query) as $result){
                    // inject every result into an array, to avoid doing echo.					
                    $queryResults[] = $result;
                }

            }catch(PDOException $e){
               return  $e->getMessage();

            }

            return $queryResults;
            }


        /**
         * If second argument is not empty, then treat this as
         * a parameterized query
         */
        try{
                $stmt = parent::prepare($query);
                $stmt->execute($value);
				
            }catch (PDOException $e){

               return  $e->getMessage();

            }


        /**
         * If statement has 'SELECT' method in it,
         * then we only need to return object as the response
         * otherwise, return bool true for DELETE, UPDATE, INSERT
         */
        if(strpos($query, 'SELECT')  < 5){
		
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
        }

        return true;


    }


}
