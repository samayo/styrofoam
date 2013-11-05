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
`````
<<<<<<< HEAD
 Well,  with [PdoNoodle](https://github.com/simon-eQ/PdoNoodle), all you have to do to perform the same query, and  get the same result is:

```` php     
 $select = $db->doLazy('SELECT * FROM users WHERE name = ?', $_POST['Simon']);
=======
 Well,  with [PdoWrapper](https://github.com/simon-eQ/PdoWrapper), all you have to do to perform the same query, and  get the same result is:

```` php     
 $select = $db->doSimple('SELECT * FROM users WHERE name = ?', $_POST['Simon']);
>>>>>>> cd6985a36212767a7285f61b6a4c26dc09855024
````
 That's it. One Line! And now, `$select` holds the required data, no need to even `try/catch` anything.
 
 
=======
#####DELETE, UPDATE, INSERT
```` php   

<<<<<<< HEAD
$delete = $db->doLazy('DELETE FROM people WHERE name = ?', array('Hitler'));
````
```` php 
$update = $db->doLazy('UPDATE car_color SET red = ? WHERE id = ?', array('blue', 1));
````
```` php 
$insert = $db->doLazy('INSERT INTO actors (name, age, gender) VALUES (?,?,?)', array('Chuck Norris', '700', 'N/A'));
=======
$delete = $db->doSimple('DELETE FROM people WHERE name = ?', array('Hitler'));
````
```` php 
$update = $db->doSimple('UPDATE car_color SET red = ? WHERE id = ?', array('blue', 1));
````
```` php 
$insert = $db->doSimple('INSERT INTO actors (name, age, gender) VALUES (?,?,?)',
                             array('Chuck Norris', '700', 'N/A'));
>>>>>>> cd6985a36212767a7285f61b6a4c26dc09855024
````
###### How to instantiate the class

```` php 
 
<<<<<<< HEAD
	$db = new PdoNoodle('mysql:dbname=myDb', 'db-user', 'db-pass',
=======
	$db = new PdoWrapper('mysql:dbname=myDb', 'db-user', 'db-pass',
>>>>>>> cd6985a36212767a7285f61b6a4c26dc09855024
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
