<?php 


  /*
   * This demonstrates how to do a simple and basic CRUD with NoodlePiece
   * First connect to your database
   */
  $db = new PDO('mysql:host=localhost; dbname=test', 'root', '');  // This is just an example
	
  /*
   * Include the NoodlePiece class
   */
  require_once 'NoodlePiece.php';
	
	/*
	 * Create a new NoodlePiece instance
	 */
	$NoodlePiece = new NoodlePiece($db);
	
	/*
	 * How to do a SELECT statement
	 */
	$select = $NoodlePiece->doLazy('SELECT * FROM users')->where('name = ?', ['jimmy']);
	
	/*
	 * How to do a INSERT statement | 3rd parameter = 'true' returnes lastInsertId()
	 */
	$insert = $NoodlePiece->doLazy('INSERT INTO employees (name, job)') ->values('(?,?)', ['simon', 'developer'], true);
	
	/*
	 * How to do a UPDATE statement
	 */
	$update = $NoodlePiece->doLazy('UPDATE car_type')->set('jaguar = ? WHERE id = ?', ['ferrari', 1]);
	
	/*
	 * How to do a DELETE statement
	 */
	$delete = $NoodlePiece->doLazy('DELETE FROM vegetables')->where('id = ?', [16]);
	
	
				  				
	
	
	
