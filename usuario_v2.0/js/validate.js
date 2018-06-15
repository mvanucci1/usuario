

$(document).ready(function () {


    var validator = $("#frm-solicita").bind("invalid-form.validate", function () {
        $("#msg").html("Este formulário contém " + validator.numberOfInvalids() + " erro(s)");

    }).validate(
            {
                submitHandler: function (frm) {
                    frm.submit();
                },
                rules: {
                    txtnome: {
                        required: true,
                        minlength: 3

                    },
                    matricula: {
                        required: true,
                        minlength: 3
                    },
                    cpf: {
                        required: true,
                        minlength: 12
                    },
                    rg: {
                        required: true,
                        minlength: 10
                    },
                    setor: {
                        required: true,
                        minlength: 3
                    },
                    funcao: {
                        required: true,
                        minlength: 3
                    },
                    usuario: {
                        required: true
                    },
                    lider: {
                        required: true,
                        minlength: 3
                    },
                    sistema: {
                        required: true,
                        minlength: 3
                    },
                    motivo: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    }
                },
                messages: {
                    txtnome: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres"
                    },
                    matricula: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres"
                    },
                    cpf: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 12 caracteres"
                    },
                    rg: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 10 caracteres"
                    },
                    setor: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres"
                    },
                    funcao: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres"
                    },
                    usuario: {
                        required: "*"
                    },
                    lider: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres"
                    },
                    sistema: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres"
                    },
                    motivo: {
                        required: "Preencha o campo corretamente",
                        minlength: "Deve conter no mínimo 3 caracteres",
                        maxlength: "É permitido 100 caracteres apenas"
                    }

                }
            });

});

