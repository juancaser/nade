<?php
/**
 * dotEnv helper function
 * 
 * @version 1.0
 * @author Juan Caser <caserjan@gmail.com>
 * 
 * https://github.com/juancaser/nade
 * 
 * This helper adds functionality to load environment variables
 * either from .env or set from server
 */

/**
 * Just incase you put your .env file on different path
 * this will allow you to load it anywhere inside the document
 * directory
 */
if(!defined('ABSPATH')) define('ABSPATH', __DIR__);

if(!function_exists('env')){
	/**
	 * Load environment variable
	 * 
	 * @version 1.0
	 * 
	 * @param string $variable Key of your variable
	 * @param string $default The default variable
	 * @param string $env_file .env file
	 * @return string
	 */
	function env($variable, $default = null, $env_file = '.env'){
		/**
		 * Priority of loading the variable
		 * 1 = .env
		 * 2 = Server
		 */

		$abspath = trim(ABSPATH,'/');
		$abspath = trim($abspath,DIRECTORY_SEPARATOR);
		$env_file  = $abspath.DIRECTORY_SEPARATOR.$env_file;

		if(file_exists($env_file) && function_exists('parse_ini_file')){
			if(function_exists('parse_ini_file')){
				$variables = parse_ini_file($env_file);        
				if(isset($variables[$variable])) $default = $variables[$variable];
			}
		}else{
			if(function_exists('getenv')){
				$val = getenv($variable);
				if($val != false) $default = $val;			
			}
		}
		return $default;
	}
}