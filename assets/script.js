
//Création webRoot
// Get the current script element
const scripts = document.getElementsByTagName("script");
const currentScript = scripts[scripts.length - 1];

// Get the src attribute of the script
const scriptSrc = currentScript.src;

// Derive the web root from the script src
const webRoot = scriptSrc.substring(0, scriptSrc.lastIndexOf("/assets"));



//Récupération de tous les champs email et mdp


let email_inscription = document.querySelector("#Email_User_Inscription").value;
let mdp_inscription = document.querySelector("#Mdp_User_Inscription").value;
let mdp_inscription2 = document.querySelector("#Mdp_User_Inscription2").value;



let email_modif_informations = document.querySelector("#Email_User_Modifier_Informations").value;
let mdp_modif_informations = document.querySelector("#Mdp_User_Modifier_Informations").value;
let mdp_modif_informations2 = document.querySelector("#Mdp_User_Modifier_Informations2").value;

// Récupération de tous les champs nom et prénom
let nom_inscription = document.querySelector("#Nom_User_Inscription").value;
let prenom_inscription = document.querySelector("#Prenom_User_Inscription").value;

let nom_informations = document.querySelector("#Nom_User_Informations").value;
let prenom_informations = document.querySelector("#Prenom_User_Informations").value;

let nom_modif_informations = document.querySelector("#Nom_User_Modifier_Informations").value;
let prenom_modif_informations = document.querySelector("#Prenom_User_Modifier_Informations").value;

// Récupération de tous les champs de la ToDoList
let titre_task = document.querySelector("#Titre_Task").value;
let description_task = document.querySelector("#Description_Task").value;
let date_task = document.querySelector("#Date_Task").value;
let id_priority = document.querySelector("#Id_Priority").value;
const categories = document.getElementsByClassName("checkbox");

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




// Gestion tâche terminée / à faire
if (btnTermine) {
    btnTermine.addEventListener("click", function () {
        descriptionTache.classList.add("line-through");
        titreTache.classList.add("line-through");
        dateTache.classList.add("line-through");
    });
}

if (btnAFaire) {
    btnAFaire.addEventListener("click", function () {
        descriptionTache.classList.remove("line-through");
        titreTache.classList.remove("line-through");
        dateTache.classList.remove("line-through");
    });
}

// Récupération identifiants connexion

async function handleLoginConnexion() {
    let email_connexion = document.querySelector("#Email_User_Connexion").value;
    let mdp_connexion = document.querySelector("#Mdp_User_Connexion").value;


    if (email_connexion == "" || mdp_connexion == "") {
        document.querySelector(
            ".messageErreur"
        ).innerText = "Merci de remplir tous les champs";
    }

    setTimeout(function () {
        document.querySelector(".messageErreur").innerText = "";
    }, 2000);



    let emailCrendentials = {
        email: email_connexion,
        password: mdp_connexion,
    };
    console.log(emailCrendentials);

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(emailCrendentials),
    };
    const url = `${webRoot}/login.php`;
    fetch(url, params)
        .then((res) => res.text())
        .then((data) => {
            let jsonData = JSON.parse(data);
            if (jsonData && jsonData.status) {
                // Check status property while considering possible encoding differences
                if (jsonData.status.trim().toLowerCase() === "succes") {
                    // Handle success
                    modalConnexion.classList.add("hidden");
                    modalToDoList.classList.remove("hidden");
                    btnCompteHeader.classList.remove("hidden");
                } else if (jsonData.status.trim().toLowerCase() === "erreur") {
                    // Handle error
                    document.querySelector(".messageErreur").innerText =
                        "Le mot de passe est erroné";
                    setTimeout(function () {
                        document.querySelector(".messageErreur").innerText = "";
                    }, 2000);
                }
            } else {
                // Handle the case where data or data.status is not defined
                console.error("Invalid data received from server:", data);
            }
        });
}


// Récupération informations formulaire inscription

