
//Récupération de tous les champs email et mdp
let email_connexion = document.querySelector('#Email_User_Connexion').value;
let mdp_connexion = document.querySelector('#Mdp_User_Connexion').value;

let email_inscription = document.querySelector('#Email_User_Inscription').value;
let mdp_inscription = document.querySelector('#Mdp_User_Inscription').value;
let mdp_inscription2 = document.querySelector('#Mdp_User_Inscription2').value;

// let email_informations = document.querySelector('#Email_User_Informations').value;
// let mdp_informations = document.querySelector('#Mdp_User_Informations').value;
// let mdp_informations2 = document.querySelector('#Mdp_User_Informations2').value;

let email_modif_informations = document.querySelector('#Email_User_Modifier_Informations').value;
let mdp_modif_informations = document.querySelector('#Mdp_User_Modifier_Informations').value;
let mdp_modif_informations2 = document.querySelector('#Mdp_User_Modifier_Informations2').value;


// Récupération de tous les champs nom et prénom 
let nom_inscription = document.querySelector('#Nom_User_Inscription').value;
let prenom_inscription = document.querySelector('#Prenom_User_Inscription').value;

let nom_informations = document.querySelector("#Nom_User_Informations").value;
let prenom_informations = document.querySelector("#Prenom_User_Informations").value;

let nom_modif_informations = document.querySelector("#Nom_User_Modifier_Informations").value;
let prenom_modif_informations = document.querySelector("#Prenom_User_Modifier_Informations").value;


// Récupération de tous les champs de la ToDoList
let titre_task = document.querySelector("#Titre_Task").value;
let description_task = document.querySelector("#Description_Task").value;
let date_task = document.querySelector("#Date_Task").value;
let id_priority = document.querySelector("#Id_Priority").value;
let category = document.querySelector("#Category").value;


// Récupération de toutes les modales
let modalToDoList = document.querySelector("#modalToDoList");
let modalConnexion = document.querySelector("#modalConnexion");
let modalInscription = document.querySelector("#modalInscription");
let modalInformations = document.querySelector("#modalInformations");
let modalModifierInformations = document.querySelector("#modalModifierInformations");


// Récupération de tous les boutons
let btnAjouterTaches = document.querySelector("#btnAjouterTaches");
let btnConnexion = document.querySelector("#btnConnexion");
let btnCreerCompte = document.querySelector("#btnCreerCompte");
let btnValidationInscription = document.querySelector("#btnValidationInscription");
let btnModifierInformations = document.querySelector("#btnModifierInformations");
let btnSupprimerInformations = document.querySelector("#btnSupprimerInformations");
let btnValiderModificationInformations = document.querySelector("#btnValiderModificationInformations");
let btnCompteHeader = document.querySelector("#btnCompteHeader");






// Gestion affichage modales

btnValidationInscription.addEventListener("click", function () {
    modalInscription.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
    btnCompteHeader.classList.remove("hidden");
});

function blocAAfficherOuCacher(blocACacher, blocAAfficher) {

    blocACacher.classList.add("hidden");
    blocAAfficher.classList.remove("hidden");
}



// Récupération identifiants connexion

function handleLoginConnexion() {

    let email_connexion = document.querySelector('#Email_User_Connexion').value;
    let mdp_connexion = document.querySelector('#Mdp_User_Connexion').value;

    let modalToDoList = document.querySelector("#modalToDoList");
    let modalConnexion = document.querySelector("#modalConnexion");
    let btnCompteHeader = document.querySelector("#btnCompteHeader");

    let emailCrendentials = {
        email: email_connexion,
        password: mdp_connexion,
    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(emailCrendentials),
    };

    fetch("./login.php", params)
        .then((res) => res.text())
        .then((data) => console.log(data));

    modalConnexion.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
    btnCompteHeader.classList.remove("hidden");

}






