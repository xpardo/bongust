<?php
session_start();

    $error=FALSE;
    $errormsg="";

    require_once('../Bon_gust/login/vendor/autoload.php');

    require_once('../Bon_gust/login/App/Auth/Auth.php');

    include("../Bon_gust/login/funcions.php"); 

    include('../Bon_gust/login/contrologin.php'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-type"/>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="css/contact.css" /> 

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/contact.js"></script>

    <title>Bon Gust</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    
<!----------------------------------------------------Principi-------------------------------------------------------->
    
   
<header>

<!---logo--->

        <nav class="navbar navbar-expand-lg navbar-light m-2" style="background-color: #98E46C;">
            <div class="col-12 col-md-3">
            
                    <a class="navbar-brand" href="#"><img src="img/logo/bon_gust.png" width="80" height="80" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
        
            </div>
    <!--Menu-->
            <div class="lletres">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="home.php"><i class="fas fa-home">Home</i></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="productes.php"  aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-archive">Productes</i></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cafe.php"><i class="fas fa-coffee">Café </i></a>
                                <a class="dropdown-item" href="xoco.php"><i class="fas fa-coffee">Xocolata </i></a>
                                <a class="dropdown-item" href="te.php"><i class="fas fa-coffee">Té </i></a>
                                <a class="dropdown-item" href="accesoris.php"><i class="fas fa-blender">Accesoris</i></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacte.php"><i class="fas fa-address-book">Contacte</i></a>
                        </li>
                        <li class="nav-item active col-12 col-md-2">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-basket">Cistell</i></a>
                        </li>
             
                    
                        <li class="nav-item active">
                            <a class="nav-link" href="../Bon_gust/login/login.php"><i class="fas fa-sign-in-alt">loguejar-se</i></a>
                        </li>

                            <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle"  id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user">usuari
                                </a></i>
                                <?php if (Auth::isLogin()): ?>
                                <h2><?php echo $_SESSION['login']['nom'] ?></h2>
                                <a href="logout.php">Tancar Sesio</a>
                                <?php else: ?>
                                <?php
                                Auth::getUserAuth();
                                endif; 
                                ?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="home.php">Tancar Sesio</a>
                                    <a class="dropdown-item"  href="alta.php?emailc=<?=$_SESSION["login"]?>">Edita les teves dades</a>
                                </div>
                            </li>

                           
                        
                    </ul>
                     <!--buto de busqueda--->
                   
                     <ul class="nav-item m-2">
                                
                        <div class="buscar">
                            <form method="post" action="busc.php" role="search" >

                                <label class="sr-only" id="inlineFormInput"></label>
                                <i class="fas fa-search"></i>
                                <input required name="PalabraClave" type="text"  placeholder="paraula clau" >
                                
                                <input name="buscar" type="hidden" class="form-control mb-2"  value="paraula clau">
                                
                                <button type="submit" class="btn btn-primary"  onclick=(busc.php) >Buscar</button >
                                
                                
                            </form>
                        </div>
                    </ul>
                    
                </div>
            </div>
            </div>
            </button>       
    
        </nav>
 </header>

<!---------------------------------------------------------------->
<!--Formulari de contacte-->

<div class="container-fluid m-2">
    <div class="row">
        <div class="po">
            <a href="home.php">Incici</a>
            <a href="contacte.php">/contacte</a>
        </div>
        <section class="form_wrap">

            <section class="contact_info " aria-hidden="true">
                <section class="info_title">
                    <span class="fas fa-user-circle"></span>
                    <h2 class="d-block">INFORMACIÓ <br> DE CONTACTE</h2>
                </section>
                <section class="info_items">
                    <!--la informacio es fictisia-->
                    <p><span class="fas fa-envelope"></span>nonoryum@gmail.com</p>
                </section>
            </section>

            <div class="form-group">
                <form action="./php/enviar.php" method="post" class="form_contact">
                    <h2 class="d-block">Envia un <br>missatge</h2>
                    <div class="user_info">

                        <label class="d-block" id="name">Nom *</label>
                        <input class="d-block" type="text" id="names" name="nom" required>

                        <label class="d-block" for="phone">Telèfon/Mòbil</label>
                        <input class="d-block" type="text" id="phone" name="telefon">

                        <label class="d-block" for="email">Email*</label>
                        <input class="d-block" type="text" id="email" name="email" required>

                        <label class="d-block" for="missatge">Missatge*</label>
                        <textarea class="d-block" aria-multiline="true" id="missatge" name="missatge" required></textarea>

                        
                        <input  class="d-block" type="submit" value="Enviar Mensaje" id="btnSend">

                    </div>
                </form>
            </div>

        </section>

    </div>
</div>
  




<!--Peu de pagina-->   
<footer>
        <nav class="navbar navbar-expand-lg navbar-light m-2" style="background-color: #98E46C;">
            <div class="col-12 col-md-4">
                <section class="col-10 ">
                <a class="navbar-brand" href="#"><img src="img/logo/bon_gust.png" width="80" height="80" alt=""></a><br>
                    <a><strong>BON GUST:</strong>Ens dediquem a la venda de cafè , te  i xocolates, a més d'altres articles i complements.</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </section>
            </div>
        
    <!--Menu-->
            <div class="lletres">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="home.php"><i class="fas fa-home">Home</i></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="productess.php"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-archive">productes </i></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cafe.php"> <i class="fas fa-coffee">Café</i><a>
                                <a class="dropdown-item" href="xoco.php"> <i class="fas fa-coffee">Xocolata</i></a>
                                <a class="dropdown-item" href="te.php"> <i class="fad fas fa-coffee">Te</i></a>
                                <a class="dropdown-item" href="accesoris.php"> <i class="fas fa-blender">Accesoris</i></a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contacte.php"><i class="fas fa-address-book">Contacte</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="politica_botigues.php"><i class="fas fa-id-card">Política de botiga</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="politica_enviar.php"><i class="fas fa-id-card">Política d'enviaments</i></a>
                        </li>
                        
                    </ul>
                    
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="mov">
                        <a>Mètode de pagament: </a>
                    </li>
                    <li class="nav-item col-sm">
                        <img  src="img/metode_pagament/metodos-pago.png" class="d-block img-fluid" width="150" height="150" alt="tipos de pagament">
                    </li>
                </ul>
            
            </div>
            
            </button>
            
        </nav>
    
    </footer>


    </body>

</html>