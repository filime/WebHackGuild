<?php

function login_process($id,$pw){
    $host = 'mysss'; 
	$user = 'root';
	$password = 'qwer1234!';
	$database = 'guild';

	$g_db = new mysqli($host, $user, $password, $database);
	if($g_db -> connect_error){
		echo 'connection failed' . $db -> connect_error;
	}

    $stmt = $g_db->prepare("SELECT * FROM player where user_id=? and user_password=?");
    $stmt->bind_param("ss",$id,hash("sha256",$pw));
    $stmt->execute();

    $res = $stmt->fetch_object();
    
}
?>