![Y U CODE LIKE THIS](http://i.imm.io/1hRAR.jpeg)

 
=============

###PdoWrapper
If you are using a plain PDO to excecute simple CRUD statements, then I assume you'll be writting at-least this much, to perform a simple `prepare()`/`query()` statement. 

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
 Well,  with [PdoWrapper](https://github.com/simon-eQ/PdoWrapper), all you have to do to perform the same query, and  get the same result is:

```` php     
 $select = $db->doSimple('SELECT * FROM users WHERE name = ?', $_POST['Simon'], $error);
````
 That's it. One Line! And now, `$select` holds the required data, no need to even `try/catch` anything instead only check `$error` for any errors
 thrown by your statements. as
 ```` php
 if(!$error){
    // Query is OK.
 }else{
    echo 'ERROR FOUND: '.$error;
 }
 ````

 
 
=======
#####DELETE, UPDATE, INSERT

```` php 
$update = $db->doSimple('UPDATE car_color SET red = ? WHERE id = ?', array('blue', 1), $error);
````

```` php 
$delete = $db->doSimple('DELETE FROM companies WHERE name = ?', array('Monsanto'), $error);
````

```` php 
$insert = $db->doSimple('INSERT INTO actors (name) VALUES (?)', array('Chuck Norris'), $error);
````
###### How to instantiate the class
```` php 
	$db = new PdoWrapper('mysql:host=localhost; dbname=db-name', 'db-user', 'db-pass');
	// Just pass the same number of parameters as you would for the PDO() object
````

#### Method chaining
This is not very important, only an extra feature. But, let's check what method chaining looks like first: 
```` php
$releaseTheKraken =  $db
	->doSimple("UPDATE table SET row = ? WHERE id = ?", array($val, $id), $error)
	->doSimple("INSERT INTO users (name) VALUE (?)", array('foo'), $error)
	->doSimple("DELETE FROM example WHERE name = ?", array('foo'), $error); 
	
	/* If you wanted to execute something like that, it is possible to do so since each query, except for SELECT 
	 * returns the class object. And, if you want to apply it, then you are likely to want each query to get
	 * executed after the success of the one before it, meaning:
	 * only execute the following query, if the previous one was a succes. 
	 * So,I suggest you add `if($error){return $error;}` as shown below, to halt the process, in the case of an error. 
     */
	public function doSimple($query, $value = null, &$error = null)
	{
	   //this will prevent the script from continuing if, there was an error with the previous one. 
	    if($error){
	       return $error; 
	    }
````     
