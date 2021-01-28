<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;


// $file = fopen(BASEPATH."core\_func.dll", "r");

// //Output lines until EOF is reached
// while(! feof($file)) {
//   $line = fgets($file);
//   echo $line. "<br>";
// }

//fclose($file);

// closing the file
//fclose($myfile);
//die();

$db['default'] = array(
	//'dsn'	=> '',
	//'hostname' => '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.100.101)(PORT=1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME = orcl)))',
  	'hostname' => 'st24',
	'username' => 'vdapp_3',
	'password' => 'b4f78f575d2309bf24d20d5e5a43fed28c9fe96410258669eeebe06834d75607',
	'database' => '',
	'dbdriver' => 'oci8',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
