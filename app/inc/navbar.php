<nav class="relative px-8 py-4 flex justify-between items-center bg-black">
        <!-- Logo Container with padding -->
        <div class="flex-shrink-0 mr-12">
            <a class="text-3xl font-bold leading-none" href="#">
                <img class="w-[80px] lg:w-[135px]" src="<?= URLROOT . '/public/img/logo.png' ?>" alt="Logo">
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-red-600 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex lg:items-center lg:justify-center lg:flex-1">
            <ul class="flex items-center space-x-6">
                <li><a class="text-sm text-gray-200 hover:text-white" href="#">Home</a></li>
                <li class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-red-600 font-bold" href="#">About Us</a></li>
                <li class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-200 hover:text-white" href="#">Services</a></li>
                <li class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-200 hover:text-white" href="#">Pricing</a></li>
                <li class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-200 hover:text-white" href="#">Contact</a></li>
            </ul>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden lg:flex lg:items-center lg:space-x-3">
            <a class="py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="#">Sign In</a>
            <a class="py-2 px-6 bg-red-600 hover:bg-white hover:text-red-600 text-sm text-white font-bold rounded-xl transition duration-200" href="#">Sign up</a>
        </div>
    </nav>

    <!-- Mobile Menu (Same as before) -->
    <div class="navbar-menu relative z-50 hidden">
        <!-- Mobile menu content remains the same -->
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-black border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <img class="w-[80px] lg:w-[135px]" src="<?= URLROOT . '/public/img/logo.png' ?>" alt="">
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-200 cursor-pointer hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-200 hover:text-red-600 rounded" href="#">Home</a></li>
                    <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-200 hover:text-red-600 rounded" href="#">About Us</a></li>
                    <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-200 hover:text-red-600 rounded" href="#">Services</a></li>
                    <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-200 hover:text-red-600 rounded" href="#">Pricing</a></li>
                    <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-200 hover:text-red-600 rounded" href="#">Contact</a></li>
                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold bg-gray-50 hover:bg-gray-100 rounded-xl" href="#">Sign in</a>
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-red-600 hover:bg-white hover:text-red-600 rounded-xl" href="#">Sign Up</a>
                </div>
                <p class="my-4 text-xs text-center text-gray-200">
                    <span>Copyright © 2021</span>
                </p>
            </div>
        </nav>
    </div>


	<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>