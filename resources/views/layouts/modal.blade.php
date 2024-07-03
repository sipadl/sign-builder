<!-- Modal -->
<div
    class="modal fade"
    id="signatureModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title">Sign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signature-pad">
                    <canvas id="signature-pad"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="clear" data-dismiss="modal">Clear</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save" >Save</button>
            </div>
        </div>
    </div>
</div>
