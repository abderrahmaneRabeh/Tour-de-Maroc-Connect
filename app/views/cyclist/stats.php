

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-800">
                <div class="flex items-center justify-center h-16 bg-gray-900">
                    <i class="fas fa-bicycle text-2xl text-white mr-2"></i>
                    <span class="text-xl font-semibold text-white">Tour du Maroc</span>
                </div>
                <div class="flex flex-col flex-1 overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 space-y-2">
                        <a href="<?= URLROOT . '/cyclists/dashboard' ?>" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                            <i class="fas fa-chart-line w-6 h-6 mr-3"></i>
                            Vue d'ensemble
                        </a>
                        <a href="<?= URLROOT . '/cyclists/profile' ?>" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                            <i class="fas fa-user w-6 h-6 mr-3"></i>
                            Profil
                        </a>
                        <a href="<?= URLROOT . '/cyclists/stats'?>" class="flex items-center px-4 py-3 text-white bg-gray-700 rounded-lg">
                            <i class="fas fa-trophy w-6 h-6 mr-3"></i>
                            Performance
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <div class="flex items-center md:hidden">
                    <button class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
                <span class="text-gray-700">Performances</span>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-bell text-gray-600 cursor-pointer"></i>
                    <i class="fas fa-cog text-gray-600 cursor-pointer"></i>
                    <a href="<?= URLROOT . '/users/signout' ?>" class="fas fa-sign-out-alt text-gray-600 cursor-pointer"></a>                    <div class="relative">
                        <button class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container px-6 py-8 mx-auto">
                    <h3 class="text-3xl font-medium text-gray-700 mb-6">Performance</h3>
                    
                    <!-- Performance Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-sm font-medium text-gray-600">Vitesse Moyenne</h3>
        <p class="text-2xl font-bold mt-2"><?= number_format($data['overview']->vitesse_moy, 1) ?> km/h</p>
        <span class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> +2.3%</span>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-sm font-medium text-gray-600">Points Totaux</h3>
        <p class="text-2xl font-bold mt-2"><?= $data['overview']->points_total ?? 0 ?></p>
        <span class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> +15</span>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-sm font-medium text-gray-600">Position Générale</h3>
        <p class="text-2xl font-bold mt-2">#<?= $data['overview']->position_generale ?? 'N/A' ?></p>
        <span class="text-red-500 text-sm"><i class="fas fa-arrow-down"></i> -1</span>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-sm font-medium text-gray-600">Distance Totale</h3>
        <p class="text-2xl font-bold mt-2"><?= number_format($data['overview']->distance_totale ?? 0, 0) ?> km</p>
        <span class="text-gray-500 text-sm">sur 1200 km</span>
    </div>
</div>

                    <!-- Performance Charts -->
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

                    <!-- Stage Details Table -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">Détails des Étapes</h3>
                            <div class="flex space-x-2">
                                <select class="border rounded-lg px-3 py-1">
                                    <option>Toutes les étapes</option>
                                    <option>Dernière semaine</option>
                                    <option>Dernier mois</option>
                                </select>
                                <button class="bg-indigo-600 text-white px-4 py-1 rounded-lg">
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
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($data['detailEtaps'])): ?>
                                    <?php foreach ($data['detailEtaps'] as $etape): ?>
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="px-4 py-2"><?= htmlspecialchars($etape->nom) ?></td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($etape->date_depart) ?></td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($etape->distance_km) ?> km</td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($etape->vitesse_moy) ?> km/h</td>
                                        <td class="px-4 py-2">#<?= htmlspecialchars($etape->classement) ?></td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($etape->points) ?></td>
                                        <td class="px-4 py-2">
                                            <button class="text-indigo-600 hover:text-indigo-700">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                             <?php else: ?>
                             <tr>
                    <td colspan="7" class="px-4 py-2 text-center">Aucun résultat disponible</td>
                      </tr>
                             <?php endif; ?>
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
                                <button class="px-3 py-1 border rounded-lg bg-indigo-600 text-white">1</button>
                                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">2</button>
                                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">3</button>
                                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Suivant</button>
                            </div>
                        </div>
                    </div>

<!-- Comparison with Leaders -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold mb-4">Comparaison avec les autres cyclistes</h3>
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
            <?php if (isset($data['comparisonData']) && !empty($data['comparisonData'])): ?>
                <?php 
                $loggedInSpeed = 0;
                $loggedInId = $_SESSION['user']['id'];
                
                // First, find the logged-in cyclist's speed
                foreach ($data['comparisonData'] as $cyclist) {
                    if ($cyclist->id == $loggedInId) {
                        $loggedInSpeed = $cyclist->vitesse_moy;
                        break;
                    }
                }
                
                foreach ($data['comparisonData'] as $cyclist): 
                    $isCurrentUser = ($cyclist->id == $loggedInId);
                ?>
                    <tr class="border-t <?= $isCurrentUser ? 'bg-blue-50' : '' ?>">
                        <td class="px-4 py-2">#<?= $cyclist->position ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($cyclist->nom) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($cyclist->equipe) ?></td>
                        <td class="px-4 py-2"><?= number_format($cyclist->vitesse_moy ?? 0, 2) ?> km/h</td>
                        <td class="px-4 py-2"><?= $cyclist->points ?></td>
                        <td class="px-4 py-2">
                        <td class="px-4 py-2">
    <?php if ($isCurrentUser): ?>
        -
    <?php else: ?>
        <?= ($cyclist->vitesse_moy > $loggedInSpeed) ? '-' : '+' ?>
        <?= gmdate("H:i", (int)(abs($cyclist->vitesse_moy - $loggedInSpeed) * 3600)) ?>
    <?php endif; ?>
</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center">Aucune donnée disponible.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
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