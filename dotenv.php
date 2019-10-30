<?php
/**
 * dotEnv helper function
 * 
 * @version 1.0
 * @author Juan Caser <caserjan@gmail.com>
 * 
 * https://github.com/juancaser/nade
 * 
 * This helper adds functionality to load environment environment variables
 * either from .evn or set from apache
 */

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
		if(file_exists(__DIR__.'/'.$env_file) && function_exists('parse_ini_file')){
			if(function_exists('parse_ini_file')){
				$variables = parse_ini_file(__DIR__.'/'.$env_file);        
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