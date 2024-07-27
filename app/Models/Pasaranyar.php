<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasaranyar extends Model
{
    use HasFactory;
    protected $table = 'pasaranyars';
    protected $primaryKey = 'id_pasaranyar';
    protected $fillable =  [
        'tanggal',
        'kode',
        'harga',
        'nama_langganan',
        'stok',
        'id_barang',
        'id_pasaranyar'
    ];

    public function namaBarang()
    {
        return $this->belongsTo(Barang::class, 'kode', 'kode');
    }
}
