
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm px-8 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <i class="fas fa-bicycle text-3xl text-blue-600"></i>
                <h1 class="text-2xl font-bold">Tour du Maroc</h1>
            </div>
            <div class="flex items-center space-x-4">
                <i class="fas fa-bell text-xl text-gray-600 cursor-pointer"></i>
                <i class="fas fa-cog text-xl text-gray-600 cursor-pointer"></i>
                <i class="fas fa-sign-out-alt text-xl text-gray-600 cursor-pointer"></i>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen bg-white shadow-sm">
            <nav class="p-4">
                <div class="space-y-2">
                    <a href="index.php" class="w-full flex items-center space-x-3 px-4 py-2 rounded-lg bg-blue-50 text-blue-600">
                        <i class="fas fa-chart-line"></i>
                        <span>Vue d'ensemble</span>
                    </a>
                    <a href="indexx.php" class="w-full flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                    <a href="tt.php" class="w-full flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">
                        <i class="fas fa-trophy"></i>
                        <span>Performance</span>
                    </a>
                </div>
            </nav>
        </aside>


    <div class="container mx-auto px-4 py-8">
        <!-- En-tête de performance -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-sm font-medium text-gray-600">Vitesse Moyenne</h3>
                <p class="text-2xl font-bold mt-2">42.1 km/h</p>
                <span class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> +2.3%</span>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-sm font-medium text-gray-600">Points Totaux</h3>
                <p class="text-2xl font-bold mt-2">95</p>
                <span class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> +15</span>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-sm font-medium text-gray-600">Position Générale</h3>
                <p class="text-2xl font-bold mt-2">#3</p>
                <span class="text-red-500 text-sm"><i class="fas fa-arrow-down"></i> -1</span>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-sm font-medium text-gray-600">Distance Totale</h3>
                <p class="text-2xl font-bold mt-2">450 km</p>
                <span class="text-gray-500 text-sm">sur 1200 km</span>
            </div>
        </div>

        <!-- Graphiques de performance -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">Vitesse par Étape</h3>
                <div class="h-80">
                    <canvas id="speedChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">Points par Étape</h3>
                <div class="h-80">
                    <canvas id="pointsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Tableau détaillé des performances -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Détails des Étapes</h3>
                <div class="flex space-x-2">
                    <select class="border rounded-lg px-3 py-1">
                        <option>Toutes les étapes</option>
                        <option>Dernière semaine</option>
                        <option>Dernier mois</option>
                    </select>
                    <button class="bg-blue-600 text-white px-4 py-1 rounded-lg">
                        Exporter
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left">Étape</th>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Distance</th>
                            <th class="px-4 py-2 text-left">Vitesse Moy.</th>
                            <th class="px-4 py-2 text-left">Position</th>
                            <th class="px-4 py-2 text-left">Points</th>
                            <th class="px-4 py-2 text-left">Détails</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">Étape 1: Rabat-Fès</td>
                            <td class="px-4 py-2">15/01/2024</td>
                            <td class="px-4 py-2">150 km</td>
                            <td class="px-4 py-2">42.5 km/h</td>
                            <td class="px-4 py-2">#3</td>
                            <td class="px-4 py-2">25</td>
                            <td class="px-4 py-2">
                                <button class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">Étape 2: Fès-Meknès</td>
                            <td class="px-4 py-2">17/01/2024</td>
                            <td class="px-4 py-2">120 km</td>
                            <td class="px-4 py-2">40.2 km/h</td>
                            <td class="px-4 py-2">#5</td>
                            <td class="px-4 py-2">18</td>
                            <td class="px-4 py-2">
                                <button class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">Étape 3: Meknès-Ifrane</td>
                            <td class="px-4 py-2">19/01/2024</td>
                            <td class="px-4 py-2">180 km</td>
                            <td class="px-4 py-2">44.1 km/h</td>
                            <td class="px-4 py-2">#1</td>
                            <td class="px-4 py-2">30</td>
                            <td class="px-4 py-2">
                                <button class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    Affichage de 1 à 3 sur 10 étapes
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Précédent</button>
                    <button class="px-3 py-1 border rounded-lg bg-blue-600 text-white">1</button>
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">3</button>
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Suivant</button>
                </div>
            </div>
        </div>

        <!-- Comparaison avec d'autres cyclistes -->
        <div class="mt-6 bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold mb-4">Comparaison avec les Leaders</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left">Position</th>
                            <th class="px-4 py-2 text-left">Cycliste</th>
                            <th class="px-4 py-2 text-left">Équipe</th>
                            <th class="px-4 py-2 text-left">Vitesse Moy.</th>
                            <th class="px-4 py-2 text-left">Points</th>
                            <th class="px-4 py-2 text-left">Écart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-4 py-2">#1</td>
                            <td class="px-4 py-2">Ahmed Benali</td>
                            <td class="px-4 py-2">Team Atlas</td>
                            <td class="px-4 py-2">43.2 km/h</td>
                            <td class="px-4 py-2">120</td>
                            <td class="px-4 py-2">-</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-2">#2</td>
                            <td class="px-4 py-2">Karim Saidi</td>
                            <td class="px-4 py-2">Sahara Riders</td>
                            <td class="px-4 py-2">42.8 km/h</td>
                            <td class="px-4 py-2">105</td>
                            <td class="px-4 py-2">+2:15</td>
                        </tr>
                        <tr class="border-t bg-blue-50">
                            <td class="px-4 py-2">#3</td>
                            <td class="px-4 py-2">Mohammed Alami</td>
                            <td class="px-4 py-2">Atlas Riders</td>
                            <td class="px-4 py-2">42.1 km/h</td>
                            <td class="px-4 py-2">95</td>
                            <td class="px-4 py-2">+3:45</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Configuration des graphiques
        const speedCtx = document.getElementById('speedChart').getContext('2d');
        new Chart(speedCtx, {
            type: 'line',
            data: {
                labels: ['Étape 1', 'Étape 2', 'Étape 3'],
                datasets: [{
                    label: 'Vitesse (km/h)',
                    data: [42.5, 40.2, 44.1],
                    borderColor: 'rgb(37, 99, 235)',
                    tension: 0.1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        const pointsCtx = document.getElementById('pointsChart').getContext('2d');
        new Chart(pointsCtx, {
            type: 'bar',
            data: {
                labels: ['Étape 1', 'Étape 2', 'Étape 3'],
                datasets: [{
                    label: 'Points',
                    data: [25, 18, 30],
                    backgroundColor: 'rgb(37, 99, 235)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>