<?php
include "../base.php";

islogin();

$id = $_GET['id'];
$pw = $_GET['pw'];


if(preg_match('/floor|\.|union/i',$id)) die("No hack. XD");
if(preg_match('/floor|\.|union/i',$pw)) die("No hack. XD");

$id = addslashes($id);
$pw = md5($pw,true);

$query = "SELECT user_id FROM 1st_floor WHERE user_id='{$id}' AND user_password='{$pw}'";
echo "ur query is : <strong>{$query}</strong><hr style='border-color:blue'>";


$res = mysqli_fetch_array(mysqli_query($db,$query));
if($res['user_id']) solve("floor_keeper",20);


highlight_file(__FILE__);

?>
