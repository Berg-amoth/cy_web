<?php
// Charge le fichier XML
$xml = simplexml_load_file("varSession.inc.xml");

// Cree la variable de session 'categories'
$_SESSION['categories'] = array();

// Ajoute chaque categorie du fichier XML a la variable 'categories'
foreach ($xml->categorie as $cat) {
    $_SESSION['categories'][(string) $cat->attributes()['id']] = array();
    // Ajoute chaque produit a la categorie
    foreach ($cat->produit as $product) {
        $_SESSION['categories'][(string) $cat->attributes()['id']][(string) $product] = array();
        // // Ajoute tous les elements du produit
        foreach ($product->attributes() as $key_a => $value_a) {
            $_SESSION['categories'][(string) $cat->attributes()['id']][(string) $product][(string) $key_a] = (string) $value_a;
        }
    }
}

// var_dump($_SESSION['categories']);

// Version dure de l'ecriture de la variable de session 'categories'
// $_SESSION['categories'] = array(
//     "cheap" => array(
//         "101" => array(
//             "designation" => "La classique",
//             "stock" => 5,
//             "price" => 1.45
//         ),
//         "102" => array(
//             "designation" => "La jaune",
//             "stock" => 4,
//             "price" => 1.49
//         ),
//         "103" => array(
//             "designation" => "La petite",
//             "stock" => 1,
//             "price" => 1.59
//         ),
//         "104" => array(
//             "designation" => "La douce",
//             "stock" => 0,
//             "price" => 1.75
//         ),
//         "105" => array(
//             "designation" => "La frite",
//             "stock" => 3,
//             "price" => 1.82
//         )
//     ),
//     "best_sellers" => array(

//     ),
//     "prime" => array(

//     )
// )
?>