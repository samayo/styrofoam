## Styrofoam

A tiny PDO wrapper class, for simple CRUD operation. 


Install 
-----
Using composer
````bash
$ composer require samayo/styrofoam:2.0.*
````
Using git
```bash
$ git clone https://github.com/samayo/styrofoam.git
```

Usage
-----

```php
require 'path/to/styrofoam.php';

use Styrofoam\Database as Db; 

$db = new Db(
  'mysql:host=localhost; dbname=db-name;  charset=utf8', 'db-user', 'db-pass', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
  ]);
```

Examples
-----
 
#### SELECT
returns result in `$select` as array format
```php
$select = $db->select('SELECT * FROM users WHERE id = ?', [145]);
```
#### INSERT
returns `$insert` with the value of `lastInsertId()` on success
```php
$insert = $db->insert('INSERT INTO users (lastname) VALUES (?)', ['robin']);
```
#### DELETE
returns `$delete` with boolean value on success
```php
$delete = $db->delete('DELETE FROM users WHERE id = ?', [456]);
```
#### UPDATE
returns `$update` with boolean value on success
```php
$update = $db->update('UPDATE cars SET color = ? WHERE model = ?', ['blue', 'Toyota']);
```

#### License  
 MIT
