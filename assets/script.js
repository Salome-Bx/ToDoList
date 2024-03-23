//Récupération de tous les champs email et mdp
// let email_connexion = document.querySelector('#Email_User_Connexion').value;
// let mdp_connexion = document.querySelector('#Mdp_User_Connexion').value;

let email_inscription = document.querySelector("#Email_User_Inscription").value;
let mdp_inscription = document.querySelector("#Mdp_User_Inscription").value;
let mdp_inscription2 = document.querySelector("#Mdp_User_Inscription2").value;

// let email_informations = document.querySelector('#Email_User_Informations').value;
// let mdp_informations = document.querySelector('#Mdp_User_Informations').value;
// let mdp_informations2 = document.querySelector('#Mdp_User_Informations2').value;

let email_modif_informations = document.querySelector(
    "#Email_User_Modifier_Informations"
).value;
let mdp_modif_informations = document.querySelector(
    "#Mdp_User_Modifier_Informations"
).value;
let mdp_modif_informations2 = document.querySelector(
    "#Mdp_User_Modifier_Informations2"
).value;

// Récupération de tous les champs nom et prénom
let nom_inscription = document.querySelector("#Nom_User_Inscription").value;
let prenom_inscription = document.querySelector(
    "#Prenom_User_Inscription"
).value;

let nom_informations = document.querySelector("#Nom_User_Informations").value;
let prenom_informations = document.querySelector(
    "#Prenom_User_Informations"
).value;

let nom_modif_informations = document.querySelector(
    "#Nom_User_Modifier_Informations"
).value;
let prenom_modif_informations = document.querySelector(
    "#Prenom_User_Modifier_Informations"
).value;

// Récupération de tous les champs de la ToDoList
let titre_task = document.querySelector("#Titre_Task").value;
let description_task = document.querySelector("#Description_Task").value;
let date_task = document.querySelector("#Date_Task").value;
let id_priority = document.querySelector("#Id_Priority").value;


// Récupération de toutes les modales
let modalToDoList = document.querySelector("#modalToDoList");
let modalConnexion = document.querySelector("#modalConnexion");
let modalInscription = document.querySelector("#modalInscription");
let modalInformations = document.querySelector("#modalInformations");
let modalModifierInformations = document.querySelector(
    "#modalModifierInformations"
);

// Récupération de tous les boutons
let btnAjouterTaches = document.querySelector("#btnAjouterTaches");
let btnConnexion = document.querySelector("#btnConnexion");
let btnCreerCompte = document.querySelector("#btnCreerCompte");
let btnValidationInscription = document.querySelector(
    "#btnValidationInscription"
);
let btnModifierInformations = document.querySelector(
    "#btnModifierInformations"
);
let btnSupprimerInformations = document.querySelector(
    "#btnSupprimerInformations"
);
let btnValiderModificationInformations = document.querySelector(
    "#btnValiderModificationInformations"
);
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

function handleLoginConnexion() {
    let email_connexion = document.querySelector("#Email_User_Connexion").value;
    let mdp_connexion = document.querySelector("#Mdp_User_Connexion").value;

    /*let modalToDoList = document.querySelector("#modalToDoList");
    let modalConnexion = document.querySelector("#modalConnexion");
    let btnCompteHeader = document.querySelector("#btnCompteHeader");*/

    if (email_connexion == "" || mdp_connexion == "") {
        document.querySelector(
            ".messageErreur"
        ).innerText = "Merci de remplir Email et Password.";
    }

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

    fetch("http://todolist/login.php", params)
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
                }
            } else {
                // Handle the case where data or data.status is not defined
                console.error("Invalid data received from server:", data);
            }
        });
}
// Récupération informations formulaire inscription

function userInscription() {
    let prenom_inscription = document.querySelector(
        "#Prenom_User_Inscription"
    ).value;
    let nom_inscription = document.querySelector("#Nom_User_Inscription").value;
    let email_inscription = document.querySelector(
        "#Email_User_Inscription"
    ).value;
    let mdp_inscription = document.querySelector("#Mdp_User_Inscription").value;

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

    fetch("./traitementUser.php", params)
        .then((res) => res.text())
        .then((data) => console.log(data));
}

// Récupération infos tâche

function addTask() {
    let titre_task = document.querySelector("#Titre_Task").value;
    let description_task = document.querySelector("#Description_Task").value;
    let date_task = document.querySelector("#Date_Task").value;
    let nom_priority = document.querySelector("#Id_Priority").value;

    // function getValueCategory() {
    //     let nameCategory = null;
    //     for (index = 0; index <= 3; index++) {
    //         if (categories[index].checked) {
    //             nameCategory = categories[index].value;
    //         }
    //     }
    //     return nameCategory;
    // }

    // let nom_category = getValueCategory();


    // récupération des values de checkbox catégories

    let inputFamille = document.querySelector("#Famille_Category");
    let inputAmis = document.querySelector("#Amis_Category");
    let inputTravail = document.querySelector("#Travail_Category");
    let inputPersonnel = document.querySelector("#Personnel_Category");

    let valuesCategory = [];

    inputFamille.addEventListener("input", function () {
        if (inputFamille.checked) {
            console.log(inputFamille.value);
            let valuesCategorFamille = valuesCategory.push(inputFamille.value);
            console.log(valuesCategory);

        }
    });

    inputAmis.addEventListener("input", function () {
        if (inputAmis.checked) {
            console.log(inputAmis.value);
            let valuesCategorAmis = valuesCategory.push(inputAmis.value);
            console.log(valuesCategory);
        }
    });

    inputTravail.addEventListener("input", function () {
        if (inputTravail.checked) {
            console.log(inputTravail.value);
            let valuesCategorTravail = valuesCategory.push(inputTravail.value);
            console.log(valuesCategory);
        }
    });

    inputPersonnel.addEventListener("input", function () {
        if (inputPersonnel.checked) {
            console.log(inputPersonnel.value);
            let valuesCategorPersonnel = valuesCategory.push(inputPersonnel.value);
            console.log(valuesCategory);
        }
    });




    let btnAjouterTaches = {
        Titre_Task: titre_task,
        Description_Task: description_task,
        Date_Task: date_task,
        Nom_Priority: nom_priority,
        Nom_Category: nom_category,
        btnAjouterTaches: true,
    };

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(btnAjouterTaches),
    };
    console.log(btnAjouterTaches);

    fetch("./traitementTask.php", params)
        .then((res) => res.text())
        .then((data) => console.log(data));
}





