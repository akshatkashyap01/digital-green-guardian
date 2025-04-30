import './bootstrap';

$(window).on('load', function () {
    $("#globalLoader").hide();
});

$(".addglobalbtn , .sideBarLI, .gd-back-btn, .view-edit-btn").on('click', function () {
    $("#globalLoader").show();
});

$("form").on("submit", function (e) {
    if (this.checkValidity()) {
        $("#globalLoader").show();
    }
});
