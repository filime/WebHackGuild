<?php
include "./base.php";
$id = $_GET['id'];
$pw = $_GET['pw'];

if(login_process($id,$pw)){ // Input : A guild id, A guild pw.
    $_SESSION['islogin'] = $id;
    $_SESSION['EXP'] = get_exp();
    header("Location: /");
    exit;
}else{
    echo "<br><strong> WRONG ID OR PW </strong>";
}

?>
