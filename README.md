![Y U CODE LIKE THIS](http://i.imm.io/1hRAR.jpeg)
=============

###My Query
If you write a plain PDO script for simple CRUD statements, then you'll have to write at-least this much, to run a select statement.

```` php      
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
$db = new PDO('mysql:host=localhost; dbname=***;  charset=utf8', 'root', 'test', $options);

try{
	$stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
	$stmt->execute(array('145');
}catch(PDOException $e){
	echo $e->getMessage(); 
}
	return $stmt->fetchAll(); 
````
With [MyQuery](https://github.com/bivoc/MyQuery), it's a lot simpler, specially if you have multiple statements. 
```` php
require 'MyQuery.php'
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
$db = new MyQuery('mysql:host=localhost; dbname=***;  charset=utf8', 'root', 'test', $options);
````
As you can see, once you require & instanciate the class, doing simple CRUD statments could not be easier. 
```` php
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
````
One more convenient thing is that, `$select` would return the data, while `$insert` returns the `lastInsertId()`,
and both `$delete`, `$update` will return true/false based on whether an actual delete/update was performed. All of this, using a simple wrapper under 1kb.


===========
![FORK](http://i.imm.io/1m2WW.png)
