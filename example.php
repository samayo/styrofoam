<?php 


  /*
   * Include the NoodlePiece class
   */
  require_once 'PdoNoodle.php';
	
	/*
	 * Create a new NoodlePiece instance and do parameterized queries
	 */
	$db = new PdoNoodle('mysql:dbname=test', 'root', '',
                     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	/*
	 * How to do a SELECT statement with
	 */
	$select = $db->noodle("SELECT * FROM users WHERE name = ?", array('jimmy'));
	
	/*
	 * How to do an INSERT statement
	 */
	$insert = $db->noodle("INSERT INTO employees (name, job) VALUES (?,?)", array('simon', 'developer'));
	
	/*
	 * How to do a UPDATE statement
	 */
	$update = $db->noodle("UPDATE car_type SET jaguar = ? WHERE id = ?", array('ferrari', 1));
	
	/*
	 * How to do a DELETE statement
	 */
	$delete = $db->noodle("DELETE FROM clients WHERE id = ?", array('371'));
	
	

	/**
     *
     * Simple query, without parameters
     *
     */

    $run = $db->noodle("SELECT * FROM students");



				  				
	
	
	
