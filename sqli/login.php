<?php
include "./base.php";

 if(!isset($_POST['id']) && !isset($_POST['pw'])){
     echo "<strong>This place is veeeeeeeeeery dangerous. So, it's hard to even login.</strong><hr style='border-color:blue'>";
     highlight_file(__FILE__);
     exit;
 }

$id = $_POST['id'];
$pw = $_POST['pw'];
    
if(login_process($id,$pw)){ // Input : A guild id, A guild pw.
    $_SESSION['islogin'] = $id;
    $_SESSION['EXP'] = get_exp();
    header("Location: /");
    exit;
}else{
    echo "<br><strong> WRONG ID OR PW </strong>";
}

?>
