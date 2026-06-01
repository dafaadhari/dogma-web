<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - DOGMA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .prose img { max-width: 100%; height: auto; margin: 2rem auto; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

    <!-- Header / Navigasi -->
    <header class="border-b border-gray-200 py-4 sticky top-0 bg-white/90 backdrop-blur-sm z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-black text-xl tracking-widest text-black hover:text-gray-600 transition">DOGMA</a>
            <a href="{{ url('/#berita') }}" class="text-xs font-bold text-gray-500 uppercase tracking-widest hover:text-black transition">
                &larr; Kembali
            </a>
        </div>
    </header>

    <!-- Konten Utama Artikel -->
    <main class="max-w-3xl mx-auto px-4 sm:px-6 py-12 lg:py-16">
        
        <!-- Judul & Meta Data -->
        <div class="mb-10 text-center">
            <div class="text-[11px] font-bold text-blue-600 uppercase tracking-widest mb-4">
                Sorotan Redaksi &bull; {{ $article->created_at->format('d M Y') }}
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold text-black leading-tight mb-6">
                {{ $article->title }}
            </h1>
            <p class="text-sm font-bold text-gray-500 uppercase tracking-widest">
                Oleh: <span class="text-black">{{ $article->user->name ?? 'Redaksi DOGMA' }}</span>
            </p>
        </div>

        <!-- Gambar Sampul -->
        @if($article->cover_image)
            <div class="w-full mb-12 border border-gray-200 bg-gray-50 aspect-video overflow-hidden">
                <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Isi Artikel (Format Trix HTML) -->
        <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed prose-a:text-blue-600 prose-headings:font-bold prose-headings:text-black">
            {!! $article->content !!}
        </article>

    </main>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 py-8 mt-20 border-t border-gray-800">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center text-sm font-medium">
            <p>&copy; {{ date('Y') }} Komunitas DOGMA.</p>
        </div>
    </footer>

</body>
</html>