<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi - The Explorer</title>
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
        /* Custom Input Glow & Focus Effect */
        .input-futuristic {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .input-futuristic:focus {
            background-color: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
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
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-2 animate__animated animate__fadeInDown">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                        <span>Tambah Destinasi Baru</span> <span class="text-base">🗺️</span>
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mt-1">Masukkan informasi detail tempat wisata global dengan lengkap.</p>
                </div>
                <a href="/admin/destinasi" class="btn-micro bg-slate-200/80 hover:bg-slate-300 text-slate-700 px-4 py-2.5 rounded-full text-xs font-bold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Card Container -->
            <div class="soft-card rounded-3xl p-8 animate__animated animate__fadeInUp">
                <form action="/admin/destinasi" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama Destinasi -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-blue-600"><i class="fa-solid fa-location-dot"></i></span> Nama Destinasi
                        </label>
                        <input type="text" name="nama_destinasi" required placeholder="Contoh: Grand Canyon Expedition" 
                            class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-medium text-slate-800 input-futuristic placeholder-slate-400">
                    </div>

                    <!-- Kategori Wisata -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-blue-600"><i class="fa-solid fa-folder-open"></i></span> Kategori Wisata
                        </label>
                        <div class="relative">
                            <select name="kategori_id" required 
                                class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-bold text-slate-700 input-futuristic appearance-none cursor-pointer">
                                <option value="" disabled selected class="text-slate-400">Pilih kategori ekspedisi...</option>
                                @foreach($kategori ?? [] as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Dual Detail: Profil Singkat & Detail Lengkap -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                                <span class="text-amber-500"><i class="fa-solid fa-bolt"></i></span> Profil Singkat (Highlight)
                            </label>
                            <textarea name="deskripsi_singkat" rows="3" required placeholder="Deskripsi ringkas untuk kartu preview..."
                                class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-medium text-slate-800 input-futuristic placeholder-slate-400 resize-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                                <span class="text-blue-600"><i class="fa-solid fa-file-lines"></i></span> Detail Lengkap & Fasilitas
                            </label>
                            <textarea name="deskripsi_lengkap" rows="3" required placeholder="Informasi mendalam, fasilitas, daya tarik, dll..."
                                class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-medium text-slate-800 input-futuristic placeholder-slate-400 resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Foto Wisata Dropzone Minimalis -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-indigo-600"><i class="fa-solid fa-camera"></i></span> Foto Utama Wisata
                        </label>
                        <div class="relative group border-2 border-dashed border-slate-200 hover:border-blue-500 rounded-2xl p-4 bg-slate-50/50 hover:bg-blue-50/30 transition text-center cursor-pointer">
                            <input type="file" name="foto" accept="image/*" required id="fotoInput" onchange="previewFileName(this)"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="flex flex-col items-center justify-center py-2">
                                <div class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-2 group-hover:scale-110 transition shadow-sm">
                                    <i class="fa-regular fa-image text-sm"></i>
                                </div>
                                <p id="fileNameDisplay" class="text-xs font-bold text-slate-700">Klik atau seret file gambar ke sini</p>
                                <p class="text-[10px] text-slate-400 mt-1">Format: JPG, PNG, JPEG (Maks. 5MB)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi / Alamat -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-rose-500"><i class="fa-solid fa-map-pin"></i></span> Lokasi / Alamat Lengkap
                        </label>
                        <input type="text" name="alamat" required placeholder="Contoh: Arizona, United States" 
                            class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-medium text-slate-800 input-futuristic placeholder-slate-400">
                    </div>

                    <!-- Jam Operasional -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-emerald-600"><i class="fa-solid fa-clock"></i></span> Jam Operasional Wisata
                        </label>
                        <div class="mb-3">
                            <input type="text" id="inputJamBuka" name="jam_buka" required placeholder="Ketik manual (Contoh: 08:30 - 16:30)" 
                                class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-medium text-slate-800 input-futuristic placeholder-slate-400">
                        </div>
                        <div class="flex flex-wrap gap-2 items-center">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mr-1">Pilih Cepat:</span>
                            <button type="button" onclick="setJam('08:00 - 17:00')" class="px-3.5 py-1.5 rounded-full text-[11px] font-semibold bg-slate-50 border border-slate-200 hover:border-blue-500 hover:bg-blue-50 text-slate-600 transition shadow-sm">08:00 - 17:00</button>
                            <button type="button" onclick="setJam('07:00 - 18:00')" class="px-3.5 py-1.5 rounded-full text-[11px] font-semibold bg-slate-50 border border-slate-200 hover:border-blue-500 hover:bg-blue-50 text-slate-600 transition shadow-sm">07:00 - 18:00</button>
                            <button type="button" onclick="setJam('24 Jam')" class="px-3.5 py-1.5 rounded-full text-[11px] font-semibold bg-slate-50 border border-slate-200 hover:border-blue-500 hover:bg-blue-50 text-slate-600 transition shadow-sm">24 Jam</button>
                            <button type="button" onclick="setJam('09:00 - 21:00')" class="px-3.5 py-1.5 rounded-full text-[11px] font-semibold bg-slate-50 border border-slate-200 hover:border-blue-500 hover:bg-blue-50 text-slate-600 transition shadow-sm">09:00 - 21:00</button>
                        </div>
                    </div>

                    <!-- Link Google Maps -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2 flex items-center gap-1.5">
                            <span class="text-blue-600"><i class="fa-solid fa-map"></i></span> Link Google Maps / Koordinat GPS
                        </label>
                        <input type="text" name="link_maps" placeholder="Tempel link Google Maps atau koordinat..." 
                            class="w-full px-4 py-3 rounded-2xl bg-slate-50/70 border border-slate-200 text-xs font-medium text-slate-800 input-futuristic placeholder-slate-400">
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                        <a href="/admin/destinasi" class="px-5 py-2.5 rounded-full text-xs font-bold text-slate-500 hover:bg-slate-100 transition">Batal</a>
                        <button type="submit" class="btn-micro bg-blue-600 hover:bg-blue-700 text-white px-7 py-2.5 rounded-full text-xs font-bold shadow-md shadow-blue-600/25 transition flex items-center gap-2">
                            <i class="fa-solid fa-sparkles text-xs"></i>
                            <span>Simpan Destinasi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function setJam(jam) {
            document.getElementById('inputJamBuka').value = jam;
        }

        function previewFileName(input) {
            if (input.files && input.files[0]) {
                document.getElementById('fileNameDisplay').textContent = "File Terpilih: " + input.files[0].name;
            }
        }
    </script>
</body>
</html>