<?php
require_once './database.php';

$products=$database->select("tb_info_platillo","*");
$drinks=[];
$maindishes=[];
$appetizers=[];
$desserts=[];

foreach($products as $product){
    if($product["platillo_catego"]=="Main dishes"){
        $maindishes[]=$product;
        
    }else{
        if($product["platillo_catego"]=="Appetizers"){
            $appetizers[]=$product;

        }else{
            if($product["platillo_catego"]=="Drinks"){
                $drinks[]=$product;

            }else{
                $desserts[]=$product;

            }
        }  
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@500;700&family=Marcellus&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/admin-main.css">
</head>
<body>

<header>
    <div class="div-header-admin">
            <div class="div-return-btn">
            <a class="return-btn" href="index.php">Return</a>
            </div>
            <h1 class="title-admin">Dishes Management</h1>
            <div class="div-return-btn">
            <a class="return-btn" href="admin/add-product.php">Add new recipe</a>
            </div>

    </div>
</header>


<div class="add-product-div">

    <div class="div-colum-admin">
    <section>
    <div class="div-list-dish-adim">
    <h3 class="table-title-admin">Appetizers</h3>
    <img class="icon-admin" src='./img/lettuce.svg' alt='main-dish'>
    </div>
    <div class="div-table-admin">
    <table>
        <?php
            foreach($appetizers as $appetizer){
                echo "<tr>";
                echo "<td class='width-text'>".$appetizer["platillo_nombre"]."</td>";
                echo "<td><a class='a-admin' href='./admin/edit-product.php?id=".$appetizer["id_platillo"]."'>Edit</a> <a class='a-admin' href='./admin/delete-product.php?id=".$appetizer["id_platillo"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
    </section>
    </div>

    <div class="div-colum-admin">
    <section>
    <div class="div-list-dish-adim">
    <h3 class="table-title-admin">Main dishes</h3>
    <img class="icon-admin" src='./img/dish.svg' alt='main-dish'>
    </div>
    <div class="div-table-admin">
    <table>
        <?php
            foreach($maindishes as $maindishe){
                echo "<tr>";
                echo "<td class='width-text'>".$maindishe["platillo_nombre"]."</td>";
                echo "<td><a class='a-admin' href='./admin/edit-product.php?id=".$maindishe["id_platillo"]."'>Edit</a> <a class='a-admin' href='./admin/delete-product.php?id=".$maindishe["id_platillo"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
    </section>
    </div>

    <div class="div-colum-admin">
    <section>
    <div class="div-list-dish-adim">
    <h3 class="table-title-admin">Drinks</h3>
    <img class="icon-admin" src='./img/cocktail.svg' alt='main-dish'>
    </div>
    <div class="div-table-admin">
    <table>
        <?php
            foreach($drinks as $drink){
                echo "<tr>";
                echo "<td class='width-text'>".$drink["platillo_nombre"]."</td>";
                echo "<td><a class='a-admin' href='./admin/edit-product.php?id=".$drink["id_platillo"]."'>Edit</a> <a class='a-admin' href='./admin/delete-product.php?id=".$drink["id_platillo"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
    </section>
    </div>

    <div class="div-colum-admin">
    <section class="add-product-sect">
    <div class="div-list-dish-adim">
    <h3 class="table-title-admin">Desserts</h3>
    <img class="icon-admin" src='./img/dessert.svg' alt='main-dish'>
    </div>
    <div class="div-table-admin">
    <table>
        <?php
            foreach($desserts as $dessert){
                echo "<tr>";
                echo "<td class='width-text'>".$dessert["platillo_nombre"]."</td>";
                echo "<td><a class='a-admin' href='./admin/edit-product.php?id=".$dessert["id_platillo"]."'>Edit</a> <a class='a-admin' href='./admin/delete-product.php?id=".$dessert["id_platillo"].")''>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
    </section>
    </div>
</div>

<footer>

<div class="div-header-admin bottom-posicion">
            <img src="img/graphic-identifier.png" alt="">
    </div>

</footer>


    
</body>
</html>