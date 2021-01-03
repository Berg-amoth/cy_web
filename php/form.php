<?php
    $nom_ok = TRUE;
    $prenom_ok = TRUE;
    $date_ok = TRUE;
    $email_ok = TRUE;
    $genre_ok = TRUE;
    $metier_ok = TRUE;
    $objet_ok = TRUE;
    $message_ok = TRUE;

// Processing each input
    // NOM
    $nom = trim($_POST['nom']);
    if (!preg_match("#^[A-Z]+$#", $nom)) {
        $nom_ok = FALSE;
        // echo "nom non";
    }

    // PRENOM
    $prenom = trim($_POST['prenom']);
    if (!preg_match("#^[A-Z][a-z]+$#", $prenom)) {
        $prenom_ok = FALSE;
        // echo "prenom non";
    }

    // DATE DE NAISSANCE
    $date = $_POST['naissance'];
    if (intval($date) > date("Y")-6 || intval($date) < date("Y")-122) {
        $date_ok = FALSE;
        // echo "date non";
    }

    // EMAIL
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_ok = FALSE;
        // echo "email non";
    }

    // GENRE
    $genre = $_POST['genre'];
    if ($genre != "homme" && $genre != "femme" && $genre != "nspp") {
        $genre_ok = FALSE;
    }

    // METIER
    $metier = $_POST['metier'];
    if ($metier != "fournisseur" && $metier != "restaurateur" && $metier != "particulier") {
        $metier_ok = FALSE;
    }

    // OBJET
    $objet = trim($_POST['objet']);
    if ($objet == "") {
        $objet_ok = FALSE;
    }

    // MESSAGE
    $message = trim($_POST['contact_text']);
    if ($message == "") {
        $message_ok = FALSE;
    }

    // ENVOIE DU MAIL
    if ($genre_ok && $email_ok && $date_ok && $prenom_ok && $nom_ok && $objet_ok && $message_ok && $metier_ok) {
        header("Refresh: 0; url=../contact.php?answer");
    }
    else {
        $header_content = "Refresh: 0; url=../contact.php?";
        if (!$metier_ok) {
            $header_content .= "metier=ko";
        }
        else {
            $header_content .= "metier=" . $metier;
        }
        if (!$genre_ok) {
            $header_content .= "&genre=ko";
        }
        else {
            $header_content .= "&genre=" . $genre;
        }
        if (!$email_ok) {
            $header_content .= "&email=ko";
        }
        else {
            $header_content .= "&email=" . $email;
        }
        if (!$date_ok) {
            $header_content .= "&date=ko";
        }
        else {
            $header_content .= "&date=" . $date;
        }
        if (!$prenom_ok) {
            $header_content .= "&prenom=ko";
        }
        else {
            $header_content .= "&prenom=" . $prenom;
        }
        if (!$nom_ok) {
            $header_content .= "&nom=ko";
        }
        else {
            $header_content .= "&nom=" . $nom;
        }
        if (!$objet_ok) {
            $header_content .= "&objet=ko";
        }
        else {
            $header_content .= "&objet=" . $objet;
        }
        if (!$message_ok) {
            $header_content .= "&message=ko";
        }
        else {
            $header_content .= "&message=" . $message;
        }

        header($header_content);
    }
?>