
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
                        <a href="<?= URLROOT . '/cyclists/profile' ?>" class="flex items-center px-4 py-3 text-white bg-gray-700 rounded-lg">
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
                <span class="text-gray-700"><?php echo htmlspecialchars(($cyclist->nom ?? 'Cycliste')); ?></span>
                <div class="flex items-center">
                    <div class="relative">
                        <button class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                            <?php if(!empty($cyclist->img)): ?>
                                <img class="w-8 h-8 rounded-full object-cover" src="<?php echo URLROOT . '/' . $cyclist->img . '?v=' . time(); ?>" alt="Profile">
                            <?php else: ?>
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container px-6 py-8 mx-auto">
                    <?php
                    $cyclist = $data['cyclist'] ?? null;
                    $teams = $data['teams'] ?? [];
                    ?>

                    <!-- Notifications -->
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-3"></i>
                                <p><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($_SESSION['success'])): ?>
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-3"></i>
                                <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h3 class="text-3xl font-medium text-gray-700 mb-6">Profil du Cycliste</h3>

                    <!-- Profile Header -->
                    <div class="bg-white rounded-lg shadow p-6 mb-6">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                            <form action="<?php echo URLROOT; ?>/cyclists/updateProfileImage" method="post" enctype="multipart/form-data" class="relative group mb-4 sm:mb-0 sm:mr-6">
                                <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <?php if(!empty($cyclist->img)): ?>
                                        <img src="<?php echo URLROOT . '/' . $cyclist->img . '?v=' . time(); ?>" alt="Profile" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <i class="fas fa-user text-gray-400 text-5xl"></i>
                                    <?php endif; ?>
                                </div>
                                <label for="profile_image" class="absolute bottom-0 right-0 bg-blue-600 hover:bg-blue-700 rounded-full p-2 cursor-pointer transition-colors">
                                    <i class="fas fa-camera text-white"></i>
                                </label>
                                <input type="file" id="profile_image" name="profile_image" class="hidden" onchange="this.form.submit()">
                            </form>
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-700 mb-2"><?php echo htmlspecialchars(($cyclist->nom ?? '')); ?></h2>
                                <p class="text-gray-600 mb-1 flex items-center">
                                    <i class="fas fa-users text-indigo-600 mr-2"></i>
                                    <?php 
                                    $equipe = '';
                                    foreach($teams as $team) {
                                        if($team->id == $cyclist->equipe_id) {
                                            $equipe = $team->nom;
                                            break;
                                        }
                                    }
                                    echo htmlspecialchars($equipe);
                                    ?>
                                </p>
                                <p class="text-gray-600 flex items-center">
                                    <i class="fas fa-flag text-indigo-600 mr-2"></i>
                                    <?php echo htmlspecialchars(($cyclist->nationalite ?? 'Non spécifié')); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Personal Information -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold mb-4 text-gray-700 flex items-center pb-2 border-b">
                                <i class="fas fa-info-circle text-indigo-600 mr-2"></i>
                                Informations Personnelles
                            </h3>
                            <form action="<?php echo URLROOT; ?>/cyclists/updateProfile" method="post" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                                    <input type="text" name="nom" value="<?php echo htmlspecialchars(($cyclist->nom ?? '') ); ?>" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" value="<?php echo htmlspecialchars(($cyclist->email ?? '')); ?>" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Équipe</label>
                                    <select name="equipe_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                        <option value="">-- Sélectionner une équipe --</option>
                                        <?php foreach($teams as $team): ?>
                                        <option value="<?php echo $team->id; ?>" <?php echo ($cyclist->equipe_id == $team->id) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($team->nom); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nationalité</label>
                                    <input type="text" name="nationalite" value="<?php echo htmlspecialchars(($cyclist->nationalite ?? '')); ?>" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Biographie</label>
                                    <textarea name="bio" rows="4" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition-colors"><?php echo htmlspecialchars(($cyclist->bio ?? '')); ?></textarea>
                                </div>
                                <button type="submit" 
                                    class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors flex items-center justify-center">
                                    <i class="fas fa-save mr-2"></i>
                                    Sauvegarder les modifications
                                </button>
                            </form>
                        </div>

                        <!-- Recent Performances -->
                        <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                            <h3 class="text-lg font-semibold mb-4 text-gray-700 flex items-center pb-2 border-b">
                                <i class="fas fa-chart-line text-indigo-600 mr-2"></i>
                                Performances Récentes
                            </h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Étape</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Temps</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Points</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php if(isset($data['performances']) && !empty($data['performances'])): ?>
                                            <?php foreach($data['performances'] as $performance): ?>
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($performance->etape_nom); ?></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo date('d/m/Y', strtotime($performance->date_depart)); ?></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $performance->classement; ?></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $performance->temps_total; ?></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $performance->points; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucune performance enregistrée</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="<?php echo URLROOT; ?>/cyclists/performances" 
                                    class="text-indigo-600 hover:text-indigo-700 transition-colors inline-flex items-center">
                                    Voir toutes les performances
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    
          <!-- Race History -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4 text-gray-700 flex items-center pb-2 border-b">
        <i class="fas fa-history text-indigo-600 mr-2"></i>
        Historique des Courses
    </h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
          
            <?php if (!empty($data['historiques'])): ?>
                <?php foreach ($data['historiques'] as $historique): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($historique->evenement) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= date('d/m/Y', strtotime($historique->dateEvenement)) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?= $historique->classement ? $historique->classement.'ème' : 'N/A' ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= htmlspecialchars(substr($historique->description, 0, 50)) ?>
                                <?= (strlen($historique->description) > 50) ? '...' : '' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Aucun historique de course disponible
                        </td>
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
    </script>
</body>
</html>