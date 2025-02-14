<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement Cycliste</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <?php require "../app/inc/navbar.php"; ?>

    <div class="container px-4 py-8 mx-auto max-w-7xl">
        <!-- Page Header -->
        <div class="mb-8 text-center">
            <h1 class="mb-2 text-3xl font-bold text-gray-800">Événements Cyclistes</h1>
            <p class="text-gray-600">Découvrez et filtrez les étapes disponibles</p>
        </div>

        <!-- Filtrage des étapes -->
        <section class="mb-8">
            <form action="" method="GET" class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md" id="filter_form">
                <div class="grid gap-4 md:grid-cols-3">
                    <div class="space-y-2">
                        <label for="region" class="text-sm font-medium text-gray-700">
                            <i class="mr-2 text-indigo-500 fas fa-map-marker-alt"></i>Région
                        </label>
                        <select name="region" id="region" class="w-full p-3 transition-all duration-300 border border-gray-200 rounded-lg bg-gray-50 focus:ring-2 focus:ring-indigo-200 focus:outline-none">
                            <option value="">Toutes les régions</option>
                            <option value="Atlas">Atlas</option>
                            <option value="Sahara">Sahara</option>
                            <option value="Anti_Atlas">Anti-Atlas</option>
                            <option value="Moyen_Atlas">Moyen-Atlas</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="difficulte" class="text-sm font-medium text-gray-700">
                            <i class="mr-2 text-indigo-500 fas fa-mountain"></i>Difficulté
                        </label>
                        <select name="difficulte" id="difficulte" class="w-full p-3 transition-all duration-300 border border-gray-200 rounded-lg bg-gray-50 focus:ring-2 focus:ring-indigo-200 focus:outline-none">
                            <option value="">Toutes les difficultés</option>
                            <option value="facile">Facile</option>
                            <option value="Medium">Moyen</option>
                            <option value="diffucile">Difficile</option>
                        </select>
                    </div>

                    <div class="flex items-end">
                        <button type="submit" class="w-full px-6 py-3 text-white transition-all duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600 hover:shadow-lg">
                            <i class="mr-2 fas fa-filter"></i>Filtrer
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <!-- Tableau des étapes -->
        <main class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left bg-gradient-to-r from-indigo-500 to-purple-500">
                            <th class="p-4 text-white rounded-tl-lg">
                                <i class="mr-2 fas fa-flag"></i>Nom
                            </th>
                            <th class="p-4 text-white">
                                <i class="mr-2 fas fa-play"></i>Départ
                            </th>
                            <th class="p-4 text-white">
                                <i class="mr-2 fas fa-stop"></i>Arrivée
                            </th>
                            <th class="p-4 text-white">
                                <i class="mr-2 fas fa-route"></i>Distance
                            </th>
                            <th class="p-4 text-white">
                                <i class="mr-2 fas fa-map"></i>Région
                            </th>
                            <th class="p-4 text-white">
                                <i class="mr-2 fas fa-mountain"></i>Difficulté
                            </th>
                            <th class="p-4 text-center text-white rounded-tr-lg">
                                <i class="mr-2 fas fa-cog"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php foreach ($data as $etape): ?>
                            <tr class="transition-all duration-300 border-b border-gray-100 hover:bg-indigo-50">
                                <td class="p-4 font-medium text-gray-800"><?= $etape->nom ?></td>
                                <td class="p-4 text-gray-600"><?= $etape->lieu_depart ?></td>
                                <td class="p-4 text-gray-600"><?= $etape->lieu_arrivee ?></td>
                                <td class="p-4 text-gray-600"><?= $etape->distance_km ?> km</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 text-sm text-indigo-700 bg-indigo-100 rounded-full">
                                        <?= $etape->region ?>
                                    </span>
                                </td>
                                <td class="p-4">
                                    <?php
                                    $difficultyColor = [
                                        'facile' => 'bg-green-100 text-green-700',
                                        'Medium' => 'bg-yellow-100 text-yellow-700',
                                        'diffucile' => 'bg-red-100 text-red-700'
                                    ];
                                    $class = $difficultyColor[$etape->difficulte] ?? 'bg-gray-100 text-gray-700';
                                    ?>
                                    <span class="px-3 py-1 text-sm rounded-full <?= $class ?>">
                                        <?= $etape->difficulte ?>
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <a href="<?= URLROOT ?>/Etapes/details/<?= $etape->id ?>"
                                       class="inline-flex items-center px-4 py-2 text-sm text-white transition-all duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600 hover:shadow-lg">
                                        <i class="mr-2 fas fa-eye"></i>
                                        Voir détails
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterForm = document.getElementById('filter_form');
            
            // Add entrance animation to elements
            const elements = document.querySelectorAll('.rounded-xl');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 100 * index);
            });

            filterForm.addEventListener('submit', function(event) {
                event.preventDefault();
                let region = document.getElementById('region').value;
                let difficulte = document.getElementById('difficulte').value;
                let myTable = document.getElementById('myTable');

                fetch(`<?= URLROOT ?>/Etapes/filter?difficulte=${difficulte}&region=${region}`)
                    .then(response => response.json())
                    .then(data => {
                        myTable.innerHTML = '';

                        if (data.length === 0) {
                            myTable.innerHTML = `
                                <tr>
                                    <td colspan="7" class="p-8 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <i class="text-4xl text-gray-400 fas fa-search"></i>
                                            <p class="text-gray-500">Aucune étape trouvée</p>
                                        </div>
                                    </td>
                                </tr>`;
                            return;
                        }

                        data.forEach(etape => {
                            let difficultyColor = {
                                'facile': 'bg-green-100 text-green-700',
                                'Medium': 'bg-yellow-100 text-yellow-700',
                                'diffucile': 'bg-red-100 text-red-700'
                            };
                            let colorClass = difficultyColor[etape.difficulte] || 'bg-gray-100 text-gray-700';

                            let row = document.createElement('tr');
                            row.className = 'border-b border-gray-100 transition-all duration-300 hover:bg-indigo-50';
                            
                            row.innerHTML = `
                                <td class="p-4 font-medium text-gray-800">${etape.nom}</td>
                                <td class="p-4 text-gray-600">${etape.lieu_depart}</td>
                                <td class="p-4 text-gray-600">${etape.lieu_arrivee}</td>
                                <td class="p-4 text-gray-600">${etape.distance_km} km</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 text-sm text-indigo-700 bg-indigo-100 rounded-full">
                                        ${etape.region}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="px-3 py-1 text-sm rounded-full ${colorClass}">
                                        ${etape.difficulte}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <a href="<?= URLROOT ?>/Etapes/details/${etape.id}"
                                       class="inline-flex items-center px-4 py-2 text-sm text-white transition-all duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600 hover:shadow-lg">
                                        <i class="mr-2 fas fa-eye"></i>
                                        Voir détails
                                    </a>
                                </td>
                            `;
                            myTable.appendChild(row);
                        });
                    });
            });
        });
    </script>
</body>
</html>