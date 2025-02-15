<body class="bg-gray-50">

<?php
    require "../app/inc/navbar.php";
?>

<section class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-6">Histoire du Tour du Maroc</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="text-2xl font-semibold mb-4">Regardez l'histoire du Tour du Maroc</h2>
            <iframe class="w-full h-96" src="https://www.youtube.com/embed/qPqUWHl1XhY?si=IfrdFeuHIC76XgWC" frameborder="0" allowfullscreen></iframe>
        </div>
        <div>
            <h2 class="text-2xl font-semibold mb-4">Articles liés</h2>
            <ul class="space-y-4">
                <li class="p-4 bg-red-600 rounded-lg hover:bg-slate-400 cursor-pointer">
                    <a href="histoire-cyclisme.php" class="text-white">Article 1 : L'histoire de cyclisme au Maroc</a>
                </li>
                <li class="p-4 bg-red-600 rounded-lg hover:bg-slate-400 cursor-pointer">
                    <a href="moments-iconiques.php" class="text-white">Article 2 : Moments iconiques</a>
                </li>
                <li class="p-4 bg-red-600 rounded-lg hover:bg-slate-400 cursor-pointer">
                    <a href="impact-cyclisme.php" class="text-white">Article 3 : L'impact sur le cyclisme</a>
                </li>
            </ul>
        </div>
    </div>
</section>

</body>