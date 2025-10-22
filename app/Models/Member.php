<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'm_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'm_id',
        'm_name',
        'm_email',
        'm_phone',
        'm_address',
        'm_join_date',
        'm_status'
    ];

    protected $casts = [
        'm_join_date' => 'date',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'member_m_id', 'm_id');
    }

    // Helper method untuk generate ID
    public static function generateId()
    {
        $lastMember = self::orderBy('m_id', 'desc')->first();
        if (!$lastMember) {
            return 'M0000001';
        }
        $lastNumber = intval(substr($lastMember->m_id, 1));
        $newNumber = $lastNumber + 1;
        return 'M' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}