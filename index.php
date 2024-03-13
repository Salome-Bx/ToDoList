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
<body class="font-serif relative">

<h1 class="satisfy-regular flex justify-center mt-20 mb-10 text-5xl text-white">To Do or Not To Do</h1>

<!-- To Do List -->
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
	<div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">

            <!-- conteneur création tâches -->
            <div class="flex flex-col">

                <!-- titre tâches -->
                <input name="titre" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Titre de votre tâche">

                <!-- description -->
                <input name="description" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker mt-5" placeholder="Description">

                <div class="flex">

                    <!-- conteneur date et priorités -->
                    <div class="w-1/2 flex-row items-center justify-center bg-teal-lightest font-sans p-2">
                        <!-- date -->
                        <input name="date" type="date" class="flex shadow appearance-none border rounded w-full py-2 mr-4 mt-5 text-grey-darker sm:text-sm">

                        <!-- priorités -->
                        <select id="priorite" name="id_priorite" type="text" required class="flex capitalize block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-5">
                        </select>
                    </div>
                    
                    <!-- catégories -->
                    <div class="flex-row w-1/2 pt-6 pl-5" id="categories">
                        
                        <div class="flex items-center">
                            <input id="famille_category" name="famille" value="famille" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">Famille</label>
                        </div>
                        <div class="flex items-center">
                            <input id="amis_category" name="amis" value="amis" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="amis_category" class="ml-3 min-w-0 flex-1 text-gray-500">Amis</label>
                        </div>
                        <div class="flex items-center">
                            <input id="travail_category" name="travail" value="travail" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="travail_category" class="ml-3 min-w-0 flex-1 text-gray-500">Travail</label>
                        </div>
                        <div class="flex items-center">
                            <input id="personnel_category" name="personnel" value="personnel" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="personnel_category" class="ml-3 min-w-0 flex-1 text-gray-500">Personnel</label>
                        </div>
                    </div>

                </div>
                
            </div>

                <!-- bouton ajouter -->
            <button class="flex-no-shrink p-2 mt-8 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Ajouter</button>
        </div>
    </div>
    

    <!-- conteneur tâches -->
    <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div>
            <div class="flex mb-4 items-center">
                <p class="w-full text-grey-darkest">Add another component to Tailwind Components</p>
                <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">C'est fait !</button>
                <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Supprimer</button>
            </div>
          	<div class="flex mb-4 items-center">
                <p class="w-full line-through text-green">Submit Todo App Component to Tailwind Components</p>
                <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">Not Done</button>
                <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove</button>
            </div>
        </div>
    </div>
</div>

<!-- modal connexion -->
<div></div>
<!-- modal inscription -->
<div></div>
<!-- modal mes informations -->
<div></div>


    
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>