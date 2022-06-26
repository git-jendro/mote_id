@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Pembeli</h1>
            <p class="m-0">List Pembeli</p>
        </div>
        <a href="{{route('pembeli.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Pembeli</a>
    </div>
@endsection

@section('content')
    <!-- DataTales Example -->
    @include('layouts.message')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>No. Telepon</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>No. Telepon</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td> +62{{ $item->phone_num }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="{{route('pembeli.show', [$item->id])}}" class="btn btn-blue btn-sm btn-icon"  data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('pembeli.edit', [$item->id])}}" class="btn btn-cyan btn-sm btn-icon"><i class="fas fa-pen"></i></a>
                                        <button class="btn btn-red btn-sm btn-icon" data-toggle="modal"
                                        data-target="#delete-modal-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                        <button class="btn btn-secondary btn-sm btn-icon" data-toggle="modal"
                                        data-target="#qr-modal-{{ $item->id }}"><i class="fas fa-qrcode"></i></button>
                                    </div>
                                </td>
                                @include(' buyers.delete')
                                @include(' buyers.qr')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Custom styles for this page -->
    <script>
        $(document).ready(function() {
            $('#buyer').addClass('active');
            $('#list-buyer').addClass('active');
            $('#collapseBuyer').toggle();
        });
    </script>

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-admin2/js/demo/datatables-demo.js') }}"></script>
@endsection
