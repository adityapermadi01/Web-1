<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pasaranyar;
use Illuminate\Http\Request;

class PasarAnyarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pasaranyar = Pasaranyar::latest()->paginate(10);
        $barang = Barang::all();
        $title = "Data Pemantauan Pasar Anyar";
        if ($request->has('search')) {
            $pasaranyar = Pasaranyar::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
        } else {
            $pasaranyar = Pasaranyar::latest()->paginate(10);
        }
        return view('admin.pasaranyar', compact('title', 'barang', 'pasaranyar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Data Pemantauan Pasar Anyar";
        $barang = Barang::all();
        return view('admin.inputpasaranyar', compact('title', 'barang'));
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
            'tanggal' => 'required',
            'kode' => 'required',
            'harga' => 'required',
            'nama_langganan' => 'required',
            'stok' => 'required',
            'id_barang' => 'required'
        ], $message);
        Pasaranyar::create($validasi);
        return redirect('pasaranyar')->with('success', 'Data Berhasil Disimpan');
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
        $title = "Edit Data Pemantauan Pasar Anyar";
        $barang = Barang::all();
        $pasaranyar = Pasaranyar::findOrFail($id);
        return view('admin.inputpasaranyar', compact('title', 'barang', 'pasaranyar'));
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
            'tanggal' => 'required',
            'kode' => 'required',
            'nama_langganan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_barang' => 'required'
        ], $message);
        Pasaranyar::findOrFail($id)->update($validasi);
        return redirect('pasaranyar')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasaranyar::findOrFail($id)->delete();
        return redirect('pasaranyar')->with('success', 'Data Berhasil Dihapus');
    }
}
