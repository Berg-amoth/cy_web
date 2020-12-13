<?php
// Charge le fichier XML
$xml = simplexml_load_file("varSession.inc.xml");

// Cree la variable de session 'categories'
$_SESSION['categories'] = array();

// Ajoute chaque categorie du fichier XML a la variable 'categories'
foreach ($xml->categorie as $cat) {
    $_SESSION['categories'][(string) $cat->attributes()['id']] = array();
    // var_dump($_SESSION['categories'][(string) $cat->attributes()['id']]);
    // Ajoute chaque produit a la categorie
    foreach ($cat->product as $product) {
        $_SESSION['categories'][(string) $cat->attributes()['id']][(string) $product] = array();
        // // Ajoute tous les elements du produit
        foreach ($product->attributes() as $key_a => $value_a) {
            $_SESSION['categories'][(string) $cat->attributes()['id']][(string) $product][(string) $key_a] = (string) $value_a;
        }
    }
}
?>