<?php
include "../base.php";
require("../config/tables.php");
islogin();

$id = $_GET['id'];
$pw = $_GET['pw'];


if(preg_match('/-|\||&|sleep|benchmark|pow|\.|floor/i',$id)) die("Filtered.");
if(preg_match('/-|\||&|sleep|benchmark|pow|\/|floor/i',$pw)) die("Filtered.");

$query = "SELECT * FROM 1st_floor WHERE user_id='{$id}' AND user_password='{$pw}'";
echo "ur query is : <strong>{$query}</strong><hr style='border-color:blue'>";

$res = mysqli_query($u_db,$query);

echo "Hello ";
while($row = mysqli_fetch_array($res)){
    echo " ".$row['user_id'];
}


if($id === "admin" && $pw === $dirt_golem_flag) solve("dirt_golem",10); // $pw = piece 1 + piece 2


highlight_file(__FILE__);

?>
