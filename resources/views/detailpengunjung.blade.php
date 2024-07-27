<!DOCTYPE html>
<!--
	Cosmix by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pemantauan Pasar</title>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <!--Stylesheets-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--Responsive-->
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <!--Animation-->
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <!--Prettyphoto-->
    <link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css">
    <!--Font-Awesome-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <!--Owl-Slider-->
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.transitions.css">
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
  [endif]-->
</head>

<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
    <!--Preloader-->
    <div id="preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
    <!--Navigation-->
    <header id="menu">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="#menu"><img src="" alt=""></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="menu-kanan" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav ">
                            <li class="active"><a class="scroll" href="/">Home</a></li>
                            <li><a class="scroll" href="/">Sejarah</a></li>
                            <li><a class="scroll" href="/">Visi&Misi</a></li>
                            <li><a class="scroll" href="/">Portfolio</a></li>
                            <li><a class="scroll" href="#">Detail Pemantauan</a></li>
                            <li><a class="scroll" href="/">Contact</a></li>s
                            <li><a class="scroll" href="/login">Login</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </header></br><br><br><br>

    <div class="container">
        <div class="section">
            <h3 class='text-center'>DATA PEMANTAUAN PASAR BANYUASRI</h3>
        </div>
    </div><br>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-2 sm:py-1 sm:br-gray-100">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center col">No</th>
                            <th class="text-center col">Tanggal</th>
                            <th class="text-center col">Kode Pangan</th>
                            <th class="text-center col">Nama Pangan</th>
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
                            <td class='text-center'>@currency($item->harga)</td>
                            <td class='text-center'>{{$item->stok}}</td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $pasarbanyuasri->links() }}
            </div>
            @include('sweetalert::alert')
        </div>
    </div><br>

    <div class="container">
        <div class="section">
            <h3 class='text-center'>DATA PEMANTAUAN PASAR ANYAR</h3>
        </div>
    </div><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center col">No</th>
                        <th class="text-center col">Tanggal</th>
                        <th class="text-center col">Kode Pangan</th>
                        <th class="text-center col">Nama Pangan</th>
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



    <!--Features-Section-Start-->
    <!--Jquery-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!--Boostrap-Jquery-->
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!--Preetyphoto-Jquery-->
    <script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>
    <!--NiceScroll-Jquery-->
    <script type="text/javascript" src="../js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="../js/waypoints.min.js"></script>
    <!--Isotopes-->
    <script type="text/javascript" src="../js/jquery.isotope.js"></script>
    <!--Wow-Jquery-->
    <script type="text/javascript" src="../js/wow.js"></script>
    <!--Count-Jquey-->
    <script type="text/javascript" src="../js/jquery.countTo.js"></script>
    <script type="text/javascript" src="../js/jquery.inview.min.js"></script>
    <!--Owl-Crousels-Jqury-->
    <script type="text/javascript" src="../js/owl.carousel.js"></script>
    <!--Main-Scripts-->
    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->