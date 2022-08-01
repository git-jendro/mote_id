@extends('layouts.index')

@section('content')
    @include('layouts.navbar-index')

    <div class="container mt-4">
        <div class="row">
            <div class="d-inline-block d-sm-none">
                <div class="col-lg-2 px-0">
                    <div class="card">
                        <div class="card-header text-uppercase text-center">
                            Owner
                        </div>
                        <div class="card-body">
                            <div id="result">
                                <section>
                                    <p class="card-title" style="font-size:15px !important">Masukan kode transaksi anda untuk
                                        melihat owner produk</p>
                                    @csrf
                                    <div class="form-group row mb-0">
                                        <div class="col-8" style="padding-right: 0px">
                                            <input class="form-control h-100" type="text" name="id"
                                                placeholder="Kode transaksi">
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-custome w-100 h-100">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                                <section style="display : none;">
                                    <div class="row">
                                        <div class="col-5" style="padding-right: 0px">
                                            <img src="{{ asset('img/logos/logo.jpg') }}" class="w-100" alt="" id="buyer-ava">
                                        </div>
                                        <div class="col-7">
                                            <h5>
                                                <strong id="buyer-name">
                                                    Contoh Nama
                                                </strong>
                                            </h5>
                                        </div>
                                    </div>
                                    <hr style="border: 2px solid #15171a !important; opacity: 1">
                                    <p class="text-justify" style="font-size:14px !important">
                                        Selamat! Barang anda adalah produksi pertama dari artikel Be What You Want
                                    </p>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0 mb-5">
                <div class="row">
                    <div class="col-9">

                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-interval="false">
                            <div class="carousel-inner">
                                @foreach ($data->product->image as $key => $item)
                                    <div class="carousel-item {{ $item->thumbnail == 1 ? ' active' : '' }}">
                                        <img src="{{ asset('storage/' . $item->path) }}" class="d-block w-100"
                                            alt="Gambar-{{ $key }}-{{ $data->name }}">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        @foreach ($data->product->image as $key => $item)
                            <button type="button" class="btn btn-link {{ $item->thumbnail == 1 ? 'active' : '' }}"
                                data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}"
                                {{ $item->thumbnail == 1 ? 'aria-current="true"' : '' }}>
                                <img src="{{ asset('storage/' . $item->path) }}" class="d-block w-100"
                                    alt="Gambar-{{ $key }}-{{ $data->name }}">
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="text-uppercase text-center"><strong>{{$data->name}}</strong></h2>
                <ul class="nav nav-tabs d-flex justify-content-between" id="myTab">
                    <li class="nav-item">
                        <a href="#detail" class="nav-link active" data-bs-toggle="tab">Product Detail</a>
                    </li>
                    <li class="nav-item">
                        <a href="#design" class="nav-link" data-bs-toggle="tab">Design Meaning</a>
                    </li>
                </ul>
                <div class="tab-content mb-5 pb-3">
                    <div class="tab-pane fade show active " id="detail">
                        <h4 class="mt-2">Product Detail</h4>
                        <ul style="padding-left: 1rem;">
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Kode
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->id }}

                                    </div>
                                </div>
                            </li>
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Warna
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->color->name }}

                                    </div>
                                </div>
                            </li>
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Bahan
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->material->name }}
                                    </div>
                                </div>
                            </li>
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Jenis Sablon
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->screen->name }}
                                    </div>
                                </div>
                            </li>
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Ukuran
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->size->name }}
                                    </div>
                                </div>
                            </li>
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Lebar
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->size->width }}
                                    </div>
                                </div>
                            </li>
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-5 text-uppercase">
                                        Tinggi
                                    </div>
                                    <div class="col-7" id="color">
                                        :
                                        {{ $data->product->size->height }}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="design">
                        <h4 class="mt-2">Design Meaning</h4>
                        <p>{!! $data->product->design_meaning !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 my-5 my-lg-0 px-0 d-none d-sm-block">
                <div class="card">
                    <div class="card-header text-uppercase text-center">
                        Owner
                    </div>
                    <div class="card-body">
                        <div id="result">
                            <section>
                                <div class="row">
                                    <div class="col-5" style="padding-right: 0px">
                                        <img src="{{ $data->ava != null ? asset('storage/'.$data->ava) : asset('/img/profile/undraw_profile.svg')}}" class="w-100" alt="" id="buyer-ava">
                                    </div>
                                    <div class="col-7">
                                        <h5>
                                            <strong id="buyer-name">
                                                {{$data->name}}
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                                <hr style="border: 2px solid #15171a !important; opacity: 1">
                                <p class="text-justify" style="font-size:14px !important">
                                    Selamat! Barang anda adalah produksi pertama dari artikel Be What You Want
                                </p>
                            </section>
                            <section style="display : none;">
                                <div class="row">
                                    <div class="col-5" style="padding-right: 0px">
                                        <img src="{{ asset('img/logos/logo.jpg') }}" class="w-100" alt="" id="buyer-ava">
                                    </div>
                                    <div class="col-7">
                                        <h5>
                                            <strong id="buyer-name">
                                                Contoh Nama
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                                <hr style="border: 2px solid #15171a !important; opacity: 1">
                                <p class="text-justify" style="font-size:14px !important">
                                    Selamat! Barang anda adalah produksi pertama dari artikel Be What You Want
                                </p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('layouts.footer-index')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: false,
            });
        });
        $('.btn-custome').click(function (e) { 
            e.preventDefault();
            var product_id = '<?php echo $data->id; ?>';
            var buyer_id = $('input[name=id]').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                type: "post",
                url: "/api/search/produk",
                data: {
                    _token : _token,
                    product_id : product_id,
                    buyer_id : buyer_id,
                },
                dataType: "json",
                success: function (response) {
                    if (response) {
                        $("#buyer-name").html(response.name);
                        $("#result section").toggle();
                    } else {
                        
                    }
                }
            });
        });
    </script>
@endsection
