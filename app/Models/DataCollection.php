<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataCollection extends Model
{
    use HasFactory;

    protected $table = 'data_collection';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_model',
        'harga',
        'gambar',
    ];

    protected $casts = [
        'harga' => 'integer',
    ];
    
    public function bookings()
    {
        return $this->hasMany(DataBooking::class, 'data_collection_id');
    }

}

