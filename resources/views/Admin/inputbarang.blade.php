@extends('layouts.template')
@section('slot')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{$title}}
</h2>
<div class="shadow px-6 py-4 bg-white rounded sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="container">
        <form action="{{(isset($barang))?route('databarang.update',$barang->id_barang):route('databarang.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($barang))
            @method('PUT')
            @endif
            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Pangan</label>
                <div class="col-sm-5">
                    <input type="number" name="kode" id="kode" autocomplete="family-name" value="{{(isset($barang))?$barang->kode:old('kode') }}" class="mt-1  @error('kode') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('kode'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pangan</label>
                <div class="col-sm-5">
                    <input type="text" name="nama" id="nama" autocomplete="family-name" value="{{(isset($barang))?$barang->nama:old('nama') }}" class="mt-1  @error('nama') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('nama'){{$message}} @enderror</div>
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
@endsection