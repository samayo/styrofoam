<?php

/**
 * PdoWrapper as the name suggests, is  a tiny PDO Wrapper Class,
 * to handle simple PDO-based CRUD statements with one or two lines of coding.
 * @author     Simon _eQ <https://github.com/simon-eQ>
 * @copyright  Copyright (c) 2013 Simon _eQ
 * @license    Do WTF you want with it.
 *
 */

class PdoWrapper extends PDO
{
    public function __construct($dsn, $user, $pass)
    {
        try{
            parent::__construct($dsn, $user, $pass);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    /*
     * to simplify things, we can use one method for both
     * query/prepare methods 
     */
    public function simple($query, $value = null)
    {
        if(empty($value))
        {         
            return parent::query($query);
	}
		
	$stmt = parent::prepare($query); 
	$stmt->execute($value); 
	
	/*
	 * If query is a select statement, then we only need to retun the object
	 */
	if(stripos('SELECT', $query) < 5){
		if((int)$stmt->errorCode()){
			return $stmt->errorInfo(); 
		}else{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
		
		if((int)$stmt->errorCode()){
			return $stmt->errorInfo(); 
		}
		
		//if statement contained UPDATE/DELETE/INSERT then 
		// we should return 'true' based on success of the query
		return true; 			
    }
}