async function userInscription() {
    let prenom_inscription = document.querySelector("#Prenom_User_Inscription").value;
    let nom_inscription = document.querySelector("#Nom_User_Inscription").value;
    let email_inscription = document.querySelector("#Email_User_Inscription").value;
    let mdp_inscription = document.querySelector("#Mdp_User_Inscription").value;


    if (prenom_inscription == "" || nom_inscription == "" || email_inscription == "" || mdp_inscription) {
        document.querySelector(".messageErreur").innerText = "Merci de remplir tous les champs";
        if (mdp_inscription.length > 5 && mdp_inscription2.length > 5) {
            document.querySelector(".messageErreur").innerText = "Le mot de passe doit contenir 6 caractères minimum";
            if (mdp_inscription != mdp_inscription2) {
                document.querySelector(".messageErreur").innerText = "Les mot de passes ne sont pas identiques";
            }
        }

    }

    setTimeout(function () {
        document.querySelector(".messageErreur").innerText = "";
    }, 2000);



    let infosInscription = {
        prenom_user: prenom_inscription,
        nom_user: nom_inscription,
        email_user: email_inscription,
        mdp_user: mdp_inscription,
        inputInscription: true,
    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(infosInscription),
    };
    console.log(infosInscription);
    const url = `${webRoot}/traitementUser.php`;
    fetch(url, params)
        .then((res) => res.text())
        .then((data) => {
            let jsonData = JSON.parse(data);
            if (jsonData && jsonData.status) {
                // Check status property while considering possible encoding differences
                if (jsonData.status.trim().toLowerCase() === "succes") {
                    // Handle success
                    document.querySelector(".messageErreur").innerText = jsonData.message;
                } else if (jsonData.status.trim().toLowerCase() === "erreur") {
                    // Handle error
                    document.querySelector(".messageErreur").innerText = jsonData.message;
                }
            } else {
                // Handle the case where data or data.status is not defined
                console.error("Invalid data received from server:", data);
            }
        });
}






// Récupération infos tâche

async function addTask() {
    let titre_task = document.querySelector("#Titre_Task").value;
    let description_task = document.querySelector("#Description_Task").value;
    let date_task = document.querySelector("#Date_Task").value;
    let id_priority = document.querySelector("#Id_Priority").value;

    function getValueCategory() {
        let arrayCat = [];
        for (index = 0; index <= 3; index++) {
            if (categories[index].checked) {
                arrayCat.push(categories[index].value);
            }
        }
        return arrayCat;
    }

    let arrayCategories = getValueCategory();

    let btnAjouterTaches = {
        Titre_Task: titre_task,
        Description_Task: description_task,
        Date_Task: date_task,
        Id_Priority: id_priority,
        Array_Category: arrayCategories,
        btnAjouterTaches: true,
    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(btnAjouterTaches),
    };

    const url = `${webRoot}/traitementTask.php`;
    fetch(url, params)
        .then((res) => res.text())
        .then((data) => {
            let jsonData = JSON.parse(data);
            if (jsonData && jsonData.status) {
                // Check status property while considering possible encoding differences
                if (jsonData.status.trim().toLowerCase() === "succes") {
                    // Handle success

                } else if (jsonData.status.trim().toLowerCase() === "erreur") {
                    // Handle error
                    document.querySelector(".messageErreur").innerText = jsonData.message;
                }
            } else {
                // Handle the case where data or data.status is not defined
                console.error("Invalid data received from server:", data);
            }
        });



}

async function deleteTask(id) {

    let recupIDTask = {
        id: id,
    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(recupIDTask),
    };

    const url = `${webRoot}/delete_task.php`;
    fetch(url, params)
        .then((res) => res.text())
        .then((data) => {
            console.log(data);
            // let jsonData = JSON.parse(data);
            // if (jsonData && jsonData.status) {
            //     // Check status property while considering possible encoding differences
            //     if (jsonData.status.trim().toLowerCase() === "succes") {
            //         // Handle success

            //     } else if (jsonData.status.trim().toLowerCase() === "erreur") {
            //         // Handle error
            //         document.querySelector(".messageErreur").innerText = jsonData.message;
            //     }
            // } else {
            //     // Handle the case where data or data.status is not defined
            //     console.error("Invalid data received from server:", data);
            // }
        });
}


function getMyTaskList() {

    //une fonction qui récup ttes mes taches

}











