 
//if the event its on then call 
$("#formlogin").on("submit",function(e)	{

	e.preventDefault();
	userlog = $("#userlog").val();
	passlog = $("#passlog").val();
  
	if (userlog == "") {
		bootbox.alert("User required");
	}else if (passlog == "") {
		bootbox.alert("Password required");
	}else{
		$.post("../ajax/users.php?op=validateuserlogin",{"user": userlog, "pass":passlog},
		function(data){

 		//alert(data);

			if ($.trim(data) != "null") {
				$(location).attr("href","calendar.php");
			}else  {
				bootbox.alert("User or Password incorrect, verify data.");
			} 

			

		});	
	}


	
});

 