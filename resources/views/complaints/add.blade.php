<div class="modal fade custom-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" id="addComplaintModal"
    tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeamModalLabel">Add Complaint</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form id="addComplaintModalForm" class="ajax-submit" action="/complaints" data-success-message="Complaint added successfully!">
                    <div class="modal-body">
                        @csrf
                        <div>

                            {{-- <div class="mb-3">
                                <label for="task_description" class="form-label">One Liner Description</label>
                                <input type="text" class="form-control" id="task_description" name="task_description"
                                    placeholder="Enter Description (Max 50 words)" maxlength="50">
                                <div class="text-danger error-message" id="error-task_description"></div>
                            </div> --}}
                            {{-- <label for="description" class="block text-sm font-medium text-gray-700">Complaint Description:</label>     --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Complaint Description:</label>
                                <textarea
                                    name="description"
                                    id="description"
                                    class="form-control"
                                    rows="8"
                                    required
                                >{{ old('description') }}</textarea>
                                <div class="text-danger error-message" id="error-description"></div>
                            </div>

                        </div>
                    </div>

                    <div class="bottonfooter">
                        <button type="submit" class="btn btn-danger w-100 add-user-btn">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
