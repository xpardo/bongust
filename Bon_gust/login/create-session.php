<?php
session_start();
include("funcions.php");
require 'stripe/init.php';

\Stripe\Stripe::setApiKey('sk_test_51HpF6zGzxyWkiUlMAAOD40U1wt64GXukRaVZZr94bRVFtc8pqdxcSsab0zQ8j2qqHGLdAZ5rm2GiETd9aDaAPN3l009RPp5tRd');

header('Content-Type: application/json');

$_SESSION["id_comanda"]=generate_string(20);

$YOUR_DOMAIN = 'http://dawjavi.insjoaquimmir.cat';



$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => $_SESSION["importtotal"],
      'product_data' => [,
        'name' => 'Esto es mi pagina web',
        'images' =>  $_SESSION["basket()"] ,
        
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN .'/xpardo/html/M7/UF1/A7/ok.php?id_comanda='.$_SESSION["id_comanda"],
  'cancel_url' => $YOUR_DOMAIN . '/xpardo/html/M7/UF1/A7/ko.php',
]);
echo json_encode(['id' => $checkout_session->id]);

?>