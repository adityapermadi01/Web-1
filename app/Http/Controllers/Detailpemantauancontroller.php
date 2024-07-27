<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pasaranyar;
use App\Models\Pasarbanyuasri;
use Illuminate\Http\Request;

class Detailpemantauancontroller extends Controller
{
    public function index(Request $request)
    {
        $pasaranyar = Pasaranyar::latest()->paginate(10);
        $pasarbanyuasri = Pasarbanyuasri::latest()->paginate(10);
        $barang = Barang::all();
        $title1 = "Detail Pemantauan Pasar Anyar";
        $title = "Detail Pemantauan Pasar Banyuasri";
        if ($request->has('search')) {
            $pasaranyar = Pasaranyar::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
            $pasarbanyuasri = Pasarbanyuasri::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
        }
        return view('admin.detailpasar', compact('title', 'title1', 'barang', 'pasarbanyuasri', 'pasaranyar'));
    }
    public function cetakbanyuasri()
    {
        $banyuasricetak = Pasarbanyuasri::get();
        return view('admin.cetak_detail', compact('banyuasricetak'));
    }

    public function cetakanyar()
    {
        $anyarcetak = Pasaranyar::get();
        return view('admin.cetak_anyar', compact('anyarcetak'));
    }
}
