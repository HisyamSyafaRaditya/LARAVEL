<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $primaryKey = 'b_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'b_id',
        'b_title',
        'b_isbn',
        'b_publication_year',
        'b_stock',
        'b_available_stock',
        'b_synopsys',
        'author_a_id',
        'category_c_id',
        'publisher_p_id'
    ];

    protected $casts = [
        'b_publication_year' => 'date',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'Author_a_id', 'a_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_c_id', 'c_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'Publisher_p_id', 'p_id');
    }

    public function loans()
    {
        // pivot table is 'loan_book' with columns 'Book_b_id' and 'Loan_l_id'
        return $this->belongsToMany(Loan::class, 'loan_book', 'Book_b_id', 'Loan_l_id');
    }

    // Check if book is available
    public function isAvailable()
    {
        return $this->b_available_stock > 0;
    }

    // Get borrowed count
    public function borrowedCount()
    {
        return $this->b_stock - $this->b_available_stock;
    }

    // Helper method untuk generate ID
    public static function generateId()
    {
        $lastBook = self::orderBy('b_id', 'desc')->first();
        if (!$lastBook) {
            return 'B0000001';
        }
        $lastNumber = intval(substr($lastBook->b_id, 1));
        $newNumber = $lastNumber + 1;
        return 'B' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}
