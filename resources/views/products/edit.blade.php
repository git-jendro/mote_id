@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
            <p class="m-0">Edit <strong>{{ $data->name }}</strong></p>
        </div>
    </div>
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" action="{{ route('produk.update', [$data->id]) }}" method="post"
                enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control h-100 @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ $data->name }}" placeholder="Nama Produk">
                    </div>
                    @error('name')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="input-group">
                            <input
                                class="form-control h-100 @error('qty') is-invalid @enderror @error('l_qty') is-invalid @enderror"
                                type="text" name="qty" value="{{ $data->qty }}" placeholder="Jumlah Stock" maxlength="5">
                        </div>
                        @error('qty')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('l_qty')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group input-group-joined mb-4">
                                <span class="input-group-text text-muted">Rp</span>
                                <input
                                    class="form-control h-100 @error('price') is-invalid @enderror @error('l_price') is-invalid @enderror"
                                    type="text" name="price" value="{{ number_format($data->price, 0) }}"
                                    placeholder="Harga Barang" maxlength="14">
                            </div>
                        </div>
                        @error('price')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('l_price')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" placeholder="Deskripsi Produk"
                            id="" cols="30" rows="10">{{ $data->desc }}</textarea>
                    </div>
                    @error('desc')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <p>
                        Klik gambar untuk menghapus !
                    </p>
                    <div class="row old-img mb-5">
                        @foreach ($data->image as $item)
                            <div class="ct-img id-{{ $item->id }} my-1">
                                <img id="old-img" class="img-{{ $item->id }}"
                                    src="{{ asset('storage/' . $item->path) }}" class="my-1" style="{{$item->thumbnail > 0 ? 'border: 5px solid rgb(0, 159, 252);' : ''}}"/>
                                <div class="overlay">
                                    <button type="button" class="btn btn-link icon" data-toggle="modal"
                                        data-target="#delete-modal-{{ $item->id }}">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>
                                @include('products.delete-img')
                            </div>
                        @endforeach
                    </div>
                    <p id="sub">
                        @error('thumbnail')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                    </p>
                    <div class="row prev-img mb-2">

                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('path') is-invalid @enderror" id="file"
                            name="path[]" multiple>
                        <label class="custom-file-label text-muted" for="file">Choose file</label>
                    </div>
                    <input type="hidden" name="thumbnail" id="answer" />
                    @error('path')
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
@section('js')
    <!-- Custom styles for this page -->
    <script>
        $(document).ready(function() {
            $('#product').addClass('active');
            $('#add-product').addClass('active');
            $('#collapseProduct').toggle();
        });

        $(document).ready(function() {
            //apply on typing and focus
            $('input[name=qty]').keyup(function() {
                $(this).val($(this).val().replace(/\D/, ''));
            });
            $('input[name=price]').keyup(function() {
                $(this).removeAlpha();
            });
            $('input[name=price]').on('blur', function() {
                $(this).manageCommas();
            });
        });

        String.prototype.addComma = function() {
            return this.replace(/(.)(?=(.{3})+$)/g, "$1,").replace(',.', '.');
        }
        //Jquery global extension method
        $.fn.manageCommas = function() {
            return this.each(function() {
                $(this).val($(this).val().replace(/(,|)/g, '').addComma());
            });
        }
        $.fn.removeAlpha = function() {
            return this.each(function() {
                $(this).val($(this).val().replace(/[^\d.-]/g, '').addComma());
            });
        }

        var inputLocalFont = document.getElementById("file");
        inputLocalFont.addEventListener("change", previewImages, false);

        function previewImages() {
            $('.prev-img').html('');
            $('#answer').val();
            $('#sub').html('Klik gambar untuk menjadikan thumbnail');
            var fileList = this.files;
            var anyWindow = window.URL || window.webkitURL;
            for (var i = 0; i <= fileList.length; i++) {
                var objectUrl = anyWindow.createObjectURL(fileList[i]);
                $('.prev-img').append('<img src="' + objectUrl + '" class="my-1" />');
                window.URL.revokeObjectURL(fileList[i]);
            }
        }

        $('.prev-img').on('click', 'img', function() {
            var images = $('.prev-img img').removeClass('selected'),
                img = $(this).addClass('selected');
            $('#answer').val(images.index(img));
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
