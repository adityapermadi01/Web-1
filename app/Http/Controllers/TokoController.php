<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::all();
        $title = "Data Toko";
        return view('admin.toko', compact('title', 'toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Data Toko";
        return view('admin.inputtoko', compact('title'));
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
        // dd($request);
        $validasi = $request->validate([
            'nama_toko' => 'required'
        ], $message);
        Toko::create($validasi);
        return redirect('toko')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $id)
    {
        $toko = toko::find($id);
        $title = "Edit Data Toko";
        return view('admin.inputtoko', compact('toko', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
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
            'nama_toko' => 'required'
        ], $message);
        Toko::where('id_toko', $id)->update($validasi);
        return redirect('toko')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Toko::findOrFail($id)->delete();
        return redirect('toko')->with('success', 'Data Berhasil Dihapus');
    }
}
