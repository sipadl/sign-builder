<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sign - Sharde Redmine : {{$redmine}}</title>
  </head>
  <body>
    <style>
        .signature-pad {
            border: 1px solid #000;
            border-radius: 5px;
            height: 200px;
        }
        .signature-pad--body {
            width: 100%;
            height: 100%;
        }
        .signature-pad--footer {
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <div class="container">
        <div class="text-center">

            <h1>Requestor Impact Analysis</h1>
            <!-- Button trigger modal -->
            <p class="m-0 p-0">Berdasarkan redmine <span class="bg-warning">#{{$redmine}}</span> yang telah dibuat pada : </p>
            <p class="m-0 p-0">Meninfokan bahwa kamu adalah salah satu requestor.</p>
            <p>Silahkan melakukan tanda tangan dengan link di bawah ini.</p>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#signatureModal">
                Tanda Tangan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sign - Digital</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="redmine" id="redmine" value="{{$redmine}}">
                            <input type="hidden" name="kode" id="kode" value="{{$requestor}}">
                            <input type="hidden" name="sign" id="sign" value="">
                            <canvas class="signature-pad" id="signature-pad"></canvas>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="clear">Close</button>
                            <button type="button" class="btn btn-primary" id="save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        let ttd = ''
        let requestor = `{{$requestor}}`
        document.addEventListener('DOMContentLoaded', function () {
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext('2d').scale(ratio, ratio);
        }

        function openModal() {
            // $('#signatureModal').modal('show');
            setTimeout(resizeCanvas, 500); // Resize canvas after the modal is shown
        }

        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
        });

        document.getElementById('save').addEventListener('click', function () {
            if (signaturePad.isEmpty()) {
                alert('Please provide a signature first.');
            } else {
                const dataUrl = signaturePad.toDataURL('image/png');
                ttd = dataUrl;
                submitSignature()
                $('#signatureModal').modal('hide')
                setTimeout(() => {
                    // location.reload();
                    window.close()
                }, 3000);
            }
        });

        $('#signatureModal').on('shown.bs.modal', resizeCanvas); // Ensure canvas is resized when modal is shown
        function submitSignature() {
        const sign = $(`#sign`).val()
        const redmine = $(`#redmine`).val()
        const kode = $(`#kode`).val()
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post(
            `/sign-share/${redmine}`,
            {
                // group_head: ids,
                // impact: impacted,
                // notes: notes,
                kode: kode,
                signature: ttd,
            },
            function (data, textStatus, jqXHR) {
                console.log(data);
            },
            "json" // Correcting the dataType parameter
        );
    }
    });
    </script>
  </body>
</html>
