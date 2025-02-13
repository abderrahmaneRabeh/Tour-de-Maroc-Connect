<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement Cycliste</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Header Section -->
    <header class="py-6 text-white bg-green-700 shadow-md">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-4xl font-bold">🏆 Tour du Maroc - Étapes</h1>
            <p class="mt-2 text-lg">Découvrez les moments forts des étapes passées</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl px-4 py-10 mx-auto">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php
            foreach ($data as $etape) {
                echo "<div class='p-6 transition duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl'>";
                echo "<h2 class='mb-3 text-2xl font-bold text-green-700'>" . $etape->nom . "</h2>";
                echo "<p class='text-gray-600'><strong>Lieu départ :</strong> " . $etape->lieu_depart . "</p>";
                echo "<p class='text-gray-600'><strong>Lieu arrivée :</strong> " . $etape->lieu_arrivee . "</p>";
                echo "<p class='text-gray-600'><strong>Distance :</strong> " . $etape->distance_km . " km</p>";
                echo "<p class='text-gray-600'><strong>Date départ :</strong> " . $etape->date_depart . "</p>";
                echo "<p class='text-gray-600'><strong>Date arrivée :</strong> " . $etape->date_arrive . "</p>";
                echo "<p class='text-gray-600'><strong>Catégorie :</strong> " . $etape->categorie_id . "</p>";
                echo "<p class='text-gray-600'><strong>Difficulté :</strong> " . $etape->difficulte . "</p>";

                echo "<div class='mt-4 text-center'>";
                echo "<a href='Etapes/details/" . $etape->id . "' class='px-5 py-2 text-white transition duration-300 bg-blue-500 rounded-full hover:bg-blue-600'>";
                echo "📌 Voir détails";
                echo "</a>";
                echo "</div>";

                echo "</div>";
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-10 text-center text-white bg-green-800">
        <p>© 2024 Tour du Maroc. Tous droits réservés.</p>
    </footer>

</body>

</html>