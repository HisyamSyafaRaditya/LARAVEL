<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'l_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'l_id',
        'l_date',
        'l_return_date',
        'l_status',
        'Member_m_id',
        'Staff_s_id'
    ];

    protected $casts = [
        'l_date' => 'datetime',
        'l_return_date' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'Member_m_id', 'm_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'Staff_s_id', 's_id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'loan_book', 'Loan_l_id', 'Book_b_id');
    }

    // Check if loan is overdue
    public function isOverdue()
    {
        return $this->l_status == 'borrowed' && now()->gt($this->l_return_date);
    }

    // Calculate days overdue
    public function daysOverdue()
    {
        if (!$this->isOverdue()) {
            return 0;
        }
        return (int)now()->floatDiffInDays($this->l_return_date);
    }

    // Calculate fine 
    public function calculateFine($finePerDay = 1000)
    {
        return $this->daysOverdue() * $finePerDay;
    }

    // generate ID
    public static function generateId()
    {
        $lastLoan = self::orderBy('l_id', 'desc')->first();
        if (!$lastLoan) {
            return 'L0000001';
        }
        $lastNumber = intval(substr($lastLoan->l_id, 1));
        $newNumber = $lastNumber + 1;
        return 'L' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }

    public function scopeBorrowed($query)
    {
        return $query->where('l_status', 'borrowed');
    }

    public function scopeReturned($query)
    {
        return $query->where('l_status', 'returned');
    }

    public function scopeOverdue($query)
    {
        return $query->where('l_status', 'borrowed')
                     ->where('l_return_date', '<', now());
    }
}