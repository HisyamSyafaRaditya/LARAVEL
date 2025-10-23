<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['a_id' => 'A001', 'a_name' => 'John Green', 'a_country' => 'USA', 'a_biography' => 'Famous for young adult novels.'],
            ['a_id' => 'A002', 'a_name' => 'Tere Liye', 'a_country' => 'Indonesia', 'a_biography' => 'Popular Indonesian novelist.'],
            ['a_id' => 'A003', 'a_name' => 'Haruki Murakami', 'a_country' => 'Japan', 'a_biography' => 'Known for surreal storytelling.'],
            ['a_id' => 'A004', 'a_name' => 'J.K. Rowling', 'a_country' => 'UK', 'a_biography' => 'Author of Harry Potter series.'],
            ['a_id' => 'A005', 'a_name' => 'Andrea Hirata', 'a_country' => 'Indonesia', 'a_biography' => 'Author of Laskar Pelangi.'],
            ['a_id' => 'A006', 'a_name' => 'George Orwell', 'a_country' => 'UK', 'a_biography' => 'Known for dystopian novels.'],
        ]);
    }
}