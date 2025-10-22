<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanBook extends Model
{
    use HasFactory;
    public $timestamps = false;

    // migration creates table named 'loan_book' with columns 'Loan_l_id' and 'Book_b_id'
    protected $table = 'loan_book';

    protected $fillable = [
        'Loan_l_id',
        'Book_b_id'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'Loan_l_id', 'l_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'Book_b_id', 'b_id');
    }
}