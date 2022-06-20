<div class="modal fade" id="delete-modal-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingi mengahapus gambar ini ?
                <div class="text-center mt-2">
                    <img class="img-fluid" src="{{ asset('storage/' . $item->path) }}" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" type="button" data-dismiss="modal">
                    Tidak
                </button>
                <button type="button" class="btn btn-danger delete-img-{{ $item->id }}" style="width: 66px">
                    Ya
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.delete-img-<?php echo $item->id; ?>').click(function(e) {
        e.preventDefault();
        var id = '<?php echo $item->id; ?>';
        var name = $('.img-'+id).attr('src');
        var _token = $('[name="_token"]').val();
        $.ajax({
            type: "post",
            url: "/api/dashboard/produk/delete-image",
            data: {
                id: id,
                name:name,
            },
            success: AjaxSucceeded,
            error: AjaxFailed

        });

        function AjaxSucceeded(response) {
            if (response == 200) {
                $("#delete-modal-" + id).modal('toggle');
                $('.modal-backdrop').remove();
                $(".id-" + id).remove();
                alert('Data berhasil dihapus !');
            } else {
                alert("Maaf terjadi kesalahan");
                $("#delete-modal-" + id).modal('toggle');
                $('.modal-backdrop').remove();
            }
        }

        function AjaxFailed(response) {
            $("#delete-modal-" + id).modal('toggle');
            alert("Maaf terjadi kesalahan");
            $('.modal-backdrop').remove();
        }
    });
</script>
