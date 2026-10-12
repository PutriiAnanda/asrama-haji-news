<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita & Informasi - Asrama Haji Transit Kaltara</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            gold: '#E9910F',
                            brown: '#4F200D',
                            dark: '#201F1E',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-gray-100 text-brand-dark antialiased">

    <!-- HEADER / NAVBAR -->
    <header class="bg-brand-brown text-white shadow-lg border-b-4 border-brand-gold sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-4">
                    <img src="/images/logokemenhaj.svg" alt="Logo Kemenhaj" class="h-14 w-auto" onerror="this.src='https://via.placeholder.com/60?text=LOGO'">
                    <div class="border-l-2 border-brand-gold/50 pl-4">
                        <h1 class="text-base md:text-lg font-extrabold tracking-wide text-brand-gold uppercase">
                            KEMENTERIAN HAJI DAN UMRAH
                        </h1>
                        <h2 class="text-xs md:text-sm font-semibold tracking-wider text-gray-200">
                            ASRAMA HAJI TRANSIT KALTARA
                        </h2>
                    </div>
                </a>
            </div>
            
            <div>
                <a href="http://grandelhajjhoteltarakan.com" 
                   target="_blank" 
                   class="bg-brand-gold hover:bg-yellow-600 text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition shadow-md flex items-center gap-2">
                   <span>Sistem Reservasi</span>
                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        <nav class="bg-brand-dark text-white border-t border-brand-gold/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-6 h-10 text-xs md:text-sm font-semibold">
                <a href="#beranda" class="text-brand-gold hover:underline">Beranda</a>
                <a href="#berita" class="hover:text-brand-gold transition">Berita Utama</a>
                <a href="#lokasi" class="hover:text-brand-gold transition">Lokasi & Kontak</a>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main id="beranda" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-8">

        <!-- ========================================== -->
<!-- WIDGET LIVING ASSISTANCE -->
<!-- ========================================== -->
<section class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="bg-brand-brown text-white px-5 py-2.5 flex items-center justify-between border-b-2 border-brand-gold">
        <span class="font-extrabold text-xs md:text-sm uppercase tracking-wider flex items-center gap-2">
            <svg class="w-4 h-4 text-brand-gold" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z"/>
            </svg>
            Living Assistance
        </span>
        <span class="text-[11px] text-brand-gold font-medium hidden sm:inline">Tarakan, Kalimantan Utara</span>
    </div>

    <!-- GRID 5 KOLOM -->
    <div class="p-4 grid grid-cols-2 md:grid-cols-5 gap-3">
        
        <!-- 1. JADWAL SHOLAT -->
        <div onclick="openSholatModal()" class="cursor-pointer bg-gray-50 hover:bg-amber-50/60 border border-gray-200 hover:border-brand-gold p-3 rounded-lg transition group">
            <div class="text-[10px] text-gray-500 font-bold uppercase group-hover:text-brand-gold flex items-center justify-between">
                <span id="sholatCityLabel">Sholat Tarakan</span> ➔
            </div>
            <div class="mt-1 flex items-center justify-between">
                <span id="sholatNextName" class="font-extrabold text-xs md:text-sm text-brand-brown">Memuat...</span>
                <span id="sholatNextTime" class="font-black text-sm md:text-base text-brand-dark">--:--</span>
            </div>
        </div>

        <!-- 2. BIAYA HAJI (BPIH) -->
        <div class="bg-gray-50 border border-gray-200 p-3 rounded-lg">
            <div class="text-[10px] text-gray-500 font-bold uppercase">Estimasi BPIH Haji</div>
            <div class="mt-1 flex items-center justify-between">
                <span class="font-black text-xs md:text-sm text-brand-brown"><?php echo $tarakanData['bpih'] ?? 'Rp 56,04 Juta'; ?></span>
                <span class="text-[10px] bg-emerald-100 text-emerald-700 font-bold px-1.5 py-0.5 rounded">Resmi</span>
            </div>
        </div>

        <!-- 3. CUACA -->
        <div onclick="openCuacaModal()" class="cursor-pointer bg-gray-50 hover:bg-blue-50/60 border border-gray-200 hover:border-blue-500 p-3 rounded-lg transition group">
            <div class="text-[10px] text-gray-500 font-bold uppercase group-hover:text-blue-600 flex items-center justify-between">
                <span id="cuacaCityLabel">Cuaca Tarakan</span> ➔
            </div>
            <div class="mt-1 flex items-center justify-between">
                <span id="cuacaStatusLabel" class="font-extrabold text-xs md:text-sm text-brand-dark">Berawan</span>
                <span id="cuacaTempLabel" class="font-black text-sm md:text-base text-brand-brown"><?php echo $tarakanData['temp'] ?? '31°C'; ?></span>
            </div>
        </div>

        <!-- 4. KUALITAS UDARA (ISPU - BISA DIKLIK) -->
        <div onclick="openIspuModal()" class="cursor-pointer bg-gray-50 hover:bg-amber-50/60 border border-gray-200 hover:border-amber-500 p-3 rounded-lg transition group">
    <div class="text-[10px] text-gray-500 font-bold uppercase group-hover:text-amber-600 flex items-center justify-between">
        <span>Kualitas Udara (ISPU)</span> ➔
    </div>
    <div class="mt-1 flex items-center justify-between">
        <!-- ID DI SINI SUPAYA BISA DIUPDATE OTOMATIS OLEH JAVASCRIPT -->
        <span id="widgetAqiValue" class="bg-amber-500 text-white font-black text-xs px-2 py-0.5 rounded">112</span>
        <span id="widgetAqiLabel" class="font-extrabold text-xs text-amber-600">Tidak Sehat</span>
    </div>
</div>

        <!-- 5. ARAH KIBLAT -->
        <div onclick="openKiblatModal()" class="col-span-2 md:col-span-1 cursor-pointer bg-gray-50 hover:bg-amber-50/60 border border-gray-200 hover:border-brand-gold p-3 rounded-lg transition group flex flex-col justify-between">
            <div class="text-[10px] text-gray-500 font-bold uppercase group-hover:text-brand-gold flex items-center justify-between">
                <span>Arah Kiblat</span> ➔
            </div>
            <div class="mt-1 flex items-center justify-between">
                <span id="kiblatDegLabel" class="font-black text-sm md:text-base text-brand-brown">--° Dari Utara</span>
                <span class="text-[10px] bg-amber-100 text-brand-brown font-extrabold px-1.5 py-0.5 rounded">Kompas</span>
            </div>
        </div>

    </div>
