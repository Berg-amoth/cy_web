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

            <section class="full_width">
                <h2>Une question ? Une remarque ? Contactez nous !</h2>

                <form method="POST" action="php/form.php" id="contact_form">
                    <!-- Without pattern or required options to test php processing -->
                    <h3 id="txt_nom">Nom</h3>
                    <?php
                    // NOM
                    if (isset($_GET['nom'])) {
                        if ($_GET['nom'] != "ko"){
                            echo "<input class=\"form_txt\" id=\"nom\" type=\"text\" name=\"nom\" id=\"nom\" value=\"" . $_GET['nom'] . "\">";
                        }
                        else {
                            echo "<input class=\"form_txt\" id=\"nom\" type=\"text\" name=\"nom\" id=\"nom\" placeholder=\"NOM : EN MAJUSCULES\" style=\"background-color:red;\">";
                        }
                    }
                    else {
                        echo "<input class=\"form_txt\" id=\"nom\" type=\"text\" name=\"nom\" id=\"nom\" placeholder=\"NOM\">";
                    }

                    // PRENOM
                    if (isset($_GET['prenom'])) {
                        if ($_GET['prenom'] != "ko"){
                            echo "<input class=\"form_txt\" id=\"prenom\" type=\"text\" name=\"prenom\" id=\"prenom\" value=\"" . $_GET['prenom'] . "\">";
                        }
                        else {
                            echo "<input class=\"form_txt\" id=\"prenom\" type=\"text\" name=\"prenom\" id=\"prenom\" placeholder=\"Prenom : Une maj -> minuscules\" style=\"background-color:red;\">";
                        }
                    }
                    else {
                        echo "<input class=\"form_txt\" id=\"prenom\" type=\"text\" name=\"prenom\" id=\"prenom\" placeholder=\"Prenom\">";
                    }
                    ?>

                    <!-- DATE DE NAISSANCE -->
                    <h3 id="txt_naissance">Date de naissance</h3>
                    <?php
                    if (isset($_GET['date'])) {
                        if ($_GET['date'] != "ko") {
                            echo "<input class=\"form_txt\" id=\"naissance\" type=\"date\" name=\"naissance\" value=\"" . $_GET['date'] . "\">";
                        }
                        else {
                            echo "<input class=\"form_txt\" id=\"naissance\" type=\"date\" name=\"naissance\" style=\"background-color:red;\">";
                        }
                    }
                    else {
                        echo "<input class=\"form_txt\" id=\"naissance\" type=\"date\" name=\"naissance\">";
                    }
                    ?>
                    
                    <!-- EMAIL -->
                    <h3 id="txt_email">Email</h3>
                    <?php
                        if (isset($_GET['email'])) {
                            if ($_GET['email'] != "ko"){
                                echo "<input class=\"form_txt\" id=\"email\" type=\"email\" name=\"email\" id=\"email\" value=\"" . $_GET['email'] . "\">";
                            }
                            else {
                                echo "<input class=\"form_txt\" id=\"email\" type=\"email\" name=\"email\" id=\"email\" placeholder=\"votremail@domaine.fr\" style=\"background-color:red;\">";
                            }
                        }
                        else {
                            echo "<input class=\"form_txt\" id=\"email\" type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email pour vous répondre\">";
                        }
                    ?>
                    
                    
                    <h3 id="txt_genre">Genre</h3>
                    <div id="genre">
                        <div>
                            <input type="radio" id="homme" name="genre" value="homme">
                            <label for="homme">Homme</label>
                        </div>
                        <div>
                            <input type="radio" id="femme" name="genre" value="femme">
                            <label for="femme">Femme</label>
                        </div>
                        <div>
                            <input type="radio" id="nspp" name="genre" value="nspp">
                            <label for="nspp">Ne se prononce pas</label>
                        </div>
                    </div>

                    <h3 id="txt_metier">Metier</h3>
                    <select name="metier" id="metier">
                        <option value="fournisseur">Fournisseur</option>
                        <option value="restaurateur">Restaurateur</option>
                        <option value="particulier">Particulier</option>
                    </select>
                    
                    
                   
                    <h3 id="txt_message">Votre message</h3>
                    <input class="form_txt" type="text" id="objet" name="objet" placeholder="Objet">
                    <textarea name="contact_text" id="contact_text" cols="2" rows="6" form="contact_form" placeholder="Posez votre question ici"></textarea>
                    <input id="submit" type="submit" value="envoyer">
                </form>

                <!-- <form method="POST" action="php/form.php" id="contact_form">
                    
                    <h3 id="txt_nom">Nom</h3>
                    <input class="form_txt" id="nom" type="text" name="nom" id="nom" placeholder="NOM" pattern="[A-Z]+" required>
                    <input class="form_txt" id="prenom" type="text" name="prenom" id="prenom" placeholder="Prenom" pattern="[A-Z][a-z]+" required>
                    <h3 id="txt_naissance">Date de naissance</h3>
                    <input class="form_txt" id="naissance" type="date" name="naissance" id="naissance" required>
                    <h3 id="txt_email">Email</h3>
                    <input class="form_txt" id="email" type="email" name="email" id="email" placeholder="Email pour vous répondre" required>
                    
                    <h3 id="txt_genre">Genre</h3>
                    <div id="genre">
                        <div>
                            <input type="radio" id="homme" name="genre" value="homme" required>
                            <label for="homme">Homme</label>
                        </div>
                        <div>
                            <input type="radio" id="femme" name="genre" value="femme">
                            <label for="femme">Femme</label>
                        </div>
                        <div>
                            <input type="radio" id="nspp" name="genre" value="nspp">
                            <label for="nspp">Ne se prononce pas</label>
                        </div>
                    </div>

                    <h3 id="txt_metier">Metier</h3>
                    <select name="metier" id="metier">
                        <option value="fournisseur">Fournisseur</option>
                        <option value="restaurateur">Restaurateur</option>
                        <option value="particulier">Particulier</option>
                    </select>
                    
                    
                   
                    <h3 id="txt_message">Votre message</h3>
                    <input class="form_txt" type="text" id="objet" name="objet" placeholder="Objet" required>
                    <textarea name="contact_text" id="contact_text" cols="2" rows="6" form="contact_form" placeholder="Posez votre question ici" required></textarea>
                    <input id="submit" type="submit" value="envoyer">
                </form> -->
            </section>
        </main>
        
        <?php require 'footer.html' ?>

        <!-- <script src="js/form.js"></script> -->
    </body>
</html>