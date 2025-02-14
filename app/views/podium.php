<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des Cyclistes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .podium-pattern {
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(99, 102, 241, 0.08) 1px, transparent 0);
            background-size: 40px 40px;
        }
        
        .podium-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .podium-card:hover {
            transform: translateY(-8px);
        }

        .standings-row {
            transition: all 0.3s ease;
        }

        .standings-row:hover {
            transform: translateX(8px);
        }

        .medal-glow-gold {
            box-shadow: 0 0 20px rgba(251, 191, 36, 0.3);
        }
        
        .medal-glow-silver {
            box-shadow: 0 0 20px rgba(156, 163, 175, 0.3);
        }
        
        .medal-glow-bronze {
            box-shadow: 0 0 20px rgba(180, 83, 9, 0.3);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <?php require "../app/inc/navbar.php"; ?>

    <div class="container px-4 py-8 mx-auto max-w-7xl">
        <!-- Page Header -->
        <div class="mb-12 text-center">
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Classement des Cyclistes</h1>
            <p class="text-gray-600">Découvrez les meilleurs cyclistes de la compétition</p>
        </div>

        <!-- Top 3 Podium -->
        <div class="mb-16 podium-pattern">
            <div class="flex flex-col items-center justify-center gap-8 md:flex-row md:items-end">
                <!-- 2ème place -->
                <div class="w-full md:w-80 podium-card">
                    <div class="p-6 text-center bg-white shadow-md rounded-xl">
                        <div class="relative inline-block">
                            <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                                alt="Deuxième"
                                class="object-cover w-40 h-40 mx-auto mb-4 border-4 rounded-full medal-glow-silver bg-gradient-to-br from-gray-200 to-gray-400" />
                            <div class="absolute bottom-0 right-0 flex items-center justify-center w-12 h-12 text-xl font-bold text-white transform rounded-full translate-x-1/4 bg-gradient-to-br from-gray-400 to-gray-600">
                                2
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <i class="text-gray-400 fas fa-medal"></i>
                                <span class="text-lg font-semibold text-gray-400">Médaille d'Argent</span>
                            </div>
                            <h2 class="mb-1 text-2xl font-bold text-gray-800"><?php echo $data[1]->nom; ?></h2>
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <i class="text-indigo-500 fas fa-users"></i>
                                <span class="text-gray-600"><?php echo $data[1]->equipe; ?></span>
                            </div>
                            <div class="inline-block px-4 py-2 text-indigo-600 bg-indigo-100 rounded-full">
                                <?php echo $data[1]->points; ?> Points
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 1ère place -->
                <div class="w-full md:w-96 podium-card">
                    <div class="p-6 text-center bg-white shadow-lg rounded-xl">
                        <div class="relative inline-block">
                            <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                                alt="Premier"
                                class="object-cover w-48 h-48 mx-auto mb-4 border-4 rounded-full medal-glow-gold bg-gradient-to-br from-yellow-200 to-yellow-400" />
                            <div class="absolute bottom-0 right-0 flex items-center justify-center text-2xl font-bold text-white transform rounded-full w-14 h-14 translate-x-1/4 bg-gradient-to-br from-yellow-400 to-yellow-600">
                                1
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <i class="text-yellow-400 fas fa-crown"></i>
                                <span class="text-lg font-semibold text-yellow-400">Champion</span>
                            </div>
                            <h2 class="mb-1 text-3xl font-bold text-gray-800"><?php echo $data[0]->nom; ?></h2>
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <i class="text-indigo-500 fas fa-users"></i>
                                <span class="text-gray-600"><?php echo $data[0]->equipe; ?></span>
                            </div>
                            <div class="inline-block px-4 py-2 text-indigo-600 bg-indigo-100 rounded-full">
                                <?php echo $data[0]->points; ?> Points
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3ème place -->
                <div class="w-full md:w-80 podium-card">
                    <div class="p-6 text-center bg-white shadow-md rounded-xl">
                        <div class="relative inline-block">
                            <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                                alt="Troisième"
                                class="object-cover w-40 h-40 mx-auto mb-4 border-4 rounded-full medal-glow-bronze bg-gradient-to-br from-orange-200 to-orange-400" />
                            <div class="absolute bottom-0 right-0 flex items-center justify-center w-12 h-12 text-xl font-bold text-white transform rounded-full translate-x-1/4 bg-gradient-to-br from-orange-400 to-orange-600">
                                3
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <i class="text-orange-400 fas fa-medal"></i>
                                <span class="text-lg font-semibold text-orange-400">Médaille de Bronze</span>
                            </div>
                            <h2 class="mb-1 text-2xl font-bold text-gray-800"><?php echo $data[2]->nom; ?></h2>
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <i class="text-indigo-500 fas fa-users"></i>
                                <span class="text-gray-600"><?php echo $data[2]->equipe; ?></span>
                            </div>
                            <div class="inline-block px-4 py-2 text-indigo-600 bg-indigo-100 rounded-full">
                                <?php echo $data[2]->points; ?> Points
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classement Complet -->
        <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Autres Positions</h2>
            <div class="space-y-3">
                <?php for ($i = 3; $i < count($data); $i++): ?>
                    <div class="p-4 transition-all duration-300 rounded-lg bg-gray-50 standings-row hover:bg-indigo-50">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-10 h-10 text-lg font-bold text-white rounded-full bg-gradient-to-br from-indigo-400 to-indigo-600">
                                <?= $i + 1 ?>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800"><?= $data[$i]->nom ?></h3>
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <i class="text-indigo-500 fas fa-users"></i>
                                        <span class="text-gray-600"><?= $data[$i]->equipe ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="text-indigo-500 fas fa-star"></i>
                                        <span class="text-gray-600"><?= $data[$i]->points ?> Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button class="px-8 py-3 text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 hover:shadow-lg">
                <i class="mr-2 fas fa-list"></i>
                Voir Classement Complet
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Add entrance animation to elements
            const elements = document.querySelectorAll('.podium-card, .standings-row');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        });
    </script>
</body>
</html>