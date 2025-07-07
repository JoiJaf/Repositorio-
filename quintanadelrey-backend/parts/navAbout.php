<?php
require_once '../database.php';
session_start();
?>

<header class="header">

        <div class="header-red-bar">
            <div class="header-ctn">
                <a class="logo" href="../index.php">
                    <img src="../img/graphic-identifier.png" alt="graphic-identifier">
                </a>

                <!-- mobile nav btn -->

                <input class="mobile-check" type="checkbox">
                <label class="mobile-btn">
                    <span></span>
                </label>

                <!-- mobile nav btn -->

                <nav class="navigation">
                    <a class="navigation-link" href="../index.php">Home</a>
                    <a class="navigation-link" href="../categories.php">Product</a>
                    <a class="navigation-link" href="#">Contact</a>

                    <?php
            if (isset($_SESSION["isLoggedIn"])) {
                ?>
            <a href="../cart.php">
                <svg width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z"
                        stroke-width="0" fill="currentColor" />
                </svg>
            </a>
            <?php
            }else{
            ?>
            <a href="../register.php">
                <svg width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z"
                        stroke-width="0" fill="currentColor" />
                </svg>
            </a>
            <?php
            }
            ?>
            <?php
            

            if (isset($_SESSION["isLoggedIn"])) {

                $idsession = $database->select("tb_usuarios", "*", ["nombre_usuario" => $_SESSION["usr_name"]]);
                echo "<div class='login'>";
                echo "<img class='logo-user' src='../img/user.png' alt='user-logo'>";
                echo "</div>";
                echo "<a class='navigation-link' href='../acount.php?id=" . $idsession[0]["id_usuario"] . "'>" . $_SESSION["usr_name"] . "</a>";
                if ($_SESSION["usr_name"] == "admin") {
                    echo "<a class='navigation-link' href='../products-list.php'>Management</a>";
                }
                echo "<a class='navigation-link' href='../logout.php'>Logout</a>";
            } else {
                echo "<div class='login'>";
                echo "<a href='../register.php'> <img class='logo-user' src='../img/user.png' alt='user-logo'> </a>";
                echo "</div>";
                echo "<a class='login' href='../register.php'>Login</a>";
            }
            ?>
                </nav>
            </div>
        </div>


    </header>