<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'a_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'a_id',
        'a_name',
        'a_country',
        'a_biography'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_a_id', 'a_id');
    }

    // Count books by this author
    public function booksCount()
    {
        return $this->books()->count();
    }

    // generate ID
    public static function generateId()
    {
        $lastAuthor = self::orderBy('a_id', 'desc')->first();
        if (!$lastAuthor) {
            return 'A0000001';
        }
        $lastNumber = intval(substr($lastAuthor->a_id, 1));
        $newNumber = $lastNumber + 1;
        return 'A' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}