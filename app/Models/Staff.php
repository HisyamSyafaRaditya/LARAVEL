<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'staff';
    protected $primaryKey = 's_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        's_id',
        's_name',
        's_email',
        's_phone',
        's_position',
        's_join_date'
    ];

    protected $casts = [
        's_join_date' => 'date',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'staff_s_id', 's_id');
    }

    // Helper method untuk generate ID
    public static function generateId()
    {
        $lastStaff = self::orderBy('s_id', 'desc')->first();
        if (!$lastStaff) {
            return 'S0000001';
        }
        $lastNumber = intval(substr($lastStaff->s_id, 1));
        $newNumber = $lastNumber + 1;
        return 'S' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}