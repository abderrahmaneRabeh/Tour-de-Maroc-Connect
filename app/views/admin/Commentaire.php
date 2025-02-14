<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Event Dashboard - Categories</title>
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
                            class="flex items-center px-4 py-2 text-white rounded-lg">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Categories
                        </a>
                        <a href="<?php echo URLROOT . '/Etapes/adminEtapes' ?>"
                            class="flex items-center px-4 py-2 text-white rounded-lg">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Etapes
                        </a>
                        <a href="<?php echo URLROOT . '/Admin/Commentaires' ?>"
                            class="flex items-center px-4 py-2 text-gray-300 bg-gray-700 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 5H7M5 8a2 2 0 01-2 2v12a2 2 0 002 2h10a2 2 0 002-2V10a2 2 0 00-2-2h-3.5a1 1 0 01-.8-.4l-1.5-1.5A1 1 0 005 8h6z">
                                </path>
                            </svg>
                            Commentaire
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
                        <h1 class="mb-6 text-2xl font-semibold text-gray-800">Commentaires</h1>
                        <!-- Categories List -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <!-- <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            ID
                                        </th> -->
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Contenu
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            Fan
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            etap
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">
                                            operation
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($data as $comment) { ?>
                                        <tr>
                                            <!-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $comment->id; ?>
                                            </td> -->
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $comment->contenu; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $comment->nom; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <?php echo $comment->etapeNom; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="<?php echo URLROOT . '/Admin/validerCommentaire/' . $comment->id; ?>"
                                                    class="text-blue-500 hover:text-blue-700">
                                                    Valider
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Edit Modal -->
                        <div id="editModal"
                            class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
                            <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
                                <div class="mt-3">
                                    <h3 class="mb-4 text-lg font-medium text-gray-900">Edit Category</h3>
                                    <form method="POST" action="<?= URLROOT ?>/Categorys/updateCategory"
                                        class="space-y-4">
                                        <input type="hidden" name="id_category" id="categoryId">
                                        <input type="text" name="nom_category" id="categoryName"
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <div class="flex justify-end gap-4">
                                            <button type="button"
                                                onclick="document.getElementById('editModal').classList.add('hidden')"
                                                class="px-4 py-2 text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                                Save Changes
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
        function openEditModal(id, name) {
            document.getElementById('categoryId').value = id;
            document.getElementById('categoryName').value = name;
            document.getElementById('editModal').classList.remove('hidden');
        }

        // Close modal when clicking outside
        window.onclick = function (event) {
            const modal = document.getElementById('editModal');
            if (event.target == modal) {
                modal.classList.add('hidden');
            }
        }

        // Toggle mobile menu
        document.querySelector('button').addEventListener('click', () => {
            const sidebar = document.querySelector('.md\\:flex');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>

</html>