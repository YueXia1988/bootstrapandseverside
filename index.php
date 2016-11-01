<?php
  	
	date_default_timezone_set("Pacific/Auckland"); 

	error_reporting(E_ALL);

	// autoloading function for classes
	function my_autoloader($class){
		require "classes/". $class .".php";

	}


	spl_autoload_register('my_autoloader');

	session_start();


	require "vendor/autoload.php";


   require "routes.php";