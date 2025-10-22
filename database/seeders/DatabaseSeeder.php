<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use App\Models\Staff;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@library.com',
            'password' => Hash::make('password'),
        ]);

        // Create sample members
        Member::create([
            'm_id' => 'M0000001',
            'm_name' => 'John Doe',
            'm_email' => 'john@example.com',
            'm_phone' => '081234567890',
            'm_address' => 'Jl. Contoh No. 123',
            'm_join_date' => now(),
            'm_status' => 'active',
        ]);

        Member::create([
            'm_id' => 'M0000002',
            'm_name' => 'Jane Smith',
            'm_email' => 'jane@example.com',
            'm_phone' => '081234567891',
            'm_address' => 'Jl. Example No. 456',
            'm_join_date' => now(),
            'm_status' => 'active',
        ]);

        // Create sample staff
        Staff::create([
            's_id' => 'S0000001',
            's_name' => 'Librarian One',
            's_email' => 'librarian1@library.com',
            's_phone' => '081234567892',
            's_position' => 'Librarian',
            's_join_date' => now(),
        ]);

        // Create sample authors
        Author::create([
            'a_id' => 'A0000001',
            'a_name' => 'J.K. Rowling',
            'a_country' => 'United Kingdom',
            'a_biography' => 'British author, best known for the Harry Potter series.',
        ]);

        Author::create([
            'a_id' => 'A0000002',
            'a_name' => 'George Orwell',
            'a_country' => 'United Kingdom',
            'a_biography' => 'English novelist and essayist, known for 1984 and Animal Farm.',
        ]);

        // Create sample publishers
        Publisher::create([
            'p_id' => 'P0000001',
            'p_name' => 'Bloomsbury Publishing',
            'p_address' => 'London, UK',
            'p_phone' => '+442076315600',
        ]);

        Publisher::create([
            'p_id' => 'P0000002',
            'p_name' => 'Penguin Books',
            'p_address' => 'London, UK',
            'p_phone' => '+442071393000',
        ]);

        // Create sample categories
        Category::create([
            'c_id' => 'C0000001',
            'c_name' => 'Fiction',
            'c_description' => 'Fictional stories and novels',
        ]);

        Category::create([
            'c_id' => 'C0000002',
            'c_name' => 'Science Fiction',
            'c_description' => 'Science fiction and dystopian novels',
        ]);

        Category::create([
            'c_id' => 'C0000003',
            'c_name' => 'Fantasy',
            'c_description' => 'Fantasy and magical worlds',
        ]);

        // Create sample books
        Book::create([
            'b_id' => 'B0000001',
            'b_title' => 'Harry Potter and the Philosopher\'s Stone',
            'b_isbn' => '978-0747532699',
            'b_publication_year' => '1997-06-26',
            'b_stock' => 5,
            'b_available_stock' => 5,
            'b_synopsys' => 'The first novel in the Harry Potter series.',
            'author_a_id' => 'A0000001',
            'category_c_id' => 'C0000003',
            'publisher_p_id' => 'P0000001',
        ]);

        Book::create([
            'b_id' => 'B0000002',
            'b_title' => '1984',
            'b_isbn' => '978-0451524935',
            'b_publication_year' => '1949-06-08',
            'b_stock' => 3,
            'b_available_stock' => 3,
            'b_synopsys' => 'A dystopian social science fiction novel.',
            'author_a_id' => 'A0000002',
            'category_c_id' => 'C0000002',
            'publisher_p_id' => 'P0000002',
        ]);

        Book::create([
            'b_id' => 'B0000003',
            'b_title' => 'Animal Farm',
            'b_isbn' => '978-0451526342',
            'b_publication_year' => '1945-08-17',
            'b_stock' => 4,
            'b_available_stock' => 4,
            'b_synopsys' => 'An allegorical novella about Soviet totalitarianism.',
            'author_a_id' => 'A0000002',
            'category_c_id' => 'C0000001',
            'publisher_p_id' => 'P0000002',
        ]);
    }
}