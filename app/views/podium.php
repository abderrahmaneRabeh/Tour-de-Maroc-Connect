<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des Cyclistes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        .grid-pattern {
            background-image: linear-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .standings-row {
            transition: transform 0.2s ease;
        }

        .standings-row:hover {
            transform: translateX(5px);
            background: rgba(0, 0, 0, 0.02);
        }

        .podium-block {
            transition: all 0.3s ease;
        }

        .podium-block:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body class="min-h-screen p-8 bg-white">
    <?php
    require "../app/inc/navbar.php";
    ?>
    <div class="container max-w-6xl mx-auto mt-10">


        <!-- <?php
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        ?> -->

        <!-- Top 3 Podium -->
        <div class="mb-16 grid-pattern">
            <div class="flex items-end justify-center gap-8">
                <!-- 2ème place -->
                <div class="text-center podium-block w-72">
                    <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                        alt="Deuxième"
                        class="object-cover w-48 h-48 mx-auto mb-4 border-8 border-gray-200 rounded-full" />
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="mb-1 text-sm text-gray-600"><?php echo $data[1]->points; ?> PTS</div>
                        <h2 class="text-2xl font-bold text-gray-800"><?php echo $data[1]->nom; ?></h2>
                        <div class="text-sm text-gray-500"><?php echo $data[1]->equipe; ?></div>
                        <div class="relative w-full h-24 mt-4 bg-gray-200 rounded-t-lg">
                            <span
                                class="absolute text-3xl font-bold text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">2</span>
                        </div>
                    </div>
                </div>

                <!-- 1ère place -->
                <div class="-mb-8 text-center podium-block w-72">
                    <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                        alt="Premier"
                        class="object-cover w-56 h-56 mx-auto mb-4 border-8 border-gray-800 rounded-full" />
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="mb-1 text-sm text-gray-600"><?php echo $data[0]->points; ?> PTS</div>
                        <h2 class="text-2xl font-bold text-gray-800"><?php echo $data[0]->nom; ?></h2>
                        <div class="text-sm text-gray-500"><?php echo $data[0]->equipe; ?></div>
                        <div class="relative w-full h-32 mt-4 bg-gray-800 rounded-t-lg">
                            <span
                                class="absolute text-3xl font-bold text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">1</span>
                        </div>
                    </div>
                </div>

                <!-- 3ème place -->
                <div class="text-center podium-block w-72">
                    <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                        alt="Troisième"
                        class="object-cover w-48 h-48 mx-auto mb-4 border-8 border-gray-400 rounded-full" />
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="mb-1 text-sm text-gray-600"><?php echo $data[2]->points; ?> PTS</div>
                        <h2 class="text-2xl font-bold text-gray-800"><?php echo $data[2]->nom; ?></h2>
                        <div class="text-sm text-gray-500"><?php echo $data[2]->equipe; ?></div>
                        <div class="relative w-full h-16 mt-4 bg-gray-400 rounded-t-lg">
                            <span
                                class="absolute text-3xl font-bold text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classement Complet -->
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="space-y-1">
                <!-- Lignes du classement 4-10 -->
                <?php for ($i = 3; $i < count($data); $i++): ?>
                    <div class="flex items-center p-4 border-l-4 border-gray-200 standings-row">
                        <div class="w-12 font-bold text-gray-600"><?= $i + 1 ?></div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-800"><?= $data[$i]->nom ?></div>
                            <div class="text-sm text-gray-500"><?= $data[$i]->points ?> PTS</div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button class="px-8 py-2 font-bold text-white transition-colors bg-gray-800 rounded hover:bg-gray-900">
                VOIR CLASSEMENT COMPLET
            </button>
        </div>
    </div>
</body>

</html>