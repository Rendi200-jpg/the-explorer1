<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - The Explorer</title>
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
                <a href="/admin/destinasi" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition duration-200">
                    <i class="fa-solid fa-location-dot text-slate-400 w-4 text-center"></i>
                    Kelola Destinasi
                </a>
                <a href="/admin/kategori" class="btn-micro flex items-center gap-3.5 py-2.5 px-4 rounded-full bg-blue-50 text-blue-600 border border-blue-200/80 shadow-sm transition duration-200">
                    <i class="fa-solid fa-folder-open text-blue-600 w-4 text-center"></i>
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
                    <input type="text" placeholder="Cari kategori atau destinasi..." class="w-full pl-10 pr-16 py-2.5 rounded-full bg-white border border-slate-200/80 focus:bg-white focus:border-blue-500 focus:outline-none text-xs text-slate-700 placeholder-slate-400 shadow-sm transition">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <kbd class="px-2 py-0.5 text-[9px] font-semibold text-slate-500 bg-slate-100 border border-slate-200 rounded-md">Ctrl + K</kbd>
                    </span>
                </div>
            </div>

            <!-- Profile Controls -->
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
        <div class="p-6 max-w-7xl mx-auto w-full space-y-6 relative z-10">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 animate__animated animate__fadeInDown">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                        <span>Kategori Destinasi</span> <span class="text-base">🏷️</span>
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mt-1">Daftar kategori tempat wisata penjelajahan global.</p>
                </div>
                <!-- Tombol Tambah Kategori -->
                <a href="{{ route('admin.kategori.create') }}" class="btn-micro bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-full text-xs font-bold shadow-md shadow-blue-600/25 transition flex items-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Tambah Kategori</span>
                </a>
            </div>

            <div class="soft-card rounded-3xl overflow-hidden animate__animated animate__fadeInUp">
                <!-- Filter Bar -->
                <div class="p-4 border-b border-slate-100 flex justify-between items-center gap-4 bg-slate-50/50">
                    <div class="text-xs font-extrabold text-slate-700">Data Kategori Ekspedisi</div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider bg-slate-50 border-b border-slate-100">
                                <th class="py-3.5 px-6">No</th>
                                <th class="py-3.5 px-6">Nama Kategori</th>
                                <th class="py-3.5 px-6">Slug</th>
                                <th class="py-3.5 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs font-medium">
                            @forelse($kategori ?? [] as $index => $kat)
                            <tr class="hover:bg-blue-50/50 transition duration-150">
                                <td class="py-4 px-6 text-slate-400 font-bold">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-extrabold text-slate-900">{{ $kat->nama_kategori }}</td>
                                <td class="py-4 px-6">
                                    <span class="text-xs text-blue-600 font-mono bg-blue-50 px-3 py-1 rounded-full border border-blue-100 font-bold">
                                        {{ $kat->slug }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Tombol Hapus -->
                                        <form action="/admin/kategori/{{ $kat->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-micro w-8 h-8 rounded-full bg-slate-50 text-rose-500 hover:bg-rose-500 hover:text-white flex items-center justify-center transition border border-slate-200 shadow-sm" title="Hapus">
                                                <i class="fa-regular fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-12 text-slate-400 text-xs font-semibold">
                                    Belum ada kategori yang ditambahkan[cite: 9].
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>
</html>