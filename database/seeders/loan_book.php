<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanBookTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loan_book')->insert([
            ['Loan_l_id' => 'L001', 'Book_b_id' => 'B002'],
            ['Loan_l_id' => 'L001', 'Book_b_id' => 'B010'],
            ['Loan_l_id' => 'L002', 'Book_b_id' => 'B004'],
            ['Loan_l_id' => 'L003', 'Book_b_id' => 'B007'],
            ['Loan_l_id' => 'L003', 'Book_b_id' => 'B015'],
            ['Loan_l_id' => 'L004', 'Book_b_id' => 'B009'],
            ['Loan_l_id' => 'L005', 'Book_b_id' => 'B013'],
        ]);
    }
}