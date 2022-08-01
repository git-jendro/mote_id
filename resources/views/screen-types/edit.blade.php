<div class="modal fade" id="edit-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Jenis Sablon</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jenis-sablon.update', [$item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control h-100 @error('name-' . $item->id) is-invalid @enderror"
                                type="text" name="name-{{ $item->id }}" value="{{ $item->name }}"
                                placeholder="Jenis Sablon">
                        </div>
                        @error('name-' . $item->id)
                            <div class="mt-2 error invalid-feedback d-block w-100" id="edit-error-{{ $item->id }}">
                                {{ $message }}
                            </div>
                        @enderror
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
