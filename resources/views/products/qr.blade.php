<div class="modal fade" id="qr-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Barcode Prduk {{ $item->name }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="barcode pull-right"
                    src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('legal.product', [$item->slug]), 'QRCODE', 4, 4) }}"
                    alt="barcode" />
            </div>
            <div class="modal-footer">
                <a href="{{route('produk.qr-download', [$item->id])}}"class="btn btn-primary" style="width: auto;">
                    Download
                </a>
                <button type="button" class="btn btn-light" type="button" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
