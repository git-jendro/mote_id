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
                <form class="user" action="{{ route('ukuran.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
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
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="input-group input-group-joined">
                                <input
                                    class="form-control h-100 @error('width') is-invalid @enderror @error('l_width') is-invalid @enderror"
                                    type="text" name="width" value="{{ old('width') }}"
                                    placeholder="Lebar Ukuran" maxlength="4">
                                <span class="input-group-text text-muted">cm</span>
                            </div>
                            @error('width')
                                <div class="mt-2 error invalid-feedback d-block w-100" id="create-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('l_width')
                                <div class="mt-2 error invalid-feedback d-block w-100" id="create-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group input-group-joined">
                                <input
                                    class="form-control h-100 @error('height') is-invalid @enderror @error('l_height') is-invalid @enderror"
                                    type="text" name="height" value="{{ old('height') }}"
                                    placeholder="Tinggi Ukuran" maxlength="4">
                                <span class="input-group-text text-muted">cm</span>
                            </div>
                            @error('height')
                                <div class="mt-2 error invalid-feedback d-block w-100" id="create-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('l_height')
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
