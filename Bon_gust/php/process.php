<?php 
session_start();
include "conection.php";
if(!empty($_POST)){
    $q1 = $con->query("insert into cart(client_email,created_at) value(\"$_POST[email]\",NOW())");
    if($q1){
        $cart_id = $con->insert_id;
        foreach($_SESSION["cart"] as $c){

            $q1 = $con->query("INSERT into cart_product(product_id,quantity,cart_id) value($c[product_id],$c[q],$cart_id)");
        }
        unset($_SESSION["cart"]);
    }
}
header('location:../page.php');

?>