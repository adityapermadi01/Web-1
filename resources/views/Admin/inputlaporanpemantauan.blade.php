@extends('layouts.template')
@section('slot')
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    {{$title}}
</h2>
<div class="px-6 py-4 bg-white rounded shadow sm:px-2 sm:py-1 sm:br-gray-100">
    <div class="container">
        <form action="{{(isset($laporanpemantauan))?route('laporanpemantauan.update',$laporanpemantauan->id_laporan):route('laporanpemantauan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($laporanpemantauan))
            @method('PUT')
            @endif
            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Pangan</label>
                <div class="col-sm-5">
                    <input type="number" name="kode" id="kode" required readonly autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->kode:old('kode') }}" class="mt-1  @error('kode') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('kode'){{$message}} @enderror</div>
                </div>
            </div><br>


            <div class="form-group row">
                <label for="id_barang" class="col-sm-2 col-form-label">Nama Pangan</label>
                <div class="col-sm-5">
                    <select class="form-control" name="id_barang" id="id_barang" onchange="getCode(this.value)">
                        <option value="{{(isset($laporanpemantauan))?$laporanpemantauan->namaBarang->id_barang:old('id_barang') }}">{{ @$laporanpemantauan ? $laporanpemantauan->namaBarang->nama : "Pilih Pangan"}}</option>
                        @foreach($barang as $item)
                        <option value="{{$item->id_barang}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label for="bulan1" class="col-sm-2 col-form-label">Bulan Januari</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan1" id="bulan1" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan1:old('bulan1') }}" class="mt-1  @error('bulan1') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan1'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan2" class="col-sm-2 col-form-label">Bulan Februari</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan2" id="bulan2" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan2:old('bulan2') }}" class="mt-1  @error('bulan2') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan2'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan3" class="col-sm-2 col-form-label">Bulan Maret</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan3" id="bulan3" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan3:old('bulan3') }}" class="mt-1  @error('bulan3') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan3'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan4" class="col-sm-2 col-form-label">Bulan April</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan4" id="bulan4" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan4:old('bulan4') }}" class="mt-1  @error('bulan4') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan4'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan5" class="col-sm-2 col-form-label">Bulan Mei</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan5" id="bulan5" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan5:old('bulan5') }}" class="mt-1  @error('bulan5') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan5'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan6" class="col-sm-2 col-form-label">Bulan Juni</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan6" id="bulan6" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan6:old('bulan6') }}" class="mt-1  @error('bulan6') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan6'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan7" class="col-sm-2 col-form-label">Bulan Juli</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan7" id="bulan7" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan7:old('bulan7') }}" class="mt-1  @error('bulan7') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan7'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan8" class="col-sm-2 col-form-label">Bulan Agustus</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan8" id="bulan8" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan8:old('bulan8') }}" class="mt-1  @error('bulan8') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan8'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan9" class="col-sm-2 col-form-label">Bulan September</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan9" id="bulan9" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan9:old('bulan9') }}" class="mt-1  @error('bulan9') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan9'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan10" class="col-sm-2 col-form-label">Bulan Oktober</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan10" id="bulan10" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan10:old('bulan10') }}" class="mt-1  @error('bulan10') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan10'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan11" class="col-sm-2 col-form-label">Bulan November</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan11" id="bulan11" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan1:old('bulan11') }}" class="mt-1  @error('bulan11') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan11'){{$message}} @enderror</div>
                </div>
            </div><br>

            <div class="form-group row">
                <label for="bulan12" class="col-sm-2 col-form-label">Bulan Desember</label>
                <div class="col-sm-5">
                    <input type="number" name="bulan12" id="bulan12" autocomplete="family-name" value="{{(isset($laporanpemantauan))?$laporanpemantauan->bulan1:old('bulan12') }}" class="mt-1  @error('bulan12') border-red-500 @enderror  form-control">
                    <div class="text-xs text-red-600">@error('bulan12'){{$message}} @enderror</div>
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