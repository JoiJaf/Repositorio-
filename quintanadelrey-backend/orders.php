<?php
require_once 'database.php';


if($_GET){
    $user=$database->select("tb_usuarios","*",["id_usuario"=>$_GET["id"]]);
    var_dump($user);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quintana del rey</title>
    <link rel="shortcut icon" href="./img/logo.png">

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

    <header class="header">

        <?php
        include("./parts/headerNav.php");

        $user=$_SESSION["usr_name"];
        $historial=$database->select("tb_order_details",[
            "[><]tb_info_platillo"=>["id_product"=>"id_platillo"],
            "[><]tb_order"=>["id_order"=>"id_order"]
        ],[
            "id_platillo",
            "tb_order_details.id_order",
            "platillo_nombre",
            "qty",
            "platillo_precio",
            "tb_order_details.total"
        ],["user_name"=>$user]);

        $orders=$database->select("tb_order","*",["user_name"=>$user]);
        ?>

    </header>


    <main>


        <section class="ctn-us">
            <img class="img-us" src="./img/perfil.webp" alt="">
            <h2 class="us-name"><?php echo $user?></h2>
        </section>

        <div class="container-profile">

            <aside class="sidebar">
                <ul class="list-pr">
                    <a href="acount.php?id=<?php echo $_GET["id"]; ?>">
                        <li class="sb-ctn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                            </svg>
                            <p class="sb-text">my profile</p>
                        </li>
                    </a>

                    <hr>

                    <a href="orders.php">
                        <li class="sb-ctn-link">

                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M17 17h-11v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                            <p class="sb-text clr">my orders</p>
                        </li>
                    </a>


                </ul>

            </aside>


            <div>
                <div class="ord-tlitle" style="justify-content: center">
                    <p>Record</p>
                </div>

                <!-- Drex -->

                <?php foreach($orders as $order){
                ?>
                <div class="ord-tlitle" style="margin-top:2rem">
                    <p>N° order: <?php echo $order["id_order"]; ?></p>
                    <p>Date: <?php echo $order["date"]; ?></p>
                    <p>Modality: <?php echo $order["tipo_pedido"]; ?></p>
                    <p class="ord-price">Total: € <?php echo $order["total"]; ?></p>
                </div>
                <hr>

                <?php foreach($historial as $historials){
                    if($historials["id_order"]==$order["id_order"]){
                        ?>
                            <div class="ord-list">
                            <p><?php echo $historials["platillo_nombre"]; ?></p>
                            <p>Quantity: <?php echo $historials["qty"]; ?></p>
                            <p>Price: <?php echo $historials["platillo_precio"]; ?> c/u</p>
                            <p class="ord-price">Subtotal €<?php echo $historials["total"]; ?></p>
                            </div>
                <?php
                    }
                }
                }
                ?>
            </div>

    </main>

    <?php
    include("./parts/footer.php");
    ?>

    <script src="./js/funtions.js"></script>


</body>

</html>