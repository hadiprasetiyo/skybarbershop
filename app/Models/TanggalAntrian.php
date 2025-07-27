<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TanggalAntrian extends Model
{
    use HasFactory;

    protected $table = 'tanggal_antrian';
    protected $primaryKey = 'id';

    protected $fillable = [
        'slot_tanggal',
        'status',
    ];

    public function jamAntrian()
    {
        return $this->hasMany(JamAntrian::class, 'tanggal_antrian_id');
    }
}
