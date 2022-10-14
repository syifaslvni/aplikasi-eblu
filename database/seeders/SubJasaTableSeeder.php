<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubJasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjasas')->insert([
            [
            'title' => '0',
            'slug' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'jenisjasa_id' => 8
            ],
            [
            'title' => 'Survei',
            'slug' => 'survei',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'jenisjasa_id' => 1
            ],
            [
            'title' => 'Pengolahan',
            'slug' => 'pengolahan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'jenisjasa_id' => 2
            ],
            [
            'title' => 'Analisis Laboratorium',
            'slug' => 'analisis-laboratorium',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'jenisjasa_id' => 2
            ],
        ]);
    }
}
