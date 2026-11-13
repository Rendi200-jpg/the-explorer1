<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destinasi->nama_destinasi }} - The Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        /* =========================================================
           01. HALAMAN MULAI TERBUKA (0–200 ms): Fade In + Slide Up
           05. PENGGUNA KEMBALI (220–300 ms): Fade Out + Slide Down
           ========================================================= */
        @keyframes pageEntry {
            0% { opacity: 0; transform: translateY(20px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes pageExit {
            0% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0px); }
            100% { opacity: 0; transform: translateY(20px) scale(0.97); filter: blur(4px); }
        }
        .anim-page-entry {
            animation: pageEntry 300ms cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .anim-page-exit {
            animation: pageExit 250ms cubic-bezier(0.4, 0, 1, 1) forwards !important;
        }

        /* =========================================================
           02. FOTO DESTINASI TAMPIL (100–700 ms): Hero Zoom
           ========================================================= */
        @keyframes heroZoom {
            0% { transform: scale(1.12); opacity: 0.85; }
            100% { transform: scale(1); opacity: 1; }
        }
        .anim-hero-zoom {
            animation: heroZoom 600ms cubic-bezier(0.16, 1, 0.3, 1) 100ms forwards;
            will-change: transform, opacity;
        }

        /* =========================================================
           03. INFORMASI DESTINASI MENYUSUL (150–800 ms): Stagger Reveal
           ========================================================= */
        @keyframes staggerItem {
            0% { opacity: 0; transform: translateY(12px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .anim-stagger-1 { animation: staggerItem 400ms ease-out 150ms forwards; opacity: 0; }
        .anim-stagger-2 { animation: staggerItem 400ms ease-out 300ms forwards; opacity: 0; }
        .anim-stagger-3 { animation: staggerItem 400ms ease-out 450ms forwards; opacity: 0; }

        /* =========================================================
           04. GALERI DAN ULASAN (Saat Terlihat): Scroll Reveal
           ========================================================= */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 600ms cubic-bezier(0.16, 1, 0.3, 1), transform 600ms cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .soft-card-shadow {
            box-shadow: 0 20px 50px -12px rgba(37, 99, 235, 0.12), 0 8px 24px -6px rgba(15, 23, 42, 0.05);
        }
        .btn-micro {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-micro:active {
            transform: scale(0.95) !important;
        }
    </style>
</head>
<body class="bg-[#f4f8ff] text-slate-900 min-h-screen flex items-center justify-center p-4 text-xs antialiased selection:bg-blue-600 selection:text-white relative overflow-x-hidden">

    <!-- Decorative Soft Background Blobs -->
    <div class="fixed top-0 right-0 w-[500px] h-[500px] bg-blue-200/35 rounded-full blur-[110px] pointer-events-none -z-0"></div>
    <div class="fixed bottom-0 left-0 w-[420px] h-[420px] bg-sky-200/40 rounded-full blur-[100px] pointer-events-none -z-0"></div>

    <!-- Container Utama dengan Animasi Page Entry & Exit -->
    <div id="mainCard" class="anim-page-entry bg-white/95 border border-slate-200/80 w-full max-w-2xl rounded-3xl overflow-hidden relative space-y-6 p-6 md:p-8 my-6 backdrop-blur-xl soft-card-shadow z-10">
        
        <!-- Top Brand Mini Header & Tombol Kembali -->
        <div class="flex items-center justify-between pb-1">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-sm shadow-blue-500/30">
                    <i class="fa-solid fa-compass text-xs"></i>
                </div>
                <span class="font-extrabold text-slate-900 text-xs tracking-tight">The Explorer</span>
                <span class="text-[9px] px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 border border-blue-200/80 font-bold">Expedition Log</span>
            </div>

            <a href="{{ route('user.dashboard') }}" onclick="handleBackWithAnimation(event, this.href)" class="btn-micro h-8 px-3.5 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-blue-600 flex items-center gap-1.5 transition border border-slate-200/80 font-bold text-[11px] shadow-sm" title="Kembali ke Discovery Hub">
                <i class="fa-solid fa-arrow-left text-[10px]"></i>
                <span>Discovery Hub</span>
            </a>
        </div>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="bg-blue-50 border border-blue-200 text-blue-700 p-3.5 rounded-2xl text-xs flex items-center space-x-2.5 shadow-sm">
                <i class="fa-solid fa-circle-check text-blue-600"></i>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Notifikasi Error Validasi -->
        @if($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3.5 rounded-2xl text-xs space-y-1.5 shadow-sm">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center space-x-2">
                        <i class="fa-solid fa-circle-exclamation text-rose-500"></i>
                        <span class="font-semibold">{{ $error }}</span>
                    </p>
                @endforeach
            </div>
        @endif

        <!-- 02. Foto Utama (Hero Zoom 100–700 ms) & Tombol Saved Expeditions -->
        <div class="relative w-full h-72 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-sm">
            @if($destinasi->foto)
                <img src="{{ asset('storage/' . $destinasi->foto) }}" alt="{{ $destinasi->nama_destinasi }}" class="anim-hero-zoom w-full h-full object-cover">
            @else
                <div class="flex items-center justify-center h-full text-6xl anim-hero-zoom bg-gradient-to-br from-blue-100 to-sky-200 text-blue-600">
                    <i class="fa-solid fa-earth-americas"></i>
                </div>
            @endif
            
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>

            <span class="absolute top-3.5 left-3.5 bg-slate-900/70 backdrop-blur-md px-3.5 py-1 rounded-full text-[11px] font-bold text-white shadow-sm z-10">
                {{ $destinasi->kategori->nama_kategori ?? 'Expedition' }}
            </span>

            <form action="{{ route('user.wishlist.toggle', $destinasi->id) }}" method="POST" class="absolute top-3.5 right-3.5 z-10">
                @csrf
                <button type="submit" class="btn-micro w-9 h-9 rounded-full bg-white/90 hover:bg-white backdrop-blur-md border border-slate-200/80 flex items-center justify-center transition shadow-md group" title="Save Expedition">
                    @if(isset($isWishlist) && $isWishlist)
                        <i class="fa-solid fa-bookmark text-amber-500 text-sm scale-110 transition"></i>
                    @else
                        <i class="fa-regular fa-bookmark text-slate-600 group-hover:text-blue-600 text-sm transition"></i>
                    @endif
                </button>
            </form>
        </div>

        <!-- 03. Informasi Destinasi Menyusul: Stagger Reveal (150–800 ms) -->
        <!-- Nama Destinasi, Alamat & Jam Operasional (Stagger 1) -->
        <div class="anim-stagger-1 space-y-2">
            <h2 class="text-xl md:text-2xl font-extrabold text-slate-900 tracking-tight">{{ $destinasi->nama_destinasi }}</h2>
            <p class="text-xs text-blue-600 font-semibold flex items-center space-x-1.5">
                <i class="fa-solid fa-location-dot"></i>
                <span>{{ $destinasi->alamat ?? 'Global Coordinates Unavailable' }}</span>
            </p>
            @if($destinasi->jam_buka)
                <p class="text-[11px] text-slate-500 flex items-center space-x-1.5 font-medium">
                    <i class="fa-regular fa-clock text-blue-600"></i>
                    <span>Opening Hours: {{ $destinasi->jam_buka }}</span>
                </p>
            @endif
        </div>

        <!-- Profil Singkat / Highlight (Stagger 2) -->
        @if($destinasi->deskripsi_singkat)
            <div class="anim-stagger-2 bg-gradient-to-r from-[#eef5ff] to-[#dbeafe]/60 border border-blue-200/70 p-4 rounded-2xl space-y-1.5 shadow-sm">
                <h4 class="font-extrabold text-blue-700 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                    <i class="fa-solid fa-sparkles text-blue-600"></i>
                    <span>Expedition Overview</span>
                </h4>
                <p class="text-xs text-slate-700 leading-relaxed font-medium">{{ $destinasi->deskripsi_singkat }}</p>
            </div>
        @endif

        <!-- Detail Lengkap & Fasilitas (Stagger 3) -->
        <div class="anim-stagger-3 space-y-2 bg-slate-50/90 p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="font-extrabold text-slate-800 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                <i class="fa-solid fa-map-pin text-blue-600"></i>
                <span>Field Notes & Facilities</span>
            </h3>
            <p class="text-xs text-slate-600 leading-relaxed font-normal whitespace-pre-line">
                {{ $destinasi->deskripsi_lengkap ?? $destinasi->deskripsi ?? 'Belum ada catatan detail untuk ekspedisi ini.' }}
            </p>
        </div>

        <!-- ==================== 04. GALERI FOTO & VIDEO (Scroll Reveal saat terlihat) =================== -->
        @php
            $galeriItems = $destinasi->galeri ?? collect();
        @endphp
        <div class="scroll-reveal space-y-3.5 pt-2">
            <div class="flex justify-between items-center border-b border-slate-200/80 pb-2.5">
                <h3 class="font-extrabold text-slate-900 text-xs flex items-center space-x-2">
                    <i class="fa-solid fa-camera-retro text-blue-600"></i>
                    <span>Explorer Gallery</span>
                </h3>
                <span class="text-[10px] text-slate-500 font-medium">Captured Moments by Explorers</span>
            </div>

            <!-- Display Grid Galeri -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 max-h-64 overflow-y-auto no-scrollbar">
                @forelse ($galeriItems as $index => $g)
                    <div onclick="openMediaModal({{ $index }})" 
                         class="btn-micro relative group rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 h-28 cursor-pointer shadow-sm">
                        @if ($g->jenis == 'foto')
                            <img src="{{ asset('storage/' . $g->file_path) }}" alt="Foto Galeri" class="w-full h-full object-cover transition transform group-hover:scale-105 duration-500">
                        @else
                            <video class="w-full h-full object-cover pointer-events-none">
                                <source src="{{ asset('storage/' . $g->file_path) }}" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center bg-slate-900/35 group-hover:bg-slate-900/20 transition">
                                <i class="fa-solid fa-play text-white text-lg drop-shadow-md"></i>
                            </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-blue-600/15 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <i class="fa-solid fa-magnifying-glass-plus text-white text-sm drop-shadow"></i>
                        </div>

                        <div class="absolute bottom-1.5 left-1.5 bg-slate-900/75 backdrop-blur-md px-2.5 py-0.5 rounded-full text-[9px] text-white font-semibold shadow-sm">
                            <i class="fa-solid fa-compass text-blue-300 mr-0.5"></i> {{ $g->user->name ?? 'Explorer' }}
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-6 text-center bg-slate-50 rounded-2xl border border-slate-200 border-dashed">
                        <p class="text-xs text-slate-500 italic">Belum ada dokumentasi di galeri ini. Jadilah explorer pertama yang mengunggah!</p>
                    </div>
                @endforelse
            </div>

            <!-- Form Upload Galeri Baru -->
            <div class="bg-[#f8fbff] p-4 rounded-2xl border border-blue-100 space-y-2.5 shadow-sm">
                <h4 class="font-bold text-slate-800 text-xs flex items-center space-x-1.5">
                    <i class="fa-solid fa-cloud-arrow-up text-blue-600"></i>
                    <span>Bagikan Dokumentasi Perjalananmu</span>
                </h4>
                <form action="{{ route('user.galeri.store', $destinasi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                    @csrf
                    <div>
                        <input type="file" name="media" accept="image/jpeg,image/png,image/jpg,video/mp4,video/mov,video/avi" required class="block w-full text-[11px] text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[11px] file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer bg-white border border-slate-200 rounded-full transition">
                        <p class="text-[10px] text-slate-500 mt-1.5 px-1">Maksimal ukuran: <b class="text-slate-700">Foto 5MB</b> | <b class="text-slate-700">Video 30MB</b></p>
                    </div>
                    <button type="submit" class="btn-micro w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full text-xs transition shadow-md shadow-blue-600/20">
                        Unggah ke Explorer Gallery
                    </button>
                </form>
            </div>
        </div>
        <!-- ============================================================= -->

        <!-- 04. Section Ulasan Pengguna & Ringkasan Rating (Scroll Reveal) -->
        @php
            $reviewItems = $destinasi->reviews ?? collect();
            $totalReviews = $reviewItems->count();
            $avgRating = $totalReviews > 0 ? round($reviewItems->avg('rating'), 1) : 0;
            $ratingPercentage = round(($avgRating / 5) * 100);
        @endphp

        <div class="scroll-reveal space-y-3.5 pt-2">
            <div class="flex justify-between items-center border-b border-slate-200/80 pb-2.5">
                <h3 class="font-extrabold text-slate-900 text-xs flex items-center gap-1.5">
                    <i class="fa-solid fa-comments text-blue-600"></i>
                    <span>Explorer Reviews</span>
                </h3>
                <div class="text-amber-600 font-bold text-xs flex items-center space-x-1.5 bg-amber-50 px-3 py-1 rounded-full border border-amber-200/80">
                    <i class="fa-solid fa-star text-amber-500 text-[10px]"></i>
                    <span>{{ number_format($avgRating, 1) }} / 5.0 ({{ $ratingPercentage }}%)</span>
                </div>
            </div>
            
            <div class="space-y-3 max-h-52 overflow-y-auto no-scrollbar">
                @forelse ($reviewItems as $rev)
                    <div class="bg-slate-50/90 p-4 rounded-2xl border border-slate-200/70 flex items-start space-x-3 shadow-sm">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white font-bold flex items-center justify-center text-xs flex-shrink-0 shadow-sm">
                            {{ substr($rev->user->name ?? 'E', 0, 1) }}
                        </div>
                        <div class="space-y-1 flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-slate-900 text-xs">{{ $rev->user->name ?? 'Explorer' }}</span>
                                <div class="text-amber-400 text-[10px]">
                                    @for ($i = 0; $i < $rev->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">{{ $rev->komentar }}</p>
                            @if($rev->foto)
                                <img src="{{ asset('storage/' . $rev->foto) }}" class="w-20 h-20 object-cover rounded-xl border border-slate-200 mt-2 shadow-sm">
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-500 italic text-center py-3">Belum ada ulasan dari explorer untuk destinasi ini.</p>
                @endforelse
            </div>
        </div>

        <!-- Form Tambah Ulasan Baru (Scroll Reveal) -->
        <div class="scroll-reveal bg-[#f8fbff] p-4.5 rounded-2xl border border-blue-100 space-y-3 shadow-sm">
            <h4 class="font-bold text-slate-800 text-xs flex items-center gap-1.5">
                <i class="fa-solid fa-pen-nib text-blue-600"></i>
                <span>Tulis Catatan Ulasanmu</span>
            </h4>
            <form action="{{ route('user.review.store', $destinasi->id) }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-[11px] text-slate-600 mb-1 font-semibold">Rating Bintang:</label>
                    <select name="rating" class="w-full bg-white border border-slate-200 text-slate-800 rounded-xl px-3.5 py-2.5 text-xs focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition">
                        <option value="5">⭐⭐⭐⭐⭐ 5 Star - Luar Biasa</option>
                        <option value="4">⭐⭐⭐⭐ 4 Star - Sangat Berkesan</option>
                        <option value="3">⭐⭐⭐ 3 Star - Cukup Menarik</option>
                        <option value="2">⭐⭐ 2 Star - Kurang Sesuai</option>
                        <option value="1">⭐ 1 Star - Tidak Direkomendasikan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] text-slate-600 mb-1 font-semibold">Pengalaman / Komentar:</label>
                    <textarea name="komentar" rows="2" required placeholder="Bagikan cerita ekspedisi atau tips perjalananmu di sini..." class="w-full bg-white border border-slate-200 text-slate-800 rounded-xl p-3.5 text-xs focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition placeholder-slate-400"></textarea>
                </div>
                <button type="submit" class="btn-micro w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full text-xs transition shadow-md shadow-blue-600/20">
                    Kirim Ulasan
                </button>
            </form>
        </div>

        <!-- Tombol Buka Maps (Scroll Reveal) -->
        @if($destinasi->link_maps)
            <div class="scroll-reveal pt-1">
                <a href="{{ $destinasi->link_maps }}" target="_blank" class="btn-micro flex items-center justify-center gap-2 w-full text-center py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold rounded-full text-xs transition shadow-lg shadow-blue-600/25">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <span>Buka Koordinat di Google Maps</span>
                </a>
            </div>
        @endif

    </div>

    <!-- Modal Popup Preview Media (Foto/Video) Dengan Slider Navigasi -->
    <div id="mediaModal" class="fixed inset-0 bg-slate-900/85 backdrop-blur-md z-50 hidden items-center justify-center p-4">
        <div class="relative max-w-4xl w-full flex flex-col items-center justify-center space-y-3">
            
            <button onclick="closeMediaModal()" class="btn-micro absolute -top-12 right-0 w-9 h-9 rounded-full bg-white hover:bg-blue-50 text-slate-800 flex items-center justify-center transition shadow-xl z-20">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>

            <button id="btnPrev" onclick="prevMedia()" class="btn-micro absolute left-2 md:-left-14 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/95 hover:bg-blue-50 text-blue-600 flex items-center justify-center transition shadow-xl z-20">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>

            <button id="btnNext" onclick="nextMedia()" class="btn-micro absolute right-2 md:-right-14 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/95 hover:bg-blue-50 text-blue-600 flex items-center justify-center transition shadow-xl z-20">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>

            <div class="w-full flex items-center justify-center max-h-[80vh] overflow-hidden rounded-3xl border border-white/20 bg-slate-950 shadow-2xl relative">
                <img id="modalImage" src="" class="hidden max-h-[80vh] w-auto object-contain rounded-2xl">
                <video id="modalVideo" controls class="hidden max-h-[80vh] w-auto rounded-2xl">
                    <source id="modalVideoSource" src="" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video.
                </video>
            </div>

            <div class="flex items-center space-x-2 text-xs text-slate-700 bg-white/95 backdrop-blur-md px-4 py-2 rounded-full font-semibold shadow-lg">
                <span>Diunggah oleh: <b id="uploaderName" class="text-blue-600"></b></span>
                <span class="text-slate-300">|</span>
                <span id="mediaCounter" class="text-slate-500"></span>
            </div>
        </div>
    </div>

    <!-- Script JavaScript Slider Gallery & Interactivity Observer -->
    <script>
        // 04. Scroll Reveal Observer untuk Galeri & Ulasan saat terlihat
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

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });

        // 05. Pengguna kembali: Fade Out + Slide Down (220–300 ms)
        function handleBackWithAnimation(e, targetUrl) {
            e.preventDefault();
            const mainCard = document.getElementById('mainCard');
            if (mainCard) {
                mainCard.classList.add('anim-page-exit');
                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 250);
            } else {
                window.location.href = targetUrl;
            }
        }

        const galeriRaw = @json($galeriItems);
        
        const galeriItems = galeriRaw.map(item => ({
            url: "{{ asset('storage') }}/" + item.file_path,
            type: item.jenis,
            user: item.user ? item.user.name : 'Explorer'
        }));

        let currentIndex = 0;

        function openMediaModal(index) {
            if (galeriItems.length === 0) return;
            currentIndex = index;
            updateMediaDisplay();

            const modal = document.getElementById('mediaModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeMediaModal() {
            const modal = document.getElementById('mediaModal');
            const modalVid = document.getElementById('modalVideo');
            if (modalVid) modalVid.pause();
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function updateMediaDisplay() {
            const currentItem = galeriItems[currentIndex];
            const modalImg = document.getElementById('modalImage');
            const modalVid = document.getElementById('modalVideo');
            const modalVidSrc = document.getElementById('modalVideoSource');
            const uploaderName = document.getElementById('uploaderName');
            const counter = document.getElementById('mediaCounter');

            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');

            uploaderName.innerText = currentItem.user;
            counter.innerText = `${currentIndex + 1} / ${galeriItems.length}`;

            if (currentItem.type === 'foto') {
                modalVid.classList.add('hidden');
                modalVid.pause();
                modalImg.src = currentItem.url;
                modalImg.classList.remove('hidden');
            } else {
                modalImg.classList.add('hidden');
                modalVidSrc.src = currentItem.url;
                modalVid.load();
                modalVid.classList.remove('hidden');
            }

            if (currentIndex === 0) {
                btnPrev.classList.add('hidden');
            } else {
                btnPrev.classList.remove('hidden');
            }

            if (currentIndex === galeriItems.length - 1) {
                btnNext.classList.add('hidden');
            } else {
                btnNext.classList.remove('hidden');
            }

            if (galeriItems.length <= 1) {
                btnPrev.classList.add('hidden');
                btnNext.classList.add('hidden');
            }
        }

        function prevMedia() {
            if (currentIndex > 0) {
                currentIndex--;
                updateMediaDisplay();
            }
        }

        function nextMedia() {
            if (currentIndex < galeriItems.length - 1) {
                currentIndex++;
                updateMediaDisplay();
            }
        }

        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('mediaModal');
            if (modal && !modal.classList.contains('hidden')) {
                if (e.key === 'ArrowLeft') {
                    prevMedia();
                } else if (e.key === 'ArrowRight') {
                    nextMedia();
                } else if (e.key === 'Escape') {
                    closeMediaModal();
                }
            }
        });
    </script>
</body>
</html>