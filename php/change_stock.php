<?php
    // Connection to database
    require_once 'sqlconnect.php';

    // Retrieving data (product id and desired number of this product)
    $id = $_POST['id'];
    $wanted = $_POST['wanted'];
    
    // Compute new stock
    $stmt = $connection->prepare("SELECT stock FROM produit WHERE id LIKE '$id'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $old_stock = $stmt->fetch();
    $new_stock = $old_stock['stock'] - $wanted;

    // Insert new stock in database
    $stmt = $connection->prepare("UPDATE produit SET stock = $new_stock WHERE id LIKE '$id'");
    $stmt->execute();

    // Return new stock to update
    echo $new_stock;
?>