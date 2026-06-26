<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - DOGMA</title>
    <meta name="title" content="{{ $article->title }} - DOGMA">
    <meta name="description" content="{{ Str::limit(strip_tags($article->content), 150) }}">

    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $article->title }} - DOGMA">
    <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 150) }}">
    @if($article->cover_image)
        <meta property="og:image" content="{{ asset($article->cover_image) }}">
    @else
        <meta property="og:image" content="{{ asset('favicon.png') }}"> @endif

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $article->title }} - DOGMA">
    <meta property="twitter:description" content="{{ Str::limit(strip_tags($article->content), 150) }}">
    @if($article->cover_image)
        <meta property="twitter:image" content="{{ asset($article->cover_image) }}">
    @endif
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .prose img { max-width: 100%; height: auto; margin: 2rem auto; }
        
        .trix-content, 
        .trix-content p, 
        .trix-content div {
            text-align: justify !important;
            text-justify: inter-word !important;
        }
        
        .trix-content p, 
        .trix-content div {
            margin-bottom: 1.25rem !important; /* Jarak antar paragraf */
        }
        
        .trix-content ul {
            list-style-type: disc !important;
            padding-left: 2rem !important;
            margin-bottom: 1.25rem !important;
        }
        
        .trix-content ol {
            list-style-type: decimal !important;
            padding-left: 2rem !important;
            margin-bottom: 1.25rem !important;
        }
        
        .trix-content blockquote {
            border-left: 4px solid #000 !important;
            padding-left: 1rem !important;
            font-style: italic !important;
            margin-bottom: 1.25rem !important;
            color: #4b5563 !important;
            text-align: left !important;
        }
        
        .trix-content strong {
            font-weight: 800 !important;
            color: #000 !important;
        }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

    <header class="border-b border-gray-200 py-4 sticky top-0 bg-white/90 backdrop-blur-sm z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-black text-xl tracking-widest text-black hover:text-gray-600 transition">DOGMA</a>
            
            <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('news.index') }}" class="text-xs font-bold text-gray-500 uppercase tracking-widest hover:text-black transition">
                &larr; Kembali
            </a>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 sm:px-6 py-12 lg:py-16">
        
        <div class="mb-10 text-center">
            <div class="text-[11px] font-bold text-blue-600 uppercase tracking-widest mb-4">
                Sorotan Redaksi &bull; {{ $article->created_at->format('d M Y') }}
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold text-black leading-tight mb-6">
                {{ $article->title }}
            </h1>
            <p class="text-sm font-bold text-gray-500 uppercase tracking-widest">
                Oleh: <span class="text-black">{{ $article->display_author }}</span>
            </p>
        </div>

        @if($article->cover_image)
            <figure class="w-full mb-12">
                <div class="border border-gray-200 bg-gray-50 aspect-video overflow-hidden">
                    <img src="{{ asset($article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
                @if($article->image_source)
                    <figcaption class="text-center text-xs text-gray-500 mt-3 italic">
                        {{ $article->image_source }}
                    </figcaption>
                @endif
            </figure>
        @endif

        <article class="trix-content prose prose-lg max-w-none text-gray-800 leading-relaxed prose-a:text-blue-600 prose-headings:font-bold prose-headings:text-black">
            {!! $article->content !!}
        </article>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-6 border-t border-b border-gray-200 my-10">
            <div class="text-sm font-bold text-gray-700 uppercase tracking-widest">
                Bagikan Artikel:
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url()->current()) }}" 
                   target="_blank" 
                   class="flex items-center gap-2 px-3 py-1.5 bg-[#25D366] text-white text-xs font-bold uppercase tracking-wider rounded hover:bg-[#20ba59] transition">
                    WhatsApp
                </a>

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   class="flex items-center gap-2 px-3 py-1.5 bg-[#1877F2] text-white text-xs font-bold uppercase tracking-wider rounded hover:bg-[#145dbd] transition">
                    Facebook
                </a>

                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   class="flex items-center gap-2 px-3 py-1.5 bg-[#000000] text-white text-xs font-bold uppercase tracking-wider rounded hover:bg-[#222222] transition">
                    X
                </a>

                <button onclick="copyToClipboard()" 
                        class="flex items-center gap-2 px-3 py-1.5 bg-gray-800 text-white text-xs font-bold uppercase tracking-wider rounded hover:bg-gray-900 transition">
                    Salin Link
                </button>
            </div>
        </div>

        <script>
            function copyToClipboard() {
                navigator.clipboard.writeText(window.location.href);
                alert("Tautan artikel berhasil disalin!");
            }
        </script>

        <!-- ================= KOLOM KOMENTAR ================= -->
        <section class="mt-12">
            <h3 class="text-2xl font-black text-black mb-6">Komentar ({{ $article->comments->count() }})</h3>

            <!-- Notifikasi Sukses Komentar -->
            @if(session('success'))
                <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Isi Komentar -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-10">
                <form action="{{ route('comments.store', $article->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Anda</label>
                        <input type="text" name="name" id="name" required placeholder="Tulis nama panggilan..." 
                               class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    </div>
                    <div class="mb-4">
                        <label for="body" class="block text-sm font-bold text-gray-700 mb-2">Pendapat Anda</label>
                        <textarea name="body" id="body" rows="4" required placeholder="Tuliskan pemikiran kritis Anda di sini..." 
                                  class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-6 py-2 bg-black text-white font-bold uppercase text-sm tracking-widest hover:bg-gray-800 transition">
                            Kirim Komentar
                        </button>
                    </div>
                </form>
            </div>

            <!-- Daftar Komentar -->
            <div class="space-y-6">
                @forelse($article->comments as $comment)
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600">
                                {{ strtoupper(substr($comment->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-black">{{ $comment->name }}</h4>
                                <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed pl-13">
                            {{ $comment->body }}
                        </p>
                    </div>
                @empty
                    <div class="text-center py-8 bg-gray-50 rounded border border-gray-100 text-gray-500 italic">
                        Belum ada komentar untuk artikel ini. Jadilah yang pertama memberikan pendapat!
                    </div>
                @endforelse
            </div>
        </section>
        <!-- ================================================== -->

    </main>

    <footer class="bg-black text-gray-400 py-8 mt-20 border-t border-gray-800">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center text-sm font-medium">
            <p>&copy; {{ date('Y') }} Komunitas DOGMA.</p>
        </div>
    </footer>

</body>
</html>