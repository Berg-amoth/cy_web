<?php
session_start();
?>

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
                            <?php echo "<th colspan=\"2\"><h2>" . $_GET["cat"] . "</h2></th>" ?>
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
                        require "php/varSession.inc.php";
                            foreach ($_SESSION["categories"][$_GET["cat"]] as $key => $value) {
                                echo "<tr><td><img src=\"img/" . $_GET["cat"] . "/" . $key . ".jpg\" alt=\"\"></td>";
                                echo "<td>#" . $key . "</td>";
                                echo "<td>" . $value["designation"] . "</td>";
                                echo "<td class=\"stock\">" . $value["stock"] . "</td>";
                                echo "<td>" . $value["price"] . " €</td>";
                                echo "<td><div class=\"quantite_produit\"><button class=\"bouton_moins\" name=" . $key . ">-</button><p>0</p><button class=\"bouton_plus\" name=" . $key . ">+</button></div><button>Ajouter au panier</button></td></tr>";
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