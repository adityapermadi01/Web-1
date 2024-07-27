@extends('layouts.template')
@section('slot')
<div class="grid grid-cols-12">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{route('Detailpasar_admin.index')}}">
                <div class="input-group mb-3">
                    <input type="search" class="form-control " name="search" placeholder="Seacrh..." aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{request('search')}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br><br>
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    {{$title}}
</h2>
<div class="px-6 py-4 bg-white rounded shadow sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="grid grid-cols-12">
        <div class="col-span-6 p-4">
            <i class="fa-solid fa-print"></i>
            <a href="/cetak_detail" target="_blank" class="btn btn-primary">Cetak</a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center col">No</th>
                        <th class="text-center col">Tanggal</th>
                        <th class="text-center col">Kode Pangan</th>
                        <th class="text-center col">Nama Pangan</th>
                        <th class="text-center col">Nama Langganan</th>
                        <th class="text-center col">Harga Pangan </th>
                        <th class="text-center col">Stok</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    @foreach ($pasarbanyuasri as $index => $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td class='text-center'>{{$item->tanggal}}</td>
                        <td class='text-center'>{{$item->kode}}</td>
                        <td class='text-center'>{{@$item->namaBarang->nama}}</td>
                        <td class='text-center'>{{$item->nama_langganan}}</td>
                        <td class='text-center'>@currency($item->harga)</td>
                        <td class='text-center'>{{$item->stok}}</td>

                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
            {{ $pasarbanyuasri->links() }}
        </div>
    </div>
    @include('sweetalert::alert')
</div><br>
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    {{$title1}}
</h2>
<div class="px-6 py-4 bg-white rounded shadow sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="grid grid-cols-12">
        <div class="col-span-6 p-4">
            <i class="fa-solid fa-print"></i>
            <a href="/cetak_anyar" target="_blank" class="btn btn-primary">Cetak</a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center col">No</th>
                        <th class="text-center col">Tanggal</th>
                        <th class="text-center col">Kode Pangan</th>
                        <th class="text-center col">Nama Pangan</th>
                        <th class="text-center col">Nama Langganan</th>
                        <th class="text-center col">Harga Pangan </th>
                        <th class="text-center col">Stok</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    @foreach ($pasaranyar as $index => $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td class='text-center'>{{$item->tanggal}}</td>
                        <td class='text-center'>{{$item->kode}}</td>
                        <td class='text-center'>{{@$item->namaBarang->nama}}</td>
                        <td class='text-center'>{{$item->nama_langganan}}</td>
                        <td class='text-center'>@currency($item->harga)</td>
                        <td class='text-center'>{{$item->stok}}</td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
            {{ $pasaranyar->links() }}
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection