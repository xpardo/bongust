<?php

require_once('vendor/autoload.php');
require_once('App/Auth/Auth.php');
include("funcions.php");

session_start();
$error=FALSE;
$errormsg="";

if(isset($_COOKIE["email"])){


  if(validaUsuari($_COOKIE["email"],$_COOKIE["password"])){



    $_SESSION["login"]=$_COOKIE["email"];
    header('location:../home.php');

  }else{

    setcookie('email', null, 0,'/'); 
    setcookie('password', null, 0,'/'); 

  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'&&!isset($_REQUEST["busca"])) {

  $pass=test_input($_REQUEST["password"]);


  $email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error=TRUE;
      $errormsg.= "Invalid email format";
  }

  $password = test_input($_POST["password"]);
  if (!preg_match("/^[a-zA-Z0-9' ]*$/",$password)) {
      $error=TRUE;
      $errormsg.=  "Only letters and numbers allowed";
  }


  if(!$error){


    if(validaUsuari($_REQUEST["email"],md5($_REQUEST["password"]))){

      echo "Ok de autenticación";
      $_SESSION["login"]=$_REQUEST["email"];

      if(isset($_REQUEST["recorda"])){
          setcookie('email', $_REQUEST["email"], time() + 365*24*60*60,'/'); 
          setcookie('password', md5($_REQUEST["password"]), time() + 365*24*60*60,'/'); 
      }

      header('location:../home.php');


    }else{

        echo "Error de autenticación";
        setcookie('contador', null, 0); 
    }

  }

}



 ?>

 <!DOCTYPE html>
 <html lang="ca">
   <head>
     <meta charset="utf-8">
     <title>Bon Gust</title>
     <script>
        function check(){
            if(!document.forms[0].email.value.length>0){
                alert("has d'intruduir un email");
            }else{


                location.href="recoverypassword.php?email="+document.forms[0].email.value;
            }

        }

    </script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
     <link rel="stylesheet" href="assets/css/bootstrap.css">
     <link rel="stylesheet" href="assets/css/font-awesome.css">
     <link rel="stylesheet" href="assets/css/bootstrap-social.css">
     <script src="assets/js/jquery.js" ></script>
     <link rel="stylesheet" href="css/estilos.css">

   </head>
   <body>

     <div class="container">
       <div class="row">

        <?php if (Auth::isLogin()): ?>
          <h2>Hola <?php echo $_SESSION['nom']['nom'] ?></h2>
          <a href="logout.php">Cerrar Sesion</a>
        <?php else: ?>
          <?php
            Auth::getUserAuth();
           ?>
          
          <div class="container-all">

            <div class="ctn-form">
     
              <div class="login">
                <img src="logo/bon_gust.png" alt="" class="logo">
                <form method="post">

                <h1>LOGIN</h1>

                  <label id="email">Email</label>
                  <input type="text" name="email">
                  <label id="contraseña">Contrasenya</label>
                  <input type="password" name="password">
                  <input type="submit" value="Iniciar">
                
                </form>
              
                  <span class="text-footer">¿Encara no t'has registrat?
                  <a href="register.php">Registrat</a>
                  </span>
                  <span class="text-footer">Tornar a la pantalla d'inici
                    <a href="../home.php">inici</a>
                  </span>
                  
                <a href="?login=Facebook" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span> Inicia sesion amb Facebook</a>
                <a href="?login=Google" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span> Inicia sesion amb Google</a>
              </div>
          </div>
        <?php endif; ?>

       </div>
     </div>
     </div>

   </body>
 </html>