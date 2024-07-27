<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Laporan;
use Illuminate\Http\Request;

class Userlaporanpemantauancontroller extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::all();
        $laporanpemantau = Laporan::all();
        $title = "Laporan Perkembangan";
        if ($request->has('search')) {
            $laporanpemantau = Laporan::where('kode', 'LIKE', '%' . $request->search . '%')->orWhere('bulan1', 'LIKE', '%' . $request->search . '%')->paginate(7);
        } else {
            $laporanpemantau = Laporan::latest()->paginate(10);
        }
        return view('admin.Userlaporanpemantauan', compact('title', 'laporanpemantau'));
    }
}
