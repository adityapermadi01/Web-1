@extends('layouts.template')
@section('slot')
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    {{$title}}
</h2>
<div class="px-6 py-4 bg-white rounded shadow sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="container">
        <form action="{{(isset($pasaranyar))?route('pasaranyar.update',$pasaranyar->id_pasaranyar):route('pasaranyar.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($pasaranyar))
            @method('PUT')
            @endif
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-5">
                    <input type="Date" name="tanggal" id="tanggal" autocomplete="family-name" value="{{(isset($pasaranyar))?$pasaranyar->tanggal:old('tanggal') }}" class="mt-1  @error('tanggal') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('tanggal'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Pangan</label>
                <div class="col-sm-5">
                    <input type="number" name="kode" id="kode" required readonly autocomplete="family-name" value="{{(isset($pasaranyar))?$pasaranyar->kode:old('kode') }}" class="mt-1  @error('kode') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('kode'){{$message}} @enderror</div>
                </div>
            </div><br>


            <div class="form-group row">
                <label for="id_barang" class="col-sm-2 col-form-label">Nama Pangan</label>
                <div class="col-sm-5">
                    <select class="form-control" name="id_barang" id="id_barang" onchange="getCode(this.value)">
                        <option value="{{(isset($pasaranyar))?$pasaranyar->namaBarang->id_barang:old('id_barang') }}">{{ @$pasaranyar ? $pasaranyar->namaBarang->nama : "Pilih Pangan"}}</option>
                        @foreach($barang as $item)
                        <option value="{{$item->id_barang}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label for="nama_langganan" class="col-sm-2 col-form-label">Nama Langganan</label>
                <div class="col-sm-5">
                    <input type="text" name="nama_langganan" id="nama_langganan" autocomplete="family-name" value="{{(isset($pasarbanyuasri))?$pasarbanyuasri->nama_langganan:old('nama_langganan') }}" class="mt-1  @error('nama_langganan') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('nama_langganan'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Pangan</label>
                <div class="col-sm-5">
                    <input type="number" name="harga" id="harga" autocomplete="family-name" value="{{(isset($pasaranyar))?$pasaranyar->harga:old('harga') }}" class="mt-1  @error('harga') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('harga'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="stok" class="col-sm-2 col-form-label">Stok Pangan</label>
                <div class="col-sm-5">
                    <input type="number" name="stok" id="stok" autocomplete="family-name" value="{{(isset($pasaranyar))?$pasaranyar->stok:old('stok') }}" class="mt-1  @error('stok') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('stok'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function getCode(kode) {
        fetch(`/get-code-barang?id=${kode}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('kode').value = data.kode;
            })
            .catch(error => {
                console.error('Error fetching code:', error);
            });
    }
</script>

@endsection