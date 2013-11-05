<?php


	require_once 'PdoWrapper.php';

	
	 // Create a new PdoWrapper instance and do parameterized queries
   	$db = new PdoWrapper('mysql:host=localhost; dbname=habeshaCity', 'root', '',
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	
	
	
	 // How to perform simple CRUD statements. 
	$select = $db->simple("SELECT * FROM girls WHERE name = ?", array('Megan Fox'));

	$insert = $db->simple("INSERT INTO employees (name, job) VALUES (?,?)", array('simon', 'sarcasm'));

	$update = $db->simple("UPDATE season SET winter = ? WHERE id = ?", array('summer', 1));

	$delete = $db->simple("DELETE FROM clients WHERE id = ?", array('666'));
	
	//same goes for simple queries, without parameters 
	$select = $db->simple("SELECT * FROM foo"); 
	


















