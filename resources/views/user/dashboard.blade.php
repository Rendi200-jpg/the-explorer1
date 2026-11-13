<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - The Explorer</title>
    <!-- Tailwind CSS CDN & Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        body { 
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f4f8ff;
            color: #0f172a;
        }
        
        /* Custom Scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #eff6ff; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #2563eb; }
        
        /* Animations */
        @keyframes heroFadeSlideUp {
            0% { opacity: 0; transform: translateY(20px) scale(0.99); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .animate-hero-entry {
            animation: heroFadeSlideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .reveal-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.55s cubic-bezier(0.16, 1, 0.3, 1), transform 0.55s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-card.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fastExit {
            0% { opacity: 1; transform: scale(1); filter: blur(0px); }
            100% { opacity: 0; transform: scale(0.98); filter: blur(4px); }
        }
        .page-exit-animation {
            animation: fastExit 0.2s cubic-bezier(0.4, 0, 1, 1) forwards;
            pointer-events: none;
        }

        /* Micro-interactions */
        .btn-micro {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-micro:active {
            transform: scale(0.96) !important;
        }

        /* Soft Light Shadows & Glass */
        .soft-card-shadow {
            box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.08), 0 4px 12px -4px rgba(15, 23, 42, 0.04);
        }
        .soft-card-shadow:hover {
            box-shadow: 0 18px 36px -12px rgba(37, 99, 235, 0.16), 0 6px 16px -4px rgba(15, 23, 42, 0.06);
        }
        .glass-header {
            background: rgba(244, 248, 255, 0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
    </style>
</head>
<body class="bg-[#f4f8ff] text-slate-900 min-h-screen flex text-xs selection:bg-blue-600 selection:text-white antialiased" 
      x-data="{
          sidebarOpen: false,
          isLoading: true,
          isExiting: false,
          navigateWithExit(event) {
              const targetUrl = event.currentTarget.href;
              this.isExiting = true;
              setTimeout(() => {
                  window.location.href = targetUrl;
              }, 150);
          }
      }"
      x-init="setTimeout(() => isLoading = false, 400)">

    <!-- OVERLAY MOBILE -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false" 
         class="fixed inset-0 bg-slate-900/30 backdrop-blur-sm z-40 lg:hidden"></div>

    <!-- SIDEBAR KIRI -->
    <aside 
        class="bg-white text-slate-800 flex flex-col justify-between p-4 fixed h-screen z-50 transition-all duration-300 ease-out border-r border-slate-200/70 shadow-sm w-64 overflow-hidden"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        <!-- Decorative Soft Blue Temple & Mountain Illustration at Bottom of Sidebar -->
        <div class="absolute bottom-0 left-0 right-0 pointer-events-none select-none overflow-hidden opacity-90">
            <svg viewBox="0 0 260 240" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <defs>
                    <linearGradient id="sidebarBgGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#eff6ff" stop-opacity="0"/>
                        <stop offset="45%" stop-color="#dbeafe" stop-opacity="0.65"/>
                        <stop offset="100%" stop-color="#bfdbfe" stop-opacity="0.9"/>
                    </linearGradient>
                </defs>
                <path d="M0 70 C60 40, 140 90, 260 55 L260 240 L0 240 Z" fill="url(#sidebarBgGrad)"/>
                <path d="M0 130 C50 110, 110 140, 180 120 C215 110, 240 125, 260 118 L260 240 L0 240 Z" fill="#dbeafe" opacity="0.7"/>
                <!-- Silhouette Trees & Hills -->
                <path d="M0 175 Q35 155 70 172 T140 170 T210 165 T260 175 L260 240 L0 240 Z" fill="#93c5fd" opacity="0.45"/>
                <!-- Globe / Architecture Silhouette -->
                <g transform="translate(155, 78)" fill="#60a5fa" opacity="0.55">
                    <circle cx="40" cy="40" r="32" fill="none" stroke="#60a5fa" stroke-width="4"/>
                    <path d="M8 40 H72 M40 8 V72 M16 20 C25 30, 55 30, 64 20 M16 60 C25 50, 55 50, 64 60" stroke="#60a5fa" stroke-width="3" fill="none"/>
                </g>
                <!-- Floating Compass Pin -->
                <g transform="translate(88, 66)">
                    <path d="M18 0C8.059 0 0 8.059 0 18C0 30.5 18 44 18 44C18 44 36 30.5 36 18C36 8.059 27.941 0 18 0Z" fill="#3b82f6" opacity="0.75"/>
                    <circle cx="18" cy="17" r="6" fill="#ffffff"/>
                </g>
            </svg>
        </div>

        <div class="space-y-6 relative z-10">
            <!-- Brand Logo -->
            <div class="flex items-center space-x-3 px-2 py-2">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-md shadow-blue-500/30 flex-shrink-0">
                    <i class="fa-solid fa-compass text-lg"></i>
                </div>
                <div class="whitespace-nowrap overflow-hidden">
                    <h1 class="font-extrabold text-base tracking-tight text-slate-900 flex items-center gap-1.5">
                        The Explorer <span class="text-[9px] px-2 py-0.5 rounded-full bg-blue-600 text-white font-bold">Global</span>
                    </h1>
                    <p class="text-[10px] text-slate-500 font-medium">Discover World Wonders</p>
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="space-y-1.5">
                <a href="{{ route('user.dashboard') }}" class="btn-micro flex items-center space-x-3 px-4 py-2.5 text-xs font-bold bg-blue-50 text-blue-600 border border-blue-200/80 rounded-full shadow-sm hover:bg-blue-100/70 transition-all">
                    <i class="fa-solid fa-earth-americas text-sm w-5 text-center"></i>
                    <span>Discovery Hub</span>
                </a>
                <a href="{{ route('user.wishlist') }}" class="btn-micro flex items-center space-x-3 px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100/80 rounded-full transition-all">
                    <i class="fa-solid fa-bookmark text-amber-500 text-sm w-5 text-center"></i>
                    <span>Saved Expeditions</span>
                </a>
                <a href="{{ route('user.pengaturan') }}" class="btn-micro flex items-center space-x-3 px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100/80 rounded-full transition-all">
                    <i class="fa-solid fa-sliders text-slate-500 text-sm w-5 text-center"></i>
                    <span>Account Settings</span>
                </a>
            </nav>
        </div>

        <!-- User Profile Card in Sidebar -->
        <div class="relative z-10 pt-4">
            <div class="flex items-center justify-between p-2.5 rounded-2xl bg-white/95 backdrop-blur-sm border border-slate-200/80 shadow-md">
                <div class="flex items-center space-x-2.5 overflow-hidden">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 text-white font-bold flex items-center justify-center text-xs shadow-sm flex-shrink-0">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-bold text-slate-900 truncate leading-tight">{{ auth()->user()->name ?? 'user' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">@explorer</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-micro text-slate-500 hover:text-rose-500 p-2 hover:bg-rose-50 rounded-xl transition" title="Keluar">
                        <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="flex-1 min-h-screen flex flex-col transition-all duration-300 ease-out bg-[#f4f8ff] relative overflow-x-hidden lg:ml-64" 
         :class="{ 'page-exit-animation': isExiting }"
    >
        <!-- Decorative Soft Background Blobs -->
        <div class="fixed top-0 right-0 w-[520px] h-[520px] bg-blue-200/30 rounded-full blur-[110px] pointer-events-none -z-0"></div>
        <div class="fixed bottom-0 right-10 w-[420px] h-[420px] bg-sky-200/35 rounded-full blur-[100px] pointer-events-none -z-0"></div>

        <!-- Header Bar -->
        <header class="glass-header h-20 flex items-center justify-between px-6 sticky top-0 z-30">
            <div class="flex items-center space-x-4">
                <button @click="sidebarOpen = !sidebarOpen" class="btn-micro p-2.5 rounded-full bg-white text-blue-600 hover:bg-blue-50 border border-slate-200/80 shadow-sm lg:hidden">
                    <i class="fa-solid fa-bars text-sm"></i>
                </button>

                <!-- Global Search Box -->
                <div class="relative w-64 sm:w-80 md:w-96" 
                     x-data="{ 
                        query: '{{ request('search') }}',
                        items: {{ json_encode($semuaDestinasi ?? []) }},
                        focused: false,
                        get filtered() {
                            if (!this.query.trim()) return [];
                            return this.items.filter(item => 
                                item.nama_destinasi.toLowerCase().includes(this.query.toLowerCase()) ||
                                (item.alamat && item.alamat.toLowerCase().includes(this.query.toLowerCase()))
                            );
                        }
                     }"
                     @click.outside="focused = false"
                >
                    <form action="{{ route('user.dashboard') }}" method="GET" class="relative w-full">
                        <input 
                            type="text" 
                            name="search" 
                            x-model="query"
                            @focus="focused = true"
                            @input="focused = true"
                            placeholder="Cari destinasi atau koordinat petualangan..." 
                            class="w-full bg-white border border-slate-200/80 rounded-full pl-11 pr-12 py-2.5 text-xs text-slate-700 placeholder-slate-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300"
                            autocomplete="off"
                        >
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-globe text-xs"></i>
                        </div>
                        <button type="submit" class="btn-micro absolute inset-y-1 right-1 w-8 h-8 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center shadow-md shadow-blue-600/25" title="Cari">
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </button>
                    </form>

                    <!-- REKOMENDASI PENCARIAN -->
                    <div x-show="focused && filtered.length > 0" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         class="absolute top-full left-0 right-0 mt-2 bg-white border border-slate-200 rounded-2xl shadow-xl overflow-hidden z-50 max-h-60 overflow-y-auto divide-y divide-slate-100"
                    >
                        <div class="p-2.5 text-[10px] text-slate-500 font-bold bg-slate-50">
                            Hasil Pencarian untuk "<span x-text="query"></span>":
                        </div>
                        <template x-for="item in filtered" :key="item.id">
                            <a :href="'{{ url('user/destinasi') }}/' + item.id" 
                               @click.prevent="navigateWithExit($event)"
                               class="block px-4 py-2.5 hover:bg-blue-50/70 transition border-b border-slate-100 group"
                            >
                                <p class="text-xs font-bold text-slate-800 group-hover:text-blue-600 transition" x-text="item.nama_destinasi"></p>
                                <p class="text-[10px] text-slate-400 truncate mt-0.5" x-text="item.alamat ?? 'Global Landmark'"></p>
                            </a>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Right Header Controls -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('user.pengaturan') }}" class="btn-micro w-10 h-10 rounded-full bg-white text-blue-600 flex items-center justify-center border border-slate-200/80 shadow-sm hover:bg-blue-50 hover:border-blue-200 transition" title="Profil & Pengaturan">
                    <i class="fa-regular fa-user text-sm"></i>
                </a>
            </div>
        </header>

        <!-- MAIN CONTAINER -->
        <main class="px-6 pb-10 pt-2 space-y-7 flex-1 max-w-7xl mx-auto w-full relative z-10">

            <!-- HERO BANNER -->
            <div class="animate-hero-entry relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#eef5ff] via-[#dbeafe] to-[#93c5fd] border border-white/80 p-7 md:p-9 shadow-lg shadow-blue-900/5">
                <!-- Scenic Global Landmark Illustration (Right Side) -->
                <div class="absolute inset-0 pointer-events-none select-none overflow-hidden">
                    <svg viewBox="0 0 1100 320" preserveAspectRatio="xMaxYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                        <defs>
                            <linearGradient id="skyFade" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0%" stop-color="#f1f7ff" stop-opacity="1"/>
                                <stop offset="45%" stop-color="#e3efff" stop-opacity="0.88"/>
                                <stop offset="75%" stop-color="#bfdbfe" stop-opacity="0.25"/>
                                <stop offset="100%" stop-color="#93c5fd" stop-opacity="0.1"/>
                            </linearGradient>
                        </defs>
                        <!-- Soft Clouds -->
                        <path d="M580 70 C610 45, 650 45, 675 68 C695 55, 730 60, 745 80 C770 80, 785 100, 775 115 L560 115 C545 98, 560 72, 580 70 Z" fill="#ffffff" opacity="0.65"/>
                        <path d="M900 45 C930 22, 975 25, 995 48 C1020 38, 1055 48, 1065 72 L875 72 C865 55, 880 42, 900 45 Z" fill="#ffffff" opacity="0.55"/>
                        <!-- Distant Horizon -->
                        <path d="M480 245 L640 135 L770 215 L910 105 L1100 205 L1100 320 L480 320 Z" fill="#7aa7e0" opacity="0.35"/>
                        <path d="M560 255 L740 155 L880 225 L1030 135 L1100 185 L1100 320 L560 320 Z" fill="#4f83cc" opacity="0.45"/>
                        <!-- Horizon Water/Plain -->
                        <rect x="460" y="238" width="640" height="82" fill="#5b9bd5" opacity="0.35"/>
                        <!-- Architecture/Monument Silhouette -->
                        <g transform="translate(885, 74)" fill="#1e3a5f" opacity="0.72">
                            <rect x="28" y="132" width="54" height="38" rx="3"/>
                            <circle cx="55" cy="90" r="22" fill="none" stroke="#1e3a5f" stroke-width="6"/>
                            <path d="M35 120 L55 60 L75 120 Z"/>
                        </g>
                        <!-- Left Gradient Overlay for Text Readability -->
                        <rect width="1100" height="320" fill="url(#skyFade)"/>
                        <!-- Subtle Bottom Wave -->
                        <path d="M0 320 C180 275, 360 305, 560 320 Z" fill="#60a5fa" opacity="0.18"/>
                    </svg>
                </div>

                <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="space-y-3 max-w-xl">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/85 backdrop-blur-sm border border-blue-100 text-blue-600 font-bold text-[10px] tracking-wider uppercase shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            Ready for Your Next Expedition?
                        </div>
                        <h1 class="text-2xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                            Welcome, <span class="text-blue-600">{{ auth()->user()->name ?? 'explorer' }}</span>! 🌍
                        </h1>
                        <p class="text-slate-600 text-xs md:text-sm font-medium leading-relaxed">
                            Jelajahi destinasi luar biasa di seluruh penjuru dunia, temukan keajaiban baru, dan catat setiap perjalanan berharga Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CATEGORY SECTION -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-start gap-2.5">
                        <div class="mt-0.5 text-blue-600 text-base">
                            <i class="fa-solid fa-compass-drafting"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-extrabold text-slate-900 tracking-tight">Kategori Petualangan</h2>
                            <p class="text-xs text-slate-500">Pilih kategori ekspedisi sesuai gaya penjelajahan Anda!</p>
                        </div>
                    </div>
                    <a href="{{ route('user.dashboard') }}" class="btn-micro text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                        <span>View All</span>
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Kategori Filter Horizontal -->
                <div class="relative flex items-center w-full" x-data="{
                    scrollLeft() { $refs.categoryContainer.scrollBy({ left: -300, behavior: 'smooth' }); },
                    scrollRight() { $refs.categoryContainer.scrollBy({ left: 300, behavior: 'smooth' }); }
                }">
                    <button @click="scrollLeft()" class="btn-micro flex-shrink-0 w-9 h-9 rounded-full bg-white border border-slate-200/80 text-blue-600 hover:bg-blue-50 flex items-center justify-center shadow-sm mr-2.5 z-10" title="Geser Kiri">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>

                    <div x-ref="categoryContainer" class="flex items-center gap-2.5 overflow-x-auto py-1 no-scrollbar scroll-smooth w-full">
                        <a href="{{ route('user.dashboard') }}" class="btn-micro px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ !request('kategori') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25' : 'bg-white text-slate-700 border border-slate-200/80 shadow-sm hover:border-blue-300 hover:text-blue-600' }}">All Categories</a>
                        @if(isset($kategori))
                            @foreach ($kategori as $kat)
                                <a href="{{ route('user.dashboard', ['kategori' => $kat->id]) }}" class="btn-micro px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ request('kategori') == $kat->id ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25' : 'bg-white text-slate-700 border border-slate-200/80 shadow-sm hover:border-blue-300 hover:text-blue-600' }}">{{ $kat->nama_kategori }}</a>
                            @endforeach
                        @endif
                    </div>

                    <button @click="scrollRight()" class="btn-micro flex-shrink-0 w-9 h-9 rounded-full bg-white border border-slate-200/80 text-blue-600 hover:bg-blue-50 flex items-center justify-center shadow-sm ml-2.5 z-10" title="Geser Kanan">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>

            <!-- SKELETON LOADING STATE -->
            <div x-show="isLoading" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 items-start">
                <template x-for="i in 4" :key="i">
                    <div class="bg-white border border-slate-100 rounded-3xl p-3.5 space-y-3 shadow-sm animate-pulse">
                        <div class="w-full aspect-[16/10] rounded-2xl bg-slate-200"></div>
                        <div class="space-y-2 px-1">
                            <div class="h-4 bg-slate-200 rounded w-3/4"></div>
                            <div class="h-3 bg-slate-200 rounded w-1/2"></div>
                            <div class="h-3 bg-slate-200 rounded w-full"></div>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-slate-100 px-1">
                            <div class="h-3 bg-slate-200 rounded w-12"></div>
                            <div class="h-7 bg-slate-200 rounded-full w-20"></div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- GRID KARTU DESTINASI -->
            <div x-show="!isLoading" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 items-stretch"
            >
                @if(isset($destinasi) && count($destinasi) > 0)
                    @foreach ($destinasi as $index => $item)
                        <div class="reveal-card bg-white border border-slate-100 rounded-3xl p-3.5 space-y-3 soft-card-shadow hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group/card">
                            
                            <div class="space-y-3">
                                <div class="relative w-full aspect-[16/10] rounded-2xl overflow-hidden bg-slate-100">
                                    @if(!empty($item->foto))
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_destinasi }}" class="w-full h-full object-cover group-hover/card:scale-105 transition duration-700 ease-out">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-sky-200 flex items-center justify-center text-blue-600 font-bold group-hover/card:scale-105 transition duration-500 ease-out">
                                            <i class="fa-solid fa-earth-americas text-3xl"></i>
                                        </div>
                                    @endif
                                    <span class="absolute top-2.5 left-2.5 bg-slate-900/65 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-semibold text-white shadow-sm">
                                        {{ $item->kategori->nama_kategori ?? 'Expedition' }}
                                    </span>
                                </div>

                                <div class="space-y-1.5 px-1">
                                    <h3 class="font-extrabold text-slate-900 text-sm group-hover/card:text-blue-600 transition leading-snug">{{ $item->nama_destinasi }}</h3>
                                    <p class="text-[11px] text-slate-500 flex items-center space-x-1.5">
                                        <i class="fa-solid fa-location-dot text-blue-600 text-[11px]"></i>
                                        <span class="truncate">{{ $item->alamat ?? 'Global Destination' }}</span>
                                    </p>

                                    @if($item->deskripsi_singkat)
                                        <p class="text-[11px] text-slate-500 mt-1.5 line-clamp-2 leading-relaxed">
                                            "{{ $item->deskripsi_singkat }}"
                                        </p>
                                    @endif
                                </div>
                            </div>

                            @php
                                $totalReviews = $item->reviews ? $item->reviews->count() : 0;
                                $avgRating = $totalReviews > 0 ? round($item->reviews->avg('rating'), 1) : 0;
                            @endphp

                            <div class="flex items-center justify-between pt-3 border-t border-slate-100 mt-3 px-1">
                                <div class="flex items-center space-x-1 text-amber-500 font-bold text-[11px]">
                                    <i class="fa-solid fa-star text-[10px]"></i>
                                    <span class="text-slate-800">{{ number_format($avgRating, 1) }}</span>
                                    <span class="text-slate-400 font-normal text-[10px]">({{ $totalReviews }})</span>
                                </div>
                                <a href="{{ route('user.destinasi.detail', $item->id) }}" 
                                   @click.prevent="navigateWithExit($event)"
                                   class="btn-micro px-3.5 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full text-[10px] flex items-center gap-1.5 shadow-sm shadow-blue-600/20"
                                >
                                    <span>Explore</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                                </a>
                            </div>

                        </div>
                    @endforeach
                @else
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200 border-dashed shadow-sm">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mx-auto text-xl mb-3">
                            <i class="fa-solid fa-compass"></i>
                        </div>
                        <p class="text-sm font-bold text-slate-800">No destinations found in database.</p>
                        <p class="text-xs text-slate-500 mt-1">Try searching with a different keyword or category filter.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- JAVASCRIPT (Tanpa Mengubah Logic Backend/Event Handling) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = { threshold: 0.1 };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal-card').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>