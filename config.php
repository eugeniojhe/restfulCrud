<?php
require 'environment.php';

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'db_todorest';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	$config['dbname'] = 'db_todorest';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}
?>