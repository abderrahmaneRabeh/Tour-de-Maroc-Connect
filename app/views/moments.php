<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moroccan Cyclist Tour</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body class="bg-gray-50">
    <!-- Hero Section -->
    <header class="relative h-64">
        <div class="absolute inset-0">
            <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                alt="Moroccan landscape with cyclists" class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-center px-4 text-center">
            <div class="text-white">
                <h1 class="mb-4 text-3xl font-bold md:text-5xl">Moroccan Cyclist Tour</h1>
                <p class="text-xl md:text-2xl">Experience the Thrill of Every Stage</p>
            </div>
        </div>
    </header>

    <!-- Tour Stages Overview -->
    <section class="px-4 py-16 md:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Tour Stages</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Stage Card 1 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                        alt="Stage 1" class="object-cover w-full h-48">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold">Stage 1: Casablanca - Rabat</h3>
                        <p class="mb-4 text-gray-600">Distance: 95km</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Start: Casablanca</span>
                            <span>Finish: Rabat</span>
                        </div>
                    </div>
                </div>

                <!-- Stage Card 2 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                        alt="Stage 2" class="object-cover w-full h-48">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold">Stage 2: Rabat - Fez</h3>
                        <p class="mb-4 text-gray-600">Distance: 210km</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Start: Rabat</span>
                            <span>Finish: Fez</span>
                        </div>
                    </div>
                </div>

                <!-- Stage Card 3 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                        alt="Stage 3" class="object-cover w-full h-48">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold">Stage 3: Fez - Meknes</h3>
                        <p class="mb-4 text-gray-600">Distance: 150km</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Start: Fez</span>
                            <span>Finish: Meknes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Highlights -->
    <section class="px-4 py-16 bg-gray-100 md:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Video Highlights</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Video Thumbnail 1 -->
                <div class="relative cursor-pointer group">
                    <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                        alt="Video 1" class="object-cover w-full h-64 rounded-lg">
                    <div
                        class="absolute inset-0 transition-all duration-300 bg-black rounded-lg bg-opacity-40 group-hover:bg-opacity-50">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button
                            class="p-4 transition-transform duration-300 transform bg-white rounded-full bg-opacity-90 group-hover:scale-110"
                            onclick="document.getElementById('video-modal').style.display='block'">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4l12 6-12 6z" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="absolute font-semibold text-white bottom-4 left-4">Stage 1 Highlights</h3>
                </div>

                <div id="video-modal" class="fixed inset-0 z-50 hidden" style="background-color: rgba(0,0,0,0.5)">
                    <div class="mx-auto max-w-7xl">
                        <div class="relative bg-white rounded-lg shadow-lg">
                            <button class="absolute top-0 right-0 p-4 text-3xl font-semibold text-white bg-transparent"
                                onclick="document.getElementById('video-modal').style.display='none'">&times;</button>
                            <div class="p-6">
                                <iframe width="100%" height="500" src="https://www.youtube.com/embed/VIDEO_ID"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Thumbnail 2 -->
                <div class="relative cursor-pointer group">
                    <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                        alt="Video 2" class="object-cover w-full h-64 rounded-lg">
                    <div
                        class="absolute inset-0 transition-all duration-300 bg-black rounded-lg bg-opacity-40 group-hover:bg-opacity-50">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button
                            class="p-4 transition-transform duration-300 transform bg-white rounded-full bg-opacity-90 group-hover:scale-110"
                            onclick="document.getElementById('video-modal').style.display='block'">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4l12 6-12 6z" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="absolute font-semibold text-white bottom-4 left-4">Stage 2 Highlights</h3>
                </div>

                <!-- Video Thumbnail 3 -->
                <div class="relative cursor-pointer group">
                    <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                        alt="Video 3" class="object-cover w-full h-64 rounded-lg">
                    <div
                        class="absolute inset-0 transition-all duration-300 bg-black rounded-lg bg-opacity-40 group-hover:bg-opacity-50">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button
                            class="p-4 transition-transform duration-300 transform bg-white rounded-full bg-opacity-90 group-hover:scale-110"
                            onclick="document.getElementById('video-modal').style.display='block'">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4l12 6-12 6z" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="absolute font-semibold text-white bottom-4 left-4">Stage 3 Highlights</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Cyclist Profiles -->
    <section class="px-4 py-16 md:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Top Cyclists</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Cyclist Card 1 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md group">
                    <div class="relative">
                        <img src="https://www.cnom.org.ma/cnom_org_ma/sites/default/files/inline-images/32667462-30390793.jpg"
                            alt="Cyclist 1" class="object-cover w-full h-64">
                        <div
                            class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black to-transparent group-hover:opacity-70">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold">Ahmed Bennani</h3>
                        <p class="text-sm text-gray-600">Stage 1 Winner</p>
                        <button class="mt-4 text-blue-600 hover:text-blue-800">View Profile</button>
                    </div>
                </div>

                <!-- Cyclist Card 2 -->