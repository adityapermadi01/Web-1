<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Detail Pemantauan Pasar Banyuasri</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b> Detail Pemantauan Pasar Banyuasri</p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th class="text-center col">No</th>
                <th class="text-center col">Tanggal</th>
                <th class="text-center col">Kode Pangan</th>
                <th class="text-center col">Nama Pangan</th>
                <th class="text-center col">Nama Langganan</th>
                <th class="text-center col">Harga Pangan </th>
                <th class="text-center col">Stok</th>
            </tr>
            @foreach ($banyuasricetak as $item)
            <tr>
                <td align="center">{{$loop->iteration}}</td>
                <td align="center">{{$item->tanggal}}</td>
                <td align="center">{{$item->kode}}</td>
                <td align="center">{{@$item->namaBarang->nama}}</td>
                <td align="center">{{$item->nama_langganan}}</td>
                <td align="center">@currency($item->harga)</td>
                <td align="center">{{$item->stok}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>