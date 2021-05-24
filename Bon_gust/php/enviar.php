<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    //-----------------------------------------------------
    // Funciones Para Validar
    //-----------------------------------------------------

    /**
     * Método que valida si un texto no esta vacío
     * @param {string} - Texto a validar
     * @return {boolean}
     */
      function validar_requerido(string $missatge): bool
    {
        return !(trim($missatge) == '');
    }
  
  

    /**
     * Método que valida si el texto tiene un formato válido de E-Mail
     * @param {string} - Email
     * @return {bool}
     */
   function validar_email(string $texto): bool
    {
        return (filter_var($texto, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
    }

}  


if(isset($_POST['email'])){

    $email_to="nonoryum@gmail.com";
    $email_subject="Contacte des de BonGust";

    if(!isset($_POST['nom']) ||
    !isset($_POST['telefon']) ||
    !isset($_POST['email']) ||
    !isset($_POST['missatge'])){

        echo"error";
        echo"tornai a intentar";
        die();
    }

    $email_message="detalls el formulari de contactes:\n\n";
    $email_message.="nom:".$_POST['nom']."\n";
    $email_message.="telefon:".$_POST['telefon']."\n";
    $email_message.="email:".$_POST['email']."\n";
    $email_message.="missatge:".$_POST['missatge']."\n\n";

    $headers = 'From:'.$email_from."\r\n".
    'Reply-To:'.$email_from."\r\n".
    'X-Mailer: PHP/'.phpversion();  
    mail($email_to,$email_subject,$email_message,$header);

    header('Location:../misatge-de-envio.php');
 }

   
//___________________


?>