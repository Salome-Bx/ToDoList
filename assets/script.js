
//Récupération de tous les champs email et mdp
// let email_connexion = document.querySelector('#Email_User_Connexion').value;
// let mdp_connexion = document.querySelector('#Mdp_User_Connexion').value;

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


// Récupération contenu tâche
let descriptionTache = document.querySelector(".descriptionTache");
let titreTache = document.querySelector(".titreTache");
let dateTache = document.querySelector(".dateTache");
let btnTermine = document.querySelector(".btnTermine");
let btnAFaire = document.querySelector(".btnAFaire");


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

// Gestion tâche temrinée / à faire

btnTermine.addEventListener("click", function () {
    descriptionTache.classList.add("line-through");
    titreTache.classList.add("line-through");
    dateTache.classList.add("line-through");
});

btnAFaire.addEventListener("click", function () {
    descriptionTache.classList.remove("line-through");
    titreTache.classList.remove("line-through");
    dateTache.classList.remove("line-through");
});

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

    if (email_connexion == "" || mdp_connexion == "") {
        document.querySelector(".messageErreur").innerText = `Merci de mettre un numéro de téléphone valide.`;
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
        .then((data) => {
            console.log(data.status);
            if (data.status === "succes") {
                modalConnexion.classList.add("hidden");
                modalToDoList.classList.remove("hidden");
                btnCompteHeader.classList.remove("hidden");
            }
            else if (data.status === "erreur") {
                document.querySelector(".messageErreur").innerText = `Le mot de passe est erroné`;
            };

        })

}
// Récupération informations formulaire inscription

function userInscription() {

    let prenom_inscription = document.querySelector('#Prenom_User_Inscription').value;
    let nom_inscription = document.querySelector('#Nom_User_Inscription').value;
    let email_inscription = document.querySelector('#Email_User_Inscription').value;
    let mdp_inscription = document.querySelector('#Mdp_User_Inscription').value;



    let infosInscription = {
        prenom_user: prenom_inscription,
        nom_user: nom_inscription,
        email_user: email_inscription,
        mdp_user: mdp_inscription,
        inputInscription: true


    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(infosInscription),
    };
    console.log(infosInscription);

    fetch("./traitement.php", params)
        .then((res) => res.text())
        .then((data) => console.log(data));



}

// Récupération infos tâche

function addTask() {

    let titre_task = document.querySelector("#Titre_Task").value;
    let description_task = document.querySelector("#Description_Task").value;
    let date_task = document.querySelector("#Date_Task").value;
    let nom_priority = document.querySelector("#Id_Priority").value;
    let nom_category = document.querySelector("#Category").value;


    let btnAjouterTaches = {
        Titre_Task: titre_task,
        Description_Task: description_task,
        Date_Task: date_task,
        Nom_Priority: nom_priority,
        Nom_Category: nom_category,
        btnAjouterTaches: true


    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(btnAjouterTaches),
    };
    console.log(btnAjouterTaches);

    fetch("./traitement.php", params)
        .then((res) => res.text())
        .then((data) => console.log(data));



}




