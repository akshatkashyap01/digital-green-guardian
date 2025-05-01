<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="successModal" tabindex="-1" role="dialog"
    aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" id="modalMessage">
                <!-- Message will be updated dynamically -->
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer-delete">
                <!-- Button container - simplified layout -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="closeButtonModal">No</button>
                <button type="button" class="btn btn-danger" id="confirmAction" style="background-color: #011425;">Yes</button>

                <!-- Single OK button for success screens -->
                <button type="button" class="btn btn-danger" style="background-color: #011425;" data-bs-dismiss="modal"
                    id="closeModalUserModule">OK</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal styling */
    .modal-content {
        border: none;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e0e0e0;
        background-color: #fff;
    }

    .modal-header .modal-title {
        font-size: 18px;
        font-weight: 500;
        color: #333;
        margin: 0;
    }

    .modal-body {
        padding: 20px;
        border-bottom: 1px solid #e0e0e0;
        color: #333;
        font-size: 14px;
    }

    .modal-footer-delete {
        padding: 16px;
        display: flex;
        justify-content: space-between;
    }

    /* Button styling */
    .btn {
        padding: 14px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.2s;
        flex: 1;
        margin: 0 8px;
        border: none;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Button container styling */
    .gap-2 {
        gap: 16px !important;
        width: 100%;
    }

    .justify-content-center {
        justify-content: stretch !important;
        width: 100%;
    }

    .d-flex {
        display: flex !important;
    }

    .flex-grow-1 {
        flex-grow: 1 !important;
    }

    /* Make the No/Yes buttons side by side with equal width */
    .modal-footer-delete .btn {
        flex: 1;
        margin: 0 8px;
    }

    /* Specific button colors to match the image */
    .modal-footer-delete #closeButtonModal {
        background-color: #6c757d;
    }

    .modal-footer-delete #confirmAction {
        background-color: #dc3545;
    }

    /* Single OK button styling */
    #closeModalUserModule {
        border-radius: 4px !important;
        margin: 0 8px;
        width: calc(100% - 16px);
        display: block;
        background-color: #dc3545;
    }

    /* Success modal styling adjustments */
    .modal-footer-delete.success-view {
        display: block;
        text-align: center;
    }
</style>