</section>


<!-- ========================================== -->
<!-- MODAL POPUP JADWAL SHOLAT -->
<!-- ========================================== -->
<div id="sholatModal" class="hidden fixed inset-0 z-50 bg-black/75 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-[#111827] border border-gray-800 text-white w-full max-w-3xl rounded-2xl p-6 relative shadow-2xl">
        <button onclick="closeSholatModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl font-bold">&times;</button>
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
            <div>
                <h3 class="text-amber-400 font-black text-lg tracking-wide uppercase">JADWAL SHOLAT HARI INI</h3>
                <p class="text-xs text-gray-400">Kota Tarakan dan Sekitarnya</p>
            </div>
            <select id="modalCitySelect" onchange="changeCity(this.value)" class="bg-[#1f2937] text-white text-xs border border-gray-700 rounded-lg px-3 py-2 font-bold focus:outline-none">
                <option value="Tarakan" selected>KOTA TARAKAN</option>
                <option value="Jakarta">KOTA JAKARTA</option>
                <option value="Surabaya">KOTA SURABAYA</option>
                <option value="Balikpapan">KOTA BALIKPAPAN</option>
            </select>
        </div>

        <!-- Box Quotes Islami Dinamis -->
        <div class="jadwal-sholat-quote bg-[#1f2937]/70 border border-emerald-500/30 text-emerald-400 italic text-xs md:text-sm p-4 rounded-xl text-center mb-5 shadow-inner">
            "Memuat mutiara hikmah..."
        </div>

        <!-- Widget Waktu Sholat Hari Ini (6 Kolom) -->
        <div class="grid grid-cols-6 gap-2 text-center bg-[#1f2937]/40 p-3 rounded-xl border border-gray-800 mb-5">
            <div>
                <span class="block text-[10px] text-gray-400 font-semibold">Subuh</span>
                <span id="mSubuh" class="font-extrabold text-xs md:text-sm text-white">04:59</span>
            </div>
            <div>
                <span class="block text-[10px] text-gray-400 font-semibold">Terbit</span>
                <span id="mTerbit" class="font-extrabold text-xs md:text-sm text-gray-300">05:56</span>
            </div>
            <div>
                <span class="block text-[10px] text-gray-400 font-semibold">Dzuhur</span>
                <span id="mDzuhur" class="font-extrabold text-xs md:text-sm text-amber-400">11:58</span>
            </div>
            <div>
                <span class="block text-[10px] text-gray-400 font-semibold">Ashar</span>
                <span id="mAshar" class="font-extrabold text-xs md:text-sm text-amber-400">15:12</span>
            </div>
            <div>
                <span class="block text-[10px] text-gray-400 font-semibold">Maghrib</span>
                <span id="mMaghrib" class="font-extrabold text-xs md:text-sm text-white">18:00</span>
            </div>
            <div>
                <span class="block text-[10px] text-gray-400 font-semibold">Isya</span>
                <span id="mIsya" class="font-extrabold text-xs md:text-sm text-white">18:57</span>
            </div>
        </div>

        <!-- Tabel Jadwal Bulanan -->
        <div class="overflow-x-auto max-h-[220px] rounded-lg border border-gray-800">
            <table class="w-full text-xs text-left text-gray-300">
                <thead class="bg-[#1f2937] text-amber-400 uppercase font-bold border-b border-gray-800">
                    <tr>
                        <th class="p-2.5">TANGGAL</th>
                        <th class="p-2.5">SUBUH</th>
                        <th class="p-2.5">TERBIT</th>
                        <th class="p-2.5">DZUHUR</th>
                        <th class="p-2.5">ASHAR</th>
                        <th class="p-2.5">MAGHRIB</th>
                        <th class="p-2.5">ISYA</th>
                    </tr>
                </thead>
                <tbody id="sholatTableBody" class="divide-y divide-gray-800/60 bg-[#111827]">
                    <tr><td class="p-2.5 font-bold text-white">12 Oct 2026</td><td class="p-2.5">04:59</td><td class="p-2.5">05:56</td><td class="p-2.5 text-amber-400 font-bold">11:58</td><td class="p-2.5">15:12</td><td class="p-2.5">18:00</td><td class="p-2.5">18:57</td></tr>
                    <tr><td class="p-2.5 font-bold text-white">13 Oct 2026</td><td class="p-2.5">04:58</td><td class="p-2.5">05:55</td><td class="p-2.5 text-amber-400 font-bold">11:57</td><td class="p-2.5">15:12</td><td class="p-2.5">17:59</td><td class="p-2.5">18:56</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- ========================================== -->
