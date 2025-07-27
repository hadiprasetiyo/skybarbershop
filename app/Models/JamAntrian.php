<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JamAntrian extends Model
{
    use HasFactory;

    protected $table = 'jam_antrian';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal_antrian_id',
        'slot_jam',
        'status',
    ];

    public function tanggalAntrian()
    {
        return $this->belongsTo(TanggalAntrian::class, 'tanggal_antrian_id');
    }

    public function bookings()
    {
        return $this->hasMany(DataBooking::class, 'jam_antrian_id');
    }
}

