<?php
$servidor= "localhost";
$usuario= "xpardo";
$password = "xpardo";
$nombreBD= "xpardo_botigaonline";
$db = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($db->connect_error) {
    die("la conexión ha fallado: " . $db->connect_error);
}
if (!$db->set_charset("utf8")) {
    printf(" %s\n", $db->error);
    exit();
};
?>