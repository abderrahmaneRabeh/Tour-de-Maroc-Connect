<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <input type="hidden" id="URLROOT" value='<?= URLROOT ?>'>
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <!-- Header -->
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Create your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Join our community Toure de Maroc
            </p>
        </div>

        <!-- Form -->
        <form class="mt-8 space-y-6">
            <div class="rounded-md shadow-sm space-y-4">

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <input id="username" name="username" type="text"
                        class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 
                            placeholder-neutral-200 text-gray-900 rounded-md focus:outline-none 
                            focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                        placeholder="johndoe123">
                </div>

                <!-- Email -->
                <div>
                    <label for="email-address" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <input id="email-address" name="email" type="email" autocomplete="email"
                        class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 
                            placeholder-neutral-200 text-gray-900 rounded-md focus:outline-none 
                            focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                        placeholder="john@example.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 
                            placeholder-neutral-200 text-gray-900 rounded-md focus:outline-none 
                            focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                        placeholder="••••••••">
                </div>


                <!-- role select -->
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a role</label>
                    <select id="role" class=" border text-sm rounded-lg  lock w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  border-gray-300 
                            placeholder-neutral-200 text-gray-900  focus:outline-none 
                            focus:ring-primary focus:border-primary focus:z-10 sm:text-sm">
                        <option selected>Choose a role</option>
                        <option value="cycliste">Cyclist</option>
                        <option value="fan">Fan</option>
                    </select>
                </div>

                <!-- Country selection, hidden by default -->
                <div id="country-container" class="hidden">
                    <label for="equipe" class="block text-sm font-medium text-gray-700">Select your country</label>
                    <select id="equipe" class="border text-sm rounded-lg block w-full p-2.5 border-gray-300 text-gray-900 focus:ring-primary focus:border-primary">
                        <option selected>Choose a country</option>
                        <option value="morocco">Morocco</option>
                    </select>
                </div>

            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent 
                        text-sm font-medium rounded-md text-white bg-primary hover:bg-primary/80 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary/80 ">
                    Sign up
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="<?= URLROOT . '/users/login' ?>" class="font-medium text-primary hover:text-primary/80">
                    Login
                </a>
            </p>
        </div>
    </div>
</div>

<script>
    // Initial URLs for roles
    const URLROOT = document.getElementById("URLROOT").value;
    let cyclistUrl = `${URLROOT}/cyclists/register`;
    let fanUrl = `${URLROOT}/fans/register`;
    let equipes = [];

    // Function to dynamically update form action URL
    function updateFormAction(role) {
        const form = document.querySelector("form");
        if (role === "cycliste") {
            form.action = cyclistUrl;
        } else if (role === "fan") {
            form.action = fanUrl;
        }
    }

    // Get elements
    const roleSelect = document.getElementById('role');
    const countryContainer = document.getElementById('country-container');
    const equipeSelect = document.getElementById('equipe');

    // Add change event listener to role select
    roleSelect.addEventListener('change', function() {
        const selectedRole = this.value;
        // Show/hide country selection based on role
        if (selectedRole === 'cycliste') {
            countryContainer.classList.remove('hidden');
        } else {
            countryContainer.classList.add('hidden');
        }

        // Update form submission URL based on role
        updateFormAction(selectedRole);
    });

    // Form submit event listener
    document.querySelector("form").addEventListener("submit", async function(event) {
        event.preventDefault(); // Prevent form submission

        // Clear previous error messages
        document.querySelectorAll(".error-message").forEach((el) => el.remove());

        let isValid = true;

        // Username validation
        const usernameInput = document.getElementById("username");
        if (!usernameInput.value.trim()) {
            showError(usernameInput, "Username is required.");
            isValid = false;
        }

        // Email validation
        const emailInput = document.getElementById("email-address");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailInput.value.trim()) {
            showError(emailInput, "Email address is required.");
            isValid = false;
        } else if (!emailPattern.test(emailInput.value)) {
            showError(emailInput, "Please enter a valid email address.");
            isValid = false;
        }

        // Password validation
        const passwordInput = document.getElementById("password");
        if (!passwordInput.value.trim()) {
            showError(passwordInput, "Password is required.");
            isValid = false;
        } else if (passwordInput.value.length < 6) {
            showError(passwordInput, "Password must be at least 6 characters.");
            isValid = false;
        }

        // Role validation
        const roleSelect = document.getElementById("role");
        if (roleSelect.value === "Choose a role") {
            showError(roleSelect, "Please select a role.");
            isValid = false;
        }

        // Country validation (if displayed)
        if (countryContainer.classList.contains("hidden") === false) {
            const equipe = equipeSelect.value;
            if (equipe === "Choose a country") {
                showError(equipeSelect, "Please select a country.");
                isValid = false;
            }
        }

        if (isValid) {
            try {
                const res = await axios.post(this.action, {
                    username: usernameInput.value,
                    email: emailInput.value,
                    password: passwordInput.value,
                    role: roleSelect.value,
                    country: equipeSelect ? equipeSelect.value : null,
                });
                console.log(res);
                if (res.data.success) {
                    showToast(res.data.success);
                    window.location.href = `${URLROOT}/users/login`;
                } else {
                    showToast(res.data.error, 'error');
                }
            } catch (error) {
                console.error(error);
            }
        }
    });

    (async () => {
        const res = await fetch(`${URLROOT}/equipes/allEquipes`, {
            method: 'POST',
        });
        const data = await res.json();
        equipes = data.equipes;
        appendEquipes();
    })()

    const appendEquipes = () => {
        let equipeContainer = document.getElementById("equipe");
        equipeContainer.innerHTML = "";
        equipeContainer.innerHTML = "<option selected>Choose a country</option>";
        console.log(equipes);
        equipes.forEach((ele) => {
            equipeContainer.innerHTML += `
                <option value="${ele.id}">${ele.pays}</option>
            `
        })
    }

    // Function to show error messages
    function showError(input, message) {
        const errorMessage = document.createElement("p");
        errorMessage.className = "error-message text-sm text-red-600 mt-1";
        errorMessage.innerText = message;
        input.parentElement.appendChild(errorMessage);
    }
</script>