<?php


if (isset($_REQUEST["usuari"])){
    header("location:../Bon_gust/home.php");
}
if(isset($_GET["logout"])){

 
    session_abort();
    $_SESSION=null;
    setcookie("email",null,0,'/');
    setcookie("password",null,0,'/');
    session_destroy();
    
    


}



?>