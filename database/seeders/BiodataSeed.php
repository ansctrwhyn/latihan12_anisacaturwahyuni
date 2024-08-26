<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("biodata")->insert([
            'nama' => 'Anisa Catur Wahyuni',
            'nik' => '3323084304990002',
            'umur' => '23',
            'alamat' => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
