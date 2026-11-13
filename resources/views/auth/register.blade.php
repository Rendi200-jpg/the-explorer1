<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru - The Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome / Lucide Icons -->
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
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden bg-[#f4f8ff]">

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

    <!-- Main Register Card -->
    <div class="w-full max-w-[460px] bg-white/95 backdrop-blur-xl rounded-[36px] p-8 sm:p-10 shadow-xl border border-slate-200/80 relative z-10 my-8 animate-glow-card transition-all duration-300">
        
        <!-- Top Light Blue Wave Gradient Decoration -->
        <div class="absolute top-0 left-0 right-0 h-40 card-wave-bg rounded-t-[36px] -z-10"></div>

        <!-- Header / Logo -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3 shadow-md shadow-blue-500/30 animate-float text-white">
                <i data-lucide="compass" class="w-8 h-8"></i>
            </div>
            
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Bergabung dengan The Explorer</h1>
            <p class="text-xs text-slate-500 mt-1.5 font-medium flex items-center justify-center gap-1">
                Mulai petualangan dan temukan keajaiban dunia 🌍
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-2xl mb-6 text-xs text-rose-700 shadow-sm">
                <p class="font-bold mb-1">⚠️ Terjadi Kesalahan:</p>
                <p>{{ $errors->first() }}</p>
            </div>
        @endif

        <!-- Form -->
        <form id="registerForm" action="/register" method="POST" class="space-y-4">
            @csrf
            
            <!-- Default role langsung diset sebagai user -->
            <input type="hidden" name="role" value="user">

            <!-- Nama Lengkap -->
            <div>
                <label class="flex items-center gap-2 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">
                    <i data-lucide="user" class="w-3.5 h-3.5 text-blue-600"></i>
                    Nama Lengkap
                </label>
                <div class="relative flex items-center">
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Alex Explorer"
                        class="w-full px-4 py-3.5 bg-slate-50/80 border border-slate-200/80 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:outline-none text-slate-800 text-sm placeholder-slate-400 transition-all duration-200">
                </div>
            </div>

            <!-- Alamat Email -->
            <div>
                <label class="flex items-center gap-2 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">
                    <i data-lucide="mail" class="w-3.5 h-3.5 text-blue-600"></i>
                    Alamat Email
                </label>
                <div class="relative flex items-center">
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="explorer@domain.com"
                        class="w-full px-4 py-3.5 bg-slate-50/80 border border-slate-200/80 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:outline-none text-slate-800 text-sm placeholder-slate-400 transition-all duration-200">
                </div>
            </div>

            <!-- Password & Konfirmasi Password -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-2 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">
                        <i data-lucide="lock" class="w-3.5 h-3.5 text-blue-600"></i>
                        Kata Sandi
                    </label>
                    <div class="relative flex items-center">
                        <input type="password" id="passwordInput" name="password" required placeholder="Min. 6 karakter"
                            class="w-full pl-4 pr-10 py-3.5 bg-slate-50/80 border border-slate-200/80 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:outline-none text-slate-800 text-sm placeholder-slate-400 transition-all duration-200">
                        <button type="button" onclick="togglePassword('passwordInput', 'eyeIcon1')" class="absolute right-3 text-slate-400 hover:text-slate-600 p-1">
                            <i data-lucide="eye-off" id="eyeIcon1" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="flex items-center gap-2 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mb-1.5">
                        <i data-lucide="lock" class="w-3.5 h-3.5 text-blue-600"></i>
                        Konfirmasi
                    </label>
                    <div class="relative flex items-center">
                        <input type="password" id="passwordConfirmInput" name="password_confirmation" required placeholder="Ulangi sandi"
                            class="w-full pl-4 pr-10 py-3.5 bg-slate-50/80 border border-slate-200/80 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:outline-none text-slate-800 text-sm placeholder-slate-400 transition-all duration-200">
                        <button type="button" onclick="togglePassword('passwordConfirmInput', 'eyeIcon2')" class="absolute right-3 text-slate-400 hover:text-slate-600 p-1">
                            <i data-lucide="eye-off" id="eyeIcon2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submitBtnReg" 
                class="w-full mt-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 px-4 rounded-2xl shadow-lg shadow-blue-600/25 hover:shadow-blue-600/40 active:scale-[0.99] transition-all duration-200 flex items-center justify-center gap-2 text-sm group">
                <i data-lucide="sparkles" class="w-4 h-4 transition-transform group-hover:rotate-12"></i>
                <span id="btnTextReg">Daftar Akun Explorer ✨</span>
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-6 pt-5 border-t border-slate-100 text-center relative">
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white px-2 text-slate-300">
                <i data-lucide="globe" class="w-3.5 h-3.5 text-blue-500"></i>
            </div>
            <p class="text-xs text-slate-500 font-medium">
                Sudah punya akun? 
                <a href="/login" class="font-bold text-blue-600 hover:text-blue-700 hover:underline transition ml-1">
                    Masuk di Sini ➔
                </a>
            </p>
        </div>
    </div>

    <!-- Script Lucide Icons & Interactivity -->
    <script>
        lucide.createIcons();

        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.setAttribute('data-lucide', 'eye');
            } else {
                input.type = 'password';
                icon.setAttribute('data-lucide', 'eye-off');
            }
            lucide.createIcons();
        }

        // Script Animasi Loading Register
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtnReg');
            const btnText = document.getElementById('btnTextReg');
            
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses Pendaftaran...
            `;
        });
    </script>
</body>
</html>