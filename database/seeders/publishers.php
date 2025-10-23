<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('publishers')->insert([
            ['p_id' => 'P001', 'p_name' => 'Gramedia', 'p_address' => 'Jakarta', 'p_phone' => '0215551111'],
            ['p_id' => 'P002', 'p_name' => 'HarperCollins', 'p_address' => 'New York', 'p_phone' => '0012125551212'],
            ['p_id' => 'P003', 'p_name' => 'Penguin Books', 'p_address' => 'London', 'p_phone' => '4412345678'],
            ['p_id' => 'P004', 'p_name' => 'Bentang Pustaka', 'p_address' => 'Yogyakarta', 'p_phone' => '0274555123'],
            ['p_id' => 'P005', 'p_name' => 'Vintage', 'p_address' => 'Tokyo', 'p_phone' => '8135557788'],
            ['p_id' => 'P006', 'p_name' => 'Cambridge Press', 'p_address' => 'Cambridge', 'p_phone' => '4412237654'],
        ]);
    }
}