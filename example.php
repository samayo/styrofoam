<?php 


  /*
   * This demonstrates how to do a simple and basic CRUD with NoodlePiece
   * First connect to your database
   */
  $db = new PDO('mysql:host=localhost; dbname=seoWrapper', 'root', '');  // This is just an example
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // important if you want to see your erros.
  
  /*
   * Include the NoodlePiece class
   */
  require_once 'PdoNoodle.php';
	
	/*
	 * Create a new NoodlePiece instance
	 */
	$NoodlePiece = new PdoNoodle($db);
	
	/*
	 * How to do a SELECT statement
	 */
	#$select = $NoodlePiece->doLazy('SELECT * FROM users')->where('name = ?', ['jimmy']);
	
	/*
	 * How to do a INSERT statement | 3rd parameter = 'true' returnes lastInsertId()
	 */
	#$insert = $NoodlePiece->doLazy('INSERT INTO employees (name, job)') ->values('(?,?)', ['simon', 'developer'], true);
	
	/*
	 * How to do a UPDATE statement
	 */
	#$update = $NoodlePiece->doLazy('UPDATE car_type')->set('jaguar = ? WHERE id = ?', ['ferrari', 1]);
	
	/*
	 * How to do a DELETE statement
	 */
	#$delete = $NoodlePiece->doLazy('DELETE FROM clients')->where('id = ?', array('371'));
	
	
	#$foo = $NoodlePiece->doLazy('SELECT * FROM pages')->where('title = ?', array('hello'));
	$foo = $NoodlePiece->doLazy('INSERT INTO pages (title, description, keywords)')->values('(?,?,?)', array('aaaa', 'bbbb', 'ccc'), false);
	var_dump($foo);
	
	
				  				
	
	
	
