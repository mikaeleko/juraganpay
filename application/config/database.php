<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	//'hostname' => '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.100.101)(PORT=1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME = orcl)))',
  // 'hostname' => '100.10.10.2',
	'hostname' => 'st24Reborn',
	'username' => 'Admin123',
	'password' => '$2y$12$RIhisbVgANruN4Wp.iJPWO1tj42ZRnhXH8sNa3lcYsKS2BvoPtW4i',
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
