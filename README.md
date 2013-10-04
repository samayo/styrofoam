![Y U CODE LIKE THIS](http://i.imm.io/1hvBM.jpeg)

##NoodlePiece


##### vat ze hel iz zis ? 

If you are too noob, or too lazy to write those blocks of PDO statements for each and every one of your
CRUD applications, then NoodlePiece is your noodle and your best friend. 

I will asume you will write this much, to do a simple SELECT query based on a given parameter. 

      
      try{
          $stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
          $stmt->execute(array($_POST['id']));
       } catch(PDOException $e){
         	 echo $e->getMessage();
       }
       
       if($stmt->rowCount()){
         	return  $stmt->fetchAll(PDO::FETCH_ASSOC); 
       }else{
         	return 'Query failed';
       }


Well,  with NoodlePiece, all you have to do to get the same result is... 

      $select = $NoodlePiece->doLazy->('SELECT * FROM users')->where('id = ?', $_POST['id']); 

that is it. And now, `$result` holds the required data.






