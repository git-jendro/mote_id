@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
            <p class="m-0">Tambah Produk</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control h-100 @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" placeholder="Nama Produk">
                    </div>
                    @error('name')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row mb-lg-3 mb-0">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="input-group">
                            <input
                                class="form-control h-100 @error('qty') is-invalid @enderror @error('l_qty') is-invalid @enderror"
                                type="text" name="qty" value="{{ old('qty') }}" placeholder="Jumlah Stock" maxlength="5">
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
                        <div class="input-group input-group-joined">
                            <span class="input-group-text text-muted">Rp</span>
                            <input
                                class="form-control h-100 @error('price') is-invalid @enderror @error('l_price') is-invalid @enderror"
                                type="text" name="price" value="{{ old('price') }}" placeholder="Harga Barang" maxlength="14">
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
                <div class="form-group row mb-0">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-check-label mb-2">Pilih Warna</label>
                        <div class="row pl-4 mb-lg-3">
                            @foreach ($color as $item)
                            <div class="col-3">
                                <input class="form-check-input @error('color_id') is-invalid @enderror" type="checkbox" value="{{$item->id}}" name="color_id[]">
                                <label class="form-check-label">{{$item->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('color_id')
                            <div class="my-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label class="form-check-label mb-2">Pilih Ukuran</label>
                        <div class="row pl-4 mb-lg-3">
                            @foreach ($size as $item)
                            <div class="col-3">
                                <input class="form-check-input @error('size_id') is-invalid @enderror" type="checkbox" value="{{$item->id}}" name="size_id[]">
                                <label class="form-check-label">{{$item->initial}} ({{$item->name}})</label>
                            </div>
                            @endforeach
                        </div>
                        @error('size_id')
                            <div class="my-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" placeholder="Deskripsi Produk"
                            id="" cols="30" rows="10">{{ old('desc') }}</textarea>
                    </div>
                    @error('desc')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
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
                        <input type="file" class="custom-file-input h-100 @error('path') is-invalid @enderror @error('path.*') is-invalid @enderror"
                            id="file" name="path[]" multiple>
                        <label class="custom-file-label text-muted" for="file">Choose file</label>
                    </div>
                    <input type="hidden" name="thumbnail" id="answer" />
                    @error('path')
                        <div class="mt-2 error invalid-feedback d-block w-100">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('path.*')
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
    .prev-img {
        display: flex;
    }

    .prev-img img {
        width: 250px;
        height: 200px;
        object-fit: cover;
    }

    .selected {
        border: 5px solid rgb(0, 159, 252);
    }
    #sub {
        margin-bottom: 0.2rem;
    }
</style>
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
            $('p').html('Klik gambar untuk menjadikan thumbnail');
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
@endsection
