<?php

require_once './database.php';
session_start();

$cart = json_decode($_COOKIE['cart'], true);
$date = date("Y-m-d H:i:s");
$user=$_SESSION["usr_name"];


$database->insert("tb_order",[
    "user_name"=>$user,
    "total"=>$_POST["total"],
    "tipo_pedido"=>$_POST["modality"],
    "date"=>$date
]);

$currentOrder = $database->max('tb_order', 'id_order');

foreach($cart as $order){

    $database->insert("tb_order_details",[
        "id_order"=>$currentOrder,
        "id_product"=>$order["id_platillo"],
        "qty"=>$order["qty"],
        "total"=>$order["total"]
    ]);

}
setcookie('cart','', time()-3600);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="shortcut icon" href="../img/logo.png">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@500;700&family=Marcellus&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- font -->

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/admin-main.css">
</head>

<body>

    <div class="delete-form_ctn">
    <img class="div-image" style="margin-bottom: 2rem" id="preview" src="./img/escudo.png" alt="Preview">
    <h2 class="title-delete">Thanks for order with Quintana del Rey</h2>
        <?php
        echo "<p class='del-text'>Your order will be ready soon</p>";
        ?>
        <div class="delete-btn">
            <a class="bg-button" href="./index.php"> Return to main menu</a>
        </div>
    </div>
        

</body>

</html>