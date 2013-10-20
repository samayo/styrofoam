<?php 

class PdoNoodle extends PDO{

	public $returnId; 
	
	public function __construct($dsn, $user, $password, $foo){
	
		try{
		parent::__construct($dsn, $user, $password, $foo); 

 
		$this->dsn = $dsn; 
		
			}catch(PDOException $e){
		echo $e->getMessage(); exit;
	}
	}
	

	public function noodle($query, $value = null){
	
	if(empty($value)){
	
	try{
	foreach(parent::query($query) as $result){
			 $allRows[] = $result;
		}
		}catch(PDOException $e){
			return $e->getMessage();
		}
	
		return $allRows;
		
	}
 
		try{
		$stmt = parent::prepare($query);
				$stmt->execute($value);
		}catch(PDOException $e){
			return $e->getMessage();
		}
		
		if(strpos($query, 'SELECT') !== false){
		return $stmt->fetchAll(PDO::FETCH_ASSOC); 
		}
		
		return true;
		
		  
	 
		
		
	}

	
	
}