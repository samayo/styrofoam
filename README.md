## Styrofoam

A tiny PDO wrapper class, for simple CRUD operation. 

Install 
-----
Using composer
````bash
$ composer require samayo/styrofoam:1.0.*
````
Using git
```bash
$ git clone https://github.com/samayo/styrofoam.git
```

Usage
-----

```php
require 'path/to/styrofoam.php';

$db = new Styrofoam\Database(
  'mysql:host=localhost; dbname=db-name;  charset=utf8', 'db-user', 'db-pass', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
]);
```

Examples
-----
 
#### SELECT
```php
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);
```
#### INSERT
```php
// returns value lastInsertId() on success
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);
```
#### DELETE
```php
// returns $delete as boolean
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);
```
#### UPDATE
```php
// returns $update as boolean
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
```