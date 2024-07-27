<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Laporan;
use Illuminate\Http\Request;

class Laporanpemantauancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.laporanpemantauan', compact('title', 'laporanpemantau'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $laporanpemantau = Laporan::all();
        $title = "Laporan Perkembangan";
        return view('admin.inputlaporanpemantauan', compact('title', 'barang', 'laporanpemantau'));
    }

    public function getCode(Request $request)
    {
        $barang = Barang::find($request->id);
        return response()->json(['kode' => @$barang->kode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Kolom :attribute Harus Lengkap',
            'date' => 'Kolom :attribute Harus Tanggal',
            'numeric' => 'Kolom :attribute Harus Angka',
        ];
        $validasi = $request->validate([
            'kode' => 'required',
            'bulan1' => 'required',
            'bulan2' => 'required',
            'bulan3' => 'required',
            'bulan4' => 'required',
            'bulan5' => 'required',
            'bulan6' => 'required',
            'bulan7' => 'required',
            'bulan8' => 'required',
            'bulan9' => 'required',
            'bulan10' => 'required',
            'bulan11' => 'required',
            'bulan12' => 'required',
            'id_barang' => 'required'
        ], $message);
        Laporan::create($validasi);
        return redirect('laporanpemantauan')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Laporan Perkembangan";
        $barang = Barang::all();
        $laporanpemantauan = Laporan::findOrFail($id);
        return view('admin.inputlaporanpemantauan', compact('title', 'barang', 'laporanpemantauan'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Kolom :attribute Harus Lengkap',
            'date' => 'Kolom :attribute Harus Tanggal',
            'numeric' => 'Kolom :attribute Harus Angka',
        ];
        $validasi = $request->validate([
            'kode' => 'required',
            'bulan1' => 'required',
            'bulan2' => 'required',
            'bulan3' => 'required',
            'bulan4' => 'required',
            'bulan5' => 'required',
            'bulan6' => 'required',
            'bulan7' => 'required',
            'bulan8' => 'required',
            'bulan9' => 'required',
            'bulan10' => 'required',
            'bulan11' => 'required',
            'bulan12' => 'required',
            'id_barang' => 'required'
        ], $message);
        Laporan::findOrFail($id)->update($validasi);
        return redirect('laporanpemantauan')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laporan::findOrFail($id)->delete();
        return redirect('laporanpemantauan')->with('success', 'Data Berhasil Dihapus');
    }
}
