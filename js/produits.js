// Permet d'afficher ou de masquer le stock
// Passe tous les elements de la colonne de none a table-cell et inversement
function afficher_masquer() {
    switch (stock_affiche) {
        case false:
            for (var i = 0; i < colonne_stock.length; i++) {
                colonne_stock[i].style.display = "table-cell";
            }
            stock_affiche = true;
            bouton_stock.innerHTML = "Masquer le stock";
            break;
        case true:
            for (var i = 0; i < colonne_stock.length; i++) {
                colonne_stock[i].style.display = "none";
            }
            stock_affiche = false;
            bouton_stock.innerHTML = "Afficher le stock"
            break;
        default:
            console.log('Houston, on a un probleme !');
    }
}

// Permet de changer les quantites, change l'affichage de la page mais egalement le
// tableau dans lequel les valeurs sont stockees
function enlever_produit() {
    $id = parseInt(this.getAttribute("name"));
    // Modifie la valeur
    tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] = tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] - 1;
    this.parentElement.getElementsByTagName("p")[0].innerHTML = tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1];
    // Desactive le bouton moins si on arrive a zero
    if (tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] == 0) {
        this.disabled = true;
    }
    // Reactive le bouton si on en a moins que le stock disponible
    if (tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] < parseInt(document.getElementById($id).innerHTML)) {
        this.parentElement.getElementsByClassName("bouton_plus")[0].disabled = false;
    }
    console.log(tableau_quantites);
}

function ajouter_produit() {
    $id = parseInt(this.getAttribute("name"));
    tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] = tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] + 1;
    this.parentElement.getElementsByTagName("p")[0].innerHTML = tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1];
    // Desactive le bouton plus si on arrive a la quantite disponible
    if (tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] == parseInt(document.getElementById($id).innerHTML)) {
        this.disabled = true;
    }
    // Reactive le bouton si on en a plus (+) qu'un
    if (tableau_quantites[parseInt(this.getAttribute("name").slice(2)) - 1] > 0) {
        this.parentElement.getElementsByClassName("bouton_moins")[0].disabled = false;
    }
    console.log(tableau_quantites);
}

function getXhr(){
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else {
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
    }
    return NULL;
}

function commander_produit() {
    var xhr = getXhr();
    $this = this;
    $id = parseInt(this.getAttribute("name"));
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            reponse = xhr.responseText;
            document.getElementById($id).innerHTML = reponse;
            $this.parentElement.getElementsByTagName("p")[0].innerHTML = 0;
            $this.parentElement.getElementsByClassName("bouton_moins")[0].disabled = true;
            tableau_quantites[parseInt(($this.getAttribute("name")).slice(2)) - 1] = 0;
            if (reponse == 0) {
                $this.disabled = true;
            }
        }
    }
    xhr.open("POST", "php/change_stock.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf-8');
    xhr.send("id="+$id+"&wanted="+parseInt(this.parentElement.getElementsByTagName("p")[0].innerHTML));
}

// Initialisation des variables & lien des fonctions et des elements de la page
var stock_affiche = false;
var tableau_quantites = [];
var colonne_stock = document.getElementsByClassName('stock');
var tableau_stocks = [];
// Initialisation du tableau des stocks
for (let i = 1; i < colonne_stock.length; i++) {
    tableau_stocks[i-1] = parseInt(colonne_stock[i].innerHTML);
}
// Lien des fonctions et des boutons
document.getElementById('bouton_stock').addEventListener("click", afficher_masquer);
const bouton_moins = document.getElementsByClassName('bouton_moins');
for (var i = 0; i < bouton_moins.length; i++) {
    bouton_moins[i].addEventListener("click", enlever_produit);
    // Initialisation du tableau des quantites a zero. Cette action n'est effectuee que pour un bouton sur deux (les moins et non les plus)
    tableau_quantites.push(parseInt(bouton_moins[i].parentElement.getElementsByTagName("p")[0].innerHTML));
    if (tableau_quantites[i] == 0) {
        bouton_moins[i].disabled = true;
    }
}
const bouton_plus = document.getElementsByClassName('bouton_plus');
for (var i = 0; i < bouton_plus.length; i++) {
    bouton_plus[i].addEventListener("click", ajouter_produit);
    if (tableau_quantites[i] == tableau_stocks[i]) {
        bouton_plus[i].disabled = true;
    }
}
const bouton_commander = document.getElementsByClassName('bouton_commander');
for (var i = 0; i < bouton_commander.length; i++) {
    bouton_commander[i].addEventListener("click", commander_produit);
    if (tableau_stocks[i] == 0) {
        bouton_commander[i].disabled = true;
    }
}