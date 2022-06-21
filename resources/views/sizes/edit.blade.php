<div class="modal fade" id="edit-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Warna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ukuran.update', [$item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="input-group">
                                <input class="form-control h-100 @error('name-' . $item->id) is-invalid @enderror"
                                    type="text" name="name-{{ $item->id }}"
                                    value="{{ $item->name }}" placeholder="Nama Ukuran">
                            </div>
                            @error('name-' . $item->id)
                                <div class="mt-2 error invalid-feedback d-block w-100" id="edit-error-{{ $item->id }}">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input class="form-control h-100 @error('initial-' . $item->id) is-invalid @enderror"
                                    type="text" name="initial-{{ $item->id }}"
                                    value="{{ $item->initial }}" placeholder="Inisial Ukuran">
                            </div>
                            <sub>*Contoh : S, M, L, XL</sub>
                            @error('initial-' . $item->id)
                                <div class="mt-2 error invalid-feedback d-block w-100" id="edit-error-{{ $item->id }}">
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

<script>
    $(document).ready(function() {
        if ($('#edit-error-<?php echo $item->id; ?>').length) {
            $('#edit-modal-<?php echo $item->id; ?>').modal('show');
        }
        return false;
    });
</script>
