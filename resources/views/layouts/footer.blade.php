<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script defer src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ pengguna per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari _MAX_ total pengguna)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
            },
            "columnDefs": [
                { "orderable": false, "targets": 4 }
            ]
        });
    });
    </script>

<script>
    let ids = '';
    let ttd = ''
    function setValue(id)
    {
        ids = id;
    };
    $(document).ready(function() {
    $('.select1, .select2, .select3, .select4').select2({});
    });

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
                $(`#sign-${ids}`).val(dataUrl)
                ttd = dataUrl;
                submitSignature()
                setTimeout(() => {
                    location.reload();
                }, 500);
                $(`.btn-sign-${ids}`).html('');
            }
        });

        $('#signatureModal').on('shown.bs.modal', resizeCanvas); // Ensure canvas is resized when modal is shown
    });

    function submitSignature() {
        const group_head = $(`#group-head-${ids}`).val();
        const impacted = $(`input[name="impacted-${ids}"]:checked`).val();
        const notes = $(`#notes-${ids}`).val()
        const sign = $(`#sign-${ids}`).val()
        const kode = $(`#kode-${ids}`).val()
        const redmine = $(`#redmine`).val()
        console.log(impacted)
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post(
            `/sign/${redmine}`,
            {
                group_head: ids,
                impact: impacted ? impacted : null,
                notes: notes,
                signature: ttd,
                kode: kode
            },
            function (data, textStatus, jqXHR) {
                console.log(data);
            },
            "json" // Correcting the dataType parameter
        );
    }

    function saveToPDF(name) {
            const element = document.getElementById('pdf');
            const opt = {
                margin:       0.4,
                filename:     `${name}_change_impact_analisis.pdf`,
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 1 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }

    function addRequestor()
    {
        $('.requester').append(`
        <input type="text" id="yes" class="form-control mt-1" required name="request_by[]">
        `)
    }

    function closealert()
    {
        $('#alert-baru').fadeOut();
    }
</script>

</body>
</html>
