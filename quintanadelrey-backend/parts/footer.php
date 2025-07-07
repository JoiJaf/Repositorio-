<footer class="footer">
    <div class="footer-layout">
        <div class="logo">
            <a href="index.php">
                <img class="logo-footer" src="./img/graphic-identifier.png" alt="graphic-identifier">
            </a>
        </div>

        <div class="links">
            <h2 class="footer-title">
                about us
            </h2>
            <ul class="footer-links">
                <a href="./about us/term.php">
                    <li>Reservation rules and policies</li>
                </a>
                <a href="./about us/acces.php">
                    <li>Accessibility</li>
                </a>
                <a href="./about us/term.php">
                    <li>About us</li>
                </a>

                <?php

                if (isset($_SESSION["isLoggedIn"])) {
                    echo "<a href='./acount.php?id=" . $idsession[0]["id_usuario"] . "'> <li> " . $_SESSION["usr_name"] . " </li></a>";
                }
                ?>

                </a>
                <a href="./about us/contact.php">
                    <li>Contact Us</li>
                </a>
                <a href="./about us/help.php">
                    <li>Help</li>
                </a>
                <a href="">
                    <li>Download our mobile app</li>
                </a>
            </ul>
            <div class="download-app">
                <a href="https://www.apple.com/la/app-store/">
                    <img src="./img/app-store.png" alt="app-store">
                </a>
                <a href="https://play.google.com/store/">
                    <img src="./img/google-play.png" alt="google-play">
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
                <a href="https://www.facebook.com/?locale=es_LA"><img src="./img/facebook-link.png" alt="facebook"></a>
                <a href="https://www.instagram.com/"><img src="./img/instagram-link.png" alt="instagram"></a>
                <a href="https://www.whatsapp.com/?lang=es_LA"><img src="./img/whatsApp-link.png" alt="whatsApp"></a>
                <a href="https://twitter.com/?lang=es"><img src="./img/twitter-link.png" alt="twitter"></a>
            </div>


        </div>




    </div>

    <p class="text-end">
        © All rights reserved. Quintana del rey 2023
    </p>
</footer>