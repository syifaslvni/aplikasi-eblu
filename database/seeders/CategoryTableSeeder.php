<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'title' => 'Teknologi Survei',
            'slug' => 'teknologi-survei',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Pengolahan & Laboratorium',
            'slug' => 'pengolahan-laboratorium',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Pencetakan',
            'slug' => 'pencetakan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Peralatan Teknik',
            'slug' => 'peralatan-teknik',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Wahana Survei',
            'slug' => 'wahana-survei',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Perbantuan Tenaga Ahli/Teknisi/Surveyor',
            'slug' => 'perbantuan-tenaga-ahli-teknisi-surveyor',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Penggunaan Lahan/Ruangan',
            'slug' => 'penggunaan-lahan-ruangan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Lainnya',
            'slug' => 'lainnya',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'Survei',
            'slug' => 'survei',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'Pengolahan',
            'slug' => 'pengolahan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 2
            ],
            [
            'title' => 'Analisis Laboratorium',
            'slug' => 'analisis-laboratorium',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 2
            ],
            [
            'title' => 'Pengolahan Data',
            'slug' => 'pengolahan-data',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 10
            ],
        ]);
    }
}
