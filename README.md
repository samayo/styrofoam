# Leaper
=============

##### A tiny PDO Wrapper class.

##### EXAMPLE: 
```` php
// require the class
require 'leaper.php'

// pass the same type of data to `Leaper()`, as you would to the `PDO()` object. 
$db = new Leaper('mysql:host=localhost; dbname=***;  charset=utf8', 'root', 'test', 
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
);
````

Once you include & initialize the class, start simple CRUD statments like; 

```` php
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
````
In the abive example, `$select` will return the data, while `$insert` returns the `lastInsertId()`,
and both `$delete`, `$update` boolean values based on success/failure of the request.

===========
#### License  
[Luke 3:11](http://www.kingjamesbibleonline.org/Luke-3-11/) ( Free; No license! )

![FORK](http://i.imm.io/1m2WW.png)
