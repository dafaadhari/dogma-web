<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta name="google-site-verification" content="m-GoeeW1zUe0rTHIpjeOFanJeRWWJvmiOh5ElRiPlhw" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Dogma</title>
    
    <meta name="title" content="DOGMA - Diskusi Obrolan Gerakan Bersama">
    <meta name="description" content="Hadirnya Komunitas DOGMA untuk menjawab tantangan mengenai minimnya ruang diskusi ilmiah, edukasi di kalangan masyarakat.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}"> 
    <meta property="og:title" content="DOGMA - Diskusi Obrolan Gerakan Bersama">
    <meta property="og:description" content="Hadirnya Komunitas DOGMA untuk menjawab tantangan mengenai minimnya ruang diskusi ilmiah, edukasi di kalangan masyarakat.">
    <meta property="og:image" content="{{ asset('logo-dogma.png') }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="DOGMA - Diskusi Obrolan Gerakan Bersama">
    <meta property="twitter:description" content="Hadirnya Komunitas DOGMA untuk menjawab tantangan mengenai minimnya ruang diskusi ilmiah, edukasi di kalangan masyarakat.">
    <meta property="twitter:image" content="{{ asset('logo-dogma.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="icon" type="image/png" href="{{ asset('favicon.png?v=4') }}">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

    <header class="fixed w-full bg-white/90 backdrop-blur-sm border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
    				<img src="{{ asset('logo-dogma.png') }}" alt="Logo DOGMA" style="height: 60px; width: auto;">
				</div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-gray-600 hover:text-black font-semibold transition">Beranda</a>
                    <a href="#tentang" class="text-gray-600 hover:text-black font-semibold transition">Tentang Kami</a>
                    <a href="#topik" class="text-gray-600 hover:text-black font-semibold transition">Topik Diskusi</a>
                    <a href="#berita" class="text-gray-600 hover:text-black font-semibold transition">Portal Berita</a>
                </nav>
                
                <div class="hidden md:flex items-center gap-6">
                    <a href="#gabung" class="bg-black text-white px-6 py-2 rounded-none font-bold hover:bg-gray-800 transition">
                        Join Kami
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-gray-600 hover:text-black transition">Dashboard Redaksi</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-black transition">Login</a>
                        @endauth
                    @endif
                </div>

                <div class="md:hidden flex items-center">
                    <button onclick="toggleMobileMenu()" class="text-gray-900 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-200 shadow-lg">
            <div class="px-4 pt-2 pb-6 space-y-2 text-center">
                <a href="#beranda" onclick="toggleMobileMenu()" class="block text-gray-600 font-semibold py-2">Beranda</a>
                <a href="#tentang" onclick="toggleMobileMenu()" class="block text-gray-600 font-semibold py-2">Tentang Kami</a>
                <a href="#topik" onclick="toggleMobileMenu()" class="block text-gray-600 font-semibold py-2">Topik Diskusi</a>
                
                <a href="#berita" onclick="toggleMobileMenu()" class="block text-gray-600 font-semibold py-2">Portal Berita</a>
                
                <a href="#gabung" onclick="toggleMobileMenu()" class="block bg-black text-white font-bold py-3 mt-4 mx-4">Join Kami</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block text-gray-900 font-bold py-2 mt-2">Dashboard Redaksi</a>
                    @else
                        <a href="{{ route('login') }}" class="block text-gray-900 font-bold py-2 mt-2">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <section id="beranda" class="pt-32 pb-20 sm:pt-40 sm:pb-24 lg:pb-32 px-4 mx-auto max-w-7xl text-center">
        <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-black mb-6">
            Dari Obrolan,<br>Menjadi <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-500">Gerakan.</span>
        </h1>
        <p class="mt-4 max-w-2xl text-lg sm:text-xl text-gray-600 mx-auto mb-10">
            Menjawab tantangan minimnya ruang diskusi ilmiah. DOGMA hadir sebagai wadah edukasi, evaluasi, dan kolaborasi bagi mahasiswa, akademisi, pekerja, serta seluruh elemen masyarakat.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 px-4 sm:px-0">
            <a href="#gabung" class="bg-black text-white px-8 py-4 rounded-none font-bold text-lg hover:bg-gray-800 transition shadow-lg w-full sm:w-auto">
                Gabung Diskusi
            </a>
            <a href="#tentang" class="bg-white text-black border-2 border-black px-8 py-4 rounded-none font-bold text-lg hover:bg-gray-50 transition w-full sm:w-auto">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </section>

    <section id="tentang" class="py-20 bg-gray-50 border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-black mb-6">Mengawal Nalar Kritis,<br>Menyuarakan Kebenaran.</h2>
                    <p class="text-gray-600 mb-4 text-lg leading-relaxed">
                        DOGMA (Diskusi Obrolan dan Gerakan Bersama) lahir pada 25 April 2026 di Rangkasbitung, berawal dari keresahan akan minimnya ruang diskusi ilmiah. Kini, kami telah berevolusi menjadi portal jurnalisme independen sekaligus wadah pergerakan akar rumput.
                    </p>
                    <p class="text-gray-600 mb-4 text-lg leading-relaxed">
                        Kami memadukan liputan yang tajam dengan dialektika komunitas yang mendalam. Menyatukan mahasiswa, akademisi, pekerja, dan semua elemen masyarakat untuk membedah isu-isu krusial, menyajikan berita objektif, dan mendorong aksi nyata di tengah masyarakat.
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Edukasi & Jurnalisme</h3>
                        <p class="text-gray-500 text-sm">Menyajikan laporan dan tajuk rencana independen untuk melawan misinformasi dan mencerdaskan publik.</p>
                    </div>
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Ruang Dialektika</h3>
                        <p class="text-gray-500 text-sm">Mengupas tuntas setiap kebijakan sosial melalui forum diskusi komunitas yang tajam dan berimbang.</p>
                    </div>
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Kolaborasi</h3>
                        <p class="text-gray-500 text-sm">Membangun jaringan solidaritas lintas sektor untuk merumuskan satu visi perubahan yang konkret.</p>
                    </div>
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Pemantik Aksi</h3>
                        <p class="text-gray-500 text-sm">Tidak berhenti pada teks dan perdebatan, melainkan menjadi pemicu gerakan sosial yang solutif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="topik" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-black">Diskusi Mendatang</h2>
                <p class="text-gray-500 mt-4">Simak dan bergabunglah dalam topik-topik hangat yang kami bahas.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($topics as $topic)
                <div class="border border-gray-200 p-8 flex flex-col h-full hover:border-black transition duration-300">
                    <div class="mb-4">
                        <span class="text-xs font-bold uppercase tracking-widest {{ $topic->status == 'upcoming' ? 'text-blue-600' : 'text-gray-400' }}">
                            {{ $topic->status }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-4">{{ $topic->title }}</h3>
                    <p class="text-gray-600 mb-8 flex-grow">{{ $topic->description }}</p>
                    <div class="pt-6 border-t border-gray-100">
                        <p class="text-sm font-semibold text-black">{{ \Carbon\Carbon::parse($topic->discussion_date)->format('d M Y, H:i') }} WIB</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="berita" class="pt-20 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section Berita (Meniru gaya Diskusi Mendatang) -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-black">Sorotan Redaksi</h2>
                <p class="mt-4 text-gray-500">Laporan, opini, dan tajuk rencana terbaru dari DOGMA.</p>
            </div>
            
            <!-- Grid Berita -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articles as $article)
                    <article class="bg-white border border-gray-200 flex flex-col h-full hover:shadow-md transition-shadow duration-300">
                        
                        <div class="w-full h-52 bg-gray-100 overflow-hidden relative">
                            @if($article->cover_image)
                                <img src="{{ asset('article/' . $article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100 text-sm font-bold tracking-widest uppercase border-b border-gray-200">
                                    DOGMA NEWS
                                </div>
                            @endif
                            
                            <div class="absolute top-4 left-4 bg-black text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
                                Berita
                            </div>
                        </div>
                        
                        <!-- Info Konten -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Meta Penulis & Tanggal (Meniru label biru/abu di diskusi) -->
                            <div class="text-[11px] font-bold text-blue-600 uppercase tracking-widest mb-3">
                                {{ $article->user->name ?? 'Redaksi' }} &bull; {{ $article->created_at->format('d M Y') }}
                            </div>
                            
                            <!-- Judul Berita -->
                            <h3 class="text-xl font-bold text-black leading-snug mb-4">
                                <a href="{{ route('news.detail', $article->slug) }}" class="hover:text-blue-600 transition-colors">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            
                            <!-- Garis Pemisah Tipis & Tombol Baca -->
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ route('news.detail', $article->slug) }}" class="inline-flex items-center text-xs font-bold text-black hover:text-blue-600 uppercase tracking-wider gap-1">
                                    Baca Artikel 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12 border border-gray-200 text-gray-500">
                        Belum ada berita yang ditayangkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="gabung" class="py-24 bg-black text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-4xl font-extrabold mb-4">Siap Berargumen dan Bergerak?</h2>
            <p class="text-gray-400 mb-10 text-lg">
                Jadilah bagian dari gerakan kami. Isi form di bawah ini untuk terhubung langsung dengan admin kami via WhatsApp.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <input type="text" id="wa_nama" placeholder="Nama Lengkap" class="bg-white px-6 py-4 text-black focus:outline-none focus:ring-2 focus:ring-gray-500 w-full sm:w-64" required>
                <input type="text" id="wa_instansi" placeholder="Instansi / Pekerjaan" class="bg-white px-6 py-4 text-black focus:outline-none focus:ring-2 focus:ring-gray-500 w-full sm:w-64" required>
                <button onclick="sendToWA()" class="bg-white text-black border-2 border-white font-extrabold px-8 py-4 hover:bg-gray-200 transition w-full sm:w-auto">
                    Kirim Pesan
                </button>
            </div>
            <p class="mt-8 text-sm text-gray-500">Data hanya digunakan untuk keperluan komunikasi.</p>
        </div>
    </section>

    <footer class="bg-black text-gray-400 py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 items-center">
            
            
            <div class="text-sm text-center">
                <p>&copy; {{ date('Y') }} Komunitas DOGMA. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function sendToWA() {
            let nama = document.getElementById('wa_nama').value;
            let instansi = document.getElementById('wa_instansi').value;
            
            if(!nama || !instansi) { 
                alert('Harap isi Nama dan Instansi terlebih dulu!'); 
                return; 
            }
            
            let message = `Halo Admin DOGMA, saya ${nama} dari ${instansi}. Saya tertarik untuk bergabung dan mengikuti ruang diskusi selanjutnya.`;
            
            let waNumber = '6281288255963'; 
            let waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
            
            window.open(waUrl, '_blank');
        }
    </script>

</body>
</html>