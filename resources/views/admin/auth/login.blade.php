<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .glow {
            box-shadow: 0 0 40px rgba(255, 107, 0, 0.3);
        }
    </style>
</head>

<body class="bg-black text-white">

<div class="flex min-h-screen">

    <!-- LEFT SIDE (Brand / Image) -->
    <div class="hidden lg:flex w-1/2 relative items-center justify-center">

        <img src="/images/bg.jpg" class="absolute inset-0 w-full h-full object-cover opacity-60">

        <div class="absolute inset-0 bg-gradient-to-br from-black via-black/70 to-orange-600/40"></div>

        <div class="relative z-10 text-center px-10">
            <h1 class="text-5xl font-extrabold tracking-widest mb-6">
                SG <span class="text-orange-500">GROUP</span>
            </h1>

            <p class="text-gray-300 text-sm tracking-wider leading-relaxed">
                Secure admin access to manage your platform, monitor activity, and control operations seamlessly.
            </p>
        </div>
    </div>

    <!-- RIGHT SIDE (Login) -->
    <div class="flex w-full lg:w-1/2 items-center justify-center px-6">

        <div class="glass glow w-full max-w-md rounded-3xl p-10">

            <h2 class="text-2xl font-bold mb-8 text-center tracking-[0.3em]">
                ADMIN LOGIN
            </h2>

            <!-- Errors -->
            @if ($errors->any())
                <div class="bg-red-500/20 text-red-300 p-3 rounded mb-6 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div class="relative">
                    <input type="email" name="email" required placeholder=" "
                        class="peer w-full px-4 py-3 bg-transparent border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500">

                    <label class="absolute left-4 top-3 text-gray-400 text-sm transition-all 
                        peer-placeholder-shown:top-3 
                        peer-placeholder-shown:text-gray-500 
                        peer-focus:-top-2 peer-focus:text-xs peer-focus:text-orange-500
                        bg-black px-1">
                        Email Address
                    </label>
                </div>

                <!-- Password -->
                <div class="relative">
                    <!-- Password Input -->
                    <input type="password" id="password" name="password" required placeholder=" "
                        class="peer w-full px-4 py-3 pr-12 bg-transparent border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500">

                    <!-- Label -->
                    <label class="absolute left-4 top-3 text-gray-400 text-sm transition-all 
                        peer-placeholder-shown:top-3 
                        peer-placeholder-shown:text-gray-500 
                        peer-focus:-top-2 peer-focus:text-xs peer-focus:text-orange-500
                        bg-black px-1">
                        Password
                    </label>

                    <!-- Eye Icon -->
                    <button type="button" onclick="togglePassword()" 
                        class="absolute right-4 top-3 text-gray-400 hover:text-orange-500 transition">
                        
                        <!-- Eye Open -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>

                        <!-- Eye Slash -->
                        <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 012.293-3.95M6.18 6.18A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.543 7a9.978 9.978 0 01-4.132 5.411M15 12a3 3 0 00-3-3M3 3l18 18"/>
                        </svg>

                    </button>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 py-3 rounded-full tracking-[0.3em] font-bold transition-all duration-300 hover:scale-105">
                    LOGIN
                </button>
            </form>

        </div>
    </div>

</div>
<script>
function togglePassword() {
    const input = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClose = document.getElementById('eyeClose');

    if (input.type === "password") {
        input.type = "text";
        eyeOpen.classList.add("hidden");
        eyeClose.classList.remove("hidden");
    } else {
        input.type = "password";
        eyeOpen.classList.remove("hidden");
        eyeClose.classList.add("hidden");
    }
}
</script>
</body>
</html>
