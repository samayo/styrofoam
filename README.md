![Y U CODE LIKE THIS](http://i.imm.io/1hM9x.jpeg)

 


If you are using PDO to excecute a simple CRUD statements, then I assume you'll be writting at-least this much code, 
each time you do a simple `SELECT` statement. 

```` php            

	try{
		$stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
		$stmt->execute(array($_POST['id']));
	}catch(PDOException $e){
		return $e->getMessage();
	}

	if($stmt->rowCount()){
		return  $stmt->fetchAll(PDO::FETCH_ASSOC); 
	}else{
		return 'Query failed';
	}

`````
 Well,  with [PdoNoodle](https://github.com/simon-eQ/PdoNoodle), all you have to do to get the same result is... 

```` php     
 $select = $NoodlePiece->doLazy('SELECT * FROM users')->where('id = ?', $_POST['id']);

````
 That's it! And now, `$select` holds the required data.   
 
 
=======
#####for simple UPDATE, DELETE, INSERT check below
```` php   

$update = $NoodlePiece->doLazy('UPDATE car_type')->set('jaguar = ? WHERE id = ?', array('ferrari', 1));

$delete = $NoodlePiece->doLazy('DELETE FROM clients')->where('id = ?', array('371'));

$insert = $NoodlePiece->doLazy('INSERT INTO employees (name, job)')
                      ->values('(?,?)', array('simon', 'developer'), true);



