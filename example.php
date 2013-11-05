<?php


  /*
   * Include the PdoWrapper class
   */
  require_once 'PdoNoddle.php';

	/*
	 * Create a new PdoWrapper instance and do parameterized queries
	 */
   	#$db = new PdoWrapper('mysql:dbname=seowrapper', 'root', '',
   //                  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	/*
	 * How to do a SELECT statement with
	 */
	#$select = $db->doSimple("SELECT * FROM users WHERE name = ?", array('jimmy'));

	/*
	 * How to do an INSERT statement
	 */
	#$insert = $db->doSimple("INSERT INTO employees (name, job) VALUES (?,?)", array('simon', 'developer'));

	/*
	 * How to do a UPDATE statement
	 */
	#$update = $db->doSimple("UPDATE car_type SET jaguar = ? WHERE id = ?", array('ferrari', 1));

	/*
	 * How to do a DELETE statement
	 */
	#$delete = $db->doSimple("DELETE FROM clients WHERE id = ?", array('371'));



	/**
     *
     * Simple query, without parameters
     *
     */

   # $run = $db->doSimple("SELECT * FROM people");



	/*
	 * How create an instance of PdoWrapper
	 */



$a = 'SELECT * FROM users WHERE foo = foo';

//var_dump(strpos('SELECT', $a) < 4);


$conn = new PdoWrapper('mysql:dbname=seoWrapper', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



$wrap = $conn->doSimple("SELECT * FROM pages ");


var_dump($wrap);







