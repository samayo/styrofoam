<?php


	require_once 'src/PdoWrapper.php';

		// as usuall start by creating the wrapper
	$db = new PdoWrapper('mysql:host=localhost; dbname=mydb; charset=utf8', 'root', 'pass', 
			array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
	);



	$e = null; // this is to catch possible any occuring errors.

	//How to perform simple CRUD statements.
	$select = $db->wrap("SELECT * FROM girls WHERE name = ?", array('Megan Fox'), $e);

	$insert = $db->wrap("INSERT INTO employees (name, job) VALUES (?,?)", array('simon', 'sarcasm'), $e);

	$update = $db->wrap("UPDATE relationship SET taken = ? WHERE money = ?", array('single', 'flowing'), $e);

	$delete = $db->wrap("DELETE FROM clients WHERE id = ?", array('666'), $e);

	//same goes for simple queries, without parameters
	$select = $db->wrap("SELECT * FROM emails", $e);


	//later you will be able to check for errors on the fly, instead of using try/catch blocks
	if(!$e){
		// move to the next levl
	}else{
		echo 'ERROR FOUND: '.$e;
	}


















