

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
	private $_error = array();

    public function __construct($dsn, $user, $pass){

        try{
        
            parent::__construct($dsn, $user, $pass);

        }catch (PDOException $e){

   
            die($e->getMessage());
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
		$stmt = parent::query($query);
		foreach($stmt as $row){
			return $row;
		}
		
	   }else{
	   
        $stmt = parent::prepare($query);
		$stmt->execute($value);
		
		//var_dump(!(int)$stmt->errorCode());
			if(stripos('SELECT', $query) < 5 && !(int)$stmt->errorCode()){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}elseif (!(int)$stmt->errorCode()){
				return true; 
			}else{
				return $this->_error = $stmt->errorInfo();
			}
			
			
		
	}
    }
	
	
	
	protected function showErrors(){
		return $this->_error;
	}
	
	

	
	
	
	
	
	

}