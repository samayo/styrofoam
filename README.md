![Y U CODE LIKE THIS](http://i.imm.io/1hRAR.jpeg)

 
=============

###PdoWrapper
If you use a plain PDO to excecute simple CRUD statements, then I assume you'll be writting at-least this much, to perform a simple `prepare()` statement. 

```` php            
try{
  $stmt = $conn->prepare('SELECT * FROM users WHERE name = ?');
  $stmt->execute(array($_POST['Simon']));
  
  if($stmt->rowCount()){
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
  }
  
  }catch(PDOException $e){
    return 'Query failed: '.$e->getMessage();
}
````
 Well,  with [PdoWrapper](https://github.com/simon-eQ/PdoWrapper), all you have to do to perform the same query, and  get the same result is by doing:

```` php     
 $e = null; 
 $select = $db->wrap('SELECT * FROM users WHERE name = ?', $_POST['username'], $e);
 $row = $select->fetch(); 
````
That's it. And now, `$row` holds the required data, no need to even `try/catch` anything, instead only check `$e` for any errors
thrown by your statement, like: 
 ```` php
 if(!$e){
    // Query is OK.
 }else{
    echo 'PDO ERROR: '.$e;
 }
 ````
=======
#####DELETE, UPDATE, INSERT

```` php 
$update = $db->wrap('UPDATE car_color SET red = ? WHERE id = ?', array('blue', 1), $e);
````
```` php 
$delete = $db->wrap('DELETE FROM companies WHERE name = ?', array('Monsanto'), $e);
````
```` php 
$insert = $db->wrap('INSERT INTO actors (name) VALUES (?)', array('Chuck Norris'), $e);
````
###### How to instantiate the class
```` php 
	$db = new PdoWrapper("mysql:host=localhost; dbname=db-name; charset=UTF8", "db-user", "db-pass"
		  array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
	);
	// Just pass the same number of parameters as you would for the PDO() object
````

=======
#####Simple Query
```` php 
$update = $db->wrap('UPDATE * FROM names'), null, $e);
```` 
at last, every method is made to return the class object, so you can apply method-chaining to execute queries in sequence.    

===========
![FORK](http://i.imm.io/1m2WW.png)
