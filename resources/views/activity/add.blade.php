<div class="modal fade custom-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" id="addActivityModal"
    tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeamModalLabel">Add Activity</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form id="addActivityModalForm" class="ajax-submit" action="/my-activity" data-success-message="Activity added successfully!">
                    <div class="modal-body">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-control form-select" id="category" name="category_id">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->description }}({{ $category->name }})</option>
                                    @endforeach
                                </select>
                                <div class="text-danger error-message" id="error-category_id"></div>
                            </div>

                            <div class="mb-3">
                                <label for="upload" class="form-label">Upload <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="upload" name="upload">
                                <div class="text-danger error-message" id="error-upload"></div>
                            </div>

                            <div class="mb-3">
                                <label for="task_description" class="form-label">One Liner Description</label>
                                <input type="text" class="form-control" id="task_description" name="task_description"
                                    placeholder="Enter Description (Max 50 words)" maxlength="50">
                                <div class="text-danger error-message" id="error-task_description"></div>
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
