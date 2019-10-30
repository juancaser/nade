# `Not` Another dotEnv function helper

There a lot of ways to do this but this snippet i use for most of my projects, i tend to keep it simple and avoid complicated implementation.

```php
 env($variable, $default = null, $env_file = '.env')
```



| Variable    | Type   | Description                                                  |
| ----------- | ------ | ------------------------------------------------------------ |
| *$variable* | String | Key of your variable                                         |
| *$default*  | String | The default variable                                         |
| *$env_file* | String | Path to .env file. Default is loaded the same path the dotenv.php file is located |

## How to setup

1) Create `.env` file and add your variable in there 
2) Include `dotenv.php` and make sure it is loaded first, this function uses built-in php function `parse_ini_file` and `getenv`
2) Thats it

### .env file

```ini
DB_NAME=<database_name>
DB_USER=<database_user>
DB_PASSWORD=<database_password>
DB_HOST=<database_host>
```

### How to use

```php
<?php
include('dotenv.php');

define('DB_NAME', env('DB_NAME','<defaul_database_name>'));
define('DB_USER', env('DB_USER','<defaul_database_user>'));
define('DB_PASSWORD', env('DB_PASSWORD','<defaul_database_password>'));
define('DB_HOST', env('DB_HOS','T<defaul_database_host>'));
?>
```

