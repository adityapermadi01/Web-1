<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $primaryKey = 'id_laporan';
    protected $fillable =  [
        'kode',
        'bulan1',
        'bulan2',
        'bulan3',
        'bulan4',
        'bulan5',
        'bulan6',
        'bulan7',
        'bulan8',
        'bulan9',
        'bulan10',
        'bulan11',
        'bulan12',
        'id_barang',
        'id_laporan'
    ];

    public function namaBarang()
    {
        return $this->belongsTo(Barang::class, 'kode', 'kode');
    }
}
