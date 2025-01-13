<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pasien',
        'nomor_identitas',
        'nomor_telepon',
        'alamat',
    ];

    public function reservasis(): HasMany
    {
        return $this->hasMany(Reservasi::class);
    }
}
