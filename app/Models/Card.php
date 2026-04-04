<?php

namespace App\Models;

use App\Enums\CardStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeCurrentUser($query, $user_id = null)
    {
        return $query->where('user_id', $user_id ?? auth()->id());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cardHolder(): BelongsTo
    {
        return $this->belongsTo(CardHolder::class);
    }

    protected $casts = [
        'status' => CardStatus::class,
    ];

    public function getStatusValueAttribute(): string
    {
        $s = $this->status;
        return $s instanceof CardStatus ? $s->value : (string) $s;
    }
}
