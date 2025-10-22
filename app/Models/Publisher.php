<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'p_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'p_id',
        'p_name',
        'p_address',
        'p_phone'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_p_id', 'p_id');
    }

    // Count books by this publisher
    public function booksCount()
    {
        return $this->books()->count();
    }

    // Helper method untuk generate ID
    public static function generateId()
    {
        $lastPublisher = self::orderBy('p_id', 'desc')->first();
        if (!$lastPublisher) {
            return 'P0000001';
        }
        $lastNumber = intval(substr($lastPublisher->p_id, 1));
        $newNumber = $lastNumber + 1;
        return 'P' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}