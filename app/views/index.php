<body class="bg-blue-500">
    <?php
    require "../app/inc/navbar.php";
    ?>

    <div style="background-image: url('<?= URLROOT . '/public/img/hr.jpg' ?>')"
        class="w-full h-[600px] mx-auto relative  bg-cover bg-no-repeat sm:aspect-video py-14">


        <div class="w-[80%] mx-auto h-full flex justify-between items-center">
            <div
                class="h-full xl:w-[50%] md:w-[60%] sm:w-[70%] w-full  py-4 px-4  text-white flex flex-col gap-2 justify-center">
                <h1 class="text-4xl font-bold xl:text-7xl lg:text-6xl md:text-5xl">Welcome to </h1>
                <h1 class="text-4xl font-bold xl:text-6xl lg:text-6xl md:text-5xl bg-text"><span class="text-red-600">PDALWAYS</span></h1>
                <!--  -->
                <p class="my-2 text-lg lg:text-2xl sm:text-xl lg:my-6">PEDALWAY website with live updates,
                    exclusive content, race highlights, and fan interaction, keeping users engaged and excited
                    throughout the event.</p>

                <!-- Buttons -->
                <div class="flex flex-col w-full max-w-2xl gap-4 mt-4 sm:flex-row lg:mt-8">
                    <form method="GET" action="<?= URLROOT ?>/" class="relative flex-1">
                        <input type="text" name="term" placeholder="Search for events, races, or updates..."
                            class="w-full px-6 py-4 text-lg text-white placeholder-gray-300 transition-all duration-300 border rounded-lg outline-none bg-white/10 border-white/20 focus:border-white backdrop-blur-sm"
                            value="<?= htmlspecialchars($data['searchTerm'] ?? '') ?>">
                        <button type="submit" class="absolute -translate-y-1/2 right-4 top-1/2">
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



    <div class="px-4 py-12 mx-auto max-w-7xl">
        <h1 class="mb-4 text-3xl italic font-bold">BEST BIKERS</h1>
        <p class="text-lg font-light">- Eddy Merckx – 5 wins, dominant and versatile.</p>
        <p class="text-lg font-light">- Bernard Hinault – 5 wins, aggressive and tough.</p>
        <p class="mb-4 text-lg font-light">- Miguel Indurain – 5 consecutive wins, time trial specialist.</p>

        <!-- Product Grid -->
        <!-- Search Results Section -->
        <!-- Cyclists Section -->
        <div class="px-4 py-8 mx-auto mt-8 rounded-lg max-w-7xl bg-white/10 backdrop-blur-sm">
            <?php if (!empty($data['searchTerm'])): ?>
                <h2 class="mb-4 text-2xl font-bold text-black">
                    Search Results for: "<?= htmlspecialchars($data['searchTerm']) ?>"
                </h2>
            <?php else: ?>
                <h2 class="mb-4 text-2xl font-bold text-white">All Cyclists</h2>
            <?php endif; ?>

            <?php if (empty($data['cyclists'])): ?>
                <div class="p-4 text-black rounded-lg bg-white/10">
                    <?php if (!empty($data['searchTerm'])): ?>
                        No cyclists found matching your search criteria.
                    <?php else: ?>
                        No cyclists available at this time.
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ($data['cyclists'] as $cyclist): ?>
                        <div class="relative overflow-hidden rounded-lg group">
                            <!-- Gradient Overlay on Hover -->
                            <div
                                class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-b from-transparent to-black/70 group-hover:opacity-100">
                            </div>

                            <!-- Image -->
                            <div class="bg-gray-100 aspect-square">
                                <img src="<?= htmlspecialchars($cyclist['image']) ?>"
                                    alt="<?= htmlspecialchars($cyclist['name'] ?? 'Cyclist') ?>"
                                    class="object-cover object-center w-full h-full transition-transform duration-300 group-hover:scale-105" />
                            </div>

                            <!-- Content -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white">
                                <h3
                                    class="mb-2 text-xl font-bold transition-transform duration-300 transform translate-y-8 group-hover:translate-y-0">
                                    <?= htmlspecialchars($cyclist['name'] ?? 'Unnamed Cyclist') ?>
                                </h3>

                                <?php if (!empty($cyclist['team'])): ?>
                                    <p
                                        class="mb-1 text-gray-200 transition-transform duration-300 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                                        Team: <?= htmlspecialchars($cyclist['team']) ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($cyclist['country'])): ?>
                                    <p
                                        class="mb-3 text-gray-200 transition-transform duration-300 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                                        Country: <?= htmlspecialchars($cyclist['country']) ?>
                                    </p>
                                <?php endif; ?>

                                <a href="<?= URLROOT ?>/cyclists/info/<?= $cyclist['id'] ?>"
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
                <a href="<?= URLROOT ?>" class="flex items-center text-white hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Clear search results
                </a>
            </div>
        <?php endif; ?>
    </div>
    <div class="p-4 mx-auto max-w-7xl">
        <!-- Table Container with horizontal scroll for mobile -->
        <div class="overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-sm bg-white">
                <!-- Table Header -->
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 font-semibold text-left text-gray-900">Name</th>
                        <th class="px-4 py-3 font-semibold text-left text-gray-900">Start Location</th>
                        <th class="px-4 py-3 font-semibold text-left text-gray-900">End Location</th>
                        <th class="px-4 py-3 font-semibold text-left text-gray-900">Distance (km)</th>
                        <th class="px-4 py-3 font-semibold text-center text-gray-900">Start Date</th>
                        <th class="px-4 py-3 font-semibold text-right text-gray-900">End Date</th>
                        <th class="px-4 py-3 font-semibold text-right text-gray-900">Difficulty</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">

                    <?php
                    foreach ($data['ObjEtape'] as $etape) {
                        echo "<tr class='transition-colors bg-gray-50'>
                                 <td class='px-4 py-3 text-blue-600 hover:text-blue-800'>
                                   <a href='".URLROOT."/Etapes/details/$etape->id' class='hover:underline'> $etape->nom  </a>
                                 </td>
                                 <td class='px-4 py-3 text-gray-600'> $etape->lieu_depart  </td>
                                 <td class='px-4 py-3 text-gray-600'>$etape->lieu_arrivee  </td>
                                 <td class='px-4 py-3 text-gray-600'> $etape->distance_km  </td>
                                 <td class='px-4 py-3 text-center text-gray-600'>  $etape->date_depart  </td>
                                 <td class='px-4 py-3 font-mono text-right text-gray-600'> $etape->date_arrive  </td>
                                 <td class='px-4 py-3 font-mono text-right text-gray-600'> $etape->difficulte  </td>
                               </tr>";
                    }
                    ?>
                </tbody>
               

            </table>
        </div>
    </div>




</body>