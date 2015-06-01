## STYROFOAM

A small PDO Wrapper class, trying to evolve to a small ORM. 

### Usage

```` php
require 'path/to/styrofoam.php'

// pass the same type info as to the `PDO()` object. 
$db = new Database\Styrofoam('mysql:host=localhost; dbname=***;  charset=utf8', 'xx', 'xx', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
	]);

## Now, simply start cruding .. 

// returns the select content
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);

// returns value of lastInsertId(); 
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);

// returns bool
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);

// return bool
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
````

#### License  
 MIT
