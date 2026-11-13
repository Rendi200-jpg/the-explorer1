<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - The Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome / Lucide Icons for clean iconography -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: #f4f8ff; 
        }

        /* Ambient Glow & Floating Animations */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(2deg); }
        }

        @keyframes cardGlow {
            0%, 100% { box-shadow: 0 10px 40px rgba(37, 99, 235, 0.08), 0 20px 40px rgba(15, 23, 42, 0.04); }
            50% { box-shadow: 0 20px 50px rgba(37, 99, 235, 0.16), 0 25px 50px rgba(15, 23, 42, 0.06); }
        }

        @keyframes pulseSoft {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
        }

        .animate-float {
            animation: floatSlow 6s ease-in-out infinite;
        }

        .animate-glow-card {
            animation: cardGlow 4s ease-in-out infinite;
        }

        .animate-pulse-bg {
            animation: pulseSoft 8s ease-in-out infinite;
        }

        /* Inner Wave Overlay for Card Top */
        .card-wave-bg {
            background: linear-gradient(135deg, rgba(238, 245, 255, 0.9) 0%, rgba(255, 255, 255, 0.95) 40%, rgba(219, 234, 254, 0.6) 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden bg-[#f4f8ff]">

    <!-- Background Elements (Planet, Clouds, Sparkles) -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <!-- Soft Background Blobs -->
        <div class="absolute top-0 right-0 w-[520px] h-[520px] bg-blue-200/35 rounded-full blur-[110px] pointer-events-none -z-0"></div>
        <div class="absolute bottom-0 left-0 w-[420px] h-[420px] bg-sky-200/40 rounded-full blur-[100px] pointer-events-none -z-0"></div>

        <!-- Decorative Globe Icon (Left background) -->
        <div class="absolute top-1/3 left-8 w-16 h-16 text-blue-400/20 animate-float flex items-center justify-center">
            <i data-lucide="globe" class="w-16 h-16"></i>
        </div>

        <!-- Decorative Pin/Location Beacon (Right background) -->
        <div class="absolute top-1/3 right-16 flex flex-col items-center animate-float" style="animation-delay: -4s;">
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center shadow-lg shadow-blue-500/30 text-white">
                <i data-lucide="map-pin" class="w-5 h-5"></i>
            </div>
            <div class="w-24 h-0.5 border-b-2 border-dashed border-blue-400/30 mt-4 -rotate-12"></div>
        </div>

        <!-- Airplane Silhouette (Top Right background) -->
        <i data-lucide="plane" class="absolute top-16 right-1/4 w-16 h-16 text-blue-400/20 -rotate-12 animate-float" style="animation-delay: -2s;"></i>
    </div>

    <!-- Main Login Card -->
    <div id="loginCard" class="w-full max-w-[440px] bg-white/95 backdrop-blur-xl rounded-[36px] p-8 sm:p-10 shadow-xl border border-slate-200/80 relative z-10 animate-glow-card transition-all duration-300">
        
        <!-- Top Light Blue Wave Gradient Decoration -->
        <div class="absolute top-0 left-0 right-0 h-40 card-wave-bg rounded-t-[36px] -z-10"></div>

        <!-- Header / Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-4 shadow-md shadow-blue-500/30 animate-float text-white">
                <i data-lucide="compass" class="w-8 h-8"></i>
            </div>
            
            <div class="flex items-center justify-center gap-1.5">
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">The Explorer</h1>
                <span class="text-blue-600 text-base font-bold px-2 py-0.5 bg-blue-50 rounded-full border border-blue-100">Global</span>
            </div>
            <p class="text-sm text-slate-500 mt-1.5 font-medium flex items-center justify-center gap-1">
                Discover world wonders & expeditions 🌍
            </p>
        </div>

        @if($errors->any())
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-2xl mb-6 text-sm text-rose-700 shadow-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form id="loginForm" action="/login" method="POST" class="space-y-5">
            @csrf
            
            <!-- Email Field -->
            <div>
                <label class="flex items-center gap-2 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-2">
                    <i data-lucide="mail" class="w-3.5 h-3.5 text-blue-600"></i>
                    Email Address
                </label>
                <div class="relative flex items-center">
                    <i data-lucide="mail" class="w-5 h-5 text-slate-400 absolute left-4 pointer-events-none"></i>
                    <input type="email" name="email" required placeholder="explorer@domain.com"
                        class="w-full pl-11 pr-4 py-3.5 bg-slate-50/80 border border-slate-200/80 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:outline-none text-slate-800 text-sm placeholder-slate-400 transition-all duration-200">
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label class="flex items-center gap-2 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-2">
                    <i data-lucide="lock" class="w-3.5 h-3.5 text-blue-600"></i>
                    Password
                </label>
                <div class="relative flex items-center">
                    <input type="password" id="passwordInput" name="password" required placeholder="••••••••"
                        class="w-full pl-4 pr-11 py-3.5 bg-slate-50/80 border border-slate-200/80 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:outline-none text-slate-800 text-sm placeholder-slate-400 transition-all duration-200">
                    <button type="button" onclick="togglePassword()" class="absolute right-3.5 text-slate-400 hover:text-slate-600 p-1 transition">
                        <i data-lucide="eye-off" id="eyeIcon" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between pt-1 text-sm">
                <label class="flex items-center gap-2.5 cursor-pointer group select-none">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer accent-blue-600">
                    <span class="text-slate-700 font-semibold text-xs group-hover:text-slate-900 transition">Ingat saya</span>
                </label>
                <a href="/forgot-password" class="text-xs font-semibold text-blue-600 hover:text-blue-700 hover:underline transition">
                    
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submitBtn" 
                class="w-full mt-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 px-6 rounded-2xl shadow-lg shadow-blue-600/25 hover:shadow-blue-600/40 active:scale-[0.99] transition-all duration-200 text-sm flex items-center justify-center gap-2 group">
                <i data-lucide="log-in" class="w-4 h-4 transition-transform group-hover:translate-x-0.5"></i>
                <span id="btnText">Mulai Ekspedisi 🚀</span>
            </button>
        </form>

        <!-- Divider & Footer -->
        <div class="mt-8 pt-6 border-t border-slate-100 text-center relative">
            <!-- Tiny Globe Icon on Border -->
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white px-2 text-slate-300">
                <i data-lucide="globe" class="w-3.5 h-3.5 text-blue-500"></i>
            </div>
            <p class="text-xs text-slate-500 font-medium">
                Belum punya akun Explorer? 
                <a href="/register" class="font-bold text-blue-600 hover:text-blue-700 hover:underline transition ml-1">
                    Daftar Akun Baru 🗺️
                </a>
            </p>
        </div>
    </div>

    <!-- Script for Lucide Icons & Password Toggle -->
    <script>
        lucide.createIcons();

        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('data-lucide', 'eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            }
            lucide.createIcons();
        }
    </script>
</body>
</html>