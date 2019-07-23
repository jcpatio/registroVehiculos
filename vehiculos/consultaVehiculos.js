$(document).ready(function() {			   
	$('#tablaBusqueda').DataTable( {
		"locale": {
				"format": "YYYY-MM-DD",
		},
		"order": [[ 0, 'desc' ]],
		
		"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [4] }
        ],
		
        searching: true,
        dom: 'l-B'   ,
        buttons: [  {
                extend: 'print',
				text: '<i class="fa fa-print"></i>',
                title:'Clientes',
                titleAttr: 'Imprimir',
                className: 'btn btn-app export imprimir',
                exportOptions: {					
                    columns: ':visible'
                }
            }, {
                extend: 'pdf',
                title:'Clientes',
                titleAttr: 'Pdf',
                className: 'btn btn-app export pdf',
                exportOptions: {
                    columns: ':visible'
                }
            }, 'colvis' ],
		responsive: true, 
		"bDeferRender": true,	
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "vehiculos/consultaVehiculos.php",
        	"type": "POST"
		},					
		"columns": [
			{ "data": "placa" },
			{ "data": "color" },			
			{ "data": "marca" },			
			{ "data": "propietario" },			
			{ "data": "conductor" },
			{ "data": "acciones"}
			],
		"oLanguage": {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": 'Mostrar <select class="form-control">'+
		        '<option value="10">10</option>'+
		        '<option value="30">30</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">All</option>'+
		        '</select> registros',    
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtrar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por favor espere - cargando datos...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
        }
	});
});