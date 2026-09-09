<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Information;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tech = Category::create(['nama' => 'Teknologi']);
        $design = Category::create(['nama' => 'Desain']);
        $business = Category::create(['nama' => 'Bisnis']);

        Information::create([
            'kategori_id' => $tech->id,
            'judul' => 'Pengenalan Framework Laravel',
            'ringkasan' => 'Laravel adalah framework PHP modern yang sangat populer untuk membuat web.',
            'isi' => 'Laravel menyediakan berbagai fitur bawaan seperti ORM Eloquent, Routing, Blade Templating, dan fitur keamanan yang memudahkan pengembang.',
            'sumber' => 'https://laravel.com',
            'status' => 'published',
        ]);

        Information::create([
            'kategori_id' => $design->id,
            'judul' => 'Prinsip Dasar UI/UX Design',
            'ringkasan' => 'Memahami kebiasaan pengguna dalam berinteraksi dengan antarmuka digital.',
            'isi' => 'Desain antarmuka yang baik mengutamakan kejelasan, konsistensi, dan kemudahan navigasi bagi pengguna.',
            'sumber' => 'https://refactoringui.com',
            'status' => 'published',
        ]);

        Information::create([
            'kategori_id' => $business->id,
            'judul' => 'Draf Strategi Marketing 2026',
            'ringkasan' => 'Rencana pemasaran produk baru untuk kuartal pertama.',
            'isi' => 'Dokumen internal ini masih dalam tahap draf dan akan dibahas pada rapat manajemen mendatang.',
            'sumber' => null,
            'status' => 'draft',
        ]);
    }
}