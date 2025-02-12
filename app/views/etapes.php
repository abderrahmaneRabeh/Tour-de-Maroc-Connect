<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement Cycliste</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php require "../app/inc/navbar.php"; ?>

    <!-- Filtrage des étapes -->
    <section class="flex items-center justify-center py-10">
        <form action="" method="GET"
            class="flex flex-wrap items-center justify-center w-full max-w-3xl gap-4 p-4 bg-white rounded-lg shadow-md"
            id="filter_form">
            <select name="region" id="region"
                class="w-full p-2 border rounded-md md:w-1/3 focus:ring-2 focus:ring-green-500">
                <option value="">Toutes les régions</option>
                <option value="Atlas">Atlas</option>
                <option value="Sahara">Sahara</option>
                <option value="Anti_Atlas">Anti-Atlas</option>
                <option value="Moyen_Atlas">Moyen-Atlas</option>
            </select>
            <select name="difficulte" id="difficulte"
                class="w-full p-2 border rounded-md md:w-1/3 focus:ring-2 focus:ring-green-500">
                <option value="">Toutes les difficultés</option>
                <option value="facile">Facile</option>
                <option value="Medium">Moyen</option>
                <option value="diffucile">Difficile</option>
            </select>
            <button type="submit"
                class="px-6 py-2 font-semibold text-white transition-transform transform bg-green-600 rounded-md hover:bg-green-700 hover:scale-105">Filtrer</button>
        </form>
    </section>

    <!-- Tableau des étapes -->
    <main class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-center text-gray-700">Liste des Étapes</h2>
        <div class="overflow-hidden border rounded-lg shadow-md">
            <table class="w-full">
                <thead class="text-white bg-green-600">
                    <tr>
                        <th class="p-3 text-left">Nom</th>
                        <th class="p-3 text-left">Lieu Départ</th>
                        <th class="p-3 text-left">Lieu Arrivée</th>
                        <th class="p-3 text-left">Distance (km)</th>
                        <th class="p-3 text-left">Région</th>
                        <th class="p-3 text-left">Difficulté</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($data as $etape): ?>
                        <tr class="transition-all duration-300 hover:bg-green-100 odd:bg-gray-50 even:bg-white">
                            <td class="p-3"><?= $etape->nom ?></td>
                            <td class="p-3"><?= $etape->lieu_depart ?></td>
                            <td class="p-3"><?= $etape->lieu_arrivee ?></td>
                            <td class="p-3"><?= $etape->distance_km ?> km</td>
                            <td class="p-3"><?= $etape->region ?></td>
                            <td class="p-3"><?= $etape->difficulte ?></td>
                            <td class="p-3 text-center">
                                <a href="http://localhost/TourMaroc/Etapes/details/<?= $etape->id ?>"
                                    class="px-4 py-2 text-white transition-transform transform bg-blue-500 rounded hover:bg-blue-600 hover:scale-105">📌
                                    Voir détails</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterForm = document.getElementById('filter_form');

            filterForm.addEventListener('submit', function (event) {
                event.preventDefault();
                let region = document.getElementById('region').value;
                let difficulte = document.getElementById('difficulte').value;
                let myTable = document.getElementById('myTable');

                fetch(`http://localhost/TourMaroc/Etapes/filter?difficulte=${difficulte}&region=${region}`)
                    .then(response => response.json())
                    .then(data => {
                        myTable.innerHTML = '';

                        if (data.length === 0) {
                            myTable.innerHTML = `<tr><td colspan="7" class="p-4 text-center text-gray-500">Aucune étape trouvée</td></tr>`;
                            return;
                        }

                        data.forEach(etape => {
                            let row = document.createElement('tr');
                            row.classList.add("transition-all", "duration-300", "hover:bg-green-100", "odd:bg-gray-50", "even:bg-white");

                            row.innerHTML = `
                                <td class="p-3">${etape.nom}</td>
                                <td class="p-3">${etape.lieu_depart}</td>
                                <td class="p-3">${etape.lieu_arrivee}</td>
                                <td class="p-3">${etape.distance_km} km</td>
                                <td class="p-3">${etape.region}</td>
                                <td class="p-3">${etape.difficulte}</td>
                                <td class="p-3 text-center">
                                    <a href="http://localhost/TourMaroc/Etapes/details/${etape.id}"
                                        class="px-4 py-2 text-white transition-transform transform bg-blue-500 rounded hover:bg-blue-600 hover:scale-105">📌 Voir détails</a>
                                </td>
                            `;
                            myTable.appendChild(row);
                        });
                    });
            });
        });
    </script>
</body>

</html>