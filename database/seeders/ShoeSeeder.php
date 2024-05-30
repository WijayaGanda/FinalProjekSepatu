<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shoes')->insert([
            [
                'merk'=>'Nike Air Jordan Grey',
                'ukuran' =>'42',
                'stok'=>'20',
                'category_id'=> 1,
                'supplier_id'=>2
            ],
            [
                'merk'=>'Adidas Samba',
                'ukuran' =>'37',
                'stok'=>'20',
                'category_id'=>2,
                'supplier_id'=>1
            ],
        ]);
    }
}
