@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Pembeli</h1>
            <p class="m-0">Tambah Pembeli</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" action="{{ route('pembeli.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control h-100 @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" placeholder="Nama Pembeli">
                    </div>
                    @error('name')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row mb-3 mb-0">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="input-group">
                            <select class="form-control @error('product_id') is-invalid @enderror" id="select2"
                                name="product_id">
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('product_id')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group input-group-joined">
                            <span class="input-group-text text-muted">+62</span>
                            <input class="form-control h-100 @error('phone_num') is-invalid @enderror @error('l_phone_num') is-invalid @enderror" type="text"
                                name="phone_num" value="{{ old('phone_num') }}" placeholder="Nomor Telepon"
                                maxlength="13">
                        </div>
                        @error('l_phone_num')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('phone_num')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Alamat Pembeli"
                            id="" cols="30" rows="10">{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #69707a !important;
    }

    .select2-selection--single {
        border: 1px solid #c5ccd6 !important;
        border-radius: 0.35rem !important;
    }

    .select2 {
        height: 47px !important;
    }

    .select2-selection {
        height: 47px !important;
        width: 100%;
    }

    .select2-selection__arrow {
        margin-top: 0.5rem;
    }

    .select2-selection__rendered {
        padding-top: 0.5rem;
        padding-left: 18px !important;
    }
</style>
@section('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Custom styles for this page -->
    <script>
        $(document).ready(function() {
            $('#buyer').addClass('active');
            $('#add-buyer').addClass('active');
            $('#collapseBuyer').toggle();
            $('#select2').select2();
        });
        $('input[name=phone_num]').keyup(function() {
            $(this).val($(this).val().replace(/\D/, ''));
        });
    </script>
@endsection
