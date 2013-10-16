##### DON'T USE THIS CLASS, yet! Even at your own risk

![Y U CODE LIKE THIS](http://i.imm.io/1hRAR.jpeg)

 
=============

###PdoNoodle
If you are using plain PDO to excecute simple CRUD statements, then I assume you'll be writting at-least this much, 
to do a simple `SELECT` query. 

```` php            
	try{
		$stmt = $conn->prepare('SELECT * FROM users WHERE name = ?');
		$stmt->execute(array($_POST['Simon']));
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
 $select = $PdoNoodle->doLazy('SELECT * FROM users')->where('name = ?', $_POST['Simon']);
````
 That's it! And now, `$select` holds the required data.   
 
 
=======
####DELETE, UPDATE, INSERT
```` php   

$delete = $PdoNoodle->doLazy('DELETE FROM people')->where('name = ?', array('Hitler'));
````
```` php 
$update = $PdoNoodle->doLazy('UPDATE car_color')->set('red = ? WHERE id = ?', array('blue', 1));
````
```` php 
$insert = $PdoNoodle->doLazy('INSERT INTO actors (name, age, gender)')
                    ->values('(?,?,?)', array('Chuck Norris', '700', 'unknown'), true);
````
###### Note, the INSERT method takes three arguments: 

```` php 
 $insert = $PdoNoodle->doLazy($query)->values($arg1, $arg2, $bool)
 
 /*
  * The third additional argument ($bool) should be a boolean, this means if you set
  * it to 'true' it will return the lastInsertId() as the response, provided the query 
  * executed was succesful. However, If set to 'false', you will only get boolean value, 
  * pertaining to the failure / success of the query
  */
