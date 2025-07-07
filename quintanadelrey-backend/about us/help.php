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

    <link rel="stylesheet" href="../css/main.css">

    <style>

    </style>


</head>

<body>

    <?php
    include("../parts/navAbout.php");
    ?>


    <main class="help">

        <div class="help-ctn">
            <h1 class="help-title">Help Center</h1>

            <section class="help-sec-ctn">
                <h2 class="help-subtitle">Frequently Asked Questions</h2>

                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">How do I create an account?</div>
                        <div class="accordion-content">
                            <ul>
                                <li class="accordion-text">To create an account, click on the "Login" button and fill
                                    out the required
                                    information.</li>

                                <li class="accordion-text">You should not register a new account with previous values,
                                    that would cause an error. </li>
                            </ul>
                        </div>


                        <div class="accordion-item">
                            <div class="accordion-header">Can I change my password?</div>
                            <div class="accordion-content">
                                <ul>
                                    <li class="accordion-text">
                                        Yes, you can change your password in the "Account Settings"
                                        section after logging in.
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
            </section>

            <section>
                <h2 class="help-subtitle">Contact Support</h2>

                <p>If you need further assistance, please contact our support team at <a
                        href="mailto:support@example.com">support@example.com</a>.</p>
            </section>
        </div>


    </main>


    <footer class="footer">
        <div class="footer-layout">
            <div class="logo">
                <a href="../index.php">
                    <img class="logo-footer" src="../img/graphic-identifier.png" alt="graphic-identifier">
                </a>
            </div>

            <div class="links">
                <h2 class="footer-title">
                    about us
                </h2>
                <ul class="footer-links">
                    <a href="term.php">
                        <li>Reservation rules and policies</li>
                    </a>
                    <a href="acces.php">
                        <li>Accessibility</li>
                    </a>
                    <a href="">
                        <li>about us</li>
                    </a>
                    <?php
                    if (isset($_SESSION["isLoggedIn"])) {
                        echo "<a href='./acount.php?id=" . $idsession[0]["id_usuario"] . "'> <li> " . $_SESSION["usr_name"] . " </li></a>";
                    }
                    ?>
                    <a href="contact.php">
                        <li>Contact Us</li>
                    </a>
                    <a href="help.php">
                        <li>Help</li>
                    </a>
                    <a href="">
                        <li>Download our mobile app</li>
                    </a>
                </ul>
                <div class="download-app">
                    <a href="https://www.apple.com/la/app-store/">
                        <img src="../img/app-store.png" alt="app-store">
                    </a>
                    <a href="https://play.google.com/store/">
                        <img src="../img/google-play.png" alt="google-play">
                    </a>
                </div>
            </div>

            <div class="ctn-form">

                <h4 class="subtitle">write to us</h4>
                <form class="form">
                    <input class="placeholder" type="text" placeholder="Email Address">
                    <input class="submit" type="submit" value="">
                </form>

                <h4 class="subtitle">
                    Search us in:
                </h4>

                <div class="footer-network">
                    <a href="https://www.facebook.com/?locale=es_LA"><img src="../img/facebook-link.png"
                            alt="facebook"></a>
                    <a href="https://www.instagram.com/"><img src="../img/instagram-link.png" alt="instagram"></a>
                    <a href="https://www.whatsapp.com/?lang=es_LA"><img src="../img/whatsApp-link.png"
                            alt="whatsApp"></a>
                    <a href="https://twitter.com/?lang=es"><img src="../img/twitter-link.png" alt="twitter"></a>
                </div>


            </div>




        </div>

        <p class="text-end">
            © All rights reserved. Quintana del rey 2023
        </p>
    </footer>

    <script src="./js/funtions.js">

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function () {
                    const item = this.parentNode;
                    item.classList.toggle('active');
                });
            });
        });
    </script>


</body>

</html>