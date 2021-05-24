<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
include("php/function.php");



header('Content-Type: text/html; charset=UTF-8'); 

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>BON GUST - Pagar con PayPal de forma segura</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/estil.css" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    
                
    
   
    <header>

        <nav class="navbar navbar-expand-lg navbar-light m-2" style="background-color: #98E46C;">
                <div class="col-12 col-md-4">
                    <section class="col-10 ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    
            </nav>
    </header>
    
<div class="container-fluid m-3">
<div class="row">
    <div class="po m-3">
        <a href="home.php">Incici</a>
        <a href="page.php">/pagar</a>
    </div>


    <?php
    $error = false;
    $amount = '';
    $concept = '';

    if (isset($_GET['error']))
        $error = $_GET['error'];

    if (isset($_GET['amount']))
        $amount = $_GET['amount'];

    if (isset($_POST['submitPayment'])) {
        
        $amount = $_POST['amount']; 
        $concept = $_POST['concept'];
        $order = date('ymdHis');

        ?>
        
        <div class="loading">Un momento, por favor</div>
        
        <form id="realizarPago" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input name="cmd" type="hidden" value="_cart" />
            <input name="upload" type="hidden" value="1" />
            <input name="business" type="hidden" value="nonoryum@gmail.com" />
            <input name="shopping_url" type="hidden" value="http://dawjavi.insjoaquimmir.cat/xpardo/proje/Bon_gust/pago-con-paypal/" />
            <input name="currency_code" type="hidden" value="EUR" />
            <input name="return" type="hidden" value="http://dawjavi.insjoaquimmir.cat/xpardo/proje/Bon_gust/scripts/php/pago-con-paypal/confirmation.php" />
            <input name="notify_url" type="hidden" value="http://dawjavi.insjoaquimmir.cat/xpardo/proje/Bon_gust/scripts/php/pago-con-paypal/ipn.php" />

            <input name="rm" type="hidden" value="2" />
            <input name="item_number_1" type="hidden" value="<?php echo $order; ?>" />
            <input name="item_name_1" type="hidden" value="<?php echo $concept; ?>" />
            <input name="amount_1" type="hidden" value="<?php echo $amount; ?>" />
            <input name="quantity_1" type="hidden" value="1" /> 

        </form>
        <script>
        $(document).ready(function () {
            $("#realizarPago").submit();
        });
        </script>
    <?php
    }
    else {   
    ?>
    <div class="page">
        <form class="form-amount" action="pag.php" method="post">
            <img class="logo img-responsive" src="img/logo/bon_gust.png" alt="BON GUST" height="65" width="300"><br/>
            <?php if ($error) { ?><div class="alert alert-danger">El valor introducido no es correcto. Debe introducir por ejemplo: 50.99</div><?php } ?>
            <div class="form-group">
            
                <label for="concept" style="color: black;">Indicar un concepte</label>
                <input type="text" id="concept" name="concept" class="form-control"<?php if ($concept) { ?> value="<?php echo $concept; ?>"<?php }else{ ?> style="background-color: white;" placeholder="Indicar un concepte"<?php } ?>>
                
            </div>
            <div class="form-group">
                <label for="amount" style="color: black;">Import</label>
                <input type="text" id="amount" name="amount" class="form-control"<?php if ($amount) { ?> value="<?php echo $amount; ?>"<?php }else{ ?> style="background-color: white;" placeholder="has de col·locar el total de tot"<?php } ?>>
            </div>
            <input class="btn btn-lg btn-primary btn-block" name="submitPayment" type="submit" value="Pagar">
            <img class="img-responsive" src="img/metode_pagament/metodos-pago.png" alt="Pagos con PayPal y PHP" height="65" width="300" ><br/>
        </form> 
    
    <?php
    }
    ?>
                
    <?php
    /*
    * Esta es la consula para obtener todos los productos de la base de datos.
    */
    $products = $con->query("SELECT * from productes");
    if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])){
        ?>
        <table class="table table-bordered">
        <thead>
            <th>Cuantitat</th>
            <th>Nom</th>
            <th>preu per unitat</th>
            <th>Total</th>
        
        </thead>
        <?php 
        /*
        * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
        */
        foreach($_SESSION["cart"] as $c):
        $products = $con->query("SELECT * from productes where id=$c[product_id]");
        $r = $products->fetch_object();
            ?>
        <tr>
            <th><?php echo $c["q"];?></th>
            <td><?php echo $r->nom;?></td>
            <td><?php echo $r->preu;?></td>
            <td><?php echo $total=$c["q"]+$r->preu;?>€</td>
            

        </tr>
        <?php endforeach;} ?>
    
          
        
        </table>
        
       <!--  
        

        <table class="table table-bordered">
        <thead>
            <th>Nom</th>
       
            <th>Total tot</th>
        
        </thead>
        <?php 
        /*
        * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
        */
        foreach($_SESSION["cart"] as $c):
        $products = $con->query("SELECT * from productes where id=$c[product_id]");
        $re = $products->fetch_object();
            ?>
        <tr>
            <td>Incloent el transport  </td>
        <td><?php echo $total+$re->preu;?>€</td>
            

        </tr>
        <?php endforeach; ?>


        </table> -->
    

    </div>
</div>
</body>
</html>