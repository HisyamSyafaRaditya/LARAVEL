<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Seed tabel induk terlebih dahulu
            AuthorsTableSeeder::class,
            CategoriesTableSeeder::class,
            PublishersTableSeeder::class,
            MembersTableSeeder::class,
            StaffTableSeeder::class,
            
            // Seed tabel yang memiliki foreign key
            BooksTableSeeder::class,
            LoansTableSeeder::class,
            
            // Seed pivot table terakhir
            LoanBookTableSeeder::class,
        ]);
    }
}