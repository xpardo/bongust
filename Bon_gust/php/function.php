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

function con(){
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

}

function afegirimatge($non,$ruta){
    $con=conDB();
    $res=TRUE;
  
    $sql="insert into productes (nom,ruta) value('$non','$ruta')" ;  
    $res = mysqli_query($con,$sql) or $res=FALSE;
  
  
    return $res;
  
  }
  function categoria(){
    $con=conDB();
    $res=TRUE;
    $sql="select * from categories";
    $res = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    return $res;
  }
  

function registrar($nom,$descripcio,$preu,$imatge,$categoria_id){
    $con=conDB();
    $res=TRUE;
    $sql="INSERT INTO 'productes'('nom','descripcio','preu','imatge','categoria_id')Value($nom,$descripcio,$preu,$imatge,$categoria_id)";
    
    $res = mysqli_query($con,$sql) or $res=FALSE;

    return $res;
}

function actualizar($nom,$descripcio,$preu,$imatge,$categoria_id,$id){
    $con = conDB();

    $sql = "UPDATE 'productes' SET 'nom'='$nom','descripcio'='$descripcio','preu'='$preu','imatge'='$imatge','categoria_id'='$categoria_id' where'id'='$id'";
    
    if(!$con->query($sql)){
        die("error ejecutan la consulta:".$con->error);
    }
    return true;
}

function eliminar($id){
    $con = conDB();

    $sql = "DELETE from productes Where 'id'='$id'";

    if(!$con->query($sql)){
        die("error ajecutan la consulta:".$con->error);
    }
    return true;
}

function mostrar(){
    $con = conDB();

    $sql = "SELECT productes.id,nom,descripcio,imatge,preu FROM productes Inner join categoria on productes.categoria_id =categoria_id ORDER BY productes.id";

    if(!$con->query($sql)){
        die("error ajecutan la consulta:".$con->error);
    }
    return true;
}

function mostrarID($id){
    $con=conDB();

    $sql = "select * from productes where id=$id ";
    $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
    $registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    return $registre;
}



function checkProductUser($idproducto){

    $retorno=false;
    
    
    
    $conn = connectDB('localhost', 'xpardo', 'xpardo', 'xpardo_botigaonline');
    $sql = "select * from productos  where id=".$idproducto;
        if (!$resultado = $conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
    }
    if ($resultado->num_rows == 1) {

        $retorno=true;  

    }
    
    return $retorno;
    
}
function generate_string( $strength = 16) {
    $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
   $input_length = strlen($input);
   $random_string = '';
   for($i = 0; $i < $strength; $i++) {
       $random_character = $input[mt_rand(0, $input_length - 1)];
       $random_string .= $random_character;
   }
  
   return $random_string;
  }
  
  

?>

