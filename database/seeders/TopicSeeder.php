<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic; // Ini ditambahkan untuk memanggil tabel Topic
use Illuminate\Support\Str; // Ini ditambahkan untuk membuat URL otomatis (slug)

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data topik yang akan dimasukkan ke database
        $topics = [
            [
                'title' => 'Transformasi Digital Usaha Mikro',
                'description' => 'Membahas peran teknologi dalam mempercepat pertumbuhan ekonomi lokal di Kabupaten Lebak.',
                'discussion_date' => '2026-05-10 19:00:00',
                'status' => 'upcoming',
            ],
            [
                'title' => 'Minat Baca & Literasi Ilmiah',
                'description' => 'Evaluasi kritis terhadap rendahnya minat baca dan solusi praktis untuk ruang edukasi masyarakat.',
                'discussion_date' => '2026-04-20 20:00:00',
                'status' => 'completed',
            ],
        ];

        // Looping untuk memasukkan data ke dalam tabel
        foreach ($topics as $topic) {
            Topic::create([
                'title' => $topic['title'],
                'slug' => Str::slug($topic['title']),
                'description' => $topic['description'],
                'discussion_date' => $topic['discussion_date'],
                'status' => $topic['status'],
            ]);
        }
    }
}