<!-- MODAL POPUP ISPU (GAYA RESMI ISPU NET) -->
<!-- ========================================== -->
<div id="ispuModal" class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-[#111827] border border-gray-800 text-white w-full max-w-4xl rounded-2xl p-6 relative shadow-2xl">
        <button onclick="closeIspuModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl font-bold">&times;</button>

        <h3 class="text-gray-100 font-black text-base md:text-lg tracking-wide uppercase mb-1">
            INDEKS STANDAR PENCEMAR UDARA (ISPU)
        </h3>
        <p class="text-xs text-gray-400 mb-4">
            Data Resmi Stasiun Pemantau Kualitas Udara KLH/BPLH RI
        </p>

        <!-- Tabel Data ISPU Sesuai Nilai Riil KLH -->
        <div class="overflow-x-auto max-h-[320px] rounded-lg border border-gray-800 mb-5">
            <table class="w-full text-xs md:text-sm text-left text-gray-300">
                <thead class="bg-[#1f2937] text-gray-400 uppercase font-semibold border-b border-gray-800">
                    <tr>
                        <th class="p-3 w-12">#</th>
                        <th class="p-3">LOKASI STASIUN</th>
                        <th class="p-3">TIPE</th>
                        <th class="p-3 text-right">ISPU</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 bg-[#111827]">
                    <tr class="bg-emerald-950/30">
                        <td class="p-3 font-bold text-emerald-400">1</td>
                        <td class="p-3 font-bold text-emerald-400">Kota Tarakan (Kaltara)</td>
                        <td class="p-3 text-gray-400">KLH/BPLH</td>
                        <td class="p-3 text-right font-black text-emerald-400">28 | PM<sub>2.5</sub></td>
                    </tr>
                    <tr>
                        <td class="p-3">2</td>
                        <td class="p-3">DKI Jakarta (GBK Senayan)</td>
                        <td class="p-3 text-gray-400">KLH/BPLH</td>
                        <td class="p-3 text-right font-black text-amber-400">65 | PM<sub>2.5</sub></td>
                    </tr>
                    <tr>
                        <td class="p-3">3</td>
                        <td class="p-3">Kota Balikpapan</td>
                        <td class="p-3 text-gray-400">KLH/BPLH</td>
                        <td class="p-3 text-right font-black text-emerald-400">34 | PM<sub>10</sub></td>
                    </tr>
                    <tr>
                        <td class="p-3">4</td>
                        <td class="p-3">Kota Samarinda</td>
                        <td class="p-3 text-gray-400">KLH/BPLH</td>
                        <td class="p-3 text-right font-black text-emerald-400">42 | PM<sub>2.5</sub></td>
                    </tr>
                    <tr>
                        <td class="p-3">5</td>
                        <td class="p-3">Palangkaraya Jekan Raya</td>
                        <td class="p-3 text-gray-400">KLH/BPLH</td>
                        <td class="p-3 text-right font-black text-amber-400">88 | PM<sub>10</sub></td>
                    </tr>
                    <tr>
                        <td class="p-3">6</td>
                        <td class="p-3">Pontianak Tenggara</td>
                        <td class="p-3 text-gray-400">KLH/BPLH</td>
                        <td class="p-3 text-right font-black text-amber-500">112 | PM<sub>2.5</sub></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Indikator Warna Standar Kementerian KLH -->
        <div class="pt-3 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-3">
            <span class="text-xs text-gray-400 font-semibold">Kategori Indeks Standar Pencemar Udara (ISPU):</span>
            <div class="grid grid-cols-5 gap-1 text-[10px] md:text-xs text-center font-bold w-full md:w-auto">
                <div class="bg-emerald-600 px-3 py-1.5 rounded text-white">0–50<br>Baik</div>
                <div class="bg-blue-600 px-3 py-1.5 rounded text-white">51–100<br>Sedang</div>
                <div class="bg-amber-500 px-3 py-1.5 rounded text-white">101–200<br>Tdk Sehat</div>
                <div class="bg-orange-600 px-3 py-1.5 rounded text-white">201–300<br>Sgt Tdk Sehat</div>
                <div class="bg-red-600 px-3 py-1.5 rounded text-white">&gt; 300<br>Berbahaya</div>
            </div>
        </div>
    </div>
</div>

        <!-- BANNER SELAMAT DATANG -->
        <section class="bg-gradient-to-r from-brand-brown via-[#5c2711] to-brand-dark text-white rounded-2xl p-6 md:p-10 shadow-lg border-l-8 border-brand-gold flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-3 max-w-3xl">
                <span class="bg-brand-gold/20 text-brand-gold border border-brand-gold/40 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                    Portal Resmi Informasi & Layanan
                </span>
                <h2 class="text-2xl md:text-4xl font-extrabold leading-tight text-white">
                    Selamat Datang di Portal Berita <br class="hidden sm:inline">
                    <span class="text-brand-gold">Asrama Haji Transit Kaltara</span>
                </h2>
                <p class="text-gray-300 text-xs md:text-sm leading-relaxed text-justify sm:text-left">
                    Pusat layanan informasi resmi, pengumuman jadwal keberangkatan, serta dokumentasi kegiatan seputar penyelenggaraan ibadah haji, umrah, dan penginapan transit di Provinsi Kalimantan Utara.
                </p>
            </div>
            <div class="flex-shrink-0 flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <a href="http://grandelhajjhoteltarakan.com" target="_blank" class="bg-brand-gold hover:bg-yellow-600 text-white font-bold px-5 py-3 rounded-xl text-xs md:text-sm transition text-center shadow-md flex items-center justify-center gap-2">
                    <span>Reservasi Kamar</span> ➔
                </a>
                <a href="#lokasi" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-semibold px-5 py-3 rounded-xl text-xs md:text-sm transition text-center">
                    Kontak & Lokasi
                </a>
            </div>
        </section>

        <!-- FEATURED POST / HIGHLIGHT -->
        <?php if(isset($featuredPost) && $featuredPost): ?>
        <section class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden grid md:grid-cols-12 gap-0">
            <div class="md:col-span-7 relative min-h-[280px] md:min-h-[380px]">
                <img src="<?php echo asset('storage/' . $featuredPost->image); ?>" alt="<?php echo $featuredPost->title; ?>" class="w-full h-full object-cover">
                <span class="absolute top-4 left-4 bg-brand-gold text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow">
                    <?php echo $featuredPost->category->name ?? 'BERITA UTAMA'; ?>
                </span>
            </div>
            <div class="md:col-span-5 p-6 md:p-8 flex flex-col justify-between bg-white">
                <div>
                    <div class="text-xs text-gray-400 mb-2 flex items-center gap-2">
                        <span><?php echo $featuredPost->published_at ? \Carbon\Carbon::parse($featuredPost->published_at)->diffForHumans() : ''; ?></span>
                        <span>•</span>
                        <span>Dibaca <?php echo $featuredPost->views ?? 0; ?> kali</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-brand-dark mb-4 leading-snug hover:text-brand-gold transition">
                        <a href="/posts/<?php echo $featuredPost->slug; ?>"><?php echo $featuredPost->title; ?></a>
                    </h2>
                    <p class="text-gray-600 text-sm line-clamp-4 text-justify leading-relaxed">
                        <?php echo Str::limit(strip_tags($featuredPost->content), 180); ?>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <a href="/posts/<?php echo $featuredPost->slug; ?>" class="inline-flex items-center gap-2 text-brand-gold font-bold text-sm hover:underline">
                        Baca Selengkapnya ➔
                    </a>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- LAYOUT 2 KOLOM: BERITA LOKAL & SIDEBAR REKOMENDASI -->
        <section id="berita" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-8 space-y-6">
                <div class="border-b-2 border-brand-gold pb-2 flex justify-between items-center">
                    <h3 class="text-lg md:text-xl font-bold text-brand-brown uppercase tracking-wider">BERITA & PENGUMUMAN TERBARU</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <?php if(isset($posts) && count($posts) > 0): ?>
                        <?php foreach($posts as $post): ?>
                        <article class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                            <div class="relative h-44">
                                <?php if($post->image): ?>
                                <img src="<?php echo asset('storage/' . $post->image); ?>" alt="<?php echo $post->title; ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs">Tanpa Gambar</div>
                                <?php endif; ?>
                                <span class="absolute top-2 left-2 bg-brand-brown text-white text-[10px] font-bold px-2 py-1 rounded uppercase">
                                    <?php echo $post->category->name ?? 'Informasi'; ?>
                                </span>
                            </div>
                            <div class="p-4 flex-grow flex flex-col justify-between space-y-3">
                                <div>
                                    <div class="text-[11px] text-gray-400 mb-1">
                                        <?php echo \Carbon\Carbon::parse($post->published_at)->translatedFormat('d M Y'); ?>
                                    </div>
                                    <h2 class="font-bold text-brand-dark hover:text-brand-gold transition line-clamp-2 text-base">
                                        <a href="/posts/<?php echo $post->slug; ?>"><?php echo $post->title; ?></a>
                                    </h2>
                                    <p class="text-gray-600 text-xs line-clamp-3 text-justify mt-2 leading-relaxed">
                                        <?php echo Str::limit(strip_tags($post->content), 120); ?>
                                    </p>
                                </div>
                                <div class="pt-3 border-t border-gray-100 flex justify-between items-center text-xs">
                                    <a href="/posts/<?php echo $post->slug; ?>" class="text-brand-gold font-bold hover:underline">Baca ➔</a>
                                    <span class="text-gray-400">Dibaca: <?php echo $post->views ?? 0; ?></span>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center py-12 text-gray-500 bg-white rounded-xl border border-gray-200">
                            Belum ada berita yang diterbitkan.
                        </div>
                    <?php endif; ?>
                </div>

                <!-- TOMBOL LIHAT SELENGKAPNYA BERITA RESMI -->
                <div class="pt-2 text-center">
                    <a href="{{ route('news.lokal') }}" 
                       class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-brand-brown font-bold text-xs md:text-sm py-2.5 px-6 rounded-lg transition border border-gray-200 shadow-sm">
                       <span>Lihat Selengkapnya Berita Resmi</span>
                       <span class="text-brand-gold">➔</span>
                    </a>
                </div>
            </div>

            <!-- SIDEBAR REKOMENDASI -->
            <aside class="lg:col-span-4 bg-white rounded-xl border border-gray-200 p-5 shadow-sm space-y-5 sticky top-24">
                <div class="border-b-2 border-brand-gold pb-2 flex justify-between items-center">
                    <h3 class="text-base font-extrabold text-brand-brown uppercase tracking-wide">Rekomendasi Untuk Anda</h3>
                    <span class="text-[10px] bg-red-100 text-red-600 font-bold px-2 py-0.5 rounded flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-red-600 rounded-full animate-ping"></span> LIVE NEWS
                    </span>
                </div>

                <div class="space-y-4">
                    <?php if(isset($externalNews) && count($externalNews) > 0): ?>
                        <?php foreach($externalNews as$news): ?>
                        <div class="group pb-3 border-b border-gray-100 last:border-b-0 last:pb-0 space-y-1">
                            <div class="flex items-center justify-between text-[10px]">
                                <span class="font-bold text-brand-gold uppercase"><?php echo $news['source']; ?></span>
                                <span class="text-gray-400"><?php echo $news['timeAgo']; ?></span>
                            </div>
                            <h4 class="text-xs font-bold text-brand-dark group-hover:text-brand-gold transition line-clamp-2 leading-snug">
                                <a href="<?php echo $news['link']; ?>" target="_blank" rel="noopener noreferrer"><?php echo $news['title']; ?></a>
                            </h4>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-xs text-gray-400 text-center py-6">Sedang memuat berita haji nasional...</div>
                    <?php endif; ?>
                </div>

                <div class="pt-2">
                    <a href="{{ route('news.rekomendasi') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-brand-brown font-bold text-xs py-2.5 px-4 rounded-lg transition flex items-center justify-center gap-2 border border-gray-200 text-center">
                       <span>Lihat Selengkapnya</span>
                       <span class="text-brand-gold">➔</span>
                    </a>
                </div>
            </aside>
        </section>

        <!-- LOKASI & GOOGLE MAPS -->
        <section id="lokasi" class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 md:p-8 space-y-6">
            <div class="border-b-2 border-brand-gold pb-2 flex justify-between items-center">
                <h3 class="text-lg md:text-xl font-bold text-brand-brown uppercase tracking-wider">LOKASI & KONTAK ASRAMA HAJI</h3>
            </div>

            <div class="grid md:grid-cols-12 gap-6 items-center">
                <div class="md:col-span-5 text-sm text-gray-700 space-y-4">
                    <div>
                        <h4 class="font-bold text-brand-dark text-base md:text-lg mb-1">Asrama Haji Transit Provinsi Kalimantan Utara</h4>
                        <p class="text-gray-600 leading-relaxed text-xs">
                            7JW9+FCF, Jl. PT. Idec AWI, Kp. Empat, Kec. Tarakan Tim., Kota Tarakan, Kalimantan Utara[cite: 4]
                        </p>
                    </div>

                    <div class="space-y-1.5 text-xs md:text-sm">
                        <p><strong>Layanan Resepsionis:</strong> 07.00 WITA – 22.00 WITA[cite: 6]</p>
                        <p><strong>WhatsApp:</strong> <a href="https://wa.me/6289674139995" target="_blank" class="text-brand-gold font-bold hover:underline">+62 896-7413-9995</a>[cite: 6]</p>
                        <p><strong>Email:</strong> <a href="mailto:tarakanasramahaji@gmail.com" class="text-brand-gold font-bold hover:underline">tarakanasramahaji@gmail.com</a>[cite: 6]</p>
                        <p><strong>Sistem Reservasi:</strong> <a href="http://grandelhajjhoteltarakan.com" target="_blank" class="text-brand-gold font-bold underline">grandelhajjhoteltarakan.com</a>[cite: 6]</p>
                    </div>

                    <div>
                        <a href="https://maps.app.goo.gl/bSzcoQ9fTraf9P8HA" target="_blank" class="inline-flex items-center gap-2 bg-brand-brown hover:bg-brand-dark text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition shadow">
                            <span>Buka di Google Maps</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-7 h-64 md:h-80 rounded-lg overflow-hidden border border-gray-300 shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.2177200396422!2d117.61597877584404!3d3.2961933522293525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32138bce9ae44475%3A0x7bc6457032b25b15!2sAsrama%20Haji%20Transit%20Provinsi%20Kalimantan%20Utara!5e0!3m2!1sid!2sid!4v1791615460170!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="strict-origin-when-cross-origin">
                    </iframe>
                </div>
            </div>
        </section>

    </main>

    <!-- MODAL POPUP JADWAL SHOLAT -->
    <div id="sholatModal" class="fixed inset-0 bg-black/70 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-gray-900 text-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto border border-amber-500/30 p-6 space-y-6 shadow-2xl relative">
            <button onclick="closeSholatModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl font-bold">✕</button>

            <div class="grid md:grid-cols-12 gap-4 items-center bg-gray-800/80 p-5 rounded-xl border border-gray-700">
                <div class="md:col-span-6 space-y-3">
                    <span class="text-xs text-amber-400 font-bold uppercase tracking-wide">JADWAL SHOLAT HARI INI</span>
                    <div class="flex items-center gap-3">
                        <select id="modalCitySelect" onchange="changeCity(this.value)" class="bg-gray-700 text-white font-bold text-sm px-3 py-2 rounded-lg border border-amber-500/50 focus:outline-none">
                            <option value="Tarakan" selected>KOTA TARAKAN</option>
                            <option value="Jakarta">KOTA JAKARTA</option>
                            <option value="Surabaya">KOTA SURABAYA</option>
                            <option value="Medan">KOTA MEDAN</option>
                            <option value="Makassar">KOTA MAKASSAR</option>
                            <option value="Balikpapan">KOTA BALIKPAPAN</option>
                            <option value="Samarinda">KOTA SAMARINDA</option>
                        </select>
                    </div>
                </div>
                <div class="md:col-span-6 bg-emerald-900/40 p-4 rounded-xl border border-emerald-500/30 text-xs italic text-emerald-200">
                    "Seandainya kamu tahu betapa dahsyatnya sujud, kamu pasti tidak akan pernah mengangkat kepalamu dari tanah."
                </div>
            </div>

            <div class="grid grid-cols-6 gap-2 text-center bg-gray-800 p-4 rounded-xl">
                <div><span class="block text-[11px] text-gray-400">Subuh</span><span id="mSubuh" class="font-bold text-sm text-white">--:--</span></div>
                <div><span class="block text-[11px] text-gray-400">Terbit</span><span id="mTerbit" class="font-bold text-sm text-gray-300">--:--</span></div>
                <div><span class="block text-[11px] text-gray-400">Dzuhur</span><span id="mDzuhur" class="font-bold text-sm text-white">--:--</span></div>
                <div><span class="block text-[11px] text-amber-400 font-bold">Ashar</span><span id="mAshar" class="font-bold text-sm text-amber-400">--:--</span></div>
                <div><span class="block text-[11px] text-gray-400">Maghrib</span><span id="mMaghrib" class="font-bold text-sm text-white">--:--</span></div>
                <div><span class="block text-[11px] text-gray-400">Isya</span><span id="mIsya" class="font-bold text-sm text-white">--:--</span></div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left text-gray-300">
                    <thead class="text-xs uppercase bg-gray-800 text-amber-400 font-bold">
                        <tr>
                            <th class="p-3">Tanggal</th>
                            <th class="p-3">Subuh</th>
                            <th class="p-3">Terbit</th>
                            <th class="p-3">Dzuhur</th>
                            <th class="p-3">Ashar</th>
                            <th class="p-3">Maghrib</th>
                            <th class="p-3">Isya</th>
                        </tr>
                    </thead>
                    <tbody id="sholatTableBody" class="divide-y divide-gray-800"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL POPUP CUACA -->
    <div id="cuacaModal" class="fixed inset-0 bg-black/70 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-gray-900 text-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto border border-blue-500/30 p-6 space-y-6 shadow-2xl relative">
            <button onclick="closeCuacaModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl font-bold">✕</button>

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-800 pb-4 gap-3">
                <div>
                    <h2 id="modalCuacaTitle" class="text-xl md:text-2xl font-black text-white">Cuaca Tarakan Hari Ini</h2>
                    <p id="modalCuacaSub" class="text-xs text-gray-400">Update Terkini • Sumber Open-Meteo</p>
                </div>
                <select id="modalCuacaCitySelect" onchange="changeCuacaCity(this.value)" class="bg-gray-800 text-white font-bold text-sm px-3 py-2 rounded-lg border border-blue-500/50 focus:outline-none">
                    <option value="Tarakan" selected>KOTA TARAKAN</option>
                    <option value="Jakarta">KOTA JAKARTA</option>
                    <option value="Surabaya">KOTA SURABAYA</option>
                    <option value="Medan">KOTA MEDAN</option>
                    <option value="Makassar">KOTA MAKASSAR</option>
                    <option value="Balikpapan">KOTA BALIKPAPAN</option>
                    <option value="Samarinda">KOTA SAMARINDA</option>
                </select>
            </div>

            <div class="bg-gray-800/90 rounded-2xl p-6 border border-gray-700 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <span class="text-5xl">☁️</span>
                    <div>
                        <div class="flex items-baseline gap-2">
                            <span id="mCuacaTemp" class="text-4xl md:text-5xl font-black text-white">--°C</span>
                            <span id="mCuacaStatus" class="text-lg font-bold text-blue-400">Berawan</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-6 text-xs text-gray-300 border-t md:border-t-0 md:border-l border-gray-700 pt-4 md:pt-0 md:pl-6 w-full md:w-auto justify-around">
                    <div class="text-center">
                        <span class="block text-gray-400 mb-1">Potensi Hujan</span>
                        <span id="mCuacaRain" class="font-extrabold text-sm text-blue-400">--%</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-gray-400 mb-1">Kelembapan</span>
                        <span id="mCuacaHumidity" class="font-extrabold text-sm text-emerald-400">--%</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-gray-400 mb-1">Kecepatan Angin</span>
                        <span id="mCuacaWind" class="font-extrabold text-sm text-amber-400">-- km/jam</span>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <h3 class="text-sm font-extrabold text-amber-400 uppercase tracking-wide">Prakiraan Cuaca Hari Ini</h3>
                <div id="cuacaHourlyContainer" class="flex gap-3 overflow-x-auto pb-2"></div>
            </div>

            <div class="space-y-3">
                <h3 class="text-sm font-extrabold text-amber-400 uppercase tracking-wide">Prakiraan Cuaca Seminggu Ke Depan</h3>
                <div id="cuacaWeeklyContainer" class="space-y-2"></div>
            </div>
        </div>
    </div>

    <!-- MODAL POPUP KOMPAS ARAH KIBLAT (VISUAL KOMPAS INTERAKTIF) -->
    <div id="kiblatModal" class="fixed inset-0 bg-black/70 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-gray-900 text-white rounded-2xl max-w-md w-full border border-amber-500/30 p-6 space-y-6 shadow-2xl relative text-center">
            <button onclick="closeKiblatModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl font-bold">✕</button>

            <div>
                <span class="text-xs text-amber-400 font-bold uppercase tracking-wider block">PETUNJUK SHOLAT</span>
                <h2 id="modalKiblatTitle" class="text-xl font-black text-white mt-1">Arah Kiblat Kota Tarakan</h2>
                <p class="text-xs text-gray-400 mt-1">Presisi sudut Kiblat menuju Ka'bah di Makkah</p>
            </div>

            <!-- SELECT KOTA KOMPAS -->
            <div class="flex justify-center">
                <select id="modalKiblatCitySelect" onchange="changeKiblatCity(this.value)" class="bg-gray-800 text-amber-400 font-bold text-xs px-4 py-2 rounded-xl border border-amber-500/50 focus:outline-none">
                    <option value="Tarakan" selected>KOTA TARAKAN</option>
                    <option value="Jakarta">KOTA JAKARTA</option>
                    <option value="Surabaya">KOTA SURABAYA</option>
                    <option value="Medan">KOTA MEDAN</option>
                    <option value="Makassar">KOTA MAKASSAR</option>
                    <option value="Balikpapan">KOTA BALIKPAPAN</option>
                    <option value="Samarinda">KOTA SAMARINDA</option>
                </select>
            </div>

            <!-- VISUAL KOMPAS DIGITAL DENGAN JARUM -->
            <div class="relative w-56 h-56 mx-auto bg-gray-800 rounded-full border-4 border-amber-500/40 shadow-inner flex items-center justify-center">
                
                <!-- INDIKATOR ARAH MATA ANGIN -->
                <span class="absolute top-2 text-xs font-black text-amber-400">N</span>
                <span class="absolute bottom-2 text-xs font-bold text-gray-500">S</span>
                <span class="absolute left-3 text-xs font-bold text-gray-500">W</span>
                <span class="absolute right-3 text-xs font-bold text-gray-500">E</span>

                <!-- LINGKARAN TENGAH -->
                <div class="w-40 h-40 rounded-full border border-gray-700 flex items-center justify-center relative">
                    <!-- ICON KA'BAH DI TENGAH -->
                    <span class="text-3xl">🕋</span>
                </div>

                <!-- JARUM KOMPAS KIBLAT (DIPUTAR DENGAN CSS ROTATE JAVASCRIPT) -->
                <div id="compassNeedle" class="absolute w-full h-full flex items-center justify-center transition-transform duration-700 ease-out" style="transform: rotate(292.4deg);">
                    <div class="w-1.5 h-24 bg-gradient-to-t from-transparent via-amber-500 to-red-500 rounded-full shadow-lg relative -top-10">
                        <div class="w-3 h-3 bg-red-500 rounded-full absolute -top-1 -left-0.5 border border-white"></div>
                    </div>
                </div>
            </div>

            <!-- DESKRIPSI DERAJAT Presisi -->
            <div class="bg-gray-800/80 p-4 rounded-xl border border-gray-700 space-y-1">
                <span class="text-xs text-gray-400 block">Sudut Kemiringan Azimuth</span>
                <span id="modalKiblatDeg" class="text-2xl font-black text-amber-400">292.4°</span>
                <span class="text-[11px] text-gray-300 block">Dari Arah Utara Sejati (Arah Barat-Laut)</span>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-brand-dark text-white border-t-4 border-brand-gold py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400 space-y-2">
            <p>&copy; <?php echo date('Y'); ?> Asrama Haji Transit Kalimantan Utara. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JAVASCRIPT LOGIC (KIBLAT MODAL, SHOLAT, CUACA) -->
    <script>
    const cityCoords = {
        'Tarakan': { lat: 3.33, lng: 117.61 },
        'Jakarta': { lat: -6.20, lng: 106.84 },
        'Surabaya': { lat: -7.25, lng: 112.75 },
        'Medan': { lat: 3.59, lng: 98.67 },
        'Makassar': { lat: -5.14, lng: 119.42 },
        'Balikpapan': { lat: -1.26, lng: 116.83 },
        'Samarinda': { lat: -0.50, lng: 117.15 }
    };

    // --- GENERATOR QUOTES ISLAMI OTOMATIS ---
    function setRandomIslamicQuote() {
        const islamicQuotes = [
            "\"Seandainya kamu tahu betapa dahsyatnya sujud, kamu pasti tidak akan pernah mengangkat kepalamu dari tanah.\"",
            "\"Sesungguhnya setelah kesulitan itu ada kemudahan. (QS. Al-Insyirah: 6)\"",
            "\"Jangan bersedih, sesungguhnya Allah bersama kita. (QS. At-Taubah: 40)\"",
            "\"Hati menjadi tenang dengan mengingat Allah. Ingatlah, hanya dengan mengingat Allah-lah hati menjadi tenteram. (QS. Ar-Ra'd: 28)\"",
            "\"Barangsiapa bertakwa kepada Allah, niscaya Allah akan membukakan jalan keluar baginya. (QS. At-Talaq: 2)\"",
            "\"Sebaik-baik amalan adalah sholat pada waktunya.\"",
            "\"Kunci ketenangan jiwa adalah ikhlas menerima setiap ketentuan yang telah Allah tetapkan.\""
        ];

        const quoteBoxes = document.querySelectorAll('.jadwal-sholat-quote');
        const randomIndex = Math.floor(Math.random() * islamicQuotes.length);
        quoteBoxes.forEach(box => {
            box.innerText = islamicQuotes[randomIndex];
        });
    }

    // RUMUS AKURAT MENGHITUNG ARAH KIBLAT
    function calculateQibla(lat, lng) {
        const kaabaLat = 21.4225 * Math.PI / 180;
        const kaabaLng = 39.8262 * Math.PI / 180;
        const phi = lat * Math.PI / 180;
        const lambda = lng * Math.PI / 180;

        const y = Math.sin(kaabaLng - lambda);
        const x = Math.cos(phi) * Math.tan(kaabaLat) - Math.sin(phi) * Math.cos(kaabaLng - lambda);
        
        let qibla = Math.atan2(y, x) * 180 / Math.PI;
        qibla = (qibla + 360) % 360;
        return qibla.toFixed(1);
    }

    // --- KIBLAT MODAL ---
    function openKiblatModal() { document.getElementById('kiblatModal').classList.remove('hidden'); }
    function closeKiblatModal() { document.getElementById('kiblatModal').classList.add('hidden'); }

    function updateKiblat(cityName) {
        const c = cityCoords[cityName] || cityCoords['Tarakan'];
        const deg = calculateQibla(c.lat, c.lng);
        
        const degLabel = document.getElementById('kiblatDegLabel');
        if (degLabel) degLabel.innerText = `${deg}° Dari Utara`;

        const modalDeg = document.getElementById('modalKiblatDeg');
        if (modalDeg) modalDeg.innerText = `${deg}°`;

        const modalTitle = document.getElementById('modalKiblatTitle');
        if (modalTitle) modalTitle.innerText = `Arah Kiblat ${cityName}`;

        const needle = document.getElementById('compassNeedle');
        if (needle) needle.style.transform = `rotate(${deg}deg)`;
    }

    function changeKiblatCity(cityName) {
        updateKiblat(cityName);
        const citySelect = document.getElementById('modalKiblatCitySelect');
        if (citySelect) citySelect.value = cityName;
    }

    // --- SHOLAT ---
        function openSholatModal() {
        setRandomIslamicQuote();
        document.getElementById('sholatModal').classList.remove('hidden');
    }
    function closeSholatModal() {
        document.getElementById('sholatModal').classList.add('hidden');
    }

    async function loadSholatData(cityName) {
        const coords = cityCoords[cityName] || cityCoords['Tarakan'];
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth() + 1;

        const cityLabel = document.getElementById('sholatCityLabel');
        if (cityLabel) cityLabel.innerText = `Sholat ${cityName}`;
        updateKiblat(cityName);

        try {
            const res = await fetch(`https://api.aladhan.com/v1/calendar/${year}/${month}?latitude=${coords.lat}&longitude=${coords.lng}&method=2`);
            const data = await res.json();
            
            if (data.code === 200) {
                const monthData = data.data;
                const todayIndex = today.getDate() - 1;
                const todayTimings = monthData[todayIndex].timings;
                const cleanTime = (t) => t.split(' ')[0];

                if (document.getElementById('mSubuh')) document.getElementById('mSubuh').innerText = cleanTime(todayTimings.Fajr);
                if (document.getElementById('mTerbit')) document.getElementById('mTerbit').innerText = cleanTime(todayTimings.Sunrise);
                if (document.getElementById('mDzuhur')) document.getElementById('mDzuhur').innerText = cleanTime(todayTimings.Dhuhr);
                if (document.getElementById('mAshar')) document.getElementById('mAshar').innerText = cleanTime(todayTimings.Asr);
                if (document.getElementById('mMaghrib')) document.getElementById('mMaghrib').innerText = cleanTime(todayTimings.Maghrib);
                if (document.getElementById('mIsya')) document.getElementById('mIsya').innerText = cleanTime(todayTimings.Isha);

                const nowMinutes = today.getHours() * 60 + today.getMinutes();
                const parseMinutes = (tStr) => {
                    const parts = cleanTime(tStr).split(':');
                    return parseInt(parts[0]) * 60 + parseInt(parts[1]);
                };

                const prayers = [
                    { name: 'Subuh', timeStr: cleanTime(todayTimings.Fajr), mins: parseMinutes(todayTimings.Fajr) },
                    { name: 'Dzuhur', timeStr: cleanTime(todayTimings.Dhuhr), mins: parseMinutes(todayTimings.Dhuhr) },
                    { name: 'Ashar', timeStr: cleanTime(todayTimings.Asr), mins: parseMinutes(todayTimings.Asr) },
                    { name: 'Maghrib', timeStr: cleanTime(todayTimings.Maghrib), mins: parseMinutes(todayTimings.Maghrib) },
                    { name: 'Isya', timeStr: cleanTime(todayTimings.Isha), mins: parseMinutes(todayTimings.Isha) }
                ];

                let next = prayers.find(p => p.mins > nowMinutes);
                if (!next) { next = { name: 'Subuh', timeStr: cleanTime(todayTimings.Fajr) }; }

                if (document.getElementById('sholatNextName')) document.getElementById('sholatNextName').innerText = next.name;
                if (document.getElementById('sholatNextTime')) document.getElementById('sholatNextTime').innerText = next.timeStr;

                let tbodyHtml = '';
                monthData.forEach((day) => {
                    tbodyHtml += `
                        <tr class="hover:bg-gray-800/50">
                            <td class="p-3 font-semibold text-white">${day.date.readable}</td>
                            <td class="p-3">${cleanTime(day.timings.Fajr)}</td>
                            <td class="p-3 text-gray-400">${cleanTime(day.timings.Sunrise)}</td>
                            <td class="p-3">${cleanTime(day.timings.Dhuhr)}</td>
                            <td class="p-3 text-amber-400 font-bold">${cleanTime(day.timings.Asr)}</td>
                            <td class="p-3">${cleanTime(day.timings.Maghrib)}</td>
                            <td class="p-3">${cleanTime(day.timings.Isha)}</td>
                        </tr>
                    `;
                });
                const tableBody = document.getElementById('sholatTableBody');
                if (tableBody) tableBody.innerHTML = tbodyHtml;
            }
        } catch (err) { console.error("Gagal load sholat", err); }
    }

    function changeCity(cityName) {
        loadSholatData(cityName);
        const citySelect = document.getElementById('modalCitySelect');
        if (citySelect) citySelect.value = cityName;
    }

    // --- KUALITAS UDARA (ISPU) MODAL ---
function openIspuModal() {
        document.getElementById('ispuModal').classList.remove('hidden');
    }
    function closeIspuModal() {
        document.getElementById('ispuModal').classList.add('hidden');
    } 

    // --- CUACA ---
    function openCuacaModal() { document.getElementById('cuacaModal').classList.remove('hidden'); }
    function closeCuacaModal() { document.getElementById('cuacaModal').classList.add('hidden'); }

    async function loadCuacaData(cityName) {
        const coords = cityCoords[cityName] || cityCoords['Tarakan'];
        
        const cuacaTitle = document.getElementById('modalCuacaTitle');
        if (cuacaTitle) cuacaTitle.innerText = `Cuaca ${cityName} Hari Ini`;

        const cuacaCityLabel = document.getElementById('cuacaCityLabel');
        if (cuacaCityLabel) cuacaCityLabel.innerText = `Cuaca ${cityName}`;

        try {
            const res = await fetch(`https://api.open-meteo.com/v1/forecast?latitude=${coords.lat}&longitude=${coords.lng}&current_weather=true&hourly=temperature_2m,relativehumidity_2m,precipitation_probability&daily=temperature_2m_max&timezone=Asia%2FMakassar`);
            const data = await res.json();

            if (data.current_weather) {
                const temp = Math.round(data.current_weather.temperature) + '°C';
                if (document.getElementById('mCuacaTemp')) document.getElementById('mCuacaTemp').innerText = temp;
                if (document.getElementById('cuacaTempLabel')) document.getElementById('cuacaTempLabel').innerText = temp;
                if (document.getElementById('mCuacaWind')) document.getElementById('mCuacaWind').innerText = data.current_weather.windspeed + ' km/jam';

                if (data.hourly) {
                    if (document.getElementById('mCuacaHumidity')) document.getElementById('mCuacaHumidity').innerText = (data.hourly.relativehumidity_2m[0] ?? 75) + '%';
                    if (document.getElementById('mCuacaRain')) document.getElementById('mCuacaRain').innerText = (data.hourly.precipitation_probability[0] ?? 0) + '%';

                    let hourlyHtml = '';
                    const nowHour = new Date().getHours();
                    for (let i = nowHour; i < nowHour + 8; i++) {
                        if (data.hourly.time[i]) {
                            const timeLabel = data.hourly.time[i].split('T')[1].substring(0, 5);
                            hourlyHtml += `
                                <div class="flex-shrink-0 bg-gray-800 p-3 rounded-xl border border-gray-700 text-center w-20 space-y-1">
                                    <span class="block text-[10px] text-gray-400">${timeLabel}</span>
                                    <span class="text-xl block">☁️</span>
                                    <span class="font-extrabold text-xs text-white block">${Math.round(data.hourly.temperature_2m[i])}°</span>
                                </div>
                            `;
                        }
                    }
                    const hourlyContainer = document.getElementById('cuacaHourlyContainer');
                    if (hourlyContainer) hourlyContainer.innerHTML = hourlyHtml;
                }

                let weeklyHtml = '';
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                for (let d = 0; d < 7; d++) {
                    if (data.daily && data.daily.time[d]) {
                        const dateObj = new Date(data.daily.time[d]);
                        const dayName = d === 0 ? 'Hari ini' : days[dateObj.getDay()];
                        weeklyHtml += `
                            <div class="bg-gray-800/80 p-3 rounded-xl border border-gray-700 flex items-center justify-between text-xs">
                                <span class="font-bold text-white w-28">${dayName}</span>
                                <span class="text-gray-300">☁️ Berawan</span>
                                <span class="font-black text-amber-400">${Math.round(data.daily.temperature_2m_max[d])}°C</span>
                            </div>
                        `;
                    }
                }
                const weeklyContainer = document.getElementById('cuacaWeeklyContainer');
                if (weeklyContainer) weeklyContainer.innerHTML = weeklyHtml;
            }
        } catch (err) { console.error("Gagal load cuaca", err); }
    }

    

    function changeCuacaCity(cityName) {
        loadCuacaData(cityName);
        const cuacaSelect = document.getElementById('modalCuacaCitySelect');
        if (cuacaSelect) cuacaSelect.value = cityName;
    }

    // LOAD DEFAULT TARAKAN & SET INITIAL RANDOM QUOTE
    document.addEventListener('DOMContentLoaded', () => {
        setRandomIslamicQuote();
        loadSholatData('Tarakan');
        loadCuacaData('Tarakan');
    });
</script>
</body>
</html>