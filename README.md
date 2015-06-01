## STYROFOAM

A small PDO Wrapper class, trying to evolve to a small ORM. 

### Usage

```` php
require 'path/to/styrofoam.php'

/**
 * Styrofoam accepts the PDO parameters
 */
$db = new Styrofoam\Database(
    'mysql:host=localhost; dbname=***;  charset=utf8', 'xx', 'xx', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]);


 /**
  * @return array - the select content
  */
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);

 /**
  * @var int|bool - the lastInsertId(); 
  */
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);

 /**
  * @var bool - success status
  */
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);

 /**
  * @var bool = success status
  */
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
````

#### License  
 MIT
