<?php
include("./autoload.php");

use TaskManager\TaskManager;
use UserManager\UserManager;
use PriorityManager\PriorityManager;
use DbConnexion\DbConnexion;



$dbConnexion = new DbConnexion();
$TaskManager = new TaskManager($dbConnexion);
$UserManager = new UserManager($dbConnexion);
$PriorityManager = new PriorityManager($dbConnexion);


$tasks = $TaskManager->getAllTasks();
$priorities = $PriorityManager->allPriorities();







?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&family=Seaweed+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
    <title>To Do List</title>
</head>

<body class="font-sans relative">



    <!-- HEADER -->
    <header class="header">

        <h1 class="satisfy-regular flex justify-center mt-20 mb-10 text-5xl text-white">To Do or Not To Do</h1>

        <!-- btn mon compte -->
        <button id="btnCompteHeader" onclick="blocAAfficherOuCacher(modalToDoList,modalInformations)" type="submit" class=" flex w-auto  justify-end z-50 rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 hidden">Mon compte</button>
    </header>

    <!-- TO DO LIST -->
    <div class="flex justify-center messageErreur text-white "></div>
    <div id="modalToDoList" class="h-100 w-full flex flex-wrap items-center justify-center font-sans hidden">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <div class="mb-4 flex w-full flex-col justify-center items-center">

                <!-- CONTENEUR CREATION TACHES -->
                <div class="flex flex-col w-full">

                    <!-- titre tâches -->
                    <input id="Titre_Task" name="Titre_Task" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Titre de votre tâche">

                    <!-- description -->
                    <input id="Description_Task" name="Description_Task" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker mt-5" placeholder="Description">

                    <div class="flex">

                        <!-- conteneur date et priorités -->
                        <div class="w-1/2 flex-row items-center justify-center bg-teal-lightest font-sans p-2">
                            <!-- date -->
                            <input id="Date_Task" name="Date_Task" type="date" class="flex indent-1 shadow appearance-none border rounded w-full py-2 mr-4 mt-5 text-grey-darker sm:text-sm">

                            <!-- priorités -->

                            <select id="Id_Priority" name="Id_Priority" type="text" required class="flex indent-1 capitalize block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 mt-5">
                                <option class="text-gray" value="1">Normal</option>
                                <option class="text-gray" value="2">Important</option>
                                <option class="text-gray" value="3">Urgent</option>
                            </select>
                        </div>


                        <!-- catégories -->
                        <div class="flex-row w-1/2 pt-6 pl-5" id="Category">


                            <div class="flex items-center">
                                <input id="Famille_Category" name="Famille_Category" value="3" type="checkbox" class="checkbox h-4 w-4 rounded border-gray-300 text-fuchsia-600 focus:ring-fuchsia-500">
                                <label for="Famille_Category" class="ml-3 min-w-0 flex-1 text-gray-500">Famille</label>
                            </div>
                            <div class="flex items-center">
                                <input id="Amis_Category" name="Amis_Category" value="4" type="checkbox" class=" checkbox h-4 w-4 rounded border-gray-300 text-fuchsia-600 focus:ring-fuchsia-500">
                                <label for="Amis_Category" class="ml-3 min-w-0 flex-1 text-gray-500">Amis</label>
                            </div>
                            <div class="flex items-center">
                                <input id="Travail_Category" name="Travail_Category" value="2" type="checkbox" class=" checkbox h-4 w-4 rounded border-gray-300 text-fuchsia-600 focus:ring-fuchsia-500">
                                <label for="Travail_Category" class="ml-3 min-w-0 flex-1 text-gray-500">Travail</label>
                            </div>
                            <div class="flex items-center">
                                <input id="Personnel_Category" name="Personnel_Category" value="1" type="checkbox" class="checkbox h-4 w-4 rounded border-gray-300 text-fuchsia-600 focus:ring-fuchsia-500">
                                <label for="Personnel_Category" class="ml-3 min-w-0 flex-1 text-gray-500">Personnel</label>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- bouton ajouter -->
                <input id="btnAjouterTaches" name="btnAjouterTaches" value="Ajouter" onclick="addTask()" type="submit" class="flex-no-shrink w-fit p-2 mt-8 border-2 rounded hover:text-purple-500" />
            </div>
        </div>


        <!-- CONTENEUR TACHES -->

        <div class='conteneurTaches flex-col w-full lg:w-3/4 lg:max-w-lg flex mb-4'>
            <?php
            // a mettre dans js
            foreach ($tasks as $task) { ?>


                <div class='conteneurTache flex-col bg-white rounded shadow m-4 w-full lg:w-3/4 lg:max-w-lg flex mb-4'>
                    <div class='bandeauCouleurPriority w-full <?php if ($task->getNomPriority() === 'Normal') {
                                                                    echo "bg-green-600";
                                                                } elseif ($task->getNomPriority() === 'Important') {
                                                                    echo "bg-orange-600";
                                                                } else {
                                                                    echo "bg-red-600";
                                                                } ?>  px-1 min-h-fit text-w   hite top-0 flex justify-end'>
                        <p class='w-fit text-sm text-white align-middle'><?= $task->getCategory_List() ?></p>
                        <button class='flex-no-shrink text-white p-1 ml-2 mr-1 border-1 w-fit text-sm rounded cursor-pointer '><i class='fa-solid fa-pencil'></i></button>
                        <button class='flex-no-shrink text-white p-1 ml-1 border-1 w-fit text-sm rounded cursor-pointer' onclick="deleteTask(<?= $task->getId_task() ?>)"><i class='fa-solid fa-trash-can'></i></button>

                    </div>

                    <div class='conteneurTexteTache p-3'>

                        <p class='dateTache'> <?= $task->getDate_task() ?></p>
                        <p class='titreTache w-full text-lg text-grey-darkest'><?= $task->getTitre_task() ?> </p>
                        <p class='descriptionTache w-full text-sm text-grey-darkest'> <?= $task->getDescription_task() ?></p>
                    </div>
                    <div class='btns flex justify-end p-1 mt-2'>
                        <button class='btnTermine flex-no-shrink p-1 ml-1 mr-1 border-2 w-fit rounded hover:text-purple-500 text-xs'>Terminé !</button>
                        <button class='btnAFaire flex-no-shrink p-1 ml-1 mr-1 border-2 w-fit rounded hover:text-purple-500 text-xs'>A faire</button>
                    </div>


                </div>
            <?php } ?>
        </div>


        <!-- <div class="conteneurTache flex-col bg-white rounded shadow m-4 w-full lg:w-3/4 lg:max-w-lg flex mb-4">
                    <div class="bandeauCouleurPriority w-full bg-red-600 px-1 min-h-fit text-white top-0 flex justify-end">
                        <p class="w-fit text-sm align-middle">Catégorie</p>
                        <button class="flex-no-shrink p-1 ml-2 mr-1 border-1 w-fit text-sm rounded cursor-pointer "><i class="fa-solid fa-pencil"></i></button>
                        <button class="flex-no-shrink p-1 ml-1 border-1 w-fit text-sm rounded cursor-pointer"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                    <div class="conteneurTexteTache p-3">
                        <p class="dateTache">Date</p>
                        <p class="titreTache w-full text-lg text-grey-darkest">RDV médecin</p>
                        <p class="descriptionTache w-full text-sm text-grey-darkest">Rappel de vaccin, prendre carnet de vaccination</p>                                      
                        <div class="btns flex justify-end p-1 mt-2">
                            <button class="flex-no-shrink p-1 ml-1 mr-1 border-2 w-fit rounded hover:text-purple-500 text-xs">Terminé !</button>
                            <button class="flex-no-shrink p-1 ml-1 mr-1 border-2 w-fit rounded hover:text-purple-500 text-xs">A faire</button>
                        </div>
                    </div>
                </div> -->

    </div>




    <!-- MODAL CONNEXION -->
    <div id="modalConnexion" class="modalConnexion h-100 w-full absolute w-screen h-screen z-20  ">

        <div class="flex flex-col justify-center px-6 lg:px-8 w-1/2 mx-auto ">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">

                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight font-extralight text-white">Connexion</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="space-y-3">
                    <div>
                        <label for="Email_User_Connexion" class="block text-sm font-medium leading-6 text-white">Email :</label>
                        <div class="mt-2">
                            <input value="j.valjean@gmail.com" id="Email_User_Connexion" name="Email_User_Connexion" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 emailInput">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="Mdp_User_Connexion" class="block text-sm font-medium leading-6 text-white">Mot de passe :</label>

                        </div>
                        <div class="mt-2">
                            <input value="123456" id="Mdp_User_Connexion" name="Mdp_User_Connexion" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 passwordInput">
                        </div>
                    </div>

                    <div>
                        <button id="btnConnexion" type="submit" onclick="handleLoginConnexion()" class=" flex w-full justify-center rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 ">Se Connecter</button>

                    </div>
                </div>

                <p class="mt-10 text-center text-sm text-white">Pas encore membre ? </p>
                <button id="btnCreerCompte" type="submit" onclick="blocAAfficherOuCacher(modalConnexion, modalInscription)" class=" flex w-full justify-center rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600"> Créer un compte </button>
                </p>
            </div>
        </div>
    </div>





    </div>


    <!-- MODAL INSCRIPTION -->
    <div id="modalInscription" class="modalInscription absolute top-0  w-screen h-screen z-20 hidden">

        <div class="flex  flex-col justify-center px-6 py-12 lg:px-8  w-1/2 mx-auto ">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight font-extralight text-white">Inscription</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="space-y-3">

                    <div>
                        <label for="Prenom_User_Inscription" class="block text-sm font-medium leading-6 text-white">Prénom :</label>
                        <div class="mt-2">
                            <input id="Prenom_User_Inscription" name="Prenom_User_Inscription" type="text" autocomplete="text" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 emailInput">
                        </div>
                    </div>

                    <div>
                        <label for="Nom_User_Inscription" class="block text-sm font-medium leading-6 text-white ">Nom :</label>
                        <div class="mt-2">
                            <input id="Nom_User_Inscription" name="Nom_User_Inscription" type="text" autocomplete="text" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 emailInput">
                        </div>
                    </div>

                    <div>
                        <label for="Email_User_Inscription" class="block text-sm font-medium leading-6 text-white">Email :</label>
                        <div class="mt-2">
                            <input id="Email_User_Inscription" name="Email_User_Inscription" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 emailInput">
                        </div>
                    </div>



                    <div>
                        <div class="flex items-center justify-between">
                            <label for="Mdp_User_Inscription" class="block text-sm font-medium leading-6 text-white">Mot de passe :</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-fuchsia-600 hover:text-fuchsia-500"></a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="Mdp_User_Inscription" name="Mdp_User_Inscription" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 passwordInput">
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="Mdp_User_Inscription2" class="block text-sm font-medium leading-6 mt-2 text-white">Veuillez ressaisir le mot de passe :</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-fuchsia-600 hover:text-fuchsia-500"></a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="Mdp_User_Inscription2" name="Mdp_User_Inscription2" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 passwordInput">
                        </div>
                    </div>

                    <div>
                        <input name="inputInscription" onclick="userInscription()" id="btnValidationInscription" type="submit" class=" flex w-full justify-center rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 " />
                    </div>
                </div>


                </p>
            </div>
        </div>


    </div>


    <!-- MODAL MES INFORMATIONS -->
    <div id="modalInformations" class="modalInformations absolute top-0 w-screen h-screen z-20 hidden">

        <div class="flex  flex-col justify-center px-6 py-12 lg:px-8  w-1/2 mx-auto ">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">

                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight font-extralight text-white">Mes Informations</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="space-y-3">

                    <div>
                        <label id="Prenom_User_Informations" for="Prenom_User_Informations" class="block text-sm font-medium leading-6 text-white">Prénom :</label>
                        <div class="mt-2">

                        </div>
                    </div>

                    <div>
                        <label id="Nom_User_Informations" for="Nom_User_Informations" class="block text-sm font-medium leading-6 text-white">Nom :</label>
                        <div class="mt-2">

                        </div>
                    </div>

                    <div>
                        <label for="Email_User_Informations" class="block text-sm font-medium leading-6 text-white">Email :</label>
                        <div class="mt-2">

                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="Mdp_User_Informations" class="block text-sm font-medium leading-6 text-white">Mot de passe :</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-fuchsia-600 hover:text-fuchsia-500"></a>
                            </div>
                        </div>
                        <div class="mt-2">

                        </div>

                        <div class="flex items-center justify-between">
                            <label for="Mdp_User_Informations2" class="block text-sm font-medium leading-6 text-white">Veuillez resaisir le mot de passe :</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-fuchsia-600 hover:text-fuchsia-500"></a>
                            </div>
                        </div>
                        <div class="mt-2">

                        </div>
                    </div>

                    <div>
                        <button id="btnModifierInformations" type="submit" onclick="blocAAfficherOuCacher(modalInformations,modalModifierInformations)" class=" flex w-full justify-center rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 ">Modifier mes informations</button>
                        <button id="btnSupprimerInformations" type="submit" onclick="blocAAfficherOuCacher(modalInformations,modalConnexion)" class=" flex w-full justify-center rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 ">Supprimer mon compte</button>
                    </div>
                </div>


                </p>
            </div>
        </div>


    </div>

    <!-- MODAL MODIFIER MES INFORMATIONS -->
    <div id="modalModifierInformations" class="modalModifierInformations absolute top-0 w-screen h-screen z-20 hidden">

        <div class="flex flex-col justify-center px-6 py-12 lg:px-8  w-1/2 mx-auto ">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">

                <h2 class="mt-10 text-center text-2xl leading-9 tracking-tight text-white font-extralight">Mes Informations</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="space-y-3">

                    <div>
                        <label for="Prenom_User_Modifier_Informations" class="block text-sm font-medium leading-6 text-white">Prénom :</label>
                        <div class="mt-2">
                            <input id="Prenom_User_Modifier_Informations" name="Prenom_User_Modifier_Informations" type="text" autocomplete="text" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 ">
                        </div>
                    </div>

                    <div>
                        <label for="Nom_User_Modifier_Informations" class="block text-sm font-medium leading-6 text-white">Nom :</label>
                        <div class="mt-2">
                            <input id="Nom_User_Modifier_Informations" name="Nom_User_Modifier_Informations" type="text" autocomplete="text" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 ">

                        </div>
                    </div>

                    <div>
                        <label for="Email_User_Modifier_Informations" class="block text-sm font-medium leading-6 text-white">Email :</label>
                        <div class="mt-2">
                            <input id="Email_User_Modifier_Informations" name="Email_User_Modifier_Informations" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 emailInput">
                        </div>
                    </div>

                    <div>

                        <label for="Mdp_User_Modifier_Informations" class="block text-sm font-medium leading-6 text-white">Mot de passe :</label>
                        <div class="mt-2">
                            <input id="Mdp_User_Modifier_Informations" name="Mdp_User_Modifier_Informations" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 passwordInput">
                        </div>




                        <label for="Mdp_User_Modifier_Informations2" class="block text-sm font-medium leading-6 text-white mt-2">Veuillez resaisir le mot de passe :</label>
                        <div class="mt-2">
                            <input id="Mdp_User_Modifier_Informations2" name="Mdp_User_Modifier_Informations2" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fuchsia-600 sm:text-sm sm:leading-6 indent-3 passwordInput">
                        </div>


                    </div>

                    <div>
                        <button id="btnValiderModificationInformations" type="submit" onclick="blocAAfficherOuCacher(modalModifierInformations,modalToDoList)" class=" flex w-full justify-center rounded-md bg-fuchsia-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 mt-2">Valider mes informations</button>
                    </div>
                </div>


                </p>
            </div>
        </div>


    </div>

    </div>



</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/ffa8279fb3.js" crossorigin="anonymous"></script>
<script src="./assets/script.js"></script>
<script src="./assets/traitement.js"></script>

</html>