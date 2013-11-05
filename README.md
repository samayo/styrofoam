![Y U CODE LIKE THIS](http://i.imm.io/1hRAR.jpeg)

 
=============

###PdoWrapper
If you are using plain PDO to excecute simple CRUD statements, then I assume you'll be writting at-least this much,    
  for a simple `prepare()`/`query()` method. 

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
    
````
 Well,  with [PdoWrapper](https://github.com/simon-eQ/PdoWrapper), all you have to do to perform the same query, and  get the same result is:

```` php     
 $select = $db->simple('SELECT * FROM users WHERE name = ?', $_POST['Simon']);

````
 That's it. One Line! And now, `$select` holds the required data, no need to even `try/catch` anything.
 
 
=======
#####DELETE, UPDATE, INSERT

```` php 
$update = $db->simple('UPDATE car_color SET red = ? WHERE id = ?', array('blue', 1));
````

```` php 
$insert = $db->simple('INSERT INTO actors (name, age, gender) VALUES (?,?,?)', array('Chuck Norris', '700', 'N/A'));
`````

```` php 
$delete = $db->simple('DELETE FROM people WHERE name = ?', array('Hitler'));
````

```` php 
$insert = $db->simple('INSERT INTO actors (name, age, gender) VALUES (?,?,?)',
                             array('Chuck Norris', '700', 'N/A'));

````
###### How to instantiate the class

```` php 
	$db = new PdoWrapper('mysql:host=localhost; dbname=db-name', 'db-user', 'db-pass');
