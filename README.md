![Y U CODE LIKE THIS](http://i.imm.io/1hM9x.jpeg)

 


If you are using PDO to excecute a simple CRUD statements, then I assume you'll be writting at-least this much code, 
each time you do a simple `SELECT` statement. 
            
       
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
      

Well,  with PdoNoodle, all you have to do to get the same result is... 
#### Select

`$select = $NoodlePiece->doLazy('SELECT * FROM users')->where('id = ?', $_POST['id']);`

that is it. And now, `$select` holds the required data.

=============
##### Update 

`$update = $NoodlePiece->doLazy('UPDATE car_type')->set('jaguar = ? WHERE id = ?', ['ferrari', 1]);`

##### Delete 

`$delete = $NoodlePiece->doLazy('DELETE FROM clients')->where('id = ?', array('371'));`

##### Insert

         $insert = $NoodlePiece->doLazy('INSERT INTO employees (name, job)')
                               ->values('(?,?)', ['simon', 'developer'], true);



