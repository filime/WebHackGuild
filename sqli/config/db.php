<?php
	$host = 'mysss'; 
	$user = 'root';
	$password = 'qwer1234!';
	$database = 'tower';

	$db = new mysqli($host, $user, $password, $database);
	if($db -> connect_error){
		echo 'connection failed' . $db -> connect_error;
	}

	$g_host = 'mysss'; 
	$g_user = 'root';
	$g_password = 'qwer1234!';
	$g_database = 'guild';

    $g_db = new mysqli($g_host, $g_user, $g_password, $g_database);
	if($g_db -> connect_error){
		echo 'connection failed' . $db -> connect_error;
	}

	$u_host = 'mysss'; 
	$u_user = 'root';
	$u_password = 'qwer1234!';
	$u_database = 'prison';

	$u_db = new mysqli($u_host, $u_user, $u_password, $u_database);
	if($u_db -> connect_error){
		echo 'connection failed' . $db -> connect_error;
	}
?>