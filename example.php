<?php 


  /*
   * Include the PdoWrapper class
   */
  require_once 'PdoWrapper.php';
	
	/*
	 * Create a new PdoWrapper instance and do parameterized queries
	 */
	$db = new PdoWrapper('mysql:dbname=test', 'root', '',
                     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	/*
	 * How to do a SELECT statement with
	 */
	$select = $db->soSimple("SELECT * FROM users WHERE name = ?", array('jimmy'));
	
	/*
	 * How to do an INSERT statement
	 */
	$insert = $db->soSimple("INSERT INTO employees (name, job) VALUES (?,?)", array('simon', 'developer'));
	
	/*
	 * How to do a UPDATE statement
	 */
	$update = $db->soSimple("UPDATE car_type SET jaguar = ? WHERE id = ?", array('ferrari', 1));
	
	/*
	 * How to do a DELETE statement
	 */
	$delete = $db->soSimple("DELETE FROM clients WHERE id = ?", array('371'));
	
	

	/**
     *
     * Simple query, without parameters
     *
     */

    $run = $db->soSimple("SELECT * FROM students");



				  				
	
	
	
