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
 $select = $db->noodle('SELECT * FROM users WHERE name = ?', $_POST['Simon']);
````
 That's it! And now, `$select` holds the required data, no need to even `try/catch` anything
 
 
=======
####DELETE, UPDATE, INSERT
```` php   

$delete = $db->noodle('DELETE FROM people WHERE name = ?', array('Hitler'));
````
```` php 
$update = $db->noodle('UPDATE car_color SET red = ? WHERE id = ?', array('blue', 1));
````
```` php 
$insert = $db->noodle('INSERT INTO actors (name, age, gender) VALUES (?,?,?)', array('Chuck Norris', '700', 'N/A'));
````
###### How to instantiate the class

```` php 
 
	$db = new PdoNoodle('mysql:dbname=myDb', 'db-user', 'db-pass',
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
