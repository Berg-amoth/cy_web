<!DOCTYPE html>
<html>
    <?php require 'head.html' ?>

    <body>
        <?php require 'header.html' ?>

        <main>
            <?php require 'php/side_nav.php' ?>
    
            <section class="products">
                <table>
                    <thead>
                        <tr>
                            <?php echo "<th colspan=\"2\"><h2>" . str_replace('_', ' ', $_GET["cat"]) . "</h2></th>" ?>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><h4>Photo</h4></td>
                            <td><h4>R&eacute;f&eacute;rence</h4></td>
                            <td><h4>D&eacute;signation</h4></td>
                            <td class="stock"><h4>Stock disponible (kg)</h4></td>
                            <td><h4>Prix</h4></td>
                            <td><h4>Quantit&eacute; command&eacute;e</h4></td>
                        </tr>

                        <?php
                            require_once 'php/sqlconnect.php';
                            $cat = $_GET['cat'];
                            $stmt = $connection->prepare("SELECT * FROM produit WHERE categorie LIKE '$cat'");
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            while ($product = $stmt->fetch()) {
                                echo "<tr><td><img src=\"img/" . $_GET["cat"] . "/" . $product['id'] . ".jpg\" alt=\"\"></td>";
                                echo "<td>#" . $product['id'] . "</td>";
                                echo "<td>" . $product["designation"] . "</td>";
                                echo "<td class=\"stock\" id=\"" . $product['id'] . "\">" . $product["stock"] . "</td>";
                                echo "<td>" . $product["price"] . " €</td>";
                                echo "<td><div class=\"quantite_produit\"><button class=\"bouton_moins\" name=" . $product['id'] . ">-</button><p>0</p><button class=\"bouton_plus\" name=" . $product['id'] . ">+</button></div><button class=\"bouton_commander\" name=\"" . $product['id'] . "\">Commander</button></td></tr>";
                            }
                        ?>                        
                    </tbody>
                </table>

                <button id="bouton_stock">Afficher le stock</button>
            </section>
        </main>
        
        <?php require 'footer.html' ?>

        <script src="js/produits.js"></script>
    </body>
</html>