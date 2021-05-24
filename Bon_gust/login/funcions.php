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

  $cone  = new mysqli($ip,$usuari,$password,$db_name);

  if (!$cone)  {
      echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
      
  }else{
      return $cone;
  }
}





function cone(){


  $servidor= "localhost";
  $usuario= "xpardo";
  $password = "xpardo";
  $nombreBD= "xpardo_botigaonline";
  $db = new mysqli($servidor, $usuario, $password, $nombreBD);
  if ($db->connect_error) {
      die("la conexión ha fallado: " . $db->connect_error);
  }
  if (!$db->set_charset("utf8")) {
      printf("Error al cargar el conjunto de caracteres utf8: %s\n", $db->error);
      exit();
  } else {
      printf("Conjunto de caracteres actual: %s\n", $db->character_set_name());
  }

}


/*____________________________________________________________________ */
/*login */
function getUserData($email){

  $usuari='';
  $con=conDB();
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $con->query($sql)) {
    die("error ejecutan la consulta:".$con->error);
  }
  if ($resultado->num_rows == 1) {
    
    
    $usuari = $resultado->fetch_assoc();
   

  }
  
  return $usuari;

}


function isAdmin($email){


  $admin=false;
  $con = conDB()();
  $sql = "select * from usuaris where email='$email'  and rols_id=1 ";
  if (!$resultado = $con->query($sql)) {
    die("error ejecutando la consulta:".$con->error);
  }
  if ($resultado->num_rows == 1) {
    $admin=true;

  }
  
  return $admin;

}


function userExists($email){

  $exists=false;
  $con=conDB();
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $con->query($sql)) {
    die("error ejecutan la consulta:".$con->error);
  }
  if ($resultado->num_rows == 1) {
    
    
    $exists=true;
   

  }
  
  return $exists;

}

function deleteUser($id){



  $con=conDB();
  $sql = "delete from usuaris where id=$id ";
  if (!$con->query($sql)){
    die("error ejecutan la consulta:".$con->error);
  }
  return true;



}

function updatePasswordUser($email,$password){



  $con=conDB();
  $sql = "update usuaris set password=md5('$password') where email='$email' ";
  if (!$con->query($sql)) {
    die("error ejecutan la consulta:".$con->error);
  }
  return true;



}

function updateUser($nom,$email,$password,$id){



  $con=conDB();
  $sql = "update usuaris set nom='$nom',email='$email',password=md5('$password') where id=$id ";
  if (!$con->query($sql)){
    die("error ejecutando la consulta:".$con->error);
  }
  return true;



}

function addUser($nom,$email,$password){



  $con=conDB();
  $sql = "insert into usuaris (email,password,nom) values ('$email',md5('$password'),'$nom')  ";
  if (!$con->query($sql)) {
    die("error ejecutando la consulta:".$con->error);
  }
  return true;



}
/**
 * return true si email existeix
 * return false si email no existeix
 */
function checkIfEmailExists($email){


  $resultat=false;
  $con=conDB();
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $con->query($sql)) {
    die("error ejecutando la consulta:".$con->error);
  }
  if ($resultado->num_rows == 1) {
    $resultat=true;
  }
  
  return $resultat;


}
/**
 * 
 * return true usuari i pasword correcte
 * return false cas contrari
 */
function validaUsuari($email,$password){

    $resultat=false;
    $con=conDB();
    $sql = "select * from usuaris where email='$email' and password='$password' ";
    if (!$resultado = $con->query($sql)) {
      die("error ejecutando la consulta:".$con->error);
    }
    if ($resultado->num_rows == 1) {
      $resultat=true;
    }
    
    return $resultat;

}


function existeix($email){
  $con=conDB();
  $res=false;

  $sql="select * from usuaris where email='$email'" ;  
  $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));

  $row_cnt = mysqli_num_rows($resultat);

  if($row_cnt==1){
      $res=true;
  }else{
      $res=false;
  }
  
  mysqli_close($con);
  return $res;

}

function getUser($usuari){
  $con=conDB();
  $res=false;

  $sql="select * from usuaris where nom='$usuari" ;  
  $res = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
  $registre = mysqli_fetch_array($res, MYSQLI_ASSOC);

  return $registre;

}


function afegir($nom,$email,$password){
  $con=conDB();
  $res=TRUE;

  $sql="insert into usuaris (email,nom,password,id_rol) value('$email','$nom','md5($password)',1)" ;  
  $res = mysqli_query($con,$sql) or $res=FALSE;


  return $res;

}
/*_______________________________________________________________________ */
/*encriptar password */
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
/*_________________________________________________________________________________________________________ */
/* Productes */

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







?>