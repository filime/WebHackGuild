<?php
include __DIR__."/../../base.php";
include "flag.php";
highlight_file(__FILE__);
include "BF_protector.php"; // 5max attempt, 2minute wait haha
if($_GET['x'] === $flag)
	solve("guessing",28);
/*
 *  echo "FLAG{**REDACTED**}" > $(cat /dev/urandom | tr -dc '0-9' | head -c 4)
 */
$url = "file://".__DIR__."/hi.txt";


if(
	array_key_exists('x', $_GET) &&
	strpos($_GET['x'],'\\') === false &&
	strpos($_GET['x'],'/') === false &&
	strpos($_GET['x'],'php') === false &&
	strpos($_GET['x'],'http') === false &&
	strpos($_GET['x'],'flag') === false &&
	strpos($_GET['x'],'.') === false && strlen($_GET['x']) < 17
){
	$url = "file://".__DIR__."/".$_GET['x'];
}
system('curl '.escapeshellarg($url));

