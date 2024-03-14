
let modalToDoList = document.querySelector("#modalToDoList");
let modalConnexion = document.querySelector("#modalConnexion");
let modalInscription = document.querySelector("#modalInscription");
let modalInformations = document.querySelector("#modalInformations");
let modalModifierInformations = document.querySelector("#modalModifierInformations");

let btnAjouterTaches = document.querySelector("#btnAjouterTaches");
let btnConnexion = document.querySelector("#btnConnexion");
let btnCreerCompte = document.querySelector("#btnCreerCompte");
let btnValidationInscription = document.querySelector("#btnValidationInscription");
let btnModifierInformations = document.querySelector("#btnModifierInformations");
let btnSupprimerInformations = document.querySelector("#btnSupprimerInformations");
let btnValiderModificationInformations = document.querySelector("#btnValiderModificationInformations");
let btnConnexionHeader = document.querySelector("#btnConnexionHeader");



function blocAAfficherOuCacher(blocACacher, blocAAfficher) {

    blocACacher.classList.add("hidden");
    blocAAfficher.classList.remove("hidden");
}

btnConnexion.addEventListener("click", function () {
    modalConnexion.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
    btnConnexionHeader.classList.remove("hidden");
});


btnCreerCompte.addEventListener("click", function () {
    modalConnexion.classList.add("hidden");
    modalInscription.classList.remove("hidden");
});

btnValidationInscription.addEventListener("click", function () {
    modalInscription.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
    btnConnexionHeader.classList.remove("hidden");
});

btnConnexionHeader.addEventListener("click", function () {
    modalToDoList.classList.add("hidden");
    modalInformations.classList.remove("hidden");
});

btnModifierInformations.addEventListener("click", function () {
    modalInformations.classList.add("hidden");
    modalModifierInformations.classList.remove("hidden");
});

btnValiderModificationInformations.addEventListener("click", function () {
    modalModifierInformations.classList.add("hidden");
    modalToDoList.classList.remove("hidden");
});

btnSupprimerInformations.addEventListener("click", function () {
    modalInformations.classList.add("hidden");
    modalConnexion.classList.remove("hidden");
});

