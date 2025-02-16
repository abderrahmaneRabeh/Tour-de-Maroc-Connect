<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Event Dashboard - Etapes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <?php require_once '../app/config/config.php'; ?>

    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-800">
                <div class="flex items-center justify-center h-16 bg-gray-900">
                    <span class="text-xl font-semibold text-white">Sports Dashboard</span>
                </div>
                <div class="flex flex-col flex-1 overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 space-y-4">
                        <a href="index.php"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="<?php echo URLROOT . '/Categorys/index' ?>"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Categories
                        </a>
                        <a href="<?php echo URLROOT . '/Etapes/adminEtapes' ?>"
                            class="flex items-center px-4 py-2 text-white bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Etapes
                        </a>
                        <a href="<?php echo URLROOT . '/Admin/Commentaires' ?>"
                            class="flex items-center px-4 py-2 text-gray-300 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 5H7M5 8a2 2 0 01-2 2v12a2 2 0 002 2h10a2 2 0 002-2V10a2 2 0 00-2-2h-3.5a1 1 0 01-.8-.4l-1.5-1.5A1 1 0 005 8h6z">
                                </path>
                            </svg>
                            Commentaire
                        </a>
                        <a href="<?php echo URLROOT . '/Admin/ValiderCyclistes' ?>"
                            class="flex items-center px-4 py-2 text-white rounded-lg">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Valider Cyclistes
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <span class="mr-4 text-gray-700">Admin</span>
                <div class="flex items-center">
                    <div class="relative">
                        <button class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                            <img class="w-8 h-8 rounded-full" src="/api/placeholder/32/32" alt="Profile">
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container px-6 py-8 mx-auto">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-2xl font-semibold text-gray-800">Etapes</h1>
                            <button onclick="openAddModal()"
                                class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Add Etape +
                            </button>
                        </div>

                        <div class="p-4 mx-auto max-w-7xl">
                            <!-- Table Container with horizontal scroll for mobile -->
                            <div class="overflow-x-auto rounded-lg shadow-sm">
                                <?php if (isset($_SESSION['success'])): ?>
                                    <p
                                        class="px-4 py-2 mb-4 text-center text-green-700 bg-green-100 rounded-lg animate-pulse">
                                        <?php echo $_SESSION['success'];
                                        unset($_SESSION['success']); ?>
                                    </p>
                                <?php endif; ?>
                                <table class="w-full text-sm bg-white">
                                    <!-- Table Header -->

                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 font-semibold text-left text-gray-900">Name</th>
                                            <th class="px-4 py-3 font-semibold text-left text-gray-900">Start Location
                                            </th>
                                            <th class="px-4 py-3 font-semibold text-left text-gray-900">End Location
                                            </th>
                                            <th class="px-4 py-3 font-semibold text-left text-gray-900">Distance (km)
                                            </th>
                                            <th class="px-4 py-3 font-semibold text-center text-gray-900">Start Date
                                            </th>
                                            <th class="px-4 py-3 font-semibold text-right text-gray-900">End Date</th>
                                            <th class="px-4 py-3 font-semibold text-right text-gray-900">Difficulty</th>
                                            <th class="px-4 py-3 font-semibold text-right text-gray-900">Region</th>
                                            <th class="px-4 py-3 font-semibold text-center text-gray-900">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <?php foreach ($data['ObjEtapeAdmin'] as $etape): ?>
                                            <tr class="transition-colors hover:bg-gray-50">
                                                <td class="px-4 py-3 text-blue-600 hover:text-blue-800">
                                                    <a href="<?= URLROOT ?>/Etapes/details/<?= $etape['id'] ?>"
                                                        class="hover:underline">
                                                        <?= $etape['nom'] ?>
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3 text-gray-600"><?= $etape['lieu_depart'] ?></td>
                                                <td class="px-4 py-3 text-gray-600"><?= $etape['lieu_arrivee'] ?></td>
                                                <td class="px-4 py-3 text-gray-600"><?= $etape['distance_km'] ?></td>
                                                <td class="px-4 py-3 text-center text-gray-600"><?= $etape['date_depart'] ?>
                                                </td>
                                                <td class="px-4 py-3 text-right text-gray-600"><?= $etape['date_arrive'] ?>
                                                </td>
                                                <td class="px-4 py-3 text-right text-gray-600"><?= $etape['difficulte'] ?>
                                                </td>
                                                <td class="px-4 py-3 text-right text-gray-600"><?= $etape['region'] ?>
                                                </td>
                                                <td class="px-4 py-3 space-x-2 text-center">
                                                    <button
                                                        onclick="openEditModal(<?= htmlspecialchars(json_encode($etape)) ?>)"
                                                        class="text-blue-600 hover:text-blue-800">
                                                        <svg class="inline w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </button>
                                                    <a href="<?= URLROOT ?>/Etapes/delete/<?= $etape['id'] ?>"
                                                        onclick="return confirm('Are you sure you want to delete this etape?')"
                                                        class="text-red-600 hover:text-red-800">
                                                        <svg class="inline w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Add Etape Modal -->
                        <div id="addModal"
                            class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
                            <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
                                <div class="mt-3">
                                    <h3 class="mb-4 text-lg font-medium text-gray-900">Add New Etape</h3>
                                    <form method="POST" action="<?= URLROOT ?>/Etapes/addEtapes" class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="nom" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Start
                                                Location</label>
                                            <input type="text" name="lieu_depart" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">End Location</label>
                                            <input type="text" name="lieu_arrivee" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Distance (km)</label>
                                            <input type="number" name="distance_km" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                            <input type="datetime-local" name="date_depart" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                                            <input type="datetime-local" name="date_arrive" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <select name="category_id" required
                                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="" disabled selected>Select a Category</option>
                                            <?php foreach ($data['category'] as $category): ?>
                                                <option value="<?= $category['id']; ?>"><?= $category['nom']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Difficulty</label>
                                            <select name="difficulte" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option value="facile">facile</option>
                                                <option value="Medium">Medium</option>
                                                <option value="diffucile">diffucile</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Region</label>
                                            <input type="text" name="region" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div class="flex justify-end gap-4 mt-6">
                                            <button type="button" onclick="closeModal('addModal')"
                                                class="px-4 py-2 text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                                Add Etape
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="editModal"
                            class="fixed inset-0 z-50 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
                            <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
                                <div class="mt-3">
                                    <h3 class="mb-4 text-lg font-medium text-gray-900">Edit Etape</h3>
                                    <form method="POST" action="<?= URLROOT ?>/Etapes/updateEtapes" class="space-y-4">
                                        <input type="hidden" id="edit_id" name="id" />
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" id="edit_nom" name="nom" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Start
                                                Location</label>
                                            <input type="text" id="edit_lieu_depart" name="lieu_depart" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">End Location</label>
                                            <input type="text" id="edit_lieu_arrivee" name="lieu_arrivee" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Distance (km)</label>
                                            <input type="number" id="edit_distance_km" name="distance_km" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                            <input type="datetime-local" id="edit_date_depart" name="date_depart"
                                                required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                                            <input type="datetime-local" id="edit_date_arrive" name="date_arrive"
                                                required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <select id="edit_category_id" name="category_id" required
                                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="" disabled selected>Select a Category</option>
                                            <?php foreach ($data['category'] as $category): ?>
                                                <option value="<?= $category['id']; ?>"><?= $category['nom']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Difficulty</label>
                                            <select id="edit_difficulte" name="difficulte" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option value="facile">Facile</option>
                                                <option value="Medium">Medium</option>
                                                <option value="diffucile">Difficile</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Region</label>
                                            <input type="text" id="edit_region" name="region" required
                                                class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div class="flex justify-end gap-4 mt-6">
                                            <button type="button" onclick="closeModal('editModal')"
                                                class="px-4 py-2 text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                                Update Etape
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function openEditModal(etape) {
            const modal = document.getElementById('editModal');

            document.getElementById('edit_id').value = etape.id;
            document.getElementById('edit_nom').value = etape.nom;
            document.getElementById('edit_lieu_depart').value = etape.lieu_depart;
            document.getElementById('edit_lieu_arrivee').value = etape.lieu_arrivee;
            document.getElementById('edit_distance_km').value = etape.distance_km;
            document.getElementById('edit_date_depart').value = etape.date_depart;
            document.getElementById('edit_date_arrive').value = etape.date_arrive;
            document.getElementById('edit_difficulte').value = etape.difficulte;
            document.getElementById('edit_region').value = etape.region;


            modal.classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        window.onclick = function (event) {
            const addModal = document.getElementById('addModal');
            const editModal = document.getElementById('editModal');
            if (event.target == addModal) {
                addModal.classList.add('hidden');
            }
            if (event.target == editModal) {
                editModal.classList.add('hidden');
            }
        }
        document.querySelector('button').addEventListener('click', () => {
            const sidebar = document.querySelector('.md\\:flex');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>

</html>