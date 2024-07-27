<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pasaranyar;
use App\Models\Pasarbanyuasri;
use Illuminate\Http\Request;

class Userdetailcontroller extends Controller
{

    public function index(Request $request)
    {
        $pasaranyar = Pasaranyar::latest()->paginate(6);
        $pasarbanyuasri = Pasarbanyuasri::latest()->paginate(6);
        $barang = Barang::all();
        $title1 = "Detail Pemantauan Pasar Anyar";
        $title = "Detail Pemantauan Pasar Banyuasri";
        if ($request->has('search')) {
            $pasaranyar = Pasaranyar::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
            $pasarbanyuasri = Pasarbanyuasri::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
        }
        return view('admin.userdetail', compact('title', 'title1', 'barang', 'pasarbanyuasri', 'pasaranyar'));
    }
}
