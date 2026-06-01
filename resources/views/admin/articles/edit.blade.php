<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Artikel') }}
        </h2>
    </x-slot>

    <!-- Menyisipkan CSS dan JS untuk Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <style>
        /* Menyembunyikan tombol attach file bawaan Trix untuk keamanan awal */
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="Masukkan judul yang menarik..." value="{{ old('title', $article->title) }}">
                    </div>

                    <div class="mb-6">
                        <label for="cover_image" class="block text-sm font-medium text-gray-700">Gambar Sampul (Thumbnail)</label>
                        <input type="file" name="cover_image" id="cover_image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*">
                    </div>

                    <!-- Input Konten Berita (Trix Editor) -->
                    <div class="mb-6">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
                        <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                        <trix-editor input="content" class="min-h-[300px]"></trix-editor>
                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('articles.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm font-medium">Batal</a>
                        
                        <!-- Tombol Submit Sementara -->
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                            Update Artikel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>