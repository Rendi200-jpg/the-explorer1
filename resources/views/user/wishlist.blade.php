<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Expeditions - The Explorer</title>
    <!-- Tailwind CSS CDN & Font Plus Jakarta Sans -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js untuk toggle sidebar -->
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
<body class="bg-[#f4f8ff] text-slate-900 min-h-screen flex text-xs antialiased selection:bg-blue-600 selection:text-white" x-data="{ sidebarOpen: false }">

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
        class="fixed inset-0 bg-slate-900/30 backdrop-blur-sm z-40 lg:hidden"
    ></div>

    <!-- SIDEBAR KIRI -->
    <aside 
        class="bg-white text-slate-800 flex flex-col justify-between p-4 fixed h-screen z-50 transition-all duration-300 ease-out border-r border-slate-200/70 shadow-sm w-64 overflow-hidden"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        <!-- Decorative Soft Blue Globe & Horizon Illustration at Bottom of Sidebar -->
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
                <!-- Silhouette Hills -->
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
            <!-- Logo Brand -->
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

            <!-- Navigation Links -->
            <nav class="space-y-1.5">
                <a href="{{ route('user.dashboard') }}" class="btn-micro flex items-center space-x-3 px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100/80 rounded-full transition-all">
                    <i class="fa-solid fa-earth-americas text-sm w-5 text-center"></i>
                    <span>Discovery Hub</span>
                </a>
                <a href="{{ route('user.wishlist') }}" class="btn-micro flex items-center space-x-3 px-4 py-2.5 text-xs font-bold bg-blue-50 text-blue-600 border border-blue-200/80 rounded-full shadow-sm hover:bg-blue-100/70 transition-all">
                    <i class="fa-solid fa-bookmark text-amber-500 text-sm w-5 text-center"></i>
                    <span>Saved Expeditions</span>
                </a>
                <a href="{{ route('user.pengaturan') }}" class="btn-micro flex items-center space-x-3 px-4 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100/80 rounded-full transition-all">
                    <i class="fa-solid fa-sliders text-slate-500 text-sm w-5 text-center"></i>
                    <span>Account Settings</span>
                </a>
            </nav>
        </div>

        <!-- Bagian Bawah Sidebar -->
        <div class="relative z-10 pt-4">
            <div class="flex items-center justify-between p-2.5 rounded-2xl bg-white/95 backdrop-blur-sm border border-slate-200/80 shadow-md">
                <div class="flex items-center space-x-2.5 overflow-hidden">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 text-white font-bold flex items-center justify-center text-xs shadow-sm flex-shrink-0">
                        {{ substr(auth()->user()->name ?? 'E', 0, 1) }}
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-bold text-slate-900 truncate leading-tight">{{ auth()->user()->name ?? 'Explorer' }}</p>
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

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 min-h-screen flex flex-col transition-all duration-300 ease-out bg-[#f4f8ff] relative overflow-x-hidden lg:ml-64">
        <!-- Decorative Soft Background Blobs -->
        <div class="fixed top-0 right-0 w-[520px] h-[520px] bg-blue-200/30 rounded-full blur-[110px] pointer-events-none -z-0"></div>
        <div class="fixed bottom-0 right-10 w-[420px] h-[420px] bg-sky-200/35 rounded-full blur-[100px] pointer-events-none -z-0"></div>

        <!-- TOP NAVBAR -->
        <header class="glass-header h-20 flex items-center justify-between px-6 sticky top-0 z-30">
            <div class="flex items-center space-x-4">
                <button @click="sidebarOpen = !sidebarOpen" class="btn-micro p-2.5 rounded-full bg-white text-blue-600 hover:bg-blue-50 border border-slate-200/80 shadow-sm lg:hidden">
                    <i class="fa-solid fa-bars text-sm"></i>
                </button>
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-amber-50 border border-amber-200/80 text-amber-500 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-bookmark text-xs"></i>
                    </div>
                    <div>
                        <h2 class="text-sm font-extrabold text-slate-900 tracking-tight">Saved Expeditions</h2>
                        <p class="text-[10px] text-slate-500 font-medium">Daftar destinasi petualangan yang Anda tandai</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('user.pengaturan') }}" class="btn-micro w-10 h-10 rounded-full bg-white text-blue-600 flex items-center justify-center border border-slate-200/80 shadow-sm hover:bg-blue-50 hover:border-blue-200 transition" title="Account Settings">
                    <i class="fa-regular fa-user text-sm"></i>
                </a>
            </div>
        </header>

        <!-- KONTEN UTAMA SAVED EXPEDITIONS -->
        <main class="px-6 pb-10 pt-4 space-y-6 flex-1 flex flex-col justify-start max-w-7xl mx-auto w-full animate-hero-entry relative z-10">
            
            <!-- Notifikasi Flash Message -->
            @if(session('success'))
                <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3.5 rounded-2xl text-xs font-semibold flex items-center justify-between shadow-sm">
                    <span class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-blue-600"></i>
                        {{ session('success') }}
                    </span>
                    <i class="fa-solid fa-check text-blue-600"></i>
                </div>
            @endif

            <!-- Grid Destinasi Tersimpan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 items-stretch">
                @forelse($wishlists as $wish)
                    @if($wish->destinasi)
                        <div class="bg-white border border-slate-100 rounded-3xl p-3.5 space-y-3 soft-card-shadow hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group/card">
                            <div class="space-y-3">
                                <!-- Foto Destinasi -->
                                <div class="relative w-full aspect-[16/10] rounded-2xl overflow-hidden bg-slate-100">
                                    @if($wish->destinasi->foto)
                                        <img src="{{ asset('storage/' . $wish->destinasi->foto) }}" alt="{{ $wish->destinasi->nama_destinasi }}" class="w-full h-full object-cover group-hover/card:scale-105 transition duration-700 ease-out">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-sky-200 flex items-center justify-center text-blue-600 font-bold group-hover/card:scale-105 transition duration-500 ease-out">
                                            <i class="fa-solid fa-earth-americas text-3xl"></i>
                                        </div>
                                    @endif

                                    <!-- Tombol Hapus dari Saved Expeditions (Toggle) -->
                                    <form action="{{ route('user.wishlist.toggle', $wish->destinasi->id) }}" method="POST" class="absolute top-2.5 right-2.5 z-10">
                                        @csrf
                                        <button type="submit" class="btn-micro w-8 h-8 rounded-full bg-white/90 hover:bg-rose-500 backdrop-blur-md text-amber-500 hover:text-white flex items-center justify-center transition shadow-md border border-slate-200/80" title="Hapus dari Saved Expeditions">
                                            <i class="fa-solid fa-bookmark text-xs"></i>
                                        </button>
                                    </form>

                                    <span class="absolute top-2.5 left-2.5 bg-slate-900/65 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-semibold text-white shadow-sm">
                                        Saved Route
                                    </span>
                                </div>

                                <!-- Informasi -->
                                <div class="space-y-1.5 px-1">
                                    <h3 class="font-extrabold text-slate-900 text-sm truncate group-hover/card:text-blue-600 transition leading-snug">{{ $wish->destinasi->nama_destinasi }}</h3>
                                    <p class="text-[11px] text-slate-500 flex items-center space-x-1.5">
                                        <i class="fa-solid fa-location-dot text-blue-600 text-[11px]"></i>
                                        <span class="truncate">{{ $wish->destinasi->alamat ?? 'Global Destination' }}</span>
                                    </p>
                                </div>
                            </div>

                            <!-- Footer Kartu -->
                            <div class="flex items-center justify-between pt-3 border-t border-slate-100 mt-3 px-1">
                                <span class="text-[10px] text-blue-600 font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check text-[9px]"></i> Bookmarked
                                </span>
                                <a href="{{ route('user.destinasi.detail', $wish->destinasi->id) }}" class="btn-micro px-3.5 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full text-[10px] flex items-center gap-1.5 shadow-sm shadow-blue-600/20 transition">
                                    <span>Explore</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- TAMPILAN KOSONG -->
                    <div class="col-span-full flex flex-col items-center justify-center py-20 px-6 text-center bg-white rounded-3xl border border-slate-200 border-dashed space-y-4 max-w-lg mx-auto w-full soft-card-shadow my-auto">
                        <div class="w-16 h-16 rounded-2xl bg-blue-50 border border-blue-100 text-blue-600 flex items-center justify-center text-2xl shadow-sm">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div class="space-y-1.5 max-w-sm">
                            <h3 class="text-base font-extrabold text-slate-900 tracking-tight">Belum Ada Ekspedisi Tersimpan</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Anda belum menandai destinasi apa pun ke dalam daftar rencana perjalanan. Mulai jelajahi keajaiban dunia di The Explorer!</p>
                        </div>
                        <a href="{{ route('user.dashboard') }}" class="btn-micro px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full text-xs transition shadow-md shadow-blue-600/25 flex items-center space-x-2">
                            <i class="fa-solid fa-compass text-sm"></i>
                            <span>Jelajahi Discovery Hub</span>
                        </a>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</body>
</html>