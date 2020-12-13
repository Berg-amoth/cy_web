<?php
    $nom_ok = TRUE;
    $prenom_ok = TRUE;
    $date_ok = TRUE;
    $email_ok = TRUE;
    $genre_ok = TRUE;

// Processing each input
    // NOM
    $nom = trim($_POST['nom']);
    if (!preg_match("#^[A-Z]+$#", $nom)) {
        $nom_ok = FALSE;
        echo "nom non";
    }

    // PRENOM
    $prenom = trim($_POST['prenom']);
    if (!preg_match("#^[A-Z][a-z]+$#", $prenom)) {
        $prenom_ok = FALSE;
        echo "prenom non";
    }

    // DATE DE NAISSANCE
    $date = intval($_POST['naissance']);
    if ($date > date("Y")-6 || $date < date("Y")-122) {
        $date_ok = FALSE;
        echo "date non";
    }

    // EMAIL
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_ok = FALSE;
        echo "email non";
    }

    // GENRE
    $genre = $_POST['genre'];
    if ($genre != "homme" && $genre != "femme" && $genre != "nspp") {
        $genre_ok = FALSE;
        echo "genre non";
    }

    // OBJET
    $objet = trim($_POST['objet']);

    // MESSAGE
    $message = trim($_POST['contact_text']);

    // ENVOIE DU MAIL
    if ($genre_ok && $email_ok && $date_ok && $prenom_ok && $nom_ok) {
        $headers = 'From: ' . $prenom . ' ' . $nom . ' <' . $email . ">\r\n";
        $headers .= 'Reply-To: ' . $email . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        echo $headers;
        var_dump(mail("trash.for.projects@gmail.com",$objet,$message,$headers));
    }
?>