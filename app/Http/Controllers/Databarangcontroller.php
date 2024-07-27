<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class Databarangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $title = "Data Pangan";
        return view('admin.databarang', compact('title', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Data Pangan";
        return view('admin.inputbarang', compact('title'));
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
            'kode' => 'required',
            'nama' => 'required'
        ], $message);
        Barang::create($validasi);
        return redirect('databarang')->with('success', 'Data Berhasil Disimpan');
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
        $barang = Barang::find($id);
        $title = "Edit Data Pangan";
        return view('admin.inputbarang', compact('barang', 'title'));
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
            'kode' => '',
            'nama' => ''
        ], $message);
        Barang::where('id_barang', $id)->update($validasi);
        return redirect('databarang')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang != null) {
            $barang = Barang::find($barang->id);
            Barang::where('id_barang', $id)->delete();
        }
        return redirect('databarang')->with('sucess', 'Data berhasil terhapus');
    }
}
