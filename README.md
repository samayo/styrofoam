## STYROFOAM
A small PDO Wrapper class, trying to evolve to a small ORM. 


Install 
-----
Using git
```bash
$ git clone https://github.com/samayo/styrofoam.git
```
Using composer
````bash
$ php composer.phar require samayo/styrofoam:2.0.*
````


Usage
-----

```php
require 'path/to/styrofoam.php'

$db = new Styrofoam\Database(
    'mysql:host=localhost; dbname=***;  charset=utf8', 'xx', 'xx', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]);
```
#### CRUD
```php 
// returns result in array
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);
// returns lastInsertId() on success
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);
// returns bool
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);
// returns bool
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
````

#### License  
 MIT
