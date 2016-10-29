<?php 

$config = array(
    'backend'=> true,
    'modulos'=> false,
    'database' => array(
        'host' => 'localhost',
        'name' => 'poeta_social',
	//'user' => 'root',
	'user' => 'poeta',
	'password' => 'poeta',
	//'password' => '',
        'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock'
    ),
    'environment' => 1,
    //'urlLogin' => array('frontend' => array('layout'))
    
);


?>
