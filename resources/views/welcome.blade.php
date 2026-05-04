<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOGMA - Diskusi Obrolan Gerakan Bersama</title>
    <meta name="title" content="DOGMA - Diskusi Obrolan Gerakan Bersama">
    <meta name="description" content="Hadirnya Komunitas DOGMA untuk menjawab tantangan mengenai minimnya ruang diskusi ilmiah, edukasi di kalangan masyarakat.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dogma.id/"> 
    <meta property="og:title" content="DOGMA - Diskusi Obrolan Gerakan Bersama">
    <meta property="og:description" content="Hadirnya Komunitas DOGMA untuk menjawab tantangan mengenai minimnya ruang diskusi ilmiah, edukasi di kalangan masyarakat.">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="icon" type="image/png" href="{{ asset('favicon.png?v=2') }}">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

    <header class="fixed w-full bg-white/90 backdrop-blur-sm border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-extrabold text-3xl tracking-tighter">D<span class="text-gray-400">?</span>GMA</span>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-gray-600 hover:text-black font-semibold transition">Beranda</a>
                    <a href="#tentang" class="text-gray-600 hover:text-black font-semibold transition">Tentang Kami</a>
                    <a href="#topik" class="text-gray-600 hover:text-black font-semibold transition">Topik Diskusi</a>
                </nav>
                
                <div class="hidden md:flex">
                    <a href="#gabung" class="bg-black text-white px-6 py-2 rounded-none font-bold hover:bg-gray-800 transition">
                        Join Kami
                    </a>
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
                <a href="#gabung" onclick="toggleMobileMenu()" class="block bg-black text-white font-bold py-3 mt-4 mx-4">Join Kami</a>
            </div>
        </div>
    </header>

    <section id="beranda" class="pt-32 pb-20 sm:pt-40 sm:pb-24 lg:pb-32 px-4 mx-auto max-w-7xl text-center">
        <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-black mb-6">
            Dari Obrolan,<br>Menjadi <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-500">Gerakan.</span>
        </h1>
        <p class="mt-4 max-w-2xl text-lg sm:text-xl text-gray-600 mx-auto mb-10">
            Menjawab tantangan minimnya ruang diskusi ilmiah. DOGMA hadir sebagai wadah edukasi, evaluasi, dan kolaborasi bagi mahasiswa, akademisi, serta pekerja.
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
                    <h2 class="text-3xl font-extrabold text-black mb-6">Lebih dari Sekadar Ruang Diskusi.</h2>
                    <p class="text-gray-600 mb-4 text-lg leading-relaxed">
                        DOGMA didirikan pada 25 April 2026 di Rangkasbitung. Kami hadir berawal dari sebuah keresahan bersama mengenai minimnya ruang diskusi ilmiah dan edukasi di tengah masyarakat.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Kami bukan sekadar tempat berkumpul, melainkan sebuah gerakan. Menyatukan mahasiswa, akademisi, dan pekerja untuk membedah isu, memberikan kritik membangun, dan melahirkan solusi nyata.
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Edukasi</h3>
                        <p class="text-gray-500 text-sm">Menyebarkan informasi dan wawasan objektif kepada masyarakat luas.</p>
                    </div>
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Evaluasi</h3>
                        <p class="text-gray-500 text-sm">Mengkaji isu permasalahan secara mendalam dan terstruktur.</p>
                    </div>
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Kolaborasi</h3>
                        <p class="text-gray-500 text-sm">Menggabungkan berbagai latar belakang untuk satu tujuan.</p>
                    </div>
                    <div class="bg-white p-6 shadow-sm border border-gray-100 flex flex-col justify-center h-full">
                        <h3 class="font-bold text-xl mb-2 text-black">Solusi</h3>
                        <p class="text-gray-500 text-sm">Menjadi pemantik pergerakan yang membawa perubahan positif.</p>
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
            <p class="mt-8 text-sm text-gray-500">Data hanya digunakan untuk keperluan komunikasi</p>
        </div>
    </section>

    <footer class="bg-black text-gray-400 py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span class="font-extrabold text-2xl text-white tracking-tighter">D<span class="text-gray-500">?</span>GMA</span>
                <p class="text-sm mt-1">Diskusi Obrolan Gerakan Bersama.</p>
            </div>
            
            <div class="text-sm text-center md:text-right">
                <p>&copy; {{ date('Y') }} Komunitas DOGMA. All Rights Reserved.</p>
                <p class="mt-1">Rangkasbitung, Banten.</p>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi untuk membuka tutup menu HP
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function sendToWA() {
            let nama = document.getElementById('wa_nama').value;
            let instansi = document.getElementById('wa_instansi').value;
            
            if(!nama || !instansi) { 
                alert('Harap isi Nama dan Instansi terlebih dahulu ya!'); 
                return; 
            }
            
            // Format Pesan
            let message = `Halo Admin DOGMA, saya ${nama} dari ${instansi}. Saya tertarik untuk bergabung dan mengikuti ruang diskusi selanjutnya.`;
            
            // Nomor WhatsApp Asli DOGMA
            let waNumber = '6281288255963'; 
            let waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
            
            window.open(waUrl, '_blank');
        }
    </script>

</body>
</html>