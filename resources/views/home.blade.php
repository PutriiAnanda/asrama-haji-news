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
            
            <!-- TOMBOL SISTEM RESERVASI (LANGSUNG KE grandelhajjhoteltarakan.com) -->
            <div>
                <a href="http://grandelhajjhoteltarakan.com" 
                   target="_blank" 
                   class="bg-brand-gold hover:bg-yellow-600 text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition shadow-md flex items-center gap-2">
                   <span>Sistem Reservasi</span>
                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        <!-- NAV BAR -->
        <nav class="bg-brand-dark text-white border-t border-brand-gold/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-6 h-10 text-xs md:text-sm font-semibold">
                <a href="#beranda" class="text-brand-gold hover:underline">Beranda</a>
                <a href="#berita" class="hover:text-brand-gold transition">Berita Utama</a>
                <a href="#lokasi" class="hover:text-brand-gold transition">Lokasi & Kontak</a>
            </div>
        </nav>
    </header>

    <!-- CONTENT -->
    <main id="beranda" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10">

        <!-- FEATURED POST / HIGHLIGHT -->
        @if(isset($featuredPost) && $featuredPost)
        <section class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden grid md:grid-cols-12 gap-0">
            <div class="md:col-span-7 relative min-h-[280px] md:min-h-[380px]">
                <img src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover">
                <span class="absolute top-4 left-4 bg-brand-gold text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow">
                    {{ $featuredPost->category->name ?? 'BERITA UTAMA' }}
                </span>
            </div>
            <div class="md:col-span-5 p-6 md:p-8 flex flex-col justify-between bg-white">
                <div>
                    <div class="text-xs text-gray-400 mb-2 flex items-center gap-2">
                        <span>{{ $featuredPost->published_at ? \Carbon\Carbon::parse($featuredPost->published_at)->diffForHumans() : '' }}</span>
                        <span>•</span>
                        <span>Dibaca {{ $featuredPost->views ?? 0 }} kali</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-brand-dark mb-4 leading-snug hover:text-brand-gold transition">
                        <a href="/posts/{{ $featuredPost->slug }}">{{ $featuredPost->title }}</a>
                    </h2>
                    <p class="text-gray-600 text-sm line-clamp-4 text-justify leading-relaxed">
                        {{ Str::limit(strip_tags($featuredPost->content), 180) }}
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <a href="/posts/{{ $featuredPost->slug }}" class="inline-flex items-center gap-2 text-brand-gold font-bold text-sm hover:underline">
                        Baca Selengkapnya ➔
                    </a>
                </div>
            </div>
        </section>
        @endif

        <!-- DAFTAR BERITA TERBARU -->
        <section id="berita" class="space-y-6">
            <div class="border-b-2 border-brand-gold pb-2 flex justify-between items-center">
                <h3 class="text-lg md:text-xl font-bold text-brand-brown uppercase tracking-wider">BERITA & PENGUMUMAN TERBARU</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($posts as $post)
                <article class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                    <div class="relative h-48">
                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs">Tanpa Gambar</div>
                        @endif
                        <span class="absolute top-2 left-2 bg-brand-brown text-white text-[10px] font-bold px-2 py-1 rounded uppercase">
                            {{ $post->category->name ?? 'Informasi' }}
                        </span>
                    </div>
                    <div class="p-4 flex-grow flex flex-col justify-between space-y-3">
                        <div>
                            <div class="text-[11px] text-gray-400 mb-1">
                                {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d M Y') }}
                            </div>
                            <h4 class="font-bold text-brand-dark hover:text-brand-gold transition line-clamp-2 text-base">
                                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                            </h4>
                            <p class="text-gray-600 text-xs line-clamp-3 text-justify mt-2 leading-relaxed">
                                {{ Str::limit(strip_tags($post->content), 110) }}
                            </p>
                        </div>
                        <div class="pt-3 border-t border-gray-100 flex justify-between items-center text-xs">
                            <a href="/posts/{{ $post->slug }}" class="text-brand-gold font-bold hover:underline">Baca ➔</a>
                            <span class="text-gray-400">Dibaca: {{ $post->views ?? 0 }}</span>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-12 text-gray-500 bg-white rounded-xl border border-gray-200">
                    Belum ada berita yang diterbitkan.
                </div>
                @endforelse
            </div>
        </section>

        <!-- LOKASI & GOOGLE MAPS LENGKAP -->
        <section id="lokasi" class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 md:p-8 space-y-6">
            <div class="border-b-2 border-brand-gold pb-2 flex justify-between items-center">
                <h3 class="text-lg md:text-xl font-bold text-brand-brown uppercase tracking-wider">LOKASI & KONTAK ASRAMA HAJI</h3>
            </div>

            <div class="grid md:grid-cols-12 gap-6 items-center">
                <div class="md:col-span-5 text-sm text-gray-700 space-y-4">
                    <div>
                        <h4 class="font-bold text-brand-dark text-base md:text-lg mb-1">Asrama Haji Transit Provinsi Kalimantan Utara</h4>
                        <p class="text-gray-600 leading-relaxed">
                            7JW9+FCF, Jl. PT. Idec AWI, Kp. Empat, Kec. Tarakan Tim., Kota Tarakan, Kalimantan Utara
                        </p>
                    </div>

                    <div class="space-y-1 text-xs md:text-sm">
                        <p><strong>Layanan Resepsionis:</strong> 24 Jam</p>
                        <p><strong>Sistem Reservasi:</strong> <a href="http://grandelhajjhoteltarakan.com" target="_blank" class="text-brand-gold font-bold underline">grandelhajjhoteltarakan.com</a></p>
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5434190289745!2d117.61608677497262!3d3.3392336966355446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3213bbf797fa9455%3A0xe54aebe8bc5ea828!2sAsrama%20Haji%20Kota%20Tarakan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-brand-dark text-white border-t-4 border-brand-gold py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400 space-y-2">
            <p>&copy; {{ date('Y') }} Asrama Haji Transit Kalimantan Utara. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>