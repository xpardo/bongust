<?php


    //dades de configuració
    $ip = 'localhost';
    $usuari ="xpardo";
    $password = "xpardo";
    $db_name="xpardo_botigaonline";
    
    // connectem amb la db
    
    $con  = new mysqli($ip,$usuari,$password,$db_name);

    if (!$con)  {
        echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
        
    }else{
        return $con;
    }


?>