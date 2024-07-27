<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pasaranyar;
use App\Models\Pasarbanyuasri;
use Illuminate\Http\Request;

class Detailpengunjungcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { {
            $pasaranyar = Pasaranyar::latest()->paginate(7);
            $pasarbanyuasri = Pasarbanyuasri::latest()->paginate(7);
            $barang = Barang::all();
            $title1 = "Detail Pemantauan Pasar Anyar";
            $title = "Detail Pemantauan Pasar Banyuasri";
            if ($request->has('search')) {
                $pasaranyar = Pasaranyar::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
                $pasarbanyuasri = Pasarbanyuasri::where('tanggal', 'LIKE', '%' . $request->search . '%')->orWhere('kode', 'LIKE', '%' . $request->search . '%')->paginate(7);
            }
            return view('detailpengunjung', compact('title', 'title1', 'barang', 'pasarbanyuasri', 'pasaranyar'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
