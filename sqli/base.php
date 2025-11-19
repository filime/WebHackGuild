<?php
ini_set("display_errors",0);
require(__DIR__."/config/db.php");

if(session_id() == ''){ session_start();}

function islogin(){

    if(!$_SESSION['islogin']){
        echo "<script>alert('Login First');location.href='/login.php'</script>";
        exit;
    }
    
}



function login_process($id,$pw){
    
    require(__DIR__."/config/db.php");
    
    $stmt = $g_db->prepare("SELECT * FROM player where user_id=? and user_password=?");
    $stmt->bind_param("ss",$id,hash("sha256",$pw));
    $stmt->execute();

    $res = $stmt->get_result();
    $r = mysqli_fetch_array($res);

    if(isset($r))
        return 1;
    else
        return 0;
}

function get_exp(){
    require(__DIR__."/config/db.php");

    $stmt = $g_db->prepare("SELECT EXP FROM player where user_id=?");
    $stmt->bind_param("s",$_SESSION["islogin"],);
    $stmt->execute();

    $res = $stmt->get_result();
    $r = mysqli_fetch_array($res);

    return $r['EXP'];
}

function solve($name,$point){

    require(__DIR__."/config/db.php");

    $stmt = $g_db->prepare("SELECT * FROM player where user_id=?");
    $stmt->bind_param("s",$_SESSION['islogin']);
    $stmt->execute();

    $res = $stmt->get_result();
    $r = mysqli_fetch_array($res);

    $sol_str = $r['solves'] == NULL ? "" : $r['solves'];

    $p = $r['EXP'];
    $p = $p+$point;

    if(strpos($sol_str,$name) === false){

        $sol_str = $sol_str.$name;
 

        $stmt = $g_db->prepare("UPDATE player SET solves=?,EXP=? WHERE user_id=?");
        $stmt->bind_param("sis",$sol_str,$p,$_SESSION['islogin']);
        $stmt->execute();

        $g_db = new mysqli($host, $user, $password, $database);
        if($g_db -> connect_error){
            echo 'connection failed' . $db -> connect_error;
            return 1;
        }
        

    }

    echo "<hr style='border-color:blue'><strong>{$name} SOLVED!</strong><hr style='border-color:blue'>";
    
    return 0;
}

function issolved($name){

    require(__DIR__."/config/db.php");
    $stmt = $g_db->prepare("SELECT * FROM player where user_id=?");
    $stmt->bind_param("s",$_SESSION["islogin"]);
    $stmt->execute();

    $res = $stmt->get_result();
    $r = mysqli_fetch_array($res);
    
    $sol_str = $r['solves'] == NULL ? "" : $r['solves'];

    if(strpos($sol_str,$name) !== false)
        return 1;
    else
        return 0;
}
?>
