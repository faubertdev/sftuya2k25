$(document).ready(function () {
    $("[id$='modal']").on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    setTimeout(function() {
        $(".alert").alert('close');
    }, 2500);
});
