


<body class="bg-gray-50">

<?php
    require "../app/inc/navbar.php";
    ?>


<!-- Contenu principal -->
<section class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-6">Histoire du Tour du Maroc</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Vidéo -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">Regardez l'histoire du Tour du Maroc</h2>
            <iframe class="w-full h-64" src="https://www.youtube.com/embed/videoID1" frameborder="0" allowfullscreen></iframe>
        </div>
        <!-- Articles -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">Articles interactifs</h2>
            <ul class="space-y-4">
                <li class="p-4 bg-gray-800 rounded-lg hover:bg-gray-700 cursor-pointer">Article 1 : Les débuts du Tour</li>
                <li class="p-4 bg-gray-800 rounded-lg hover:bg-gray-700 cursor-pointer">Article 2 : Moments iconiques</li>
                <li class="p-4 bg-gray-800 rounded-lg hover:bg-gray-700 cursor-pointer">Article 3 : L'impact sur le cyclisme</li>
            </ul>
        </div>
    </div>
</section>


</body>

