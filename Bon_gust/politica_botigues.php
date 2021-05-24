<?php
session_start();

$error=FALSE;
$errormsg="";

require_once('../Bon_gust/login/vendor/autoload.php');

require_once('../Bon_gust/login/App/Auth/Auth.php');

include("../Bon_gust/login/funcions.php"); 

include('../Bon_gust/login/contrologin.php'); 

header('Content-Type: text/html; charset=UTF-8'); 



?>

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estil.css" />

    <title>Bon Gust</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light m-2" style="background-color: #98E46C;">
            <div class="col-12 col-md-4">
                <section>
                    <a class="navbar-brand" href="#"><img src="img/logo/bon_gust.png" width="80" height="80"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                             
                </section>
            </div>
 
            <div class="lletres">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="home.php"><i class="fas fa-home">Home</a></i>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="productes.php"  role="button"  aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-archive">Productes
                            </a></i>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cafe.php"><i class="fas fa-coffee">Café </i><a>
                                <a class="dropdown-item" href="xoco.php"><i class="fas fa-coffee">Xocolata </a></i>
                                <a class="dropdown-item" href="te.php"><i class="fas fa-coffee">Té </i></a>
                                <a class="dropdown-item" href="accesoris.php"><i class="fas fa-blender">Accesoris</a></i>
                            </div>
                        </li>
                                              
                        <li class="nav-item ">
                            <a class="nav-link" href="contacte.php"><i class="fas fa-address-book">Contacte</i></a>
                        </li>
                        <li class="nav-item active col-12 col-md-2">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-basket">cistella</i></a>
                        </li>
             
                    
                        <li class="nav-item active">
                            <a class="nav-link" href="../Bon_gust/login/login.php"><i class="fas fa-sign-in-alt">loguejar-se</i></a>
                        </li>

                            <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <a class="dropdown-item" href="alta.php?emailc=<?=$_SESSION["usuaris"]?>">Edita les teves dades<a>
                                    <a class="dropdown-item" href="home.php">Cerrar Sesion</a>
                                </div>
                            </li>

                       
                    </ul>


                    <ul class="nav-item">
                        <div class="buscar">
                            <form method="post" action="busc.php" role="search" >

                                <label class="sr-only" for="inlineFormInput"></label>
                                <i class="fas fa-search"></i>
                                <input required name="PalabraClave" type="text"  placeholder="paraula clau">
                                
                                <input name="buscar" type="hidden" class="form-control mb-2"  value="v">
                                
                                <button type="submit" class="btn btn-primary"  href="busc.php">Buscar</button>
  
                            </form>
                        </div>
                    </ul>

                </div>
            </div>
            </button>       
        </nav>
    </header>
        <section>
   

            
            <div class="container-fluid m-3">
                <div class="row">

                    <div class="po">
                        <a href="home.php">Incici</a>
                        <a href="politica_botigues.php">/Política de botiga</a>
                    </div>

                    <div class="col-12 col-m-7"><h1 ><strong>Poítica de la Botgia</strong></h1><br></div>

                    <div class="atcli">
                        <div class="col-12 offset-4"><a><strong>Atenció al client</strong></a><br></div>
                        <a>
                            Aquí en Bon Gust ens sentim orgullosos de tractar bé als nostres clients,
                            la mateixa manera que ens sentim orgullosos dels nostres. 
                            Creiem que cada client és important i el servei al client és essencial.
                        </a><br><br>
                        <div class="col-12 offset-5"><a><strong>Preus</strong></a><br></div>
                        <a>
                            Els preus dels nostres articles s'assenyalen sempre en Euros i porten l'I.V. A. inclòs. Q
                            ualsevol altre import que hagi d'afegir-se (despeses d'enviament, etc.) s'indicarà desglossat durant el 
                            procés de compra i abans que confirmis el pagament.
                        </a><br><br>


                        <div class="col-12 offset-4"> <a><strong>Privadesa i seguretat</strong></a></div>
                        <a> 
                            La vostra intimitat és important per a nosaltres, i per això, en Bon Gust, 
                            ens hem compromès a protegir la vostra informació personal i no estem venent-la a uns altres. 
                            D'acord amb la Llei de Protecció de Dades Personals de Catalunya (“RGPD”),
                            exercim molta cura en la gestió de la forma en què s'utilitzen i comparteixen les dades personals, 
                            assegurant-nos de buscar el vostre permís abans de recollir o emmagatzemar qualsevol de les vostres dades.
                        </a><br><br>

                        <a>
                            Juntament amb estrictes mesures i procediments de seguretat, 
                            tinguin la seguretat que tots els detalls personals que se'ns presenten continuen sent segurs.
                            La vostra visita al nostre lloc web i la presentació de qualsevol detall personal indicaria 
                            la vostra acceptació dels termes descrits a la política de privacitat. No obstant això, 
                            de tant en tant podem modificar aquests termes. Per tant, 
                            el seu ús continuat després de qualsevol modificació indicaria el 
                            seu acord amb els nous termes reflectits.
                        </a><br><br>

                        <div class="col-12 offset-4"><a><strong>Propietat Intel·lectual i industrial</strong></a></div>
                        <a> 
                            El lloc web, incloent a títol enunciatiu però no limitatiu la seva programació, 
                            edició, compilació i altres elements necessaris per al seu funcionament, 
                            els dissenys, logotips, text i/o gràfics són propietat del prestador
                            o en el seu cas disposa de llicència o autorització expressa per part dels autors.
                            Tots els continguts del lloc web es troben degudament protegits 
                            per la normativa de propietat intel·lectual i industrial, 
                            així com inscrits en els registres públics corresponents.
                        </a><br><br>
                        <a> 
                            Independentment de la finalitat per a la qual fossin destinats, 
                            la reproducció total o parcial, ús, explotació, distribució i comercialització, 
                            requereix en tot cas de l'autorització escrita prèvia per part del prestador. 
                            Qualsevol ús no autoritzat prèviament per part del prestador serà considerat un incompliment greu
                            dels drets de propietat intel·lectual o industrial de l'autor.
                        </a><br><br>
                        <a> 
                            Els dissenys, logotips, text i/o gràfics aliens al prestador i que poguessin aparèixer en el lloc web, 
                            pertanyen als seus respectius propietaris, sent ells mateixos responsables de qualsevol possible 
                            controvèrsia que pogués suscitar-se respecte a aquests. En tot cas, el prestador compta amb 
                            l'autorització expressa i prèvia per part d'aquests.
                        </a><br><br>
                        <a> 
                            El prestador NO AUTORITZA expressament al fet que tercers puguin redirigir directament als 
                            continguts concrets del lloc web, devent en tot cas redirigir al lloc web principal del prestador.
                        </a><br><br>
                        <a> 
                            El prestador reconeix a favor dels seus titulars els corresponents drets de propietat 
                            industrial i intel·lectual, no implicant el seu sol esment o aparició en el lloc web 
                            l'existència de drets o cap responsabilitat del prestador sobre aquests, 
                            com tampoc suport, patrocini o recomanació per part d'aquest.
                        </a><br><br>

                        <div class="col-12 offset-4"><a><strong>Llei Aplicable i Jurisdicció</strong></a></div>
                        <a> 
                            Per a la resolució de totes les controvèrsies o qüestions relacionades amb el present lloc web 
                            o de les activitats en ell desenvolupades, 
                            serà aplicable la legislació catalana, a la qual se sotmeten expressament les parts, 
                            sent competents per a la resolució de tots els conflictes derivats o 
                            relacionats amb el seu ús els Jutjats i Tribunals de catalunya.
                        </a><br><br>

                    
                    </div>

                </div>
            </div>


        </section>


<footer>
            <nav class="navbar navbar-expand-lg navbar-light m-2" style="background-color: #98E46C;">
                <div class="col-12 col-md-4">
          
                    <section>
                    <a class="navbar-brand" href="#"><img src="img/logo/bon_gust.png" width="80" height="80"></a><br>
                        <a><strong>BON GUST:</strong>Ens dediquem a la venda de cafè , te  i xocolates, a més d'altres articles i complements.</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </section>
                </div>

                <div class="lletres">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            <a class="nav-link" href="home.php"><i class="fas fa-home">Home</a></i>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="productes.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-archive">Productes
                                </a></i>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="cafe.php"><i class="fas fa-coffee">Café </i><a>
                                    <a class="dropdown-item" href="xoco.php"><i class="fas fa-coffee">Xocolata</a></i>
                                    <a class="dropdown-item" href="te.php"><i class="fad fas fa-coffee">Té</a></i>
                                    <a class="dropdown-item" href="accesoris.php"><i class="fas fa-blender">Accesoris</a></i>
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
                        <div class="mov"><a>Mètode de pagament: </a></div>
                        <li class="nav-item col-sm">
                            <img  src="img/metode_pagament/metodos-pago.png" class="d-block img-fluid" width="150" height="150" alt="tipos de pagament">
                        </li>
                    </ul>
                
                </div>

                
            </nav>
        
        </footer>

    </body>

</html>