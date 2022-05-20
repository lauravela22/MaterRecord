var table;

function init(){ //function that will be executed always
	showhideform(false);
	showlistPatients();

	$("#formdatapatient").on("submit",function(e){
		saveandupdate(e);	
	})

	//validate if the user is patient
	/*if ($('#idpatient').is(':empty') != false) {
		showhideform(true);
		showData($("#idpatient").val());	  
		
	}*/ 
		
		
	 


}

//funtion to clean form
function cleanForm(){
	 $("#idUser").val("");
	 $("#idpatient").val("");
	 $("#firstnamepa").val("");
	 $("#lastname").val("");
	 $("#birthdate").val("");
	 $("#birthplace").val("");
	 $("#race").val("");
	 $("#language").val("");
	 $("#mstatus").val("");
	 $("#religion").val("");
	 $("#lastgrade").val("");
	 $("#educationyears").val("");
	 $("#occupation").val("");
	 $("#employer").val("");
	 $("#ssnumber").val("");
	 $("#insuranceholder").val("");
	 $("#insurancenumber").val("");	 
	 $("#userpa").val("");	 
	 $("#passwordpa").val("");	

	 $("#street").val("");	 
	 $("#city").val("");	 
	 $("#state").val("");
	 $("#zip").val("");
	 $("#phone").val("");
	 $("#homephone").val("");
	 $("#phonealternate").val("");

	 $("#lastnamepart").val("");
	 $("#firstnamepart").val(""); 
	 $("#middlenamepart").val("");
	 $("#relationpart").val("");
	 $("#phonepart").val("");
	 $("#employerpart").val("");
	 $("#childfa").val("");
	 $("#eclastname").val("");
	 $("#ecfirstname").val("");
	 $("#ecmiddlename").val("");
	 $("#ecphone").val("");




	 $("#lmpdate").val("");
	 $("#lpmnormal").val(""); 
	 $("#regular").val("");
	 $("#interval").val("");
	 $("#duration").val("");
	 $("#menarche").val("");
	 $("#pregnancyno").val("");
	 $("#totalpreg").val("");
	 $("#ectopicpr").val("");
	 $("#abortions").val("");
	 $("#bornalive").val("");
	 $("#multiplebirth").val("");
	 $("#atterm").val("");
	 $("#preterm").val("");
	 $("#parity").val("");
	 $("#contraceptivet").val("");
	 $("#contraceptived").val("");
	 $("#pregnancyplan").val("");
	 $("#lpmdat").val("");
	 $("#lmpedd").val("");
	 $("#lpmga").val("");
	 $("#lpmbon").val("");
	 $("#usdate").val("");
	 $("#usedd").val("");
	 $("#usga").val("");
	 $("#usbon").val("");
	 $("#trdate").val("");
	 $("#tredd").val("");
	 $("#trga").val("");
	 $("#trbon").val("");
	 $("#prcomments").val("");


	
}
 
function showhideform(flag){
	//cleanForm();
	if (flag) //if the flag come with true the div listpatients will be show and formpatient hide
	{
		$("#listpatients").hide();
		$("#divformpatient").show();
		$("#btnsavepat").prop("disabled",false);
		$("#btnaddpat").hide();

	}else //if come with a false div formpatient will be show and listpatients hide
	{
		$("#listpatients").show();
		$("#divformpatient").hide();
		$("#btnaddpat").show();
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
		            
		            'excelHtml5',		            
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/patient.php?op=getlistpatients',
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
	$("#btnsavepat").prop("disabled",true);
	var formData = new FormData($("#formdatapatient")[0]);

	$.ajax({
		url: "../ajax/patient.php?op=saveandupdate",
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


function showData(idPatient){
	$.post("../ajax/patient.php?op=showData",{idPatient : idPatient}, function(data, status)
	{
		data = JSON.parse(data);		
		showhideform(true);
  		
  		$("#idUser").val(data.idUser);
  		$("#idpatient").val(data.idPatient);
  		$("#firstname").val(data.firstname);
		$("#lastname").val(data.lastname);
		$("#birthdate").val(data.birthdate);
		$("#birthplace").val(data.birthplace);
		$("#race").val(data.race);
		$("#language").val(data.language);
		$("#mstatus").val(data.maritalstatus);
		$("#religion").val(data.religion);
		$("#lastgrade").val(data.educationlastgrade);
		$("#educationyears").val(data.educationyears);
		$("#occupation").val(data.occupation);
		$("#employer").val(data.empployer);
		$("#ssnumber").val(data.socialsecuritynumber);
		$("#insuranceholder").val(data.insuranceholder);
		$("#insurancenumber").val(data.insuranceaccountnumber);	 
		$("#userpa").val(data.user);
		$("#passwordpa").val(data.password);
	 

		if (data.status == 1) {
			$('#active').prop("checked", true);
		}else{
			$('#inactive').prop("checked", true);
		}
		 
  	});
}

//function to inactive patient
function disablepat(idUser)
{
	bootbox.confirm("Are you sure you want to disable the patient?", function(result){
		if(result)
        {
        	$.post("../ajax/patient.php?op=disablepat", {idUser : idUser}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});	
        }
	})
}

//function to active patient
function enabledpat(idUser){
	bootbox.confirm("Are you sure you want to enable the patient?", function(result){
		if(result)
        {
        	$.post("../ajax/patient.php?op=enabledpat", {idUser : idUser}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});	
        }
	})
}


init();