<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <!-- Header -->
        <input type="hidden" id="URLROOT" value='<?= URLROOT ?>'>
        <div>
            <button class="text-white bg-black  p-2 px-4 rounded-lg">
                <a href=<?= URLROOT ?> class="">
                    <i class="fas fa-arrow-left me-1"></i>
                    Go back
                </a>
            </button>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login to your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Welcom again to Toure de Maroc
            </p>
        </div>

        <!-- Form -->
        <form class="mt-8 space-y-6">
            <div class="rounded-md shadow-sm space-y-4">

                <!-- Email -->
                <div>
                    <label for="email-address" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <input id="email-address" name="email" type="email" autocomplete="email"
                        class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 
                            placeholder-neutral-200 text-gray-900 rounded-md focus:outline-none 
                            focus:ring-primary focus:border-primary/90 focus:z-10 sm:text-sm"
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
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent 
                        text-sm font-medium rounded-md text-white bg-primary/80 hover:bg-primary 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary/80">
                    Login
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                I don't have an account?
                <a href=<?= URLROOT . '/users/register' ?> class="font-medium text-primary hover:text-primary/80">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</div>

<script>
    const URLROOT = document.getElementById("URLROOT").value;
    document.querySelector("form").addEventListener("submit", async function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Clear previous error messages
        document.querySelectorAll(".error-message").forEach((el) => el.remove());

        let isValid = true;


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



        // If the form is valid, submit the form (replace this with an actual form submission logic)
        if (isValid) {
            try {
                const pathname = window.location.pathname;
                const res = await axios.post(`${URLROOT}/users/login`, {
                    email: emailInput.value,
                    password: passwordInput.value,
                });
                if (res.data.success) {
                    showToast(res.data.success);
                    window.location.href = URLROOT
                } else {
                    showToast(res.data.error, 'error');
                    console.log(res)
                }
            } catch (error) {
                console.error(error);
            }
        }
    });

    // Function to show error messages
    function showError(input, message) {
        const errorMessage = document.createElement("p");
        errorMessage.className = "error-message text-sm text-red-600 mt-1";
        errorMessage.innerText = message;
        input.parentElement.appendChild(errorMessage);
    }
</script>