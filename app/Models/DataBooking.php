<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBooking extends Model
{
    use HasFactory;

    protected $table = 'data_booking';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'data_collection_id',
        'capster_id',
        'jam_antrian_id',
        'tanggal_antrian_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function collection()
    {
        return $this->belongsTo(DataCollection::class, 'data_collection_id');
    }

    public function jamAntrian()
    {
        return $this->belongsTo(JamAntrian::class, 'jam_antrian_id');
    }

    public function tanggalAntrian()
    {
        return $this->belongsTo(TanggalAntrian::class, 'tanggal_antrian_id');
    }

    public function capster()
    {
        return $this->belongsTo(Capster::class, 'capster_id');
    }
}

