<?php
include "../base.php";
islogin();

$id = $_GET['id'];
$pw = $_GET['pw'];

if(preg_match('/floor|\.|union/i',$id)) die("No hack. XD");
if(preg_match('/floor|\.|union/i',$pw)) die("No hack. XD");

if(preg_match('/-|\||&|sleep|benchmark|pow/i',$id)) die("Filtered.");
if(preg_match('/-|\||&|sleep|benchmark|pow/i',$pw)) die("Filtered.");

$query = "SELECT user_id FROM 2st_floor WHERE user_id='{$id}' AND user_password='{$pw}'";
echo "ur query is : <strong>{$query}</strong><hr style='border-color:blue'>";


$res = mysqli_fetch_array(mysqli_query($db,$query)); // You can find a password with only using your two hands.
if($res['user_id']) 
    echo "<strong>Hello {$res['user_id']}</strong><hr style='border-color:blue'>";


$query = "SELECT * FROM 2st_floor WHERE user_id='admin'";
$res = mysqli_fetch_array(mysqli_query($db,$query));

if($res['user_id'] === "admin" && $res['user_password'] === $pw) solve("Phantom",8);

highlight_file(__FILE__);

?>
