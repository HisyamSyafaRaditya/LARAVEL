<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Authors table
        Schema::create('authors', function (Blueprint $table) {
            $table->char('a_id', 8)->primary();
            $table->string('a_name', 50);
            $table->string('a_country', 20);
            $table->text('a_biography')->nullable();
        });

        // Categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->char('c_id', 8)->primary();
            $table->string('c_name', 50);
            $table->text('c_description')->nullable();
        });

        // Publishers table
        Schema::create('publishers', function (Blueprint $table) {
            $table->char('p_id', 8)->primary();
            $table->string('p_name', 50);
            $table->string('p_address', 100);
            $table->string('p_phone', 15);
        });

        // Books table
        Schema::create('books', function (Blueprint $table) {
            $table->char('b_id', 8)->primary();
            $table->string('b_title', 50);
            $table->char('b_isbn', 20);
            $table->date('b_publication_year');
            $table->integer('b_stock');
            $table->integer('b_available_stock');
            $table->text('b_synopsys')->nullable();
            $table->char('Author_a_id', 8);
            $table->char('Category_c_id', 8);
            $table->char('Publisher_p_id', 8);

            $table->foreign('Author_a_id')->references('a_id')->on('authors');
            $table->foreign('Category_c_id')->references('c_id')->on('categories');
            $table->foreign('Publisher_p_id')->references('p_id')->on('publishers');
        });

        // Members table
        Schema::create('members', function (Blueprint $table) {
            $table->char('m_id', 8)->primary();
            $table->string('m_name', 50);
            $table->string('m_email', 50);
            $table->string('m_phone', 15);
            $table->string('m_address', 100);
            $table->date('m_join_date');
            $table->string('m_status', 10);
        });

        // Staff table
        Schema::create('staff', function (Blueprint $table) {
            $table->char('s_id', 8)->primary();
            $table->string('s_name', 50);
            $table->string('s_email', 50);
            $table->string('s_phone', 15);
            $table->string('s_position', 10);
            $table->date('s_join_date');
        });

        // Loans table
        Schema::create('loans', function (Blueprint $table) {
            $table->char('l_id', 8)->primary();
            $table->dateTime('l_date');
            $table->dateTime('l_return_date')->nullable();
            $table->string('l_status', 20);
            $table->char('Member_m_id', 8);
            $table->char('Staff_s_id', 8);

            $table->foreign('Member_m_id')->references('m_id')->on('members');
            $table->foreign('Staff_s_id')->references('s_id')->on('staff');
        });

        // Loan_book pivot table
        Schema::create('loan_book', function (Blueprint $table) {
            $table->char('Loan_l_id', 8);
            $table->char('Book_b_id', 8);

            $table->primary(['Loan_l_id', 'Book_b_id']);
            $table->foreign('Loan_l_id')->references('l_id')->on('loans')->onDelete('cascade');
            $table->foreign('Book_b_id')->references('b_id')->on('books')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_book');
        Schema::dropIfExists('loans');
        Schema::dropIfExists('books');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('members');
        Schema::dropIfExists('publishers');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('authors');
    }
};