<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Event Dashboard - Validation Cyclistes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <?php require_once '../app/config/config.php'; ?>

    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-800">
                <div class="flex items-center justify-center h-16 bg-gray-900">
                    <span class="text-xl font-semibold text-white">Sports Dashboard</span>
                </div>
                <div class="flex flex-col flex-1 overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 space-y-4">
                        <a href="index.php"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="<?php echo URLROOT . '/Categorys/index' ?>"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Categories
                        </a>
                        <a href="<?php echo URLROOT . '/Etapes/adminEtapes' ?>"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Etapes
                        </a>
                        <a href="<?php echo URLROOT . '/Admin/Commentaires' ?>"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 5H7M5 8a2 2 0 01-2 2v12a2 2 0 002 2h10a2 2 0 002-2V10a2 2 0 00-2-2h-3.5a1 1 0 01-.8-.4l-1.5-1.5A1 1 0 005 8h6z">
                                </path>
                            </svg>
                            Commentaires
                        </a>
                        <a href="<?php echo URLROOT . '/Admin/ValiderCyclistes' ?>"
                            class="flex items-center px-4 py-2 text-white bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Valider Cyclistes
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <span class="mr-4 text-gray-700">Admin</span>
                <div class="flex items-center">
                    <div class="relative">
                        <button class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                            <img class="w-8 h-8 rounded-full" src="/api/placeholder/32/32" alt="Profile">
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container px-6 py-8 mx-auto">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <h1 class="mb-6 text-2xl font-semibold text-gray-800">Validation des Cyclistes</h1>
                        
                        <!-- Cyclistes en attente de validation -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Nom
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Email
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Équipe
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Nationalité
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Photo
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($data['cyclistes'] as $cycliste) { ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $cycliste->nom; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $cycliste->email; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $cycliste->nom_equipe; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $cycliste->nationalite; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php if (!empty($cycliste->img)) { ?>
                                                    <img src="<?php echo URLROOT . '../../../public/uploads/' . $cycliste->img; ?>" 
                                                    alt="Photo de profil" class="w-16 h-16 rounded-full">
                                                <?php } else { ?>
                                                    <span class="text-gray-400">Aucune photo</span>
                                                <?php } ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex space-x-2">
            
                                                    <a href="<?php echo URLROOT . '/Admin/validerCycliste/' . $cycliste->id; ?>"
                                                        class="text-green-500 hover:text-green-700"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir valider ce cycliste?')">
                                                        Valider
                                                    </a>
                                                    <a href="<?php echo URLROOT . '/Admin/refuserCycliste/' . $cycliste->id; ?>"
                                                        class="text-red-500 hover:text-red-700"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir refuser ce cycliste?')">
                                                        Refuser
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if (empty($data['cyclistes'])) { ?>
                            <div class="py-8 text-center text-gray-500">
                                Aucun cycliste en attente de validation.
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle mobile menu
        document.querySelector('button').addEventListener('click', () => {
            const sidebar = document.querySelector('.md\\:flex');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>