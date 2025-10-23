<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['c_id' => 'C001', 'c_name' => 'Fiction', 'c_description' => 'Imaginative narrative writing.'],
            ['c_id' => 'C002', 'c_name' => 'Non-Fiction', 'c_description' => 'Based on factual events.'],
            ['c_id' => 'C003', 'c_name' => 'Fantasy', 'c_description' => 'Contains magical or supernatural elements.'],
            ['c_id' => 'C004', 'c_name' => 'Romance', 'c_description' => 'Focuses on romantic relationships.'],
            ['c_id' => 'C005', 'c_name' => 'Science', 'c_description' => 'Covers topics about science and discovery.'],
            ['c_id' => 'C006', 'c_name' => 'History', 'c_description' => 'Covers historical events and figures.'],
        ]);
    }
}