@extends('layouts.dashboard')
@section('content')
    {{ Session::has('message') }}
@section('css')
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
@stop
@php
$foto = 'no_pic.png';
if (!empty($data->foto)) {
    $foto = $data->foto;
}
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Karyawan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Barcode Karyawan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times">
                        </i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <div class="box-body">
                    <div class="row">
                        <div class="card">
                            <img style="border: 3px solid #e1e1e1;width:120px"
                                src="{{ asset('images/profil/' . $foto) }}" alt="image" />
                            <img class="barcode pull-right"
                                src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('produk.show', [$item->id]), 'QRCODE', 4, 4) }}"
                                alt="barcode" />
                            <h1>{{ $data->nama_karyawan }}</h1>
                            <br>
                            <table>
                                <tr>
                                    <td><strong>ID KARYAWAN</strong></td>
                                    <td>{{ $data->kode_nip }}</td>
                                </tr>
                                <tr>
                                    <td><strong>JABATAN</strong></td>
                                    <td>
                                        @if (empty($data->jabatan))
                                            null
                                        @else
                                            {{ $data->jabatan }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>DEPARTEMEN</strong></td>
                                    <td>
                                        @if (empty($data->departemen))
                                            null
                                        @else
                                            {{ $data->departemen }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>CODE AREA</strong></td>
                                    <td>{{ $data->code_area }}</td>
                                </tr>
                            </table>
                            <div class="social">
                                <img width="150px" src="{{ asset(setting('path_logo')) }}" alt="image" />
                            </div>
                            <a href="{{ route('download_barcode', $data->kode_nip) }}" target="_blank" type="button"
                                class="btn btn-success pull-center"><i class="fa fa-download"></i> download</a>
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
@endsection
@section('js')
<script></script>
@stop
