<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pack(): BelongsTo {
        return $this->belongsTo(Pack::class, 'pack_id');
    }

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'client_id');
    }
}