<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('staff')->insert([
            ['s_id' => 'S001', 's_name' => 'Rina Kartika', 's_email' => 'rina@library.com', 's_phone' => '0812345001', 's_position' => 'Librarian', 's_join_date' => '2020-03-10'],
            ['s_id' => 'S002', 's_name' => 'Ahmad Fauzi', 's_email' => 'ahmad@library.com', 's_phone' => '0812345002', 's_position' => 'Assistant', 's_join_date' => '2021-01-15'],
            ['s_id' => 'S003', 's_name' => 'Budi Santoso', 's_email' => 'budi@library.com', 's_phone' => '0812345003', 's_position' => 'Admin', 's_join_date' => '2019-07-22'],
            ['s_id' => 'S004', 's_name' => 'Siti Rahmawati', 's_email' => 'siti@library.com', 's_phone' => '0812345004', 's_position' => 'Librarian', 's_join_date' => '2020-05-11'],
            ['s_id' => 'S005', 's_name' => 'Dewi Anggraini', 's_email' => 'dewi@library.com', 's_phone' => '0812345005', 's_position' => 'Assistant', 's_join_date' => '2022-08-09'],
            ['s_id' => 'S006', 's_name' => 'Andi Prasetyo', 's_email' => 'andi@library.com', 's_phone' => '0812345006', 's_position' => 'Admin', 's_join_date' => '2021-09-17'],
            ['s_id' => 'S007', 's_name' => 'Rizky Hidayat', 's_email' => 'rizky@library.com', 's_phone' => '0812345007', 's_position' => 'Technician', 's_join_date' => '2023-01-20'],
            ['s_id' => 'S008', 's_name' => 'Tasya Amelia', 's_email' => 'tasya@library.com', 's_phone' => '0812345008', 's_position' => 'Librarian', 's_join_date' => '2022-02-12'],
            ['s_id' => 'S009', 's_name' => 'Putri Lestari', 's_email' => 'putri@library.com', 's_phone' => '0812345009', 's_position' => 'Assistant', 's_join_date' => '2020-11-03'],
            ['s_id' => 'S010', 's_name' => 'Hendri Saputra', 's_email' => 'hendri@library.com', 's_phone' => '0812345010', 's_position' => 'Manager', 's_join_date' => '2018-12-01'],
        ]);
    }
}