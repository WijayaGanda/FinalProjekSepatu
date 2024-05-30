<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'kode' => 'M',
                'nama' => 'Male'
            ],
            [
                'kode' => 'F',
                'nama' => 'Female'
            ],
            [
                'kode' => 'SP',
                'nama' => 'Sports'
            ],
            [
                'kode' => 'KD',
                'nama' => 'Kids'
            ],
        ]);
    }
}
