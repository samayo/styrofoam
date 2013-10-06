<?php 


  /*
   * This demonstrates how to do a simple and basic CRUD with NoodlePiece
   * First connect to your database
   */
  $db = new PDO('mysql:host=localhost; dbname=eritrean_lib', 'root', '');  // This is just an example
	
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
	$select = $NoodlePiece->doLazy('SELECT * FROM questions')->where('id = ?', [1]);
	
	/*
	 * How to do a INSERT statement
	 */
	$insert = $NoodlePiece->doLazy('INSERT INTO questions (name, job)') ->values('(?,?)', ['simon', 'developer'], true);
	
	/*
	 * How to do a UPDATE statement
	 */
	$update = $NoodlePiece->doLazy('UPDATE questions')->set('choice_1 = ? WHERE id = ?', ['orange', 1]);
	
	/*
	 * How to do a DELETE statement
	 */
	$delete = $NoodlePiece->doLazy('DELETE FROM questions')->where('id = ?', [6]);
	
	
				  				
	
	
	
