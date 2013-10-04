<?php 

/*
 * this demonstrates how to do a simple and basic CRUD with NoodlePiece
 *
 */
 
 
  $db = new PDO('mysql:host=localhost; dbname=eritrean_lib', 'root', '');  // this is just an example
	
	
	
  require_once 'NoodlePiece.php';
	
 	$NoodlePiece = new NoodlePiece($db);
 	
 	
 	
	
	/* how to do a SELECT statement */
	
	$select = $NoodlePiece->doLazy('SELECT * FROM questions')->where('id = ?', [1]);
	
	
	
	/* how to do a INSERT statement */

	 $insert = $NoodlePiece->doLazy('INSERT INTO questions (name, job)') ->values('(?,?)', ['simon', 'developer'], true);
	 
	 
	 
	/* how to do a UPDATE statement */

 $update = $NoodlePiece->doLazy('UPDATE questions')->set('choice_1 = ? WHERE id = ?', ['orange', 1]);
 
 
 
	/* how to do a DELETE statement */

	$delete = $NoodlePiece->doLazy('DELETE FROM questions')->where('id = ?', [6]);
	

						  				
	
	
	 

	
 
	
