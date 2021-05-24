<?php
session_start();
include("../Bon_gust/login/funcions.php");

$errors="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $errors.="email mal <br>";
    }

    if($_POST["pass1"]!=$_POST["pass2"]){
        $errors.="el password no coincideix <br>";

    }else if(!preg_match('/^[\w]+$/',$_POST["pass1"])){
        $error.="password no te format <br>";

    }

    if(empty($_POST["nom"] )){
        $error.="el nom es obligatori <br>";
    }
    

    if(isset($_POST["emailOriginal"])){
        if($_POST["emailOriginal"]!=$_POST["email"]){
            if(existeix($_POST["email"])){
                $error.="el emeil ja existeix <br>";
            }else{
                $dades=getUser($_SESSION["usuari"]);
                $noupassword;
                if($_POST["pass1"]!=$dades["password"]){
                    $noupassword=md5($_POST["pass1"]);
                }else{
                    $noupassword=$_POST["pass1"];
                }
                if(updateUser($_POST["email"],$_POST["emailOriginal"],$_POST["nom"],$noupassword)){
                    $errors.="<br> error al actualitzar el usuari";
                }else{
                    $_SESSION["usuari"]=$_POST["email"];
                    if(isAdmin($_SESSION["usuari"])){
                        header("location:llistaUsuari.php");
                    }else{
                        $_SESSION["usuari"]=$_POST["email"];
                        header("location:alta.php?u=l&edit=". $_SESSION["usuari"]);
                    }
                }
            }
        }else{
            //edició
            $dades=getUser($_SESSION["usuari"]);
            $noupassword;
            if($_POST["pass1"]!=$dades["password"]){
                $noupassword=md5($_POST["pass1"]);
            }else{
                $noupassword=$_POST["pass1"];
            }
            if(updateUser($_POST["email"],$_POST["emailOriginal"],$_POST["nom"],$noupassword)){
                $errors.="<br> error al actualitzar el usuari";
            }else{
                $_SESSION["usuari"]=$_POST["email"];
                if(isAdmin($_SESSION["usuari"])){
                    header("location:llistaUsuari.php");
                }else{
                    $_SESSION["usuari"]=$_POST["email"];
                    header("location:alta.php?u=l&edit=". $_SESSION["usuari"]);
                }
            }
        }

    }else{

        if(existeix($_POST["email"])){
            $error.="el emeil ja existeix <br>";

        }
    }

    if($errors==""&&!isset($_POST["emailOriginal"]) ){
       if(!afegir($_POST["email"],$_POST["nom"],$_POST["pass3"])){
            $error.="error en afeixir el usuari <br>";
       }else{

            $_SESSION["usuari"]=$_POST["email"];
            header("location:privada.php");
        
       }
    }
}


$dades["email"]="";
$dades["password"]="";
$dades["nom"]="";
$dades["accio"]="Afegir";


if(isset($_REQUEST["edit"])){

    if(!isAdmin($_SESSION["usuari"])&&$_SESSION["usuari"]!=$_REQUEST["edit"]){
        echo "error";
        die();
    }else{
       $dades=getUser($_REQUEST["edit"]);
       $dades["accio"]="Editar";
       $dades["emailOriginal"]=$_REQUEST["edit"];
    }
}


?>
<!DOCTYPE html>
<html log="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Inici Seccion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
     <link rel="stylesheet" href="assets/css/bootstrap.css">
     <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/estil.css" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/estil.css" />

    </head>
<body>
<div class="po">
                <a href="home.php">Incici</a>
                <a href="alta.php">/modificar</a>
            </div>
<div class="container">
       <div class="row">

            <?=$errors?>
            <?php
            if(isset($_REQUEST["u"])){
                echo "<br>l'actualitzacio a funcionat";
            }
            ?>

           
            <div class="container">

            <div class="row">
                <div class="ctn-form">
                            
                    <form method = "post" >
                        
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" value="<?=$dades["email"]?>"><br>
                        <label for="">Password</label>
                        <input id="pas1" type="password" name="pass1" value="<?=$dades["password"]?>"><br>
                        <label for="">Repetir Password</label>
                        <input id="pass2" type="password" name="pass2" value="<?=$dades["password"]?>"><br>
                        <label for="">nom</label>
                        <input type="text" name="nom" id="nom" value="<?=$dades["nom"]?>"><br>
                        <?php
                            if($dades["accio"]=="Editar"){

                                ?>
                                <input type="hidden" name="emailOriginal" value="<?= $dades["emailOriginal"]?>"><br>
                                <?php
                            }
                        
                        
                        ?>
                        <input type="submit" value="<?= $dades["accio"]?>"><br>
                
                    </form>
                </div>            
            </div>
        </div>
    </div>
</div>
    </body>
</html>