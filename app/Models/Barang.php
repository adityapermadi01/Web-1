<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $guarded = [];
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_barang', 'id_barang');
    }
}
