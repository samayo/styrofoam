<?php


	require_once 'PdoWrapper.php';

	// Create a new PdoWrapper instance and do parameterized queries
	$db = new PdoWrapper('mysql:host=localhost; dbname=mydb', 'root', 'pass', 
		array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
	);



	//How to perform simple CRUD statements.
	$select = $db->wrap("SELECT * FROM girls WHERE name = ?", array('Megan Fox'), $error);

	$insert = $db->wrap("INSERT INTO employees (name, job) VALUES (?,?)", array('simon', 'sarcasm'), $error);

	$update = $db->wrap("UPDATE relationship SET taken = ? WHERE money = ?", array('single', 'flowing'), $error);

	$delete = $db->wrap("DELETE FROM clients WHERE id = ?", array('666'), $error);

	//same goes for simple queries, without parameters
	$select = $db->wrap("SELECT * FROM emails", $error);


	//later you will be able to check for errors on the fly, instead of using try/catch blocks
	if(!$error){
		// move to the next levl
	}else{
		echo 'ERROR FOUND: '.$error;
	}


















