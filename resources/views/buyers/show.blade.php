@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Pembeli</h1>
            <p class="m-0">Detail <strong>{{ $data->name }}</strong></p>
        </div>
        <a href="{{ route('pembeli.edit', [$data->id]) }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i>
            Edit Pembeli</a>
    </div>
@endsection

@section('content')
    <!-- DataTales Example -->
    @include('layouts.message')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $data->name }}</h3>

                    <hr>
                    <h4>No. Telepon</h4>
                    <p>+62 {{$data->phone_num}}</p>
                    <h4>Address</h4>
                    <p>{{$data->address}}</p>
                    <div class="text-center">
                      <img class="barcode pull-right" src="data:image/png;base64,{{DNS2D::getBarcodePNG('URL Product', 'QRCODE', 4, 4)}}" alt="barcode"/>
                    </div>

                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">Barang yang dibeli</h3>
                    <p>
                        {{ $data->product->name }}
                    </p>
                    <div class="col-12">
                        @php
                            $thumb = $data->product->image->where('thumbnail', 1)->first();
                        @endphp
                        <img src="{{ asset('storage/' . $thumb->path) }}" class="product-image" alt="{{ $data->name }}">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="row">
                            @foreach ($data->product->image as $item)
                                <div class="col-4">
                                    <div class="product-image-thumb w-100"><img
                                            src="{{ asset('storage/' . $item->path) }}" alt="{{ $data->name }}"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Carousel -->
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
        $(document).ready(function() {
            $('#buyer').addClass('active');
            $('#collapseBuyer').toggle();
        });
    </script>
@endsection
