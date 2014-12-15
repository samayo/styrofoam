# Leaper

##### A tiny PDO Wrapper class.

##### EXAMPLE: 
```` php
// require the class
require 'src/leaper.php'

// pass the same type of data to `Leaper()`, as you would to the `PDO()` object. 
$db = new Leaper('mysql:host=localhost; dbname=***;  charset=utf8', 'root', 'test',  [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
		]);
````
Once you create the object, simple CRUD statements could not get easier. 
```` php
// select * from users where id = '145'
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);

// insert into users (lastname) values ('robin')
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);

// delete from users where id = '456'
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);

// update cars set color 'blue' where model = 'Toyota'
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
````
In the above example, 
 - `$select` will return the result data
 - `$insert` returns the `lastInsertId()`,
 - `$delete`, `$update` return boolean values based on status of the query.

===========
#### License  
[Luke 3:11](http://www.kingjamesbibleonline.org/Luke-3-11/) ( Free; No license! )
