@extends('layouts.index')

@section('content')
    <section class="banner">
        <div class="container">
            <div class="col-12 pt-3">
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 mt-3 mb-5 px-0 text-center">
                        <img src="{{asset('assets/img/logos/logo.png')}}" class="logo" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-7 my-3 mx-auto">
                        <a href="https://linktr.ee/mote.id" target="_blank" rel="noopener noreferrer">

                            <div class="card-banner">
                                <div class="card-body text-center">
                                    <img src="{{asset('assets/img/items/phone.png')}}" alt="" class="card-img rounded-5">
                                    <div class="card-img-overlay d-flex flex-column rounded-5"
                                        style="background-color: rgb(27, 24, 24, 0.5);">
                                        <p class="mt-auto card-text text-center"><i>CUSTOMER SERVICE</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-7 my-3 mx-auto">
                        <div class="card-banner">
                            <div class="card-body">
                                <img src="{{asset('assets/img/items/check.png')}}" alt="" class="card-img rounded-5">
                                <div class="card-img-overlay d-flex flex-column rounded-5"
                                    style="background-color: rgb(27, 24, 24, 0.5);" id="legit">
                                    <p class="mt-auto card-text text-center"><i>LEGIT CHECK</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-7 my-3 mx-auto">
                        <div class="card-banner">
                            <div class="card-body">
                                <img src="{{asset('assets/img/items/catalogue.png')}}" alt="" class="card-img rounded-5">
                                <div class="card-img-overlay d-flex flex-column rounded-5"
                                    style="background-color: rgb(27, 24, 24, 0.5);">
                                    <p class="mt-auto card-text text-center"><i>CATALOGUE</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-4 text-center my-3">
                        <h4 class="text-white">
                            <i>
                                We Serve Quality. Not Quantity
                            </i>
                        </h4>
                        <hr style="color: rgb(255, 255, 255); border-radius: 2;" size="3">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="qrModalLabel">Scan QR Code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div id="reader"></div>
                            <div id="qr-reader"></div>
                            <div id="scanned-result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/html5-qrcode.js') }}" type="text/javascript"></script>
    <script>
        $('#legit').click(function(e) {
            e.preventDefault();
            $('#qrModal').modal('show');
        });
        $('#qr-scan').click(function(e) {
            e.preventDefault();
            const html5QrCode = new Html5Qrcode(
                "reader", {
                    formatsToSupport: [Html5QrcodeSupportedFormats.QR_CODE]
                });
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                /* handle success */
            };
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            };

            // If you want to prefer front camera
            html5QrCode.start({
                facingMode: "user"
            }, config, qrCodeSuccessCallback);
        });

        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" ||
                document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                    console.log(`Scan result ${decodedText}`, decodedResult);
                    window.open("https://stackoverflow.com", "_blank");
                }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
@endsection
