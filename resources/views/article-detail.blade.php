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
            <a href="{{ url('/#berita') }}" class="text-xs font-bold text-gray-500 uppercase tracking-widest hover:text-black transition">
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
                Oleh: <span class="text-black">{{ $article->user->name ?? 'Redaksi DOGMA' }}</span>
            </p>
        </div>

        @if($article->cover_image)
            <div class="w-full mb-12 border border-gray-200 bg-gray-50 aspect-video overflow-hidden">
                <img src="{{ asset($article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <article class="trix-content prose prose-lg max-w-none text-gray-800 leading-relaxed prose-a:text-blue-600 prose-headings:font-bold prose-headings:text-black">
            {!! $article->content !!}
        </article>

    </main>

    <footer class="bg-black text-gray-400 py-8 mt-20 border-t border-gray-800">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center text-sm font-medium">
            <p>&copy; {{ date('Y') }} Komunitas DOGMA.</p>
        </div>
    </footer>

</body>
</html>