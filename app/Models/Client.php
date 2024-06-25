<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Cashier\Billable;

class Client extends Model
{
    use HasFactory;
    use Billable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function bookings(): HasMany {
        return $this->hasMany(Booking::class);
    }
}