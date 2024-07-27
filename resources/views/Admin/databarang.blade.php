@extends('layouts.template')
@section('slot')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{$title}}
</h2>
<div class="shadow px-6 py-4 bg-white rounded sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="grid grid-cols-12">
        <div class="col-span-6 p-4">
            <a href="{{route('databarang.create')}}" class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 border-gray-50 text-gray-500 text-black-600 hover:text-white hover:bg-blue-600">Tambah</a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="col text-center">No</th>
                        <th class="col text-center">Kode Pangan</th>
                        <th class="col text-center">Nama Pangan</th>
                        <th class="col text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    @foreach ($barang as $index => $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td class='text-center'>{{$item->kode}}</td>
                        <td class='text-center'>{{$item->nama}}</td>
                        <td>
                            <a href="{{route('databarang.edit', $item->id_barang) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{route('databarang.destroy',  $item->id_barang) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin akan menghapus data ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
            @include('sweetalert::alert')
        </div>
    </div>
</div>

@endsection