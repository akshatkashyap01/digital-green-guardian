$(document).ready(function () {

    function sendAjaxRequest(url, method, formElement, onSuccess, onError) {
        $("#globalLoader").show();
        let formData = new FormData(formElement);

        $.ajax({
            url: url,
            type: method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#globalLoader").hide();
                if (onSuccess) onSuccess(response);
            },
            error: function (xhr) {
                $("#globalLoader").hide();
                if (onError) onError(xhr);
            }
        });
    }

    function showModal1(title, message) {
        $("#globalLoader").hide();
        $("#modalTitle").text(title);
        $("#modalMessage").text(message);
        $("#confirmAction").removeClass("d-none");
        $("#closeModalUserModule").addClass("d-none");
        $('#successModal').modal('show');
    }

    function showModal2(title, message) {
        $("#globalLoader").hide();
        $("#modalTitle").text(title);
        $("#modalMessage").text(message);
        $("#confirmAction").addClass("d-none");
        $("#closeButtonModal").addClass("d-none");
        $("#closeModalUserModule").removeClass("d-none");
        $('#successModal').modal('show');
        $("#closeModalUserModule").off("click").on("click", function () {
            location.reload();
        });
    }

    function handleGenericFormSubmit() {
        $("form.ajax-submit").not(".no-ajax-submit").each(function () {
            let form = $(this);
            let successMessage = form.data("success-message") || "Form submitted successfully!";

            form.on("submit", function (e) {
                e.preventDefault();
                $('#loader').show();

                sendAjaxRequest(form.attr('action'), "POST", this, function (response) {
                    $('#loader').hide();
                    let parentModal = form.closest('.modal');
                    if (parentModal.length && parentModal.hasClass('show')) {
                        parentModal.modal('hide');
                    }
                    showModal2("Success", successMessage);
                }, function (xhr) {
                    $('#loader').hide();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        form.find('.error-message').html("");
                        $.each(errors, function (key, value) {
                            let errorField = form.find(`#error-${key}`);
                            if (errorField.length) {
                                errorField.html(value[0]);
                            }
                        });
                        form.find('input, textarea, select').off("input").on("input", function () {
                            let fieldName = $(this).attr("name");
                            let errorFieldId = `#error-${fieldName}`;
                            $(errorFieldId).html("");
                        });
                    } else {
                        let parentModal = form.closest('.modal');
                        if (parentModal.length && parentModal.hasClass('show')) {
                            parentModal.modal('hide');
                        }
                        showModal2("Error", "Something went wrong. Please try again.");
                    }
                });
            });

            // Reset form on modal hide
            let parentModal = form.closest('.modal');
            if (parentModal.length) {
                parentModal.on('hidden.bs.modal', function () {
                    form[0].reset();
                    form.find('.error-message').html('');
                });
            }
        });
    }

    $('.approve-complaint-form').on('submit', function (e) {
        e.preventDefault();

        let form = this;
        let complaintId = $(form).data('id');

        showModal1("Are you sure", "Do you want to approve this complaint?");

        $("#confirmAction").off("click").on("click", function () {
            sendAjaxRequest(`/complaints/${complaintId}/approve`, 'POST', form, function (response) {
                showModal2("Success", response.message);
            }, function () {
                showModal2("Error", "Something went wrong. Please try again.");
            });
        });
    });

    $('.approve-verification-form').on('submit', function (e) {
        e.preventDefault();

        const form = this;
        const complaintId = $(form).data('id');

        showModal1("Are you sure", "Do you want to approve this activity?");

        $("#confirmAction").off("click").on("click", function () {
            $("#globalLoader").show();

            const formData = new FormData();
            formData.append('status', 'Verified');

            $.ajax({
                url: `/verify-activity/${complaintId}/status-update`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#globalLoader").hide();
                    showModal2("Success", response.message);
                },
                error: function (xhr) {
                    $("#globalLoader").hide();
                    showModal2("Error", "Something went wrong. Please try again.");
                }
            });
        });
    });

    // ✅ Reject form
    $('.reject-verification-form').on('submit', function (e) {
        e.preventDefault();

        const form = this;
        const complaintId = $(form).data('id');

        showModal1("Are you sure", "Do you want to reject this activity?");

        $("#confirmAction").off("click").on("click", function () {
            $("#globalLoader").show();

            const formData = new FormData();
            formData.append('status', 'Rejected');

            $.ajax({
                url: `/verify-activity/${complaintId}/status-update`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#globalLoader").hide();
                    showModal2("Success", response.message);
                },
                error: function (xhr) {
                    $("#globalLoader").hide();
                    showModal2("Error", "Something went wrong. Please try again.");
                }
            });
        });
    });



    // Initialize reusable handler
    handleGenericFormSubmit();
});
