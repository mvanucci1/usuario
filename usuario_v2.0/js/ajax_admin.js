
$(document).ready(function () {

//    $("#cpf").mask("999.999.999-99");
//    $("#rg").mask("99.999.999-9");

	$.fn.dataTable.moment('DD/MM/YYYY'); 
	
    $("#myGrid").dataTable({
        "scrollY": 350,
        "scrollX": true,
        "bJQueryUI": true,
        "oLanguage": {
            "sProcessing": "Carregando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        }
    }); 
    
});