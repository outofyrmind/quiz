<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Information;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tek = Category::create(['nama' => 'Teknologi']);
        $ed = Category::create(['nama' => 'Edukasi']);

        Information::create([
            'kategori_id' => $tek->id,
            'judul' => 'Pengenalan Laravel',
            'ringkasan' => 'Framework PHP populer.',
            'isi' => 'Laravel adalah framework PHP modern yang mempermudah pembuatan web.',
            'sumber' => 'https://laravel.com',
            'status' => 'published',
        ]);

        Information::create([
            'kategori_id' => $ed->id,
            'judul' => 'Draf Kurikulum 2026',
            'ringkasan' => 'Draf rancangan pelajaran.',
            'isi' => 'Dokumen ini masih berbentuk draf dan belum dipublikasikan umum.',
            'sumber' => null,
            'status' => 'draft',
        ]);
    }
}