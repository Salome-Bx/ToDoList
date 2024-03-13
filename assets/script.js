
let modalToDoList = document.querySelector("#modalToDoList");
let modalConnexion = document.querySelector("#modalConnexion");
let modalInscription = document.querySelector("#modalInscription");
let modalInformations = document.querySelector("#modalInformations");
let modalModifierInformations = document.querySelector("#modalModifierInformations");

let btnAjouterTaches = document.querySelector("#btnAjouterTaches");
let btnConnexion = document.querySelector("#btnConnexion");
let btnValidationInscription = document.querySelector("#btnValidationInscription");
let btnModifierInformations = document.querySelector("#btnModifierInformations");
let btnSupprimerInformations = document.querySelector("#btnSupprimerInformations");
let btnValiderModificationInformations = document.querySelector("#btnValiderModificationInformations");


function blocAAfficherOuCacher(blocACacher, blocAAfficher) {

    blocACacher.classList.add("hidden");
    blocAAfficher.classList.remove("hidden");
}

btnConnexion.addEventListener("click", function () {
    modalConnexion.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
});

btnConnexion.addEventListener("click", function () {
    modalConnexion.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
});





