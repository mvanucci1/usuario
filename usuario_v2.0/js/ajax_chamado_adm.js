$(document).ready(function () {
    $("#btn-atribuir").on('click', function () {
        var $btn = $(this).button('loading');
        var frm_chamado = $("#frm-chamado").serialize();
        $.ajax({
            type: 'POST',
            url: 'controller/adm_controller.php',
            data: frm_chamado
        })
                .done(function (e) {
                    alert(e);
                    $btn.button('reset');
                });
    });
});


