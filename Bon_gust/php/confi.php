<?php

function conDB(){
    
    //dades de configuraciÃ³
    $ip = 'localhost';
    $usuari ="xpardo";
    $password = "xpardo";
    $db_name="xpardo_botigaonline";
    
    
    
    // connectem amb la db
    $con= mysqli_connect($ip,$usuari,$password,$db_name);
    if (!$con)  {
        echo "Ha fallat la connexiÃ³ a MySQL: " . mysqli_connect_errno();
        $con=False;
    }else{
        return $con;
    }

}

?>