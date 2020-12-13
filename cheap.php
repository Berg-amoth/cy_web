<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <?php require 'head.html' ?>

    <body>
        <?php require 'header.html' ?>

        <main>
            <?php require 'side_nav.php' ?>
    
            <section class="products">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2"><h2>Les petits prix</h2></th>
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

                        <tr>
                            <td><img src="img/cheap/1.jpg" alt=""></td>
                            <td>#101</td>
                            <td>La classique</td>
                            <td class="stock">5</td>
                            <td>1,45€</td>
                            <td>
                                <div class="quantite_produit">
                                    <button class="bouton_moins" name="1">-</button>
                                    <p>0</p>
                                    <button class="bouton_plus" name="1">+</button>
                                </div>
                                <button>Ajouter au panier</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><img src="img/cheap/2.jpg" alt=""></td>
                            <td>#102</td>
                            <td>La jaune</td>
                            <td class="stock">4</td>
                            <td>1,49€</td>
                            <td>
                                <div class="quantite_produit">
                                    <button class="bouton_moins" name="2">-</button>
                                    <p>0</p>
                                    <button class="bouton_plus" name="2">+</button>
                                </div>
                                <button>Ajouter au panier</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><img src="img/cheap/3.jpeg" alt=""></td>
                            <td>#103</td>
                            <td>La petite</td>
                            <td class="stock">1</td>
                            <td>1,59€</td>
                            <td>
                                <div class="quantite_produit">
                                    <button class="bouton_moins" name="3">-</button>
                                    <p>0</p>
                                    <button class="bouton_plus" name="3">+</button>
                                </div>
                                <button>Ajouter au panier</button>
                            </td>
                        </tr>
    
                        <tr>
                            <td><img src="img/cheap/4.jpeg" alt=""></td>
                            <td>#104</td>
                            <td>La douce</td>
                            <td class="stock">0</td>
                            <td>1,75€</td>
                            <td>
                                <div class="quantite_produit">
                                    <button class="bouton_moins" name="4">-</button>
                                    <p>0</p>
                                    <button class="bouton_plus" name="4">+</button>
                                </div>
                                <button>Ajouter au panier</button>
                            </td>
                        </tr>
    
                        <tr>
                            <td><img src="img/cheap/5.jpeg" alt=""></td>
                            <td>#105</td>
                            <td>La frite</td>
                            <td class="stock">3</td>
                            <td>1,82€</td>
                            <td>
                                <div class="quantite_produit">
                                    <button class="bouton_moins" name="5">-</button>
                                    <p>0</p>
                                    <button class="bouton_plus" name="5">+</button>
                                </div>
                                <button>Ajouter au panier</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button id="bouton_stock">Afficher le stock</button>
            </section>
        </main>
        
        <?php require 'footer.html' ?>

        <script src="js/produits.js"></script>
    </body>
</html>