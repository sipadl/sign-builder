<!-- Modal -->
<div
    class="modal fade"
    id="signatureModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-auto" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title">Sign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="text-center">
                    {{-- <div class="signature-pad"> --}}
                        <canvas class="signature-pad" id="signature-pad"></canvas>
                        {{-- </div> --}}
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="clear" data-dismiss="modal">Clear</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="save">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Warning Modal -->
<div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="warningModalLabel">Export Pdf</h5>
            </div>
            <div class="modal-body">
                <!-- Information Message -->
                <div class="alert alert-warning" role="alert">
                    Tolong konfirmasi alasan sebelum export data
                </div>
                <!-- Form -->
                <form id="reasonForm" action="{{ route('submitReason', [$data->redmine_no ?? '']) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Reason</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
