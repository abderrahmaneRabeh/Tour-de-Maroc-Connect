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
                        <a href="<?= URLROOT . '/cyclists/dashboard' ?>" class="flex items-center px-4 py-3 text-white bg-gray-700 rounded-lg">
                            <i class="fas fa-chart-line w-6 h-6 mr-3"></i>
                            Vue d'ensemble
                        </a>
                        <a href="<?= URLROOT . '/cyclists/profile' ?>" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                            <i class="fas fa-user w-6 h-6 mr-3"></i>
                            Profil
                        </a>
                        <a href="<?= URLROOT . '/cyclists/stats' ?>" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
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
                <span class="text-gray-700">Dashboard</span>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-cog text-gray-600 cursor-pointer"></i>
                    <i class="fas fa-sign-out-alt text-gray-600 cursor-pointer"></i>
                    <div class="relative">
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
                    <h3 class="text-3xl font-medium text-gray-700 mb-6">Vue d'ensemble</h3>
                    
                    <!-- Cards Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <!-- Card Points -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-700">Points Totaux</h3>
                            <p class="text-3xl font-bold mt-2"><?= htmlspecialchars($data['stats']['points']) ?></p>
                        </div>
                        <!-- Card Ranking -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-700">Classement Actuel</h3>
                            <p class="text-3xl font-bold mt-2">#<?= htmlspecialchars($data['stats']['ranking']) ?></p>
                        </div>
                        <!-- Card Speed -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-700">Vitesse Moyenne</h3>
                            <p class="text-3xl font-bold mt-2"><?= htmlspecialchars($data['stats']['averageSpeed']) ?> km/h</p>
                        </div>
                    </div>

                    <!-- Performance Chart -->
                    <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Tendances de Performance</h3>
                        <div class="h-80">
                            <canvas id="performanceChart"></canvas>
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
    </script>
</body>