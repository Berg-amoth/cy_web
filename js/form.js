// Variables et constantes
const nom = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const naissance = document.getElementById("naissance");
const email = document.getElementById("email");
const submit = document.getElementById("submit");


nom.addEventListener("keyup", function(event) {
    if (nom.validity.patternMismatch) {
        nom.setCustomValidity("Veuillez entrer votre nom en un seul mot et en majuscules");
    }
    else {
        nom.setCustomValidity("");
    }
});

prenom.addEventListener("keyup", function(event) {
    if (prenom.validity.patternMismatch) {
        prenom.setCustomValidity("Veuillez entrer votre prenom en un seul mot, commençant par une majuscule suivie de minuscule(s)");
    }
    else {
        prenom.setCustomValidity("");
    }
});

email.addEventListener("keyup", function(event) {
    if (email.validity.typeMismatch) {
        email.setCustomValidity("Veuillez entrer votre email contenant une partie locale (ex : 'jeannot'), le separateur '@', ainsi qu'un nom de domaine correct (ex : 'exemple.net'");
    }
    else {
        email.setCustomValidity("");
    }
});

// Verifie que l'utilisateur ai entre 6 et 1
submit.addEventListener("click", function(event) {
    let annee_actuelle = new Date().getFullYear();
    if (naissance.value.split("-")[0] > annee_actuelle - 6 || naissance.value.split("-")[0] < annee_actuelle - 122) {
        naissance.setCustomValidity("Vous devez avoir entre 6 et 122 ans pour utiliser ce site !");
    }
    else {
        naissance.setCustomValidity("");
    }
});

