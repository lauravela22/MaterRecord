var table;

function init(){ //function that will be executed always
	showhideform(false);
	showlist();

	
	// if the event submit its on then call function saveandupdate
	$("#formdataemployee").on("submit",function(e)
	{
		saveandupdate(e);	
	});


	//Select type of user
	$.post("../ajax/employee.php?op=selectTypUser", function(r){
	    $("#idTypeUser").html(r);
	    $('#idTypeUser').selectpicker('refresh');

	});
}


//funtion to clean form
function cleanForm(){
	$("#idUser").val("");
	$("#firstname").val("");
	$("#lastname").val("");
	$("#user").val("");
	$("#password").val("");
	$("#idTypeUser").val("");
	$("#regnumber").val("");
	$("#status").val("");
}

function showhideform(flag){
	cleanForm();
	if (flag) //if the flag come with true the div listemployee will be show and formemployee hide
	{
		$("#listemployee").hide();
		$("#formemployee").show();
		$("#btnsaveempl").prop("disabled",false);
		$("#btnaddnewemp").show();
		$("#btnsaveempl").show();
	}
	else //if come with a false div formemployee will be show and listemployee hide
	{
		$("#listemployee").show();
		$("#formemployee").hide();
		$("#btnaddnewemp").show();		
		$("#btnsaveempl").show();
	}
}

function canceltrans(){

	cleanForm();
	showhideform(false);
}

function showtypeuser(){
	showtypeuser()
}

function showlist(){

	table=$('#tbllist').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		            'excelHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/employee.php?op=getlistinformation',
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

function saveandupdate(e)
{
	e.preventDefault(); //event will not executed in the automatic order it will execute in the order declared 
	$("#btnsaveempl").prop("disabled",true);
	var formData = new FormData($("#formdataemployee")[0]);
 

	$.ajax({
		url: "../ajax/employee.php?op=saveandupdate",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(msgInfo)
	    {                    
	          bootbox.alert(msgInfo);	          
	          showhideform(false);
	          table.ajax.reload();
	    }

	});
	cleanForm();
}

function showData(idUser){
	$.post("../ajax/employee.php?op=showData",{idUser : idUser}, function(data, status)
	{
		data = JSON.parse(data);		
		showhideform(true);
  
		$("#idUser").val(data.idUser);		
		$("#firstname").val(data.firstname);
		$("#lastname").val(data.lastname);
		$("#user").val(data.user);
		//$("#password").val(data.password);
		$("#idTypeUser").val(data.idTypeUser);
		$('#idTypeUser').selectpicker('refresh');
		$("#regnumber").val(data.registernumber);

		if (data.status == 1) {
			$('#active').prop("checked", true);
		}else{
			$('#inactive').prop("checked", true);
		}
		 
 	});
}

//function to inactive employee
function disableemp(idUser)
{
	bootbox.confirm("Are you sure you want to disable the user?", function(result){
		if(result)
        {
        	$.post("../ajax/employee.php?op=disableemp", {idUser : idUser}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});	
        }
	})
}

//function to active employee
function enabledemp(idUser){
	bootbox.confirm("Are you sure you want to enable the user?", function(result){
		if(result)
        {
        	$.post("../ajax/employee.php?op=enabledemp", {idUser : idUser}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});	
        }
	})
}

init(); //execution of the function