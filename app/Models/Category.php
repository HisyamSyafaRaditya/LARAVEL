<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'c_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'c_id',
        'c_name',
        'c_description'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_c_id', 'c_id');
    }

    // Count books in this category
    public function booksCount()
    {
        return $this->books()->count();
    }

    // generate ID
    public static function generateId()
    {
        $lastCategory = self::orderBy('c_id', 'desc')->first();
        if (!$lastCategory) {
            return 'C0000001';
        }
        $lastNumber = intval(substr($lastCategory->c_id, 1));
        $newNumber = $lastNumber + 1;
        return 'C' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}