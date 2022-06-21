@extends('layouts.dashboard')
@section('page.heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
            <p class="m-0">Detail <strong>{{ $data->name }}</strong></p>
        </div>
        <a href="{{ route('produk.edit', [$data->id]) }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i>
            Edit Produk</a>
    </div>
@endsection

@section('content')
    <!-- DataTales Example -->
    @include('layouts.message')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{$data->name}}</h3>
                    <div class="col-12">
                        @php
                            $thumb = $data->image->where('thumbnail', 1)->first();
                        @endphp
                        <img src="{{ asset('storage/'.$thumb->path) }}" class="product-image" alt="{{$data->name}}">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="row">
                            @foreach ($data->image as $item)
                        <div class="col-4">
                            <div class="product-image-thumb w-100"><img src="{{ asset('storage/'.$item->path) }}"
                                alt="{{$data->name}}"></div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$data->name}}</h3>
                    <p>
                      {{$data->desc}}
                    </p>
      
                    <hr>
                    <h4>Warna yang tersedia</h4>
                    <div class="row">
                      @foreach ($data->color as $item)
                      <div class="col-3">
                        <label class="active">
                          {{$item->color->name}}
                        </label>
                      </div>
                      @endforeach
                    </div>
      
                    <h4 class="mt-3">Ukuran</h4>
                    <div>
                      @foreach ($data->size as $item)
                      <label class="btn btn-default">
                        <span class="text-xl">{{$item->size->initial}}</span>
                        <br>
                        {{$item->size->name}}
                      </label>
                      @endforeach
                    </div>
      
                    <div class="bg-gray py-2 px-3 mt-4">
                      <h2 class="mb-0">
                        Rp. {{number_format($data->price,0)}}
                      </h2>
                      <h4 class="mt-0">
                        <small>Stock produk : {{$data->qty}} </small>
                      </h4>
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
            $('#product').addClass('active');
            $('#collapseProduct').toggle();
        });
    </script>
@endsection
