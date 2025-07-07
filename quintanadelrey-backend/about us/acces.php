<?php

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

    <link rel="stylesheet" href="../css/main.css">



</head>

<body>

    <?php
    include("../parts/navAbout.php");
    ?>


    <main class="acces">
        <h1 class="acces-title">Accessibility Statement</h1>

        <p class="acces-p">At Quintana del Rey, we are committed to ensuring digital accessibility for people of all
            abilities. We
            continually strive to improve the user experience for everyone, and we actively work to comply with
            accessibility standards.</p>

        <h2>Web Content Accessibility Guidelines (WCAG) Compliance</h2>

        <p class="acces-p">Our website aims to conform to the Web Content Accessibility Guidelines (WCAG) 2.1 at the AA
            level. These
            guidelines explain how to make web content more accessible for people with disabilities.</p>

        <h2>Accessible Features on Our Website</h2>

        <ul>
            <li><strong>Navigation:</strong> We have implemented a clear and consistent navigation structure throughout
                the website to make it easy for users to find information.</li>
            <li><strong>Text Alternatives:</strong> All images on our site include descriptive alt text to provide
                information to users relying on screen readers or other assistive technologies.</li>
            <li><strong>Readable Font:</strong> We use legible and sizable fonts to enhance readability. Users can
                adjust text size using browser settings.</li>
            <li><strong>Keyboard Navigation:</strong> Our website is navigable using only a keyboard for users who
                cannot use a mouse.</li>
            <li><strong>Color Contrast:</strong> We strive to maintain sufficient color contrast ratios to ensure
                content is easily readable for users with low vision or color blindness.</li>
            <li><strong>Forms and Links:</strong> Form fields and links are properly labeled and organized to facilitate
                smooth navigation.</li>
        </ul>

        <h2>Ongoing Efforts</h2>

        <p class="acces-p">We are actively working to maintain, assess, and improve the accessibility of our website. If
            you experience
            any difficulty accessing our content or have suggestions on how we can improve, please
            <a class="acces-link" href="./contact.php">contact us</a>.
        </p>

        <h2>Contact Information</h2>

        <p class="acces-p">If you have any questions or concerns regarding the accessibility of our site, please contact
            us at <a class="acces-link" href="quintanadelrey@email.com">quintanadelrey@email.com</a>. We welcome your
            feedback
            and will do our best to
            address any issues promptly.</p>

        <p class="acces-p">Thank you for visiting Quintana del Rey.</p>
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
                        echo "<a href='../acount.php?id=" . $idsession[0]["id_usuario"] . "'> <li> " . $_SESSION["usr_name"] . " </li></a>";
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

    <script src="./js/funtions.js"></script>


</body>

</html>