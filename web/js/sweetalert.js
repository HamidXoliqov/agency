
function sweetAlert(status, message) {
    Swal.fire({
       // position: "top-right",
        icon: status,
        title: message,
        showConfirmButton: false,
        timer: 1500
    });

}


$(".toast-show").click(function (e) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.warning("Inconceivable!");
});