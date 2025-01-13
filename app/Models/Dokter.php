<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokter',
        'jadwal_mulai',
        'jadwal_selesai',
        'hari_libur',
        'poli_id',
        'nama'
    ];

    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class);
    }
}
