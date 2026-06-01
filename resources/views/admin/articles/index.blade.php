<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ruang Redaksi - Manajemen Berita') }}
            </h2>
            <a href="{{ route('articles.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                + Tulis Artikel Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200 bg-gray-50 text-sm uppercase text-gray-600">
                                <th class="p-4 font-semibold">Judul Artikel</th>
                                <th class="p-4 font-semibold">Penulis</th>
                                <th class="p-4 font-semibold">Status</th>
                                <th class="p-4 font-semibold">Tanggal</th>
                                <th class="p-4 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($articles as $article)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="p-4 font-medium text-gray-800">
                                        {{ $article->title }}
                                    </td>
                                    <td class="p-4 text-gray-600">
                                        {{ $article->user->name ?? 'Anonim' }}
                                    </td>
                                    <td class="p-4">
                                        @if($article->status == 'published')
                                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase">Tayang</span>
                                        @elseif($article->status == 'pending')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold uppercase">Menunggu Review</span>
                                        @else
                                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-bold uppercase">Draft</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-gray-600">
                                        {{ $article->created_at->format('d M Y') }}
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            
                                            @if(auth()->user()->hasRole('Super Admin') && $article->status == 'pending')
                                                <form action="{{ route('articles.approve', $article->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-50 text-green-700 border border-green-200 rounded-md hover:bg-green-600 hover:text-white hover:border-green-600 transition-all duration-200 text-xs font-bold shadow-sm">
                                                        ✓ Setujui
                                                    </button>
                                                </form>
                                            @endif

                                            <a href="{{ route('articles.edit', $article->id) }}" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-blue-700 border border-blue-200 rounded-md hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-200 text-xs font-bold shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini, Boss?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-700 border border-red-200 rounded-md hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-200 text-xs font-bold shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-gray-500">
                                        Belum ada artikel yang ditulis. Ayo buat yang pertama!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>