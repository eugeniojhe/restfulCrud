<?php
	session_start();
	require 'config.php';

	 spl_autoload_register(function($class){
     if(file_exists('app/controllers/'.$class.'.php')) {
            require_once 'app/controllers/'.$class.'.php';
     } elseif(file_exists('app/models/'.$class.'.php')){
         require_once('app/models/'.$class.'.php');
     } elseif(file_exists('lib/models/'.$class.'.php')) {
             require_once 'lib/models/'.$class.'.php';
     } elseif(file_exists('lib/core/'.$class.'.php')) {
             require_once 'lib/core/'.$class.'.php';
     }
  
 });
$core = new Core();
$core->run();
?>