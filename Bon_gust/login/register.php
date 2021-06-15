
<?php
include("funcions.php");
$errors=true;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  //control errors formulari, assegurar que el nom és nom, email és email....pass....


  if($_REQUEST["pass"]==$_REQUEST["pass2"]){
    if(!checkIfEmailExists($_REQUEST["email"])){

        if(addUser($_REQUEST["nom"],$_REQUEST["email"],$_REQUEST["pass"])){
            header('location:login.php');
              
            $errors=false;
        }

    }else{
        echo "Aquest email ja existeix....<br>";  
    }
  }else{
      echo "Els passwords no coincideixen....<br>";
  }

}

if($errors){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon Gust</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
     <link rel="stylesheet" href="assets/css/font-awesome.css">
     <link rel="stylesheet" href="assets/css/bootstrap-social.css">
     <script src="assets/js/jquery.js"></script>
     <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container-all">

<div class="ctn-form">
    <form method="post">
    <h1>REGISTRE</h1>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom"><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br>
        <label for="pass">Password:</label>
        <input type="password" name="pass" id="pass"><br>
        <label for="pass2">Repeteix password:</label>
        <input type="password" name="pass2" id="pass2"><br>
        <input type="submit" value="Afegeix">
    </form>
    <span class="text-footer">¿ja tens una compte?
        <a href="login.php">login</a>
    </span>

</div>
</div>
</body>
</html>
<?php
}
?>