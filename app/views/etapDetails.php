<?php require_once "../app/config/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étape</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <?php require "../app/inc/navbar.php"; ?>

    <main class="container px-4 py-8 mx-auto max-w-7xl">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800"><?= $data['ObjEtape']->nom ?></h1>
            <?php if (!$data['isAlreadySignal']): ?>
                <button id="showSignalementForm"
                    class="px-6 py-2 text-white transition-all duration-300 bg-red-500 rounded-full hover:bg-red-600 hover:shadow-lg">
                    <i class="mr-2 fas fa-flag"></i>Signaler l'Étape
                </button>
            <?php else: ?>
                <button
                    class="px-6 py-2 text-white transition-all duration-300 bg-green-500 rounded-full hover:bg-green-600 hover:shadow-lg">
                    <i class="mr-2 fas fa-check-circle"></i>L'Étape a déjà été signalée
                </button>
            <?php endif; ?>
        </div>

        <!-- Main Content Grid -->
        <div class="grid gap-8 md:grid-cols-3">
            <!-- Left Column: Stage Details -->
            <div class="space-y-6 md:col-span-2">
                <!-- Location Card -->
                <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="p-4 rounded-lg bg-green-50">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-green-100 rounded-full">
                                    <i class="text-green-600 fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Départ</p>
                                    <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->lieu_depart ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 rounded-lg bg-red-50">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-red-100 rounded-full">
                                    <i class="text-red-600 fas fa-flag-checkered"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Arrivée</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        <?= $data['ObjEtape']->lieu_arrivee ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details Card -->
                <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
                    <div class="grid gap-4 md:grid-cols-3">
                        <div class="p-4 text-center rounded-lg bg-blue-50">
                            <i class="mb-2 text-2xl text-blue-600 fas fa-route"></i>
                            <p class="text-sm text-gray-500">Distance</p>
                            <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->distance_km ?> km</p>
                        </div>
                        <div class="p-4 text-center rounded-lg bg-purple-50">
                            <i class="mb-2 text-2xl text-purple-600 fas fa-calendar-alt"></i>
                            <p class="text-sm text-gray-500">Date départ</p>
                            <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->date_depart ?></p>
                        </div>
                        <div class="p-4 text-center rounded-lg bg-indigo-50">
                            <i class="mb-2 text-2xl text-indigo-600 fas fa-flag"></i>
                            <p class="text-sm text-gray-500">Date arrivée</p>
                            <p class="text-lg font-semibold text-gray-800"><?= $data['ObjEtape']->date_arrive ?></p>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="flex gap-4 p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
                    <?php if (isset($_SESSION['user']['id'])): ?>
                        <?php if ($data['isAdded']): ?>
                            <a href="<?= URLROOT ?>/Like/remove/<?= $_SESSION['user']['id'] ?>/<?= $data['ObjEtape']->id ?>"
                                class="flex-1 px-6 py-3 text-center text-white transition-all duration-300 bg-red-500 rounded-lg hover:bg-red-600">
                                <i class="mr-2 fas fa-heart-broken"></i>Retirer des favoris
                            </a>
                        <?php else: ?>
                            <a href="<?= URLROOT ?>/Like/add/<?= $_SESSION['user']['id'] ?>/<?= $data['ObjEtape']->id ?>"
                                class="flex-1 px-6 py-3 text-center text-white transition-all duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                                <i class="mr-2 far fa-heart"></i>Ajouter aux favoris
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a href="<?= URLROOT ?>/Etapes/podium/<?= $data['ObjEtape']->id ?>"
                        class="flex-1 px-6 py-3 text-center text-white transition-all duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600">
                        <i class="mr-2 fas fa-trophy"></i>Voir le Podium
                    </a>
                </div>

                <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
                    <h2 class="mb-4 text-xl font-semibold text-gray-800">Contacter l'organisateur</h2>
                    <button type="button"
                        class="w-full px-6 py-3 text-white transition-all duration-300 bg-green-500 rounded-lg hover:bg-green-600"
                        onclick="location.href='<?= URLROOT ?>/Etapes/testMail/<?= $data['ObjEtape']->nom ?>/<?= $data['ObjEtape']->id ?>'">
                        <i class="mr-2 fas fa-envelope"></i>email
                    </button>
                </div>
            </div>

            <!-- Right Column: Comments Section -->
            <div class="space-y-6">
                <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
                    <h2 class="mb-4 text-xl font-semibold text-gray-800">Commentaires</h2>
                    <form action="<?= URLROOT ?>/Comment/add" method="post" class="mb-6">
                        <input type="hidden" name="etap_id" value="<?= $data['ObjEtape']->id ?>">
                        <textarea name="content" rows="4"
                            class="w-full p-3 mb-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:outline-none"
                            placeholder="Votre commentaire..."></textarea>
                        <button type="submit"
                            class="w-full px-4 py-2 text-white transition-all duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600">
                            <i class="mr-2 fas fa-comment"></i>Commenter
                        </button>
                    </form>

                    <div class="space-y-4 overflow-y-auto max-h-60">
                        <?php foreach ($data['objComments'] as $comment): ?>
                            <?php if ($comment->is_valid): ?>
                                <div class="p-4 transition-all duration-300 rounded-lg bg-gray-50 hover:bg-gray-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-sm font-medium text-gray-600"><?= $comment->nom ?></p>
                                        <p class="text-xs text-gray-400"><?= $comment->date_creation ?></p>
                                    </div>
                                    <p class="text-gray-700"><?= $comment->contenu ?></p>
                                    <a href="<?= URLROOT ?>/Comment/delete/<?= $comment->id ?>/<?= $data['ObjEtape']->id ?>"
                                        class="inline-block mt-2 text-sm text-red-500 hover:text-red-600">
                                        <i class="mr-1 fas fa-trash"></i>Supprimer
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="p-4 transition-all duration-300 rounded-lg bg-gray-50 hover:bg-gray-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-sm font-medium text-gray-600"><?= $comment->nom ?> (ID:
                                            <?= $comment->id ?>)</p>
                                    </div>
                                    <p class="text-xs text-gray-400">Votre message va afficher après validation de l'admin.
                                    </p>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Signalement Modal -->
    <div id="signalementFormContainer" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="w-full max-w-md p-6 bg-white rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Signaler l'étape</h3>
                    <button id="closeSignalementForm" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form action="<?= URLROOT ?>/Signalement/add" method="post">
                    <input type="hidden" name="etap_id" value="<?= $data['ObjEtape']->id ?>">
                    <select name="type" required
                        class="w-full p-3 mb-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:outline-none">
                        <option value="" disabled selected>Choisir un motif</option>
                        <option value="Le parcours de l'étape est erroné">Le parcours de l'étape est erroné</option>
                        <option value="La difficulté de l'étape est mal évaluée">La difficulté de l'étape est mal
                            évaluée</option>
                        <option value="La distance de l'étape est inexacte">La distance de l'étape est inexacte</option>
                        <option value="Les informations de départ et d'arrivée sont incorrectes">Les informations de
                            départ et d'arrivée sont incorrectes</option>
                    </select>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white transition-all duration-300 bg-red-500 rounded-lg hover:bg-red-600">
                        <i class="mr-2 fas fa-exclamation-triangle"></i>Envoyer le signalement
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal handlers
        document.getElementById('showSignalementForm').addEventListener('click', () => {
            document.getElementById('signalementFormContainer').classList.remove('hidden');
        });

        document.getElementById('closeSignalementForm').addEventListener('click', () => {
            document.getElementById('signalementFormContainer').classList.add('hidden');
        });

        // Entrance animations
        document.addEventListener('DOMContentLoaded', () => {
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
        });
    </script>
</body>

</html>