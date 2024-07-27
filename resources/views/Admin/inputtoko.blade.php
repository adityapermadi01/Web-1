@extends('layouts.template')
@section('slot')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{$title}}
</h2>
<div class="shadow px-6 py-4 bg-white rounded sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="container">
        <form action="{{(isset($toko))?route('toko.update',$toko->id_toko):route('toko.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($toko))
            @method('PUT')
            @endif

            <div class="form-group row">
                <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                <div class="col-sm-5">
                    <input type="text" name="nama_toko" id="nama_toko" autocomplete="family-name" value="{{(isset($toko))?$toko->nama_toko:old('nama_toko') }}" class="mt-1  @error('nama_toko') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('nama_toko'){{$message}} @enderror</div>
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