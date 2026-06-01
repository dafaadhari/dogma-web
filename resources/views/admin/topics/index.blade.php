<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Jadwal Diskusi') }}
            </h2>
            <a href="{{ route('topics.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-sm transition-colors">
                + Tambah Diskusi Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Judul / Topik</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-sm font-semibold text-gray-700 uppercase tracking-wider w-1/3">Deskripsi Singkat</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($topics as $topic)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $topic->title }}</td>
                                <td class="px-6 py-4 text-gray-600 whitespace-nowrap">{{ \Carbon\Carbon::parse($topic->discussion_date)->format('d M Y, H:i') }} WIB</td>
                                <td class="px-6 py-4 text-gray-500 text-sm">
                                    {{ Str::limit($topic->description, 60) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a href="{{ route('topics.edit', $topic->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white py-1.5 px-3 rounded text-sm font-semibold shadow-sm transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1.5 px-3 rounded text-sm font-semibold shadow-sm transition-colors">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>