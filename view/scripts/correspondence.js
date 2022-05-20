var table;

function init(){ //function that will be executed always
	showhideform(false);
	showlist();
		
	// if the event submit its on then call function saveandupdate
	$("#frmcorrespondence").on("submit",function(e)
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
	$("#idCorrespondence").val("");
	$("#idpatfullname").val("");
	$("#dateCC").val("");
	$("#typeCC").val("");
	$("#fileCC").attr("src","");
}

function showhideform(flag){
	cleanForm();
	if (flag) //if the flag come with true the div listcorrespondence will be show and formnewcorrespondence hide
	{
		$("#listcorrespondence").hide();
		$("#formnewcorrespondence").show();
		$("#btnsavecc").prop("disabled",false);
		$("#btnaddnewcc").show();
		$("#btnsavecc").show(); 
	}
	else //if come with a false div formnewcorrespondence will be show and listcorrespondence hide
	{
		$("#listcorrespondence").show();
		$("#formnewcorrespondence").hide();
		$("#btnaddnewcc").show();		
		$("#btnsavecc").show();
	}
}

function canceltrans(){

	cleanForm();
	showhideform(false);
}

 
function showlist(){

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

function saveandupdate(e)
{
	e.preventDefault(); //event will not executed in the automatic order it will execute in the order declared 
	$("#btnsavecc").prop("disabled",true);
	var formData = new FormData($("#frmcorrespondence")[0]);
 

	$.ajax({
		url: "../ajax/correspondence.php?op=saveandupdate",
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

function showData(idCorrespondence){
	cleanForm();
	//alert(idCorrespondence);
	$.post("../ajax/correspondence.php?op=showData",{idCorrespondence : idCorrespondence}, function(data, status)
	{
		data = JSON.parse(data);		
		showhideform(true);
  
		$("#idpatient").val(data.idPatient);	
		$("#idCorrespondence").val(data.idCorrespondence);	
		$("#idpatfullname").val(data.firstname);
		$('#idpatfullname').selectpicker('refresh');	
		$("#dateCC").val(data.dateletter);
		$("#typeCC").val(data.lettertype);
		$("#fileCC").show();
		$("#fileCC").attr("src","../files/correspondence/"+data.file);
	  
 	});
}

 
init(); //execution of the function