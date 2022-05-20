function init(){

		table=$('#tbllistmed').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/medicaldir.php?op=getlist',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//show pagination
	    "order": [[ 0, "desc" ]]// get data order by column
	}).DataTable();
}

init();