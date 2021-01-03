<?php
    try {
        $connection = new PDO("mysql:host=localhost; dbname=cartoufles",'root','');
    } catch (PDOException $e) {
        echo("Erreur de connexion : " . $e->getMessage());
        exit();
    }
?>