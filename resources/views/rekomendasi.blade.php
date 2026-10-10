<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Berita Haji & Umrah Nasional - Asrama Haji Transit Kaltara</title>
    
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
            
            <div class="flex items-center gap-3">
                <a href="http://grandelhajjhoteltarakan.com" 
                   target="_blank" 
                   class="bg-brand-gold hover:bg-yellow-600 text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition shadow-md flex items-center gap-2">
                   <span>Sistem Reservasi</span>
                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="{{ route('home') }}" class="bg-brand-dark hover:bg-black text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition">
                    ← Kembali
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- JUDUL HALAMAN -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 md:p-8 shadow-sm border-l-8 border-brand-gold">
            <span class="text-xs font-bold text-brand-gold uppercase tracking-wider block mb-1">Kumpulan Informasi Terkini</span>
            <h1 class="text-2xl md:text-3xl font-extrabold text-brand-brown">Rekomendasi Berita Haji & Umrah Nasional</h1>
            <p class="text-gray-600 text-xs md:text-sm mt-2">
                Menampilkan berita dan pengumuman terbaru seputar Kementerian Haji dan Umrah Indonesia dari berbagai media nasional terpercaya.
            </p>
        </div>

        <!-- DAFTAR BERITA NASIONAL (GAYA DETIK.COM) -->
        <div class="space-y-4">
            @forelse($externalNews as $news)
            <article class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-md transition flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="space-y-2 max-w-3xl">
                    <div class="flex items-center gap-2 text-xs">
                        <span class="bg-amber-100 text-brand-brown font-extrabold px-2.5 py-0.5 rounded text-[11px] uppercase">
                            {{ $news['source'] }}
                        </span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-500 font-medium">{{ $news['timeAgo'] }}</span>
                        <span class="text-gray-300">({{ $news['pubDate'] }})</span>
                    </div>
                    <h2 class="text-base md:text-lg font-bold text-brand-dark hover:text-brand-gold transition leading-snug">
                        <a href="{{ $news['link'] }}" target="_blank" rel="noopener noreferrer">
                            {{ $news['title'] }}
                        </a>
                    </h2>
                </div>
                <div class="flex-shrink-0 w-full md:w-auto">
                    <a href="{{ $news['link'] }}" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex items-center justify-center gap-2 bg-brand-brown hover:bg-brand-dark text-white font-bold text-xs px-4 py-2.5 rounded-lg transition shadow w-full md:w-auto">
                        <span>Baca Berita Asli</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="text-center py-12 bg-white rounded-xl border border-gray-200 text-gray-500">
                Belum dapat memuat berita nasional. Silakan coba beberapa saat lagi.
            </div>
            @endforelse
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-brand-dark text-white border-t-4 border-brand-gold py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400 space-y-2">
            <p>&copy; {{ date('Y') }} Asrama Haji Transit Kalimantan Utara. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>