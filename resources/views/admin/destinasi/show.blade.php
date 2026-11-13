<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi - The Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
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
        .glass-panel {
            background: rgba(244, 248, 255, 0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
        .btn-micro {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-micro:active {
            transform: scale(0.95) !important;
        }
    </style>
</head>
<body class="bg-[#f4f8ff] text-slate-900 flex min-h-screen text-xs antialiased selection:bg-blue-600 selection:text-white" x-data="{ sidebarOpen: false }">

    <!-- OVERLAY MOBILE -->
    <div 
        x-show="sidebarOpen" 
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false" 
        class="fixed inset-0 bg-slate-900/30 backdrop-blur-sm z-40 md:hidden"
    ></div>

    <!-- Sidebar Navigation -->
    <aside class="w-64 sidebar-gradient text-slate-800 p-5 flex flex-col justify-between fixed md:static h-screen z-50 transition-all duration-300 ease-out border-r border-slate-200/70 shadow-sm"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
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
                <a href="/admin/dashboard" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition duration-200">
                    <i class="fa-solid fa-earth-americas text-slate-400 w-4 text-center"></i>
                    Dashboard
                </a>
                <a href="/admin/destinasi" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full bg-blue-50 text-blue-600 border border-blue-200/80 shadow-sm transition duration-200">
                    <i class="fa-solid fa-location-dot text-blue-600 w-4 text-center"></i>
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

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto bg-[#f4f8ff] relative">
        
        <!-- Topbar Navigation -->
        <header class="glass-panel border-b border-slate-200/80 px-6 py-4 flex justify-between items-center sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="btn-micro text-slate-600 hover:text-slate-900 md:hidden p-2.5 rounded-full bg-white border border-slate-200 shadow-sm">
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

                <div class="flex items-center gap-2.5 cursor-pointer">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-xs overflow-hidden border border-slate-200 shadow-sm">
                        👤
                    </div>
                    <div class="text-left hidden sm:block">
                        <h4 class="text-xs font-bold text-slate-900 leading-none">Admin Panel</h4>
                        <p class="text-[10px] text-slate-400 mt-0.5">Administrator</p>
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                </div>
            </div>
        </header>

        <!-- Body Content -->
        <div class="p-6 max-w-4xl mx-auto w-full space-y-6 relative z-10">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-2 animate__animated animate__fadeInDown">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                        <span>Detail Destinasi Wisata</span> <span class="text-base">🗺️</span>
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mt-1">Informasi lengkap tempat wisata global dari database[cite: 13].</p>
                </div>
                <a href="{{ route('admin.destinasi.index') }}" class="btn-micro bg-slate-200/80 hover:bg-slate-300 text-slate-700 px-4 py-2.5 rounded-full text-xs font-bold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <div class="soft-card rounded-3xl p-8 space-y-6 animate__animated animate__fadeInUp">
                
                <!-- Foto Utama -->
                <div class="w-full max-w-md mx-auto aspect-square rounded-2xl overflow-hidden shadow-sm border border-slate-200 bg-slate-50 relative">
                    @if(!empty($destinasi->foto))
                        <img src="{{ asset('storage/' . $destinasi->foto) }}" alt="{{ $destinasi->nama_destinasi }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex flex-col items-center justify-center text-white shadow-sm">
                            <span class="text-4xl mb-2">🌍</span>
                            <span class="font-extrabold text-xs">Tidak ada foto utama yang diunggah</span>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full border border-blue-100">
                            {{ $destinasi->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                        </span>
                        <h3 class="text-xl font-extrabold text-slate-900 mt-2">{{ $destinasi->nama_destinasi }}</h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5"><i class="fa-solid fa-location-dot text-blue-600"></i> {{ $destinasi->alamat ?? 'Alamat belum diisi' }}</p>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 flex flex-col justify-center">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Jam Operasional</p>
                        <p class="text-xs font-bold text-slate-700 mt-0.5 flex items-center gap-1.5"><i class="fa-solid fa-clock text-emerald-600"></i> {{ $destinasi->jam_buka ?? '08:00 - 17:00 WIB' }}</p>
                    </div>
                </div>

                <div>
                    <h4 class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                        <span class="text-amber-500"><i class="fa-solid fa-bolt"></i></span> Profil Singkat
                    </h4>
                    <p class="text-xs text-slate-600 bg-slate-50 p-4 rounded-2xl border border-slate-200/80 font-medium leading-relaxed">
                        {{ $destinasi->deskripsi_singkat ?? 'Belum ada profil singkat untuk destinasi ini.' }}
                    </p>
                </div>

                <div>
                    <h4 class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                        <span class="text-blue-600"><i class="fa-solid fa-file-lines"></i></span> Detail Lengkap & Fasilitas
                    </h4>
                    <div class="text-xs text-slate-600 bg-slate-50 p-4 rounded-2xl border border-slate-200/80 font-medium leading-relaxed">
                        {!! $destinasi->deskripsi_lengkap ?? 'Belum ada detail lengkap untuk destinasi ini.' !!}
                    </div>
                </div>

                @if($destinasi->link_maps)
                    <div>
                        <h4 class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-blue-600"><i class="fa-solid fa-map"></i></span> Link Google Maps
                        </h4>
                        <a href="{{ $destinasi->link_maps }}" target="_blank" class="text-xs font-bold text-blue-600 hover:underline break-all flex items-center gap-1.5">
                            <i class="fa-solid fa-external-link text-[10px]"></i> {{ $destinasi->link_maps }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>