<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Berita & Informasi Resmi - Asrama Haji Transit Kaltara</title>
    
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
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- JUDUL HALAMAN -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 md:p-8 shadow-sm border-l-8 border-brand-gold">
            <span class="text-xs font-bold text-brand-gold uppercase tracking-wider block mb-1">Arsip Lengkap</span>
            <h1 class="text-2xl md:text-3xl font-extrabold text-brand-brown">Seluruh Berita & Pengumuman Resmi</h1>
            <p class="text-gray-600 text-xs md:text-sm mt-2">
                Dokumentasi berita, pengumuman, dan informasi kegiatan di lingkungan Asrama Haji Transit Kalimantan Utara.
            </p>
        </div>

        <!-- GRID BERITA ARSIP -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if(isset($posts) && count($posts) > 0): ?>
                <?php foreach($posts as $post): ?>
                <article class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                    <div class="relative h-48">
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

        <!-- PAGINASI / NOMOR HALAMAN (1, 2, 3...) -->
        <div class="pt-4 flex justify-center">
            <?php echo $posts->links(); ?>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-brand-dark text-white border-t-4 border-brand-gold py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400 space-y-2">
            <p>&copy; <?php echo date('Y'); ?> Asrama Haji Transit Kalimantan Utara. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>