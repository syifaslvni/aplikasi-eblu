<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisJasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenisjasas')->insert([
            [
            'title' => 'Teknologi Survei',
            'slug' => 'teknologi-survei',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => 'Pengolahan & Laboratorium',
            'slug' => 'pengolahan-laboratorium',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => 'Pencetakan',
            'slug' => 'pencetakan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => 'Peralatan Teknik',
            'slug' => 'peralatan-teknik',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => 'Wahana Survei',
            'slug' => 'wahana-survei',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => 'Perbantuan Tenaga Ahli/Teknisi/Surveyor',
            'slug' => 'perbantuan-tenaga-ahli-teknisi-surveyor',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => 'Penggunaan Lahan/Ruangan',
            'slug' => 'penggunaan-lahan-ruangan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'title' => '0',
            'slug' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
