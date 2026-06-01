<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-black leading-tight uppercase tracking-tight">
            {{ __('Dashboard Redaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Banner Sambutan DOGMA -->
            <div class="bg-black text-white overflow-hidden mb-8 shadow-sm">
                <div class="p-8 md:p-12">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Akses Terotorisasi</div>
                    <h3 class="text-3xl md:text-4xl font-black mb-3 tracking-tight">Selamat Datang, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-400 font-medium text-lg max-w-2xl">Anda berada di pusat kendali portal DOGMA. Mulailah menyuarakan kebenaran, atur jadwal komunitas, dan bangun ruang diskusi tanpa batas.</p>
                </div>
            </div>

            <!-- Grid Menu Cepat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Kartu Manajemen Berita (Muncul untuk SEMUA: Super Admin & Author) -->
                <div class="bg-white border border-gray-200 p-8 flex flex-col items-start hover:shadow-md transition-shadow duration-300">
                    <div class="bg-gray-100 p-3 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-extrabold text-black mb-2">Manajemen Berita</h4>
                    <p class="text-gray-500 text-sm mb-8 flex-grow leading-relaxed">Tulis, edit, dan ketuk palu persetujuan untuk merilis artikel atau tajuk rencana terbaru ke halaman depan publik.</p>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center text-xs font-bold text-black border-b-2 border-black pb-1 hover:text-gray-500 hover:border-gray-500 uppercase tracking-widest transition-colors group">
                        Buka Ruang Redaksi 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>

                <!-- Kartu Manajemen Diskusi (HANYA MUNCUL UNTUK SUPER ADMIN) -->
                @if(auth()->user()->hasRole('Super Admin'))
                    <div class="bg-white border border-gray-200 p-8 flex flex-col items-start hover:shadow-md transition-shadow duration-300">
                        <div class="bg-gray-100 p-3 mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-black mb-2">Topik Diskusi</h4>
                        <p class="text-gray-500 text-sm mb-8 flex-grow leading-relaxed">Kelola jadwal diskusi mendatang (Upcoming) dan arsipkan topik-topik (Completed) yang telah dibahas komunitas.</p>
                        <a href="{{ url('admin/topics') }}" class="inline-flex items-center text-xs font-bold text-black border-b-2 border-black pb-1 hover:text-gray-500 hover:border-gray-500 uppercase tracking-widest transition-colors group">
                            Kelola Jadwal
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>