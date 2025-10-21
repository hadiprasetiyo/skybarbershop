<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Capster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'expertise',
    ];
    
    public function bookings()
    {
        return $this->hasMany(DataBooking::class, 'capster_id');
    }
}
