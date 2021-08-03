
[models](README_MODELS.MD)

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

# find() in model 

to find model by id use find function and use get() function to get the data like this

```php

// retirve data with user id 

$res = $users->find(2)->get();

```

not using get with return currently the instance of the object 

# hasMany 

has many will by function and property in the child model like this

```php

    public $hasMany = array(
        'permissions',
    );

    public function permissions(){
        return $this->hasMany('permissions');
    }

```

> to run the code and get relatinon data do this 

```php

$res = $mohammed->find(1)->permissions()->get();

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
