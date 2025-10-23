<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('members')->insert([
            ['m_id' => 'M001', 'm_name' => 'Fajar Nugroho', 'm_email' => 'fajar@mail.com', 'm_phone' => '0811111111', 'm_address' => 'Surabaya', 'm_join_date' => '2022-01-01', 'm_status' => 'Active'],
            ['m_id' => 'M002', 'm_name' => 'Lina Wulandari', 'm_email' => 'lina@mail.com', 'm_phone' => '0811111112', 'm_address' => 'Malang', 'm_join_date' => '2022-03-11', 'm_status' => 'Active'],
            ['m_id' => 'M003', 'm_name' => 'Dedi Prasetya', 'm_email' => 'dedi@mail.com', 'm_phone' => '0811111113', 'm_address' => 'Jakarta', 'm_join_date' => '2021-09-12', 'm_status' => 'Active'],
            ['m_id' => 'M004', 'm_name' => 'Maya Sari', 'm_email' => 'maya@mail.com', 'm_phone' => '0811111114', 'm_address' => 'Bandung', 'm_join_date' => '2023-02-10', 'm_status' => 'Active'],
            ['m_id' => 'M005', 'm_name' => 'Rian Setiawan', 'm_email' => 'rian@mail.com', 'm_phone' => '0811111115', 'm_address' => 'Solo', 'm_join_date' => '2022-07-05', 'm_status' => 'Active'],
            ['m_id' => 'M006', 'm_name' => 'Citra Permata', 'm_email' => 'citra@mail.com', 'm_phone' => '0811111116', 'm_address' => 'Yogyakarta', 'm_join_date' => '2023-01-01', 'm_status' => 'Active'],
            ['m_id' => 'M007', 'm_name' => 'Bayu Ramadhan', 'm_email' => 'bayu@mail.com', 'm_phone' => '0811111117', 'm_address' => 'Makassar', 'm_join_date' => '2021-11-21', 'm_status' => 'Active'],
            ['m_id' => 'M008', 'm_name' => 'Nanda Aulia', 'm_email' => 'nanda@mail.com', 'm_phone' => '0811111118', 'm_address' => 'Medan', 'm_join_date' => '2023-06-15', 'm_status' => 'Active'],
            ['m_id' => 'M009', 'm_name' => 'Zaki Maulana', 'm_email' => 'zaki@mail.com', 'm_phone' => '0811111119', 'm_address' => 'Palembang', 'm_join_date' => '2021-04-04', 'm_status' => 'Active'],
            ['m_id' => 'M010', 'm_name' => 'Vina Maharani', 'm_email' => 'vina@mail.com', 'm_phone' => '0811111120', 'm_address' => 'Semarang', 'm_join_date' => '2020-10-18', 'm_status' => 'Inactive'],
            ['m_id' => 'M011', 'm_name' => 'Taufik Ismail', 'm_email' => 'taufik@mail.com', 'm_phone' => '0811111121', 'm_address' => 'Surabaya', 'm_join_date' => '2023-03-25', 'm_status' => 'Active'],
            ['m_id' => 'M012', 'm_name' => 'Rika Lestari', 'm_email' => 'rika@mail.com', 'm_phone' => '0811111122', 'm_address' => 'Bali', 'm_join_date' => '2023-05-10', 'm_status' => 'Active'],
            ['m_id' => 'M013', 'm_name' => 'Farhan Nur', 'm_email' => 'farhan@mail.com', 'm_phone' => '0811111123', 'm_address' => 'Depok', 'm_join_date' => '2023-07-11', 'm_status' => 'Active'],
            ['m_id' => 'M014', 'm_name' => 'Yulia Kartini', 'm_email' => 'yulia@mail.com', 'm_phone' => '0811111124', 'm_address' => 'Tangerang', 'm_join_date' => '2021-02-22', 'm_status' => 'Active'],
            ['m_id' => 'M015', 'm_name' => 'Aldo Pratama', 'm_email' => 'aldo@mail.com', 'm_phone' => '0811111125', 'm_address' => 'Bekasi', 'm_join_date' => '2022-04-14', 'm_status' => 'Active'],
            ['m_id' => 'M016', 'm_name' => 'Bella Anjani', 'm_email' => 'bella@mail.com', 'm_phone' => '0811111126', 'm_address' => 'Bogor', 'm_join_date' => '2021-08-30', 'm_status' => 'Active'],
            ['m_id' => 'M017', 'm_name' => 'Gilang Putra', 'm_email' => 'gilang@mail.com', 'm_phone' => '0811111127', 'm_address' => 'Surabaya', 'm_join_date' => '2020-12-12', 'm_status' => 'Inactive'],
            ['m_id' => 'M018', 'm_name' => 'Dina Rosita', 'm_email' => 'dina@mail.com', 'm_phone' => '0811111128', 'm_address' => 'Malang', 'm_join_date' => '2021-05-05', 'm_status' => 'Active'],
            ['m_id' => 'M019', 'm_name' => 'Rafi Prakoso', 'm_email' => 'rafi@mail.com', 'm_phone' => '0811111129', 'm_address' => 'Padang', 'm_join_date' => '2023-06-30', 'm_status' => 'Active'],
            ['m_id' => 'M020', 'm_name' => 'Salma Hidayah', 'm_email' => 'salma@mail.com', 'm_phone' => '0811111130', 'm_address' => 'Surabaya', 'm_join_date' => '2022-11-11', 'm_status' => 'Active'],
        ]);
    }
}