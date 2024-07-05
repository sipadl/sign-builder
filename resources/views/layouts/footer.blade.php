<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    let ids = '';
    function setValue(id)
    {
        ids = id;
    };


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
                $(`.signature-user-${ids}`).append(
                    `<img width="120px" height="120px" src=${dataUrl} alt=".." />`
                );
                $(`#signature-${ids}`).val(dataUrl)
                $(`.btn-sign-${ids}`).html('');
            }
        });

        $('#signatureModal').on('shown.bs.modal', resizeCanvas); // Ensure canvas is resized when modal is shown
    });
</script>

</body>
</html>
