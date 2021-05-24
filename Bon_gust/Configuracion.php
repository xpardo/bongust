<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
function connectDB($server,$user,$pass,$db){
    $conn = new mysqli($server,$user,$pass,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
  

///Productes
function conDB(){
    
    //dades de configuració
    $ip = 'localhost';
    $usuari ="xpardo";
    $password = "xpardo";
    $db_name="xpardo_botigaonline";
    
    
    
    
    // connectem amb la db
    $con= mysqli_connect($ip,$usuari,$password,$db_name);
    
    if (!$con)  {
        echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
        
    }else{
        return $con;
    }

}
?>