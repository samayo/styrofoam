![Y U CODE LIKE THIS](http://i.imm.io/1hM9x.jpeg)

 


If you are using pain PDO to excecute simple CRUD statements, then I assume you'll be writting at-least this much, 
to do a simple `SELECT` statement. 

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
 Well,  with [PdoNoodle](https://github.com/simon-eQ/PdoNoodle), all you have to do to perform the same query, and  get the same result is by this one line of code:

```` php     
 $select = $NoodlePiece->doLazy('SELECT * FROM users')->where('id = ?', $_POST['id']);

````
 That's it! And now, `$select` holds the required data.   
 
 
=======
###### How to do simple DELETE, UPDATE, INSERT
```` php   



$delete = $NoodlePiece->doLazy('DELETE FROM clients')->where('name = ?', array('Hitler'));

$update = $NoodlePiece->doLazy('UPDATE car_type')
                      ->set('jaguar = ? WHERE id = ?', array('ferrari', 1));

$insert = $NoodlePiece->doLazy('INSERT INTO people (name, age)')
                      ->values('(?,?)', array('Chuck Norris', '700 year old'), true);



