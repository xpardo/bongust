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
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <link rel="stylesheet" type="text/css" href="css/estil.css"/>
 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  
    <title>Bon Gust</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    
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
                            <i class="fas fa-archive">Productes
                            </i></a>
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
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-basket">cistell</i></a>
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
                                <a href="logout.php">Cerrar Sesion</a>
                                <?php else: ?>
                                <?php
                                Auth::getUserAuth();
                                endif; 
                                ?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="home.php">Cerrar Sesion</a>
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
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------Primer carrousel-------------------------------------------------> 

        <section>
            <div class="container-fluid m-2">
                <div class="row">

                    <div  class="carousel slide carousel-fade" aria-hidden="true" data-ride="carousel" data-interval="1400">

                        <ul class="carousel-indicators nav nav-tabs nav-stacked">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ul>


                        <div class="carousel-inner" role="list">
                        

                            <div class="carousel-item active">
                                <img  src="img/carrousel/caro_uno/te-chocolate-cafe.jpeg" class="d-block img-fluid container-fluid" alt="te xocolata cafe">
                            </div>

                            <div class="carousel-item">
                                <img  src="img/carrousel/caro_uno/tip_xoco.jpeg" class="d-block img-fluid container-fluid"  alt="tip xoco">
                            </div>

                            <div class="carousel-item">
                                <img  src="img/carrousel/caro_uno/te.jpeg" class="d-block img-fluid container-fluid"  alt="te">
                            </div>

                            <div class="carousel-item">
                                <img  src="img/carrousel/caro_uno/cafe.jpeg" class="d-block img-fluid container-fluid" alt="cafe" >
                            </div>

                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls"  data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls"  data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                       
                    </div>
              
                </div>
            </div>
<!------------------------------------------------------------------------------------------------------------------------------>            

            <!--A qui en principi aniria alguns productes--->
        <div class="container-fluid m-3">
            <div class="row">
                    <div class="prodhom d-block">
                        
                                
                        <?php

                            //listar productes
                           
                            $conn = connectDB('localhost', 'xpardo', 'xpardo', 'xpardo_botigaonline');
                            $sql = "SELECT * from productes where nom like '% reutilitzable%' ";
                        
                            if (!$resultado = $conn->query($sql,)) {
                                die("error ejecutando la consulta:".$conn->error);
                            }

                            while($producto=$resultado->fetch_assoc()){

                                $conn2 = connectDB('localhost', 'xpardo', 'xpardo', 'xpardo_botigaonline');                                           
                                $sql2 = "SELECT * from Imatges,productes where productes_id= ".$producto["id"];

                                if (!$resultado2 = $conn2->query($sql2)) {
                                    die("error ejecutando la consulta:".$conn2->error);
                                }
                                $imagen=$resultado2->fetch_assoc();
                                echo "<form class='form-inline' method='post' aria-hidden='true' aria-expanded='false' action='./php/addtocart.php'>";
                                
                                echo "<p><strong>".$producto["nom"]. "</strong><br><br>";
                                    
                                echo "<img role='img' width=\"300\" height=\"300\" alt=\"cafe\" src=\"".$imagen["ruta"]."\"><br><br>";
                                echo "<strong> PREU: </strong>".$producto["preu"]."€ <br><br>";
                                echo "<strong> DESCRIPCIÓ: </strong> <br>"  .$producto["descripcio"]. "<br><br>";  
                                echo "<input type='hidden' name='product_id' value=".$producto["id"].">";
                            
                                echo "<input type='number' name='q' value='1' style='width:100px;' min='1' class='form-control' placeholder='Cantidad'>";
                        
                                echo "<button type='submit' class='btn btn-primary'>Afegir al cistell</button>";
                             echo"</p>";
                             
                            echo "</form>";
                            echo "<hr>";
                          
                                
                                $found = false;
                                if($found):
                                    echo "<a href='cart.php' class='btn btn-info'>Agregado</a>";
                                else:
                                    
                                endif;
        
                                if(isset($_SESSION["cart"])){ 
                                    foreach ($_SESSION["cart"] as $c) { 
                                        if($c["product_id"]==$resultado2){ 
                                            $found=true; 
                                            break; 
                                        }
                                    }
                                }
            
                            }        
		                ?>
                        
                    <img width="400" height="300" src="img/gif/Sans_titre_large.gif" alt="gif">
                </div>
            </div>
       
        </div>                 

<!------------------------------------------------------------------------------------------------------------------->
            <!--Segon carrousel, a qui van la frases de celebres--> 

            <div class="container-fluid m-2">

                <div class="row">
                    <div  class="carousel slide" aria-hidden="true" data-ride="carousel" data-interval="10000">

                        <ul class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ul>
                        <!------------------->
                        <div class="carousel-inner" role="list">
                            <div class="carousel-item active">
                                <img  src="img/carrousel/te-cafe-o-chocolate.jpeg" class="d-block img-fluid container-fluid"  alt="te cafe o xocolata">
                                <div class="carousel-caption">
                                    <div class="servic">
                                        <a><strong>La beguda divina i la xocolata, que augmenta la resistència i combat la fatiga (Hernán Cortés)</strong></a>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img  src="img/carrousel/ChocolateCacao.jpeg" class="d-block img-fluid container-fluid"  alt="caco xocolata">
                                <div class="carousel-caption">
                                    <div class="servic">
                                        <a><strong>La xocolata calenta plena necessitats profundes (Susan Isaacs)</strong></a>
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item">
                                <img  src="img/carrousel/te-negro.jpeg" class="d-block img-fluid container-fluid"  alt="te negre">
                                <div class="carousel-caption">
                                    <div class="servic">
                                        <a><strong>Cada tassa de te representa un viatge imaginari (Catherine Douzel)</strong></a>
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item">
                                <img  src="img/carrousel/2021-cafer_forte.jpeg" class="d-block img-fluid container-fluid"  alt="cafe negre" >
                                <div class="carousel-caption">
                                    <div class="servic">
                                        <a><strong>Si no existissin els cafès,moltes coses mai haurien estat fetes,aquestes,ni pensades.<br>(Heimito von Doderer)</strong></a>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls"  data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls"  data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        
                    </div>
                </div>
            </div>
            
        </section>
<!------------------------------------------------------------------------------------------------------------------------->       
<!---cookies--------->


<div id="div-cookies" style="display: none;">
<img src="img/coki/monster_cookies.png" class="rounded-circle" alt="Cinque Terre"  width="30px" height="30px">
    Necesitem utilitzar les cookies per que funcion tot, si romans aquí acepta el seu us, mes informacio en
    <a hreflang="es" href="politica_botigues.php" style="color: #A68251;">Política de botiga</a>
    i 
    <a hreflang="es" href="politica_enviar.php" style="color: #A68251;">Política d'enviament</a>.
    <button type="button" class="btn btn-sm btn-primary" onclick="acceptCookies()">
        Acepto el us de les cookies
    </button>
    <script  src="js/cok.js"></script>
    
</div>


<!------------------------------------------------------------------------------------------------------------------------->       

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
                                <a class="dropdown-item" href="cafe.php"> <i class="fas fa-coffee">Café</i></a>
                                <a class="dropdown-item" href="xoco.php"> <i class="fas fa-coffee">Xocolata</i></a>
                                <a class="dropdown-item" href="te.php"> <i class="fad fas fa-coffee">Té</i></a>
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
            </div>
            </button>
            
        </nav>
    
    </footer>

    </body>

</html>