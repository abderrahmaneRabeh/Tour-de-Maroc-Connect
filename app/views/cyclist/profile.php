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


    <div class="container mx-auto px-4 py-8">
        <!-- En-tête du profil -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="md:flex items-start space-x-6">
                <div class="relative group">
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        <img src="/api/placeholder/128/128" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-0 right-0 bg-blue-600 rounded-full p-2 cursor-pointer">
                        <i class="fas fa-camera text-white"></i>
                    </div>
                </div>
                <div class="mt-4 md:mt-0">
                    <h2 class="text-2xl font-bold mb-2">Mohammed Alami</h2>
                    <p class="text-gray-600 mb-4">Atlas Riders</p>
                    <div class="flex space-x-4">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Modifier le profil
                        </button>
                        <button class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-50">
                            Partager le profil
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations détaillées -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Informations personnelles -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">Informations Personnelles</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                        <input type="text" value="Mohammed Alami" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" value="mohammed.alami@example.com" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input type="tel" value="+212 6XX-XXXXXX" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date de naissance</label>
                        <input type="date" value="1995-06-15" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </form>
            </div>

            <!-- Informations sportives -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">Informations Sportives</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Équipe actuelle</label>
                        <input type="text" value="Atlas Riders" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nationalité</label>
                        <input type="text" value="Marocain" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select class="w-full px-3 py-2 border rounded-lg">
                            <option>Elite</option>
                            <option>Amateur</option>
                            <option>Junior</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Années d'expérience</label>
                        <input type="number" value="5" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </form>
            </div>

            <!-- Palmarès -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">Palmarès</h3>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h4 class="font-medium">Tour du Maroc 2023</h4>
                        <p class="text-gray-600">3ème au classement général</p>
                        <p class="text-sm text-gray-500">2 victoires d'étape</p>
                    </div>
                    <div class="border-b pb-4">
                        <h4 class="font-medium">Championnat National 2023</h4>
                        <p class="text-gray-600">2ème place</p>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700">
                        + Ajouter un titre
                    </button>
                </div>
            </div>
        </div>

        <!-- Historique des courses -->
        <div class="mt-6 bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold mb-4">Historique des Courses</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-left">Course</th>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Position</th>
                            <th class="px-4 py-2 text-left">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2">Tour du Maroc - Étape 1</td>
                            <td class="px-4 py-2">15/01/2024</td>
                            <td class="px-4 py-2">3ème</td>
                            <td class="px-4 py-2">25</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2">Tour du Maroc - Étape 2</td>
                            <td class="px-4 py-2">17/01/2024</td>
                            <td class="px-4 py-2">5ème</td>
                            <td class="px-4 py-2">18</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>