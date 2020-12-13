<nav>
    <!-- <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="cheap.php">Le meilleur go&ucirc;t &agrave; petit prix</a></li>
        <li><a href="best_sellers.html">Les meilleures ventes</a></li>
        <li><a href="prime.html">Nos produits d'excellence</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul> -->
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php
            
            foreach ($_SESSION["categories"] as $key => $value) {
                echo "<li><a href=\"products.php?cat=" . $key . "\">" . $key . "</a></li>";
            }
        ?>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>