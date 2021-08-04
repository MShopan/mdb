
# documentaion links

[models](README_MODELS.md)

# require boot

for require boot file you will use must require `bootstarp.php` file who located in `_boot` folder 

```php
// require this file in the start of php file to allow you to use the framwork classes 
require('_boot/bootstrap.php');
```

# mhtml class 

user mhtml static functions to do html code with php encapsulation 

```php

mhtml::dump($var); // to dump any array or var 

mhtml::h1($text);  
mhtml::h1('hello world'); // output : <h1>hello wold </h1>
// you allso can use h2 : h6


mhtml::startTable(); // output : <table>
mhtml::startTable('class1'); // output : <table class='class1'>
mhtml::endTable(); // output : </table>

mhtml::startTr(); // output : <tr>
mhtml::endTr(); // output : </tr>

mhtml::th('age'); // output : <th>name</th> 
mhtml::td(25); // output : <td>25</td>

mhtml::startForm(); // output : <form >
mhtml::startForm($formName , $action = $_SERVER['PHP_SELF'] , $method = 'post'  ); // defult action is php self and defulat method is post 

mhtml::endForm(); // output : </table>

mhtml::print_r_table($array) // for print array in table view

```

# mdb query builder

this simple class to use query builder class to bulild sql query and run it
in the pure php enviroment
the project run in php 5 and above



## select

### where

### orWhere

### andWhere

## insert

## delete

## update

## truncate

## drop



# config.php

*important* to set main_root in config array and write the same manually in_boot/config_cls.php in the class static property $main_root

> this means main_root set in the 2 php files 

```php
// config.php
  return $config = array(
       'appName' => 'accounting' ,
       'root_url' => 'http://127.0.0.1/test' ,
       'main_root'=> 'C:\\AppServ\\www\\test\\',
       ...

```

```php
// _boot/config_cls.php
class config{

    static $main_root = 'C:\AppServ\www\test';

```

# Task list

* [x]query builder
* [ ]elequent
* [ ]permissions
* [ ]manage login

# resources

[php documentation](https://www.php.net/docs.php
"php documentation")


![php logo](https://www.php.net/images/logos/php-logo.svg)
