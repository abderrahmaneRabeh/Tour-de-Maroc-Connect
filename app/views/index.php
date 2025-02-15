<body class="bg-blue-500">
    <?php
    require "../app/inc/navbar.php";
    ?>

    <div style="background-image: url('<?= URLROOT . '/public/img/hr.jpg' ?>')"
        class="w-full h-[600px] mx-auto relative  bg-cover bg-no-repeat sm:aspect-video py-14">


        <div class="w-[80%] mx-auto h-full flex justify-between items-center">
            <div
                class="h-full xl:w-[50%] md:w-[60%] sm:w-[70%] w-full  py-4 px-4  text-white flex flex-col gap-2 justify-center">
                <h1 class="xl:text-7xl lg:text-6xl md:text-5xl text-4xl font-bold">Welcome to </h1>
                <h1 class="xl:text-6xl lg:text-6xl md:text-5xl text-4xl font-bold bg-text">PDALWAYS</h1>
                <!--  -->
                <p class="my-2 text-lg lg:text-2xl sm:text-xl lg:my-6">PEDALWAY website with live updates,
                    exclusive content, race highlights, and fan interaction, keeping users engaged and excited
                    throughout the event.</p>

                <!-- Buttons -->
                <div class="flex sm:flex-row flex-col gap-4 lg:mt-8 mt-4 w-full max-w-2xl">
                <form method="GET" action="<?= URLROOT ?>/" class="relative flex-1">
    <input 
        type="text" 
        name="term"
        placeholder="Search for events, races, or updates..." 
        class="w-full px-6 py-4 text-lg bg-white/10 border border-white/20 rounded-lg 
               text-white placeholder-gray-300 outline-none focus:border-white 
               backdrop-blur-sm transition-all duration-300"
        value="<?= htmlspecialchars($data['searchTerm'] ?? '') ?>"
    >
    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </button>
</form>
</div>

<!-- Add a container for search results -->
<div id="searchResults" class="mt-4"></div>
            </div>
            <div></div>
        </div>
    </div>



    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold italic mb-4">BEST BIKERS</h1>
        <p class="text-lg font-light">- Eddy Merckx – 5 wins, dominant and versatile.</p>
        <p class="text-lg font-light">- Bernard Hinault – 5 wins, aggressive and tough.</p>
        <p class="text-lg font-light mb-4">- Miguel Indurain – 5 consecutive wins, time trial specialist.</p>

        <!-- Product Grid -->
        <!-- Search Results Section -->
<!-- Cyclists Section -->
<div class="max-w-7xl mx-auto px-4 py-8 bg-white/10 backdrop-blur-sm rounded-lg mt-8">
    <?php if (!empty($data['searchTerm'])): ?>
        <h2 class="text-2xl font-bold text-black mb-4">
            Search Results for: "<?= htmlspecialchars($data['searchTerm']) ?>"
        </h2>
    <?php else: ?>
        <h2 class="text-2xl font-bold text-white mb-4">All Cyclists</h2>
    <?php endif; ?>
    
    <?php if (empty($data['cyclists'])): ?>
        <div class="bg-white/10 text-black p-4 rounded-lg">
            <?php if (!empty($data['searchTerm'])): ?>
                No cyclists found matching your search criteria.
            <?php else: ?>
                No cyclists available at this time.
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($data['cyclists'] as $cyclist): ?>
                <div class="relative overflow-hidden rounded-lg group">
                    <!-- Gradient Overlay on Hover -->
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-b from-transparent to-black/70 group-hover:opacity-100"></div>
                    
                    <!-- Image -->
                    <div class="bg-gray-100 aspect-square">
                        <img src="<?= htmlspecialchars($cyclist['image']) ?>"
                            alt="<?= htmlspecialchars($cyclist['name'] ?? 'Cyclist') ?>"
                            class="object-cover object-center w-full h-full transition-transform duration-300 group-hover:scale-105" />
                    </div>
                    
                    <!-- Content -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white">
                        <h3 class="mb-2 text-xl font-bold transition-transform duration-300 transform translate-y-8 group-hover:translate-y-0">
                            <?= htmlspecialchars($cyclist['name'] ?? 'Unnamed Cyclist') ?>
                        </h3>
                        
                        <?php if(!empty($cyclist['team'])): ?>
                            <p class="text-gray-200 mb-1 transition-transform duration-300 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                                Team: <?= htmlspecialchars($cyclist['team']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if(!empty($cyclist['country'])): ?>
                            <p class="text-gray-200 mb-3 transition-transform duration-300 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                                Country: <?= htmlspecialchars($cyclist['country']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <a href="<?= URLROOT ?>/cyclists/profile/<?= $cyclist['id'] ?>"
                            class="px-6 py-2 font-semibold text-white transition-all duration-300 transform translate-y-4 bg-red-600 rounded opacity-0 group-hover:translate-y-0 group-hover:opacity-100 hover:bg-black">
                            View Profile
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
    
    <?php if (!empty($data['searchTerm'])): ?>
        <div class="mt-6">
            <a href="<?= URLROOT ?>" class="text-white hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Clear search results
            </a>
        </div>
    <?php endif; ?>
</div>
<div class="max-w-7xl mx-auto p-4">
        <!-- Table Container with horizontal scroll for mobile -->
        <div class="overflow-x-auto shadow-sm rounded-lg">
            <table class="w-full text-sm bg-white">
                <!-- Table Header -->
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Start Location</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">End Location</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Distance (km)</th>
                        <th class="px-4 py-3 text-center font-semibold text-gray-900">Start Date</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-900">End Date</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-900">Difficulty</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                 
                    <?php
                    foreach ($data['ObjEtape'] as $etape) {
                        echo "<tr class='bg-gray-50 transition-colors'>
                                 <td class='px-4 py-3 text-blue-600 hover:text-blue-800'>
                                   <a href='#' class='hover:underline'> $etape->nom  </a>
                                 </td>
                                 <td class='px-4 py-3 text-gray-600'> $etape->lieu_depart  </td>
                                 <td class='px-4 py-3 text-gray-600'>$etape->lieu_arrivee  </td>
                                 <td class='px-4 py-3 text-gray-600'> $etape->distance_km  </td>
                                 <td class='px-4 py-3 text-center text-gray-600'>  $etape->date_depart  </td>
                                 <td class='px-4 py-3 text-right font-mono text-gray-600'> $etape->date_arrive  </td>
                                 <td class='px-4 py-3 text-right font-mono text-gray-600'> $etape->difficulte  </td>
                               </tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>




</body>




