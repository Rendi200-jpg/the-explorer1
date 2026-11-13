<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - The Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f4f8ff;
            color: #0f172a;
        }
        .soft-card {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.08), 0 4px 12px -4px rgba(15, 23, 42, 0.04);
        }
        .soft-card:hover {
            box-shadow: 0 18px 36px -12px rgba(37, 99, 235, 0.16), 0 6px 16px -4px rgba(15, 23, 42, 0.06);
        }
        .sidebar-gradient {
            background: #ffffff;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #eff6ff;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }
        .btn-micro {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-micro:active {
            transform: scale(0.95) !important;
        }
        .glass-panel {
            background: rgba(244, 248, 255, 0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
    </style>
</head>
<body class="bg-[#f4f8ff] text-slate-900 flex min-h-screen text-xs antialiased selection:bg-blue-600 selection:text-white">

    <!-- Sidebar Navigation -->
    <aside class="w-64 sidebar-gradient text-slate-800 p-5 flex flex-col justify-between hidden md:flex shrink-0 shadow-sm border-r border-slate-200/70">
        <div>
            <!-- Logo Header -->
            <div class="flex items-center gap-3 mb-8 px-2 group cursor-pointer">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-black text-base shadow-md shadow-blue-500/30 group-hover:scale-105 transition-transform duration-300">
                    <i class="fa-solid fa-compass"></i>
                </div>
                <div>
                    <h1 class="text-base font-extrabold text-slate-900 tracking-tight flex items-center gap-1.5">
                        The Explorer <span class="text-[9px] px-2 py-0.5 rounded-full bg-blue-600 text-white font-bold">ADMIN</span>
                    </h1>
                    <p class="text-[10px] text-slate-500 font-medium">Discover World Wonders</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1.5 text-xs font-semibold">
                <a href="/admin/dashboard" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full bg-blue-50 text-blue-600 border border-blue-200/80 shadow-sm transition duration-200">
                    <i class="fa-solid fa-earth-americas text-blue-600 w-4 text-center"></i>
                    Dashboard
                </a>
                <a href="/admin/destinasi" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition duration-200">
                    <i class="fa-solid fa-location-dot text-slate-400 w-4 text-center"></i>
                    Kelola Destinasi
                </a>
                <a href="/admin/kategori" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition duration-200">
                    <i class="fa-solid fa-folder-open text-slate-400 w-4 text-center"></i>
                    Kategori
                </a>
                <a href="/admin/pengaturan" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition duration-200">
                    <i class="fa-solid fa-sliders text-slate-400 w-4 text-center"></i>
                    Pengaturan
                </a>
            </nav>

            <!-- Sidebar Promo Card -->
            <div class="mt-8 relative overflow-hidden rounded-2xl p-4 bg-gradient-to-r from-[#eef5ff] via-[#dbeafe] to-[#93c5fd] border border-blue-100 shadow-sm">
                <div class="relative z-10">
                    <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">Global Expeditions</p>
                    <p class="text-[11px] text-slate-600 mt-0.5 mb-3 font-medium">Jelajahi Dunia Bersama The Explorer!</p>
                    <button class="btn-micro w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-md hover:bg-blue-700">
                        →
                    </button>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="pt-6 border-t border-slate-200/80">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn-micro w-full bg-slate-50 hover:bg-rose-50 text-slate-600 hover:text-rose-600 py-2.5 rounded-full font-bold text-xs transition-all duration-200 flex items-center justify-center gap-2 border border-slate-200 shadow-sm">
                    <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
                    Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Container -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto bg-[#f4f8ff] relative">
        
        <!-- Header Topbar -->
        <header class="glass-panel border-b border-slate-200/80 px-6 py-4 flex justify-between items-center sticky top-0 z-50">
            <div class="flex items-center gap-4">
                <button class="btn-micro text-slate-600 hover:text-slate-900 md:hidden p-2.5 rounded-full bg-white border border-slate-200 shadow-sm">
                    <i class="fa-solid fa-bars text-sm"></i>
                </button>

                <!-- Search Box -->
                <div class="relative w-64 sm:w-80 md:w-96">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input type="text" placeholder="Cari destinasi atau kategori..." class="w-full pl-10 pr-16 py-2.5 rounded-full bg-white border border-slate-200/80 focus:bg-white focus:border-blue-500 focus:outline-none text-xs text-slate-700 placeholder-slate-400 shadow-sm transition">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <kbd class="px-2 py-0.5 text-[9px] font-semibold text-slate-500 bg-slate-100 border border-slate-200 rounded-md">Ctrl + K</kbd>
                    </span>
                </div>
            </div>

            <!-- Profile Control -->
            <div class="flex items-center gap-3">
                <div class="h-5 w-px bg-slate-200 mx-1"></div>

                <!-- Profil Admin -->
                <div class="flex items-center gap-2.5 cursor-pointer">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-xs overflow-hidden border border-slate-200 shadow-sm">
                        @if(!empty($admin->foto))
                            <img src="{{ asset('storage/' . $admin->foto) }}" alt="Foto Admin" class="w-full h-full object-cover">
                        @else
                            {{ substr($admin->name ?? 'A', 0, 1) }}
                        @endif
                    </div>
                    <div class="text-left hidden sm:block">
                        <h4 class="text-xs font-bold text-slate-900 leading-none">{{ $admin->name ?? 'Admin Panel' }}</h4>
                        <p class="text-[10px] text-slate-400 mt-0.5">Administrator</p>
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                </div>
            </div>
        </header>

        <!-- Body Dashboard -->
        <div class="p-6 max-w-7xl mx-auto w-full space-y-6 relative z-10">
            <!-- Welcome Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#eef5ff] via-[#dbeafe] to-[#93c5fd] border border-white/80 p-8 shadow-lg shadow-blue-900/5 animate__animated animate__fadeIn">
                <div class="relative z-10 max-w-2xl space-y-2">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/85 backdrop-blur-sm border border-blue-100 text-blue-600 font-bold text-[10px] tracking-wider uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        Admin Control Panel
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">Selamat Datang, Admin!</h2>
                    <p class="text-xs md:text-sm text-slate-600 font-medium">Kelola destinasi wisata dunia dengan mudah bersama The Explorer.</p>
                </div>
                <!-- Background decorative shape -->
                <div class="absolute right-6 -bottom-4 opacity-15 text-8xl pointer-events-none">
                    🌍
                </div>
            </div>

            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                
                <!-- Kotak 1: Total Destinasi -->
                <a href="{{ route('admin.destinasi.index') }}" class="soft-card p-5 rounded-3xl transition duration-300 block group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">Total Destinasi</p>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900">{{ $totalDestinasi }}</h3>
                        </div>
                        <div class="w-11 h-11 rounded-2xl bg-blue-50 border border-blue-100 text-blue-600 flex items-center justify-center text-base shadow-sm">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-bold pt-3 border-t border-slate-100">
                        <span class="text-emerald-600">↑ 100% <span class="text-slate-400 font-normal">Dari bulan lalu</span></span>
                        <span class="text-blue-600 flex items-center gap-1 group-hover:translate-x-1 transition">Kelola <i class="fa-solid fa-arrow-right text-[9px]"></i></span>
                    </div>
                </a>

                <!-- Kotak 2: Total User -->
                <a href="{{ route('admin.users.index') }}" class="soft-card p-5 rounded-3xl transition duration-300 block group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">Total User</p>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900">{{ $totalUser }}</h3>
                        </div>
                        <div class="w-11 h-11 rounded-2xl bg-blue-50 border border-blue-100 text-blue-600 flex items-center justify-center text-base shadow-sm">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-bold pt-3 border-t border-slate-100">
                        <span class="text-emerald-600">↑ 100% <span class="text-slate-400 font-normal">Dari bulan lalu</span></span>
                        <span class="text-blue-600 flex items-center gap-1 group-hover:translate-x-1 transition">Lihat <i class="fa-solid fa-arrow-right text-[9px]"></i></span>
                    </div>
                </a>

                <!-- Kotak 3: Total Ulasan -->
                <a href="{{ route('admin.reviews.index') }}" class="soft-card p-5 rounded-3xl transition duration-300 block group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">Total Ulasan</p>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900">{{ $totalReview }}</h3>
                        </div>
                        <div class="w-11 h-11 rounded-2xl bg-amber-50 border border-amber-100 text-amber-500 flex items-center justify-center text-base shadow-sm">
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-bold pt-3 border-t border-slate-100">
                        <span class="text-slate-400">→ 0% <span class="text-slate-400 font-normal">Dari bulan lalu</span></span>
                        <span class="text-amber-500 flex items-center gap-1 group-hover:translate-x-1 transition">Ulasan <i class="fa-solid fa-arrow-right text-[9px]"></i></span>
                    </div>
                </a>

            </div>
        </div>
    </main>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>