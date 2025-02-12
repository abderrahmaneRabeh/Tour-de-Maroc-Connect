<body class="bg-blue-500">
    <?php
    require "../app/inc/navbar.php";
    ?>

    <div style="background-image: url('<?= URLROOT . '/public/img/hr.jpg' ?>')"
        class="w-full h-[600px] mx-auto relative  bg-cover bg-no-repeat sm:aspect-video py-14">


        <div class="w-[80%] mx-auto h-full flex justify-between items-center">
            <div
                class="h-full xl:w-[50%] md:w-[60%] sm:w-[70%] w-full  py-4 px-4  text-white flex flex-col gap-2 justify-center">
                <h1 class="text-4xl font-semibold xl:text-7xl lg:text-6xl md:text-5xl">Welcome to </h1>
                <h1 class="text-4xl font-semibold xl:text-6xl lg:text-6xl md:text-5xl bg-text">PDALWAYS</h1>
                <!--  -->
                <p class="my-2 text-lg lg:text-2xl sm:text-xl lg:my-6">PEDALWAY website with live updates,
                    exclusive content, race highlights, and fan interaction, keeping users engaged and excited
                    throughout the event.</p>

                <!-- Buttons -->
                <div class="flex flex-col w-full max-w-2xl gap-4 mt-4 sm:flex-row lg:mt-8">
                    <div class="relative flex-1">
                        <input type="text" placeholder="Search for events, races, or updates..." class="w-full px-6 py-4 text-lg text-white placeholder-gray-300 transition-all duration-300 border rounded-lg outline-none bg-white/10 border-white/20 focus:border-white backdrop-blur-sm">
                        <button class="absolute -translate-y-1/2 right-4 top-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </div>


    <div class="px-4 py-12 mx-auto max-w-7xl">
        <h1 class="mb-8 text-3xl italic font-bold">BEST BIKERS</h1>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Maillots Card -->
            <div class="relative overflow-hidden rounded-lg group">
                <!-- Gradient Overlay on Hover -->
                <div
                    class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-b from-transparent to-black/70 group-hover:opacity-100">
                </div>

                <!-- Image -->
                <div class="bg-gray-100 aspect-square">
                    <img src="<?= URLROOT . '/public/img/racere1.jpg' ?>" alt="Maillots"
                        class="object-cover object-center w-full h-full transition-transform duration-300 group-hover:scale-105" />
                </div>

                <!-- Content -->
                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white">
                    <h2
                        class="mb-4 text-2xl font-bold transition-transform duration-300 transform translate-y-8 group-hover:translate-y-0">
                        MAILLOTS
                    </h2>

                    <button
                        class="px-6 py-2 font-semibold text-white transition-all duration-300 transform translate-y-4 bg-red-600 rounded opacity-0 group-hover:translate-y-0 group-hover:opacity-100 hover:bg-black">
                        DÉCOUVRIR
                    </button>
                </div>
            </div>

            <!-- Lifestyle Card -->
            <div class="relative overflow-hidden rounded-lg group">
                <div
                    class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-b from-transparent to-black/70 group-hover:opacity-100">
                </div>

                <div class="bg-gray-100 aspect-square">
                    <img src="<?= URLROOT . '/public/img/racere2.webp' ?>" alt="Lifestyle"
                        class="object-cover object-center w-full h-full transition-transform duration-300 group-hover:scale-105" />
                </div>

                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white">
                    <h2
                        class="mb-4 text-2xl font-bold transition-transform duration-300 transform translate-y-8 group-hover:translate-y-0">
                        LIFESTYLE
                    </h2>
                    <button
                        class="px-6 py-2 font-semibold text-white transition-all duration-300 transform translate-y-4 bg-red-600 rounded opacity-0 group-hover:translate-y-0 group-hover:opacity-100 hover:bg-black">
                        DÉCOUVRIR
                    </button>
                </div>
            </div>

            <!-- Accessoires Card -->
            <div class="relative overflow-hidden rounded-lg group">
                <div
                    class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-b from-transparent to-black/70 group-hover:opacity-100">
                </div>

                <div class="bg-gray-100 aspect-square">
                    <img src="<?= URLROOT . '/public/img/racere3.jpg' ?>" alt="Accessoires"
                        class="object-cover object-center w-full h-full transition-transform duration-300 group-hover:scale-105" />
                </div>

                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-white">
                    <h2
                        class="mb-4 text-2xl font-bold transition-transform duration-300 transform translate-y-8 group-hover:translate-y-0">
                        ACCESSOIRES
                    </h2>
                    <button
                        class="px-6 py-2 font-semibold text-white transition-all duration-300 transform translate-y-4 bg-red-600 rounded opacity-0 group-hover:translate-y-0 group-hover:opacity-100 hover:bg-black">
                        DÉCOUVRIR
                    </button>
                </div>
            </div>
        </div>
    </div>




</body>




</body>