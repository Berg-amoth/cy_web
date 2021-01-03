<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php
            require_once 'sqlconnect.php';
            
            $stmt = $connection->prepare("SELECT DISTINCT categorie FROM produit");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($cat = $stmt->fetch()) {
                echo "<li><a href=\"products.php?cat=" . $cat['categorie'] . "\">" . str_replace('_', ' ', $cat['categorie']) . "</a></li>";
            }
        ?>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>