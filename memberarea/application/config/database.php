<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	//'hostname' => '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.100.101)(PORT=1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME = orcl)))',
  'hostname' => 'st24',
	'username' => 'vdapp_3',
	'password' => 'Thiss3cur3andvalid',
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
