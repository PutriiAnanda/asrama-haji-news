<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Asrama Haji Transit Kaltara</title>
    
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

    <!-- HEADER -->
    <header class="bg-brand-brown text-white shadow-lg border-b-4 border-brand-gold">
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
            
            <!-- TOMBOL AKSI HEADER -->
            <div class="flex items-center gap-3">
                <!-- Tombol Sistem Reservasi diarahkan ke grandelhajjhoteltarakan.com -->
                <a href="http://grandelhajjhoteltarakan.com" 
                   target="_blank" 
                   class="bg-brand-gold hover:bg-yellow-600 text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition shadow-md flex items-center gap-2">
                   <span>Sistem Reservasi</span>
                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>

                <!-- Tombol Kembali -->
                <a href="{{ route('home') }}" class="bg-brand-dark hover:bg-black text-white font-bold px-4 py-2 rounded-lg text-xs md:text-sm transition">
                    ← Kembali
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <article class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden p-6 md:p-10 space-y-6">
            
            <!-- Category & Date -->
            <div class="flex items-center gap-3 text-xs md:text-sm text-gray-500 border-b border-gray-100 pb-4">
                <span class="bg-brand-gold text-white font-bold px-3 py-1 rounded-full uppercase">
                    {{ $post->category->name ?? 'Informasi' }}
                </span>
                <span>•</span>
                <span>{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('l, d F Y - H:i') }} WITA</span>
                <span>•</span>
                <span>Dibaca {{ $post->views }} kali</span>
            </div>

            <!-- Title -->
            <h1 class="text-2xl md:text-4xl font-extrabold text-brand-dark leading-tight">
                {{ $post->title }}
            </h1>

            <!-- Main Image -->
            @if($post->image)
            <div class="rounded-lg overflow-hidden border border-gray-200">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[480px] object-cover">
            </div>
            @endif

            <!-- Body Content -->
            <div class="prose max-w-none text-gray-700 leading-relaxed text-base md:text-lg text-justify space-y-4 [&_img]:mx-auto [&_img]:rounded-lg [&_img]:shadow-md [&_img]:max-w-full [&_img]:h-auto">
                {!! str_replace('src="storage/', 'src="/storage/', $post->content) !!}
            </div>

        </article>
    </main>

    <!-- FOOTER -->
    <footer class="bg-brand-dark text-white border-t-4 border-brand-gold py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400 space-y-2">
            <p>&copy; {{ date('Y') }} Asrama Haji Transit Kalimantan Utara. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>