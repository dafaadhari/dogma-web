<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita - Ruang Dogma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('favicon.png?v=4') }}">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex flex-col min-h-screen">

    <header class="fixed w-full bg-white border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('logo-dogma.png') }}" alt="Logo DOGMA" style="height: 60px; width: auto;">
                    </a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ url('/#berita') }}" class="text-sm font-bold text-gray-600 hover:text-black transition">&larr; Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-12 border-b border-gray-200 pb-6">
                <h1 class="text-4xl font-extrabold text-black">Arsip Redaksi</h1>
                <p class="mt-4 text-gray-500 text-lg">Kumpulan seluruh laporan, opini, dan tajuk rencana dari DOGMA.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articles as $article)
                    <article class="bg-white border border-gray-200 flex flex-col h-full hover:shadow-md transition-shadow duration-300">
                        <div class="w-full h-52 bg-gray-100 overflow-hidden relative">
                            @if($article->cover_image)
                                <img src="{{ asset($article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100 text-sm font-bold tracking-widest uppercase border-b border-gray-200">
                                    DOGMA NEWS
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-black text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
                                Berita
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-[11px] font-bold text-blue-600 uppercase tracking-widest mb-3">
                                {{ $article->user->name ?? 'Redaksi' }} &bull; {{ $article->created_at->format('d M Y') }}
                            </div>
                            
                            <h3 class="text-xl font-bold text-black leading-snug mb-4">
                                <a href="{{ route('news.detail', $article->slug) }}" class="hover:text-blue-600 transition-colors">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            
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
            
            <div class="mt-12">
                {{ $articles->links() }}
            </div>

        </div>
    </main>

    <footer class="bg-black text-gray-400 py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 items-center text-sm text-center">
            <p>&copy; {{ date('Y') }} Komunitas DOGMA. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>