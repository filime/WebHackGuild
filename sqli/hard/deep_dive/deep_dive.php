<?php
include __DIR__."/../../base.php";

$page = isset($_GET["page"]) ? $_GET["page"] : "source";

if(preg_match("/(file|test|debug|xss|sqli|flag)$/i",$page)){

	echo "filtered";
	exit;
}
$page = trim($page);

if($page == "source")
	highlight_file(__FILE__);
else if($page == "info")
	phpinfo();
else if($page === "flag")
	solve("deep_dive", 25);
else
	echo "FLAG";


