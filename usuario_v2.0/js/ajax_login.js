$(document).ready(function () {
    $("#btn-logar").on('click', function () {
        var frm = $("#frm-login").serialize();
        $.ajax({
            type: 'POST',
            url: 'php/autentica.php',
            data: frm
        })
                .done(function (e) {
                    if (e == 'validade')
                        window.location = 'admin/';
                    else
                        alert(e);
                });
    });
});