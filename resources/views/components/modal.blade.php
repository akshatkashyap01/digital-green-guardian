<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer-delete">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-mark">Yes</button>
            </div>
        </div>
    </div>
</div>
