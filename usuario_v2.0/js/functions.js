
        function alert(massage) {
            $("#myAlert").html(massage);
            $("#myAlert").dialog({modal: true,
                buttons: {
                    "Ok": function () {
                        $(this).dialog("close");
                    }
                }
            });
        }


function confirm(message, callback) {
    $("#myAlert").html(message);
    $("#myAlert").dialog({
        modal: true,
        buttons: {
            "Cancelar": function () {
                $(this).dialog("close");
            },
            "Ok": function () {
                if (isFunction(callback)) {
                    callback.apply();
                }
                $(this).dialog("close");
            }
        }

    });
}