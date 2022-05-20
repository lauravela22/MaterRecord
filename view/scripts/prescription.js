 var table;

function init(){ //function that will be executed always
	showhideform(false);
	showlistPatients();

	$("#fromprescription").on("submit",function(e){
		saveandupdate(e);	
	})


	//Patients names
	$.post("../ajax/patient.php?op=selectListPat", function(r){
	            $("#idpatfullname").html(r);
	            $('#idpatfullname').selectpicker('refresh');
	});

}

//funtion to clean form
function cleanForm(){
	 $("#idpatient").val("");
	 $("#idpregnancy").val("");
	 $("#idPrescription").val("");
	 $("#idpatfullname").val("");
	 $("#dateP").val("");
	 $("#drug").val("");
	 $("#dose").val("");
	 $("#route").val("");
	 $("#frecuency").val("");
	 $("#durationt").val("");
	 $("#comments").val("");
	 $("#bleepno").val("");
	 $("#regdoc").val(""); 
	
}
 
function showhideform(flag){
	//cleanForm();
	if (flag) //if the flag come with true the div listpatients will be show and formpatient hide
	{
		$("#listpatients").hide();
		$("#divformprescription").show();
		$("#btnsavepres").prop("disabled",false);
		$("#btnaddpres").hide();

	}else //if come with a false div formpatient will be show and listpatients hide
	{
		$("#listpatients").show();
		$("#divformprescription").hide();
		$("#btnaddpres").show();
	}

}

function canceltrans(){

	cleanForm();
	showhideform(false);
}

 
function showlistPatients(){

	table=$('#tbllistpatients').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/prescription.php?op=getlistpatients',
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

function saveandupdate(e) {

	e.preventDefault(); //event will not executed in the automatic order it will execute in the order declared 
	$("#btnsavepres").prop("disabled",true);
	var formData = new FormData($("#fromprescription")[0]);

	$.ajax({
		url: "../ajax/prescription.php?op=saveandupdate",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(msgInfo)
	    {                    
	          bootbox.alert(msgInfo);	          
	          showhideformPat(false);
	          tablePat.ajax.reload();
	    }

	});
	cleanForm();
	 
} 

function showData(idPrescription){
	$.post("../ajax/prescription.php?op=showData",{idPrescription : idPrescription}, function(data, status)
	{
		data = JSON.parse(data);		
		showhideform(true);

		 $("#idpatient").val(data.idPatient);
		 $("#idpregnancy").val(data.idPregnancy);
		 $("#idPrescription").val(data.idPrescription);
		 $("#idpatfullname").val(data.firstname);
		 $('#idpatfullname').selectpicker('refresh');
		 $("#dateP").val(data.datepm);
		 $("#drug").val(data.gendrug);
		 $("#dose").val(data.dose);
		 $("#route").val(data.route);
		 $("#frecuency").val(data.frequency);
		 $("#durationt").val(data.durationtreatment);
		 $("#comments").val(data.comments);
		 $("#bleepno").val(data.bleepno);
		 $("#regdoc").val(data.idUser);
		
   
		 
 	});
}

 
function sendPres(idPrescription)
{
	bootbox.confirm("Are you sure you want to send the prescription?", function(result){
		if(result)
        {
        	$.post("../ajax/prescription.php?op=sendPres", {idPrescription : idPrescription}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});	
        }
	});
}

init();