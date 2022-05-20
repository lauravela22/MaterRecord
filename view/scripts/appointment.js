var table;

function init(){ //function that will be executed always
	showhideform(false);

	// if the event submit its on then call function saveandupdate
	$("#formnewapp").on("submit",function(e)
	{
		saveandupdate(e);	
	});


	//Patients names
	$.post("../ajax/patient.php?op=selectListPat", function(r){
	            $("#idpatfullname").html(r);
	            $('#idpatfullname').selectpicker('refresh');
	});
 
}
 

//funtion to clean form
function cleanForm(){
	$("#idpatient").val("");
	$("#idAppointment").val("");
	$("#idpatfullname").val("");
	$("#datepp").val("");
	$("#timeapp").val("");
	$("#typeapp").val("");
}

function showhideform(flag){
	cleanForm();
	if (flag) //if the flag come with true the div listcorrespondence will be show and formnewapp hide
	{
		$("#formcalendar").hide();
		$("#formappointments").show();
		$("#btnsaveapp").prop("disabled",false);
		$("#btnnewapp").show();
		$("#btnsaveapp").show(); 
	}
	else //if come with a false div formnewapp will be show and listcorrespondence hide
	{
		$("#formcalendar").show();
		$("#formappointments").hide();
		$("#btnnewapp").show();		
		$("#btnsaveapp").show();
	}
}

function canceltrans(){

	cleanForm();
	showhideform(false);
}

 
/*function showlist(){

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
					url: '../ajax/correspondence.php?op=getlist',
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
*/
function saveandupdate(e)
{
	e.preventDefault(); //event will not executed in the automatic order it will execute in the order declared 
	$("#btnsaveapp").prop("disabled",true);
	var formData = new FormData($("#formnewapp")[0]);
 

	$.ajax({
		url: "../ajax/appointment.php?op=saveandupdate",
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

function showData(idAppointment){
	cleanForm();
	//alert(idCorrespondence);
	$.post("../ajax/appointment.php?op=showData",{idAppointment : idAppointment}, function(data, status)
	{
		data = JSON.parse(data);		
		showhideform(true);
  
		$("#idpatient").val(data.idPatient);	
		$("#idAppointment").val(data.idAppointment);	
		$("#idpatfullname").val(data.firstname);
		$('#idpatfullname').selectpicker('refresh');	
		$("#datepp").val(data.dateapp);
		$("#timeapp").val(data.timeapp);
		$("#typeapp").val(data.typeappointment);
		 
	  
 	});
}

 
init(); //execution of the function