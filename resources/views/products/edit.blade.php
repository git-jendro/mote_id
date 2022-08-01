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
                <div class="form-group row mb-lg-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="input-group">
                            <input class="form-control h-100 @error('id') is-invalid @enderror" type="text" name="id"
                                value="{{ $data->id }}" placeholder="Kode Produk">
                        </div>
                        @error('id')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
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
                </div>
                <div class="form-group row mb-lg-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="input-group">
                            <select class="form-control py-0 @error('color_id') is-invalid @enderror" id="select1"
                                name="color_id">
                                @foreach ($color as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $data->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('color_id')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select class="form-control py-0 @error('material_id') is-invalid @enderror" id="select2"
                                name="material_id">
                                @foreach ($material as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $data->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('material_id')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-lg-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="input-group">
                            <select class="form-control py-0 @error('screen_type_id') is-invalid @enderror" id="select3"
                                name="screen_type_id">
                                @foreach ($screen as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $data->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('screen_type_id')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select class="form-control py-0 @error('size_id') is-invalid @enderror" id="select4"
                                name="size_id">
                                @foreach ($size as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $data->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('size_id')
                            <div class="mt-2 error invalid-feedback d-block w-100">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <textarea class="form-control @error('design_meaning') is-invalid @enderror" name="design_meaning"
                            placeholder="Deskripsi Produk" id="design_meaning" cols="30" rows="10">{!! $data->design_meaning !!}</textarea>
                    </div>
                    @error('design_meaning')
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
    <!-- Custom styles for this page -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Custom styles for this page -->
    <script>
        $(document).ready(function() {
            $('#product').addClass('active');
            // $('#add-product').addClass('active');
            $('#collapseProduct').toggle();
            $('#design_meaning').summernote({
                placeholder: 'Design Meaning',
                tabsize: 2,
                height: 300,
                width: 2000,
            });
            for (let i = 1; i <= 4; i++) {
                $('#select' + i).select2();
            }
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
@endsection
