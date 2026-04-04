<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    protected $fillable = [
        'reference', 'civility', 'first_name', 'last_name', 'email', 'phone',
        'country', 'id_number', 'id_doc_recto', 'id_doc_verso', 'address_proof',
        'loan_type', 'amount', 'currency', 'duration_months',
        'purpose', 'employment_status', 'monthly_income', 'status',
        'user_id', 'admin_notes', 'approved_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->civility.' '.$this->first_name.' '.$this->last_name);
    }

    public static function generateReference(): string
    {
        do {
            $ref = 'LR-'.strtoupper(substr(md5(uniqid()), 0, 8));
        } while (self::where('reference', $ref)->exists());

        return $ref;
    }
}
