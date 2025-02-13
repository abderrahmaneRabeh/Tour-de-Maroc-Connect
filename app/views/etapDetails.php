<?php require_once "../app/config/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details de l'Étape</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
</head>

<body class="min-h-screen px-4 py-12 bg-gradient-to-br from-blue-50 to-indigo-100 sm:px-6 lg:px-8">
    <?php
    require "../app/inc/navbar.php";
    ?>
    <div class="max-w-3xl mx-auto">
        <!-- Card Container -->
        <div
            class="overflow-hidden transition-all duration-300 transform bg-white shadow-xl rounded-2xl hover:scale-102">


            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- Stage Name -->
                <div
                    class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nom de l'Étape</p>
                            <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->nom ?></p>
                        </div>
                    </div>
                </div>

                <!-- Location Details -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- Departure -->
                    <div
                        class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Lieu depart</p>
                                <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->lieu_depart ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Arrival -->
                    <div
                        class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-red-100 rounded-lg">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Lieu arrive</p>
                                <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->lieu_arrivee ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Distance -->
                <div
                    class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-yellow-100 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Distance</p>
                            <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->distance_km ?> km</p>
                        </div>
                    </div>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- Start Date -->
                    <div
                        class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date depart</p>
                                <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->date_depart ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- End Date -->
                    <div
                        class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-indigo-100 rounded-lg">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date arrive</p>
                                <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->date_arrive ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div
                    class="p-4 transition-transform duration-300 transform shadow-sm hover:scale-105 bg-gray-50 rounded-xl">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-pink-100 rounded-lg">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Categorie</p>
                            <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->categorie_id ?></p>
                        </div>
                    </div>
                </div>

                <!-- Button to like -->
                <div class="mt-6 text-center">
                    <?php if (isset($_SESSION['user']['id'])): ?>
                        <?php if ($data['isAdded']): ?>
                            <p class="px-6 py-2 text-white transition duration-300 bg-blue-600 rounded-full">
                                Vous avez aimé cette étape
                            </p>
                        <?php else: ?>
                            <a href="<?= URLROOT ?>/Like/add/<?= $_SESSION['user']['id'] ?>/<?= $data['ObjEtape']->id ?>"
                                class="px-6 py-2 text-white transition duration-300 bg-green-600 rounded-full hover:bg-green-700">
                                J'aime
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <!-- Button to view podium -->
                <div class="mt-6 text-center">
                    <!-- <?php

                    echo "<pre>";
                    print_r($_SESSION['user']['id']);
                    echo "  ";
                    print_r($data['ObjEtape']->id);
                    echo "</pre>";
                    ?> -->
                    <a href="<?= URLROOT ?>/Etapes/podium/<?= $data['ObjEtape']->id ?>"
                        class="px-6 py-2 text-white transition duration-300 bg-indigo-600 rounded-full hover:bg-indigo-700">
                        Voir Podium
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add entrance animation to all cards
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.transform');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        });

        // Add hover animation
        const cards = document.querySelectorAll('.transform');
        cards.forEach(card => {
            card.addEventListener('mouseover', function () {
                this.classList.add('shadow-lg');
            });
            card.addEventListener('mouseout', function () {
                this.classList.remove('shadow-lg');
            });
        });
    </script>
</body>

</html>