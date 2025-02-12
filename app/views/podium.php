<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podium des Cyclistes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        .podium-place {
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.8s ease-out;
        }

        .podium-place.show {
            transform: translateY(0);
            opacity: 1;
        }

        .shine {
            position: relative;
            overflow: hidden;
        }

        .shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to bottom right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.1) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }

        .glow {
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px -5px rgba(255, 215, 0, 0.6);
            }

            to {
                box-shadow: 0 0 20px 5px rgba(255, 215, 0, 0.8);
            }
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4 bg-gradient-to-br from-blue-900 to-purple-900">
    <div class="container max-w-4xl mx-auto">
        <h1 class="mb-12 text-4xl font-bold text-center text-white glow">Podium des Champions</h1>

        <div class="relative flex items-end justify-center space-x-4">
            <!-- 2ème place -->
            <div class="podium-place" data-delay="100">
                <div class="flex flex-col items-center">
                    <div class="w-64 p-4 mb-4 bg-white rounded-lg shadow-lg shine">
                        <div class="w-full h-48 mb-4 overflow-hidden bg-gray-200 rounded-lg">
                            <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                                alt="Jean Dupont" class="object-cover w-full h-full" />
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold text-gray-600">2ème</span>
                            <h2 class="text-xl font-semibold">Jean Dupont</h2>
                            <p class="text-gray-500">2:45:30</p>
                        </div>
                    </div>
                    <div class="w-32 h-32 bg-gray-300 rounded-t-lg"></div>
                </div>
            </div>

            <!-- 1ère place -->
            <div class="podium-place" data-delay="0">
                <div class="flex flex-col items-center">
                    <div class="w-64 p-4 mb-4 bg-white rounded-lg shadow-lg shine glow">
                        <div class="w-full h-48 mb-4 overflow-hidden bg-gray-200 rounded-lg">
                            <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                                alt="Pierre Martin" class="object-cover w-full h-full" />
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold text-yellow-500">1er</span>
                            <h2 class="text-xl font-semibold">Pierre Martin</h2>
                            <p class="text-gray-500">2:43:15</p>
                        </div>
                    </div>
                    <div class="w-32 h-40 bg-yellow-400 rounded-t-lg"></div>
                </div>
            </div>

            <!-- 3ème place -->
            <div class="podium-place" data-delay="200">
                <div class="flex flex-col items-center">
                    <div class="w-64 p-4 mb-4 bg-white rounded-lg shadow-lg shine">
                        <div class="w-full h-48 mb-4 overflow-hidden bg-gray-200 rounded-lg">
                            <img src="https://static.yabiladi.com/files/articles/89360_b3f6693acaa816cd3c10353779fbfc6b20200218120022_thumb_565.png"
                                alt="Lucas Bernard" class="object-cover w-full h-full" />
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold text-amber-700">3ème</span>
                            <h2 class="text-xl font-semibold">Lucas Bernard</h2>
                            <p class="text-gray-500">2:46:45</p>
                        </div>
                    </div>
                    <div class="w-32 h-24 rounded-t-lg bg-amber-600"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const podiumPlaces = document.querySelectorAll('.podium-place');

            podiumPlaces.forEach(place => {
                setTimeout(() => {
                    place.classList.add('show');
                }, place.dataset.delay);
            });
        });
    </script>
</body>

</html>