<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasarbanyuasri extends Model
{

    use HasFactory;
    protected $table = 'pasarbanyuasris';
    protected $primaryKey = 'id_pasarbanyuasri';
    protected $fillable =  [
        'tanggal',
        'kode',
        'harga',
        'nama_langganan',
        'stok',
        'id_barang',
        'id_pasarbanyuasri'
    ];

    public function namaBarang()
    {
        return $this->belongsTo(Barang::class, 'kode', 'kode');
    }
}
