<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mote Indonesia">

    <title>{{ config('app.name') }}</title>

    <meta name="description" content="We Serve Quality. Not Quantity">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Mote Indonesia">
    <meta itemprop="description" content="We Serve Quality. Not Quantity">
    <meta itemprop="image" content="{{ asset('img/logos/logo.png') }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.mote.co.id">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mote Indonesia">
    <meta property="og:description" content="We Serve Quality. Not Quantity">
    <meta property="og:image" content="{{ asset('img/logos/logo.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mote Indonesia">
    <meta name="twitter:description" content="We Serve Quality. Not Quantity">
    <meta name="twitter:image" content="{{ asset('img/logos/logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.ico') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb-admin2/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('sb-admin2/css/custome.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <style>
        .card {
            box-shadow: 0 5px 5px 5px #e1e1e1;
            max-width: 350px;
            padding: 15px;
            border-radius: 2px;
            margin: auto;
            text-align: center;
        }

        img .barcode {
            width: 50%;
            border: 3px solid #e1e1e1;
        }

        .social {
            margin: 15px 0;
        }

        table,
        table tr td {
            width: 290px;
            margin: 0 auto;
            padding: auto;
            border: 3px solid #e1e1e1;
            text-align: left;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }
    </style>
</head>

<body id="page-top">
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="modal-body">
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <div class="card">
                                <img class="barcode pull-right"
                                    src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('legal.product', [$data->slug]), 'QRCODE', 4, 4) }}"
                                    alt="barcode" />
                                <h1>{{ $data->nama_karyawan }}</h1>
                                <br>
                                <table>
                                    <tr>
                                        <td><strong>Nama Produk</strong></td>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Harga</strong></td>
                                        <td>
                                            Rp. {{ number_format($data->price) }}
                                        </td>
                                    </tr>
                                </table>
                                <div class="social">
                                    <img width="150px" class="rounded" src="{{ asset('img/logos/logo.jpg') }}"
                                        alt="image" />
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->

            </div>
            <!-- /.content-wrapper -->
        </section>
        <!-- /.content -->
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin2/js/sb-admin-2.js') }}"></script>
    <script>
        $(document).ready(function() {
            document.title='Barcode <?php echo $data->name; ?>'; 
            window.print(); 
            return false;
        });
    </script>
</body>

</html>
