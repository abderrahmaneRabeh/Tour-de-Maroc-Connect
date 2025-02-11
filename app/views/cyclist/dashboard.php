
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm px-8 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <i class="fas fa-bicycle text-3xl text-blue-600"></i>
                <h1 class="text-2xl font-bold">Tour du Maroc</h1>
            </div>
            <div class="flex items-center space-x-4">
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

        <!-- Contenu Principal -->
        <main class="flex-1 p-8">
            <!-- Section Vue d'ensemble -->
            <div id="overview" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Carte Points -->
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-700">Points Totaux</h3>
                        <p class="text-3xl font-bold mt-2">95</p>
                    </div>
                    <!-- Carte Classement -->
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-700">Classement Actuel</h3>
                        <p class="text-3xl font-bold mt-2">#3</p>
                    </div>
                    <!-- Carte Vitesse -->
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-700">Vitesse Moyenne</h3>
                        <p class="text-3xl font-bold mt-2">42.1 km/h</p>
                    </div>
                </div>

                <!-- Graphique de Performance -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Tendances de Performance</h3>
                    <div class="h-80">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Section Profil -->
            <div id="profile" class="hidden bg-white rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Informations Personnelles</h2>
                    <div class="space-y-6">
                        <div class="flex items-center space-x-6">
                            <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-4xl text-gray-400"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold">Mohammed Alami</h3>
                                <p class="text-gray-600">Team Atlas Riders</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nationalité</label>
                                <p class="mt-1">Marocain</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Expérience</label>
                                <p class="mt-1">5 ans</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <p class="mt-1">mohammed.alami@example.com</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Équipe</label>
                                <p class="mt-1">Atlas Riders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Performance -->
            <div id="performance" class="hidden">
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-6">Résultats par Étape</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b">
                                        <th class="px-4 py-2 text-left">Étape</th>
                                        <th class="px-4 py-2 text-left">Vitesse (km/h)</th>
                                        <th class="px-4 py-2 text-left">Points</th>
                                        <th class="px-4 py-2 text-left">Classement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td class="px-4 py-2">Étape 1</td>
                                        <td class="px-4 py-2">42.5</td>
                                        <td class="px-4 py-2">25</td>
                                        <td class="px-4 py-2">#3</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="px-4 py-2">Étape 2</td>
                                        <td class="px-4 py-2">40.2</td>
                                        <td class="px-4 py-2">18</td>
                                        <td class="px-4 py-2">#5</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="px-4 py-2">Étape 3</td>
                                        <td class="px-4 py-2">44.1</td>
                                        <td class="px-4 py-2">30</td>
                                        <td class="px-4 py-2">#1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Configuration du graphique
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Étape 1', 'Étape 2', 'Étape 3', 'Étape 4'],
                datasets: [{
                    label: 'Vitesse (km/h)',
                    data: [42.5, 40.2, 44.1, 41.8],
                    borderColor: 'rgb(37, 99, 235)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Gestion de la navigation
        document.querySelectorAll('aside a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                // Retirer la classe active de tous les liens
                document.querySelectorAll('aside a').forEach(l => {
                    l.classList.remove('bg-blue-50', 'text-blue-600');
                    l.classList.add('text-gray-600');
                });
                // Ajouter la classe active au lien cliqué
                link.classList.remove('text-gray-600');
                link.classList.add('bg-blue-50', 'text-blue-600');
                
                // Masquer toutes les sections
                document.querySelectorAll('main > div').forEach(section => {
                    section.classList.add('hidden');
                });
                // Afficher la section correspondante
                const sectionId = link.getAttribute('href').substring(1);
                document.getElementById(sectionId).classList.remove('hidden');
            });
        });
    </script>
</body>
</html>