<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Ukuran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" action="{{ route('ukuran.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="input-group">
                                <input class="form-control h-100 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}" placeholder="Nama Ukuran">
                            </div>
                            @error('name')
                                <div class="mt-2 error invalid-feedback d-block w-100" id="create-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input class="form-control h-100 @error('initial') is-invalid @enderror" type="text"
                                    name="initial" value="{{ old('initial') }}" placeholder="Inisial Ukuran">
                                </div>
                                <sub>*Contoh : S, M, L, XL</sub>
                            @error('initial')
                                <div class="mt-2 error invalid-feedback d-block w-100" id="create-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" type="button" data-dismiss="modal">
                    Tidak
                </button>
                <button type="submit" class="btn btn-primary btn-user btn-block" style="width: 66px">
                    Submit
                </button>
                </form>
            </div>
        </div>
    </div>
</div>