<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class Penjualancontroller extends Controller
{
    public function index()
    {
        $data = Barang::with('penjualan')->get();
        return view('detailpenjualan', compact('data'));
    }
}
