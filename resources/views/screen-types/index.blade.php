@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Jenis Sablon</h1>
            <p class="m-0">List Jenis Sablon</p>
        </div>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#create-modal">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Jenis Sablon
        </button>
        @include('screen-types.create')
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
                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
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
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-cyan btn-sm btn-icon" data-toggle="modal"
                                            data-target="#edit-modal-{{ $item->id }}"><i class="fas fa-pen"></i></button>
                                        <button class="btn btn-red btn-sm btn-icon" data-toggle="modal"
                                            data-target="#delete-modal-{{ $item->id }}"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                    @include('screen-types.edit')
                                    @include('screen-types.delete')
                                </td>
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
            $('#master').addClass('active');
            $('#list-screen-type').addClass('active');
            $('#collapseMaster').toggle();
        });
        $(document).ready(function() {
            if ($('#create-error').length) {
                $('#create-modal').modal('show');
            }
            return false;
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
