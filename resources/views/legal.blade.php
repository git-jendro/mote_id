@extends('layouts.index')

@section('content')
    @include('layouts.navbar-index')
    <div class="row">
        <div class="d-inline-block d-sm-none my-3">
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
                                        <button type="button" class="btn btn-custome w-100">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </section>
                            <section style="display : none;">
                                <div class="row">
                                    <div class="col-5" style="padding-right: 0px">
                                        <img src="{{ asset('img/logos/logo.jpg') }}" class="w-100" alt=""
                                            id="buyer-ava">
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

                <div class="col-12 mx-5 my-2">
                    <i class="far fa-envelope"></i> <span style="font-size: 18px"> officialmote@gmail.com</span>
                </div>
                <div class="col-12 mx-5 my-2">
                    <i class="fab fa-whatsapp"></i> <span style="font-size: 18px"> 0812-1234-5554</span>
                </div>
                <div class="col-12 mx-5 my-2">
                    <i class="fab fa-instagram"></i> <span style="font-size: 18px">@officialmote</span>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-2 mt-lg-3">
            <div class="container">
                <input type="radio" name="slider" id="item-1" checked>
                <input type="radio" name="slider" id="item-2">
                <input type="radio" name="slider" id="item-3">
                <div class="cards">
                    {{-- <label class="card-l" for="item-1" id="song-1">
                        <img class="img"
                            src="https://images.unsplash.com/photo-1530651788726-1dbf58eeef1f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=882&q=80"
                            alt="song">
                    </label>
                    <label class="card-l" for="item-2" id="song-2">
                        <img class="img"
                            src="https://images.unsplash.com/photo-1559386484-97dfc0e15539?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80"
                            alt="song">
                    </label>
                    <label class="card-l" for="item-3" id="song-3">
                        <img class="img"
                            src="https://images.unsplash.com/photo-1533461502717-83546f485d24?ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                            alt="song">
                    </label> --}}

                    {{-- @foreach ($data as $item)
                        @foreach ($item->image as $val)
                            @if ($val->thumbnail == 1)
                                
                            @endif
                            <label class="card-l" for="item-{{$loop->iteration}}" id="song-1">
                                <img src="{{asset('storage/'.$val->path)}}"
                                    class="img">
                            </label>
                        @endforeach
                    @endforeach --}}
                    @foreach ($data->image as $item)
                        <label class="card-l" for="item-{{ $loop->iteration }}" id="song-{{ $loop->iteration }}">
                            <img src="{{ asset('storage/' . $item->path) }}" class="img">
                        </label>
                        @if ($loop->iteration == 3)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-3 my-5 my-lg-4 d-none d-sm-block">
        <div class="card">
            <div class="card-header text-uppercase text-center">
                Owner
            </div>
            <div class="card-body">
                <div id="result">
                    <section>
                        <p class="card-title" style="font-size:15px !important">Masukan kode transaksi anda untuk
                            melihat owner produk</p>
                        <form action="{{ route('owner.check') }}" method="post">
                            <div class="form-group row mb-0">
                                @csrf
                                <div class="col-8" style="padding-right: 0px">
                                    <input class="form-control h-100" type="text" name="id"
                                        placeholder="Kode transaksi">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-custome w-100 h-100">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-12 mx-5 my-2">
            <i class="far fa-envelope"></i> <span style="font-size: 18px"> officialmote@gmail.com</span>
        </div>
        <div class="col-12 mx-5 my-2">
            <i class="fab fa-whatsapp"></i> <span style="font-size: 18px"> 0812-1234-5554</span>
        </div>
        <div class="col-12 mx-5 my-2">
            <i class="fab fa-instagram"></i> <span style="font-size: 18px">@officialmote</span>
        </div>
    </div>
</div>
@include('layouts.footer-index')
@endsection
<style>
@import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");

/* * {
box-sizing: border-box;
} */

.row {
    width: 100%;
    margin-left: 0px !important;
}

input[type=radio] {
    display: none;
}

.card-l {
    position: absolute !important;
    width: 60%;
    height: 500px;
    left: 0;
    right: 0;
    margin: auto;
    transition: transform .4s ease;
    cursor: pointer;
}

.cards {
    position: relative;
    width: 100%;
    height: 100%;
    margin-bottom: 20px;
}

.img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: cover;
}

#item-1:checked~.cards #song-3,
#item-2:checked~.cards #song-1,
#item-3:checked~.cards #song-2 {
    transform: translatex(-40%) scale(.8);
    opacity: .4;
    z-index: 0;
}

#item-1:checked~.cards #song-2,
#item-2:checked~.cards #song-3,
#item-3:checked~.cards #song-1 {
    transform: translatex(40%) scale(.8);
    opacity: .4;
    z-index: 0;
}

#item-1:checked~.cards #song-1,
#item-2:checked~.cards #song-2,
#item-3:checked~.cards #song-3 {
    transform: translatex(0) scale(1);
    opacity: 1;
    z-index: 1;

    img {
        box-shadow: 0px 0px 5px 0px rgba(81, 81, 81, 0.47);
    }
}

#item-2:checked~.player #test {
    transform: translateY(0);
}

#item-2:checked~.player #test {
    transform: translateY(-40px);
}

#item-3:checked~.player #test {
    transform: translateY(-80px);
}
</style>
<script>
    // $('input').on('change', function() {
    //     $('body').toggleClass('blue');
    // });
</script>
