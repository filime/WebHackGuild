<?php
include "../base.php";
islogin();

$id = $_GET['id'];
$pw = $_GET['pw'];

if(preg_match('/_|\.|union/i',$id)) die("No hack. XD");
if(preg_match('/_|\.|union/i',$pw)) die("No hack. XD");

if(preg_match('/_|\.|=|#|and|or/i',$id)) die("Filtered.");
if(preg_match('/_|\.|=|#|and|or/i',$pw)) die("Filtered.");

$query = "SELECT user_id FROM 1st_floor WHERE user_id='{$id}' AND user_password='{$pw}'";
echo "ur query is : <strong>{$query}</strong><hr style='border-color:blue'>";


$res = mysqli_fetch_array(mysqli_query($db,$query));
if($res['user_id'] == "admin") solve("ghost_twins",2);

highlight_file(__FILE__);

?>