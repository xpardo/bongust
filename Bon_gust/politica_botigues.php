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
                                <a class="dropdown-item" href="cafe.php"><i class="fas fa-coffee">Caf?? </i></a>
                                <a class="dropdown-item" href="xoco.php"><i class="fas fa-coffee">Xocolata </i></a>
                                <a class="dropdown-item" href="te.php"><i class="fas fa-coffee">T?? </i></a>
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
<!--------------------------------------------------------------------------------------------------------------------------------------------->
  
        <section>
   

            
            <div class="container-fluid m-3">
                <div class="row">

                    <div class="po">
                        <a href="home.php">Incici</a>
                        <a href="politica_botigues.php">/Pol??tica de botiga</a>
                    </div>

                    <div class="col-12 col-m-7"><h1 ><strong>Pol??tica de la Botiga</strong></h1><br></div>

                    <div class="atcli">
                        <div class="col-12 offset-4"><a><strong>Atenci?? al client</strong></a><br></div>
                        <a>
                            Aqu?? en Bon Gust ens sentim orgullosos de tractar b?? als nostres clients,
                            la mateixa manera que ens sentim orgullosos dels nostres. 
                            Creiem que cada client ??s important i el servei al client ??s essencial.
                        </a><br><br>
                        <div class="col-12 offset-5"><a><strong>Preus</strong></a><br></div>
                        <a>
                            Els preus dels nostres articles s'assenyalen sempre en Euros i porten l'I.V. A. incl??s. 
                         Qualsevol altre import que hagi d'afegir-se (despeses d'enviament, etc.) s'indicar?? desglossat durant el 
                            proc??s de compra i abans que confirmis el pagament.
                        </a><br><br>


                        <div class="col-12 offset-4"> <a><strong>Privadesa i seguretat</strong></a></div>
                        <a> 
                            La vostra intimitat ??s important per a nosaltres, i per aix??, en Bon Gust, 
                            ens hem comprom??s a protegir la vostra informaci?? personal i no estem venent-la a uns altres. 
                            D'acord amb la Llei de Protecci?? de Dades Personals de Catalunya (???RGPD???),
                            exercim molta cura en la gesti?? de la forma en qu?? s'utilitzen i comparteixen les dades personals, 
                            assegurant-nos de buscar el vostre perm??s abans de recollir o emmagatzemar qualsevol de les vostres dades.
                        </a><br><br>

                        <a>
                            Juntament amb estrictes mesures i procediments de seguretat, 
                            tinguin la seguretat que tots els detalls personals que se'ns presenten continuen sent segurs.
                            La vostra visita al nostre lloc web i la presentaci?? de qualsevol detall personal indicaria 
                            la vostra acceptaci?? dels termes descrits a la pol??tica de privacitat. No obstant aix??, 
                            de tant en tant podem modificar aquests termes. Per tant, 
                            el seu ??s continuat despr??s de qualsevol modificaci?? indicaria el 
                            seu acord amb els nous termes reflectits.
                        </a><br><br>

                        <div class="col-12 offset-4"><a><strong>Propietat Intel??lectual i industrial</strong></a></div>
                        <a> 
                            El lloc web, incloent a t??tol enunciatiu per?? no limitatiu la seva programaci??, 
                            edici??, compilaci?? i altres elements necessaris per al seu funcionament, 
                            els dissenys, logotips, text i/o gr??fics s??n propietat del prestador
                            o en el seu cas disposa de llic??ncia o autoritzaci?? expressa per part dels autors.
                            Tots els continguts del lloc web es troben degudament protegits 
                            per la normativa de propietat intel??lectual i industrial, 
                            aix?? com inscrits en els registres p??blics corresponents.
                        </a><br><br>
                        <a> 
                            Independentment de la finalitat per a la qual fossin destinats, 
                            la reproducci?? total o parcial, ??s, explotaci??, distribuci?? i comercialitzaci??, 
                            requereix en tot cas de l'autoritzaci?? escrita pr??via per part del prestador. 
                            Qualsevol ??s no autoritzat pr??viament per part del prestador ser?? considerat un incompliment greu
                            dels drets de propietat intel??lectual o industrial de l'autor.
                        </a><br><br>
                        <a> 
                            Els dissenys, logotips, text i/o gr??fics aliens al prestador i que poguessin apar??ixer en el lloc web, 
                            pertanyen als seus respectius propietaris, sent ells mateixos responsables de qualsevol possible 
                            controv??rsia que pogu??s suscitar-se respecte a aquests. En tot cas, el prestador compta amb 
                            l'autoritzaci?? expressa i pr??via per part d'aquests.
                        </a><br><br>
                        <a> 
                            El prestador NO AUTORITZA expressament al fet que tercers puguin redirigir directament als 
                            continguts concrets del lloc web, devent en tot cas redirigir al lloc web principal del prestador.
                        </a><br><br>
                        <a> 
                            El prestador reconeix a favor dels seus titulars els corresponents drets de propietat 
                            industrial i intel??lectual, no implicant el seu sol esment o aparici?? en el lloc web 
                            l'exist??ncia de drets o cap responsabilitat del prestador sobre aquests, 
                            com tampoc suport, patrocini o recomanaci?? per part d'aquest.
                        </a><br><br>

                        <div class="col-12 offset-4"><a><strong>Llei Aplicable i Jurisdicci??</strong></a></div>
                        <a> 
                            Per a la resoluci?? de totes les controv??rsies o q??estions relacionades amb el present lloc web 
                            o de les activitats en ell desenvolupades, 
                            ser?? aplicable la legislaci?? catalana, a la qual se sotmeten expressament les parts, 
                            sent competents per a la resoluci?? de tots els conflictes derivats o 
                            relacionats amb el seu ??s els Jutjats i Tribunals de Catalunya.
                        </a><br><br>

                    
                    </div>

                </div>
            </div>


        </section>

<!------------------------------------------------------------------------------------------------------------------------->       

<!--Peu de pagina-->   
<footer>
        <nav class="navbar navbar-expand-lg navbar-light m-2" style="background-color: #98E46C;">
            <div class="col-12 col-md-4">
                <section class="col-10 ">
                <a class="navbar-brand" href="#"><img src="img/logo/bon_gust.png" width="80" height="80" alt=""></a><br>
                    <a><strong>BON GUST:</strong>Ens dediquem a la venda de caf?? , te  i xocolates, a m??s d'altres articles i complements.</a>
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
                                <a class="dropdown-item" href="cafe.php"> <i class="fas fa-coffee">Caf??</i></a>
                                <a class="dropdown-item" href="xoco.php"> <i class="fas fa-coffee">Xocolata</i></a>
                                <a class="dropdown-item" href="te.php"> <i class="fad fas fa-coffee">Te</i></a>
                                <a class="dropdown-item" href="accesoris.php"> <i class="fas fa-blender">Accesoris</i></a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contacte.php"><i class="fas fa-address-book">Contacte</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="politica_botigues.php"><i class="fas fa-id-card">Pol??tica de botiga</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="politica_enviar.php"><i class="fas fa-id-card">Pol??tica d'enviaments</i></a>
                        </li>
                        
                    </ul>
                    
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="mov">
                        <a>M??tode de pagament: </a>
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