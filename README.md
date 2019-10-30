# `Not` Another dotEnv function helper

There a lot of ways to do this but this snippet i use for most of my projects, i tend to keep it simple and avoid complicated implementation.

 `env($variable, $default = null, $env_file = '.env')`

| Variable    | Type   | Description                                                  |
| ----------- | ------ | ------------------------------------------------------------ |
| *$variable* | String | Key of your variable                                         |
| *$default*  | String | The default variable                                         |
| *$env_file* | String | Path to .env file. Default is loaded the same path the dotenv.php file is located |

## How to setup

1) Create `.env` file and add your variable in there 
2) Include `dotenv.php` and make sure it is loaded first, this function uses built-in php function `parse_ini_file` and `getenv`
2) Thats it