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
	public function __construct($dsn, $user, $pass)
	{
		try{
			parent::__construct($dsn, $user, $pass);
				}catch(PDOException $e){
			die($e->getMessage());
		}
	}



	public function doSimple($query, $value = null, &$error = null)
	{
		if($value == null){        
			if(parent::query($query) == false){
				$error = 'Query Failed. Use proper PDO + try/catch to find out why :) ';
			return $this;
		}
	}

	$stmt = parent::prepare($query); 
	$stmt->execute($value); 


	if(stripos('SELECT', $query) < 5){
		if((int)$stmt->errorCode()){
			$error = $stmt->errorInfo();
				}else{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}


	if((int)$stmt->errorCode()){
		$error = $stmt->errorInfo();
		return $this;
	}

	return $this;

	}
}
