<div class="modal fade" id="qr-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="barcode pull-right" src="data:image/png;base64,{{DNS2D::getBarcodePNG('URL Product', 'QRCODE', 4, 4)}}" alt="barcode"/>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
