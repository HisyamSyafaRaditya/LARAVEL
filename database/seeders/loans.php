<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoansTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loans')->insert([
            ['l_id' => 'L001', 'l_date' => '2025-01-10 09:00:00', 'l_return_date' => '2025-01-20 09:00:00', 'l_status' => 'Returned', 'Member_m_id' => 'M001', 'Staff_s_id' => 'S001'],
            ['l_id' => 'L002', 'l_date' => '2025-02-05 10:00:00', 'l_return_date' => '2025-02-15 10:00:00', 'l_status' => 'Returned', 'Member_m_id' => 'M002', 'Staff_s_id' => 'S002'],
            ['l_id' => 'L003', 'l_date' => '2025-03-12 14:00:00', 'l_return_date' => '2025-03-22 14:00:00', 'l_status' => 'Borrowed', 'Member_m_id' => 'M003', 'Staff_s_id' => 'S003'],
            ['l_id' => 'L004', 'l_date' => '2025-04-01 11:00:00', 'l_return_date' => '2025-04-10 11:00:00', 'l_status' => 'Borrowed', 'Member_m_id' => 'M004', 'Staff_s_id' => 'S004'],
            ['l_id' => 'L005', 'l_date' => '2025-04-20 13:00:00', 'l_return_date' => '2025-04-30 13:00:00', 'l_status' => 'Returned', 'Member_m_id' => 'M005', 'Staff_s_id' => 'S005'],
        ]);
    }
}