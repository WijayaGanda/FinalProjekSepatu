<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'nama'=>'Jaya Indah',
                'alamat'=>'Tenggilis'
            ],
            [
                'nama'=>'Outomount',
                'alamat'=>'Siwalankerto'
            ],
            [
                'nama'=>'SpeedLab',
                'alamat'=>'Gunungsari'
            ],
        ]);
    }
}
