<?php
//use of sessions
ob_start();
session_start();

if (!isset($_SESSION["user"]))
{
  header("Location: login.html");
}else{

require 'header.php';
?>
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h1 class="box-title">PATIENT 
						 <?php
						 if ($_SESSION['idTypeUser'] != 1){
						 	echo '<button class="btn btn-primary" id="btnaddpat" onclick="showhideform(true);"><i class="fa fa-plus-circle"></i> Add New Patient</button>';
							}
						 	?>
						
						</h1>
						<div class="box-tools pull-right"></div>
					</div>
					<!-- centro -->
					<div class="panel-body table-responsive" id="listpatients" name="listpatients" style="overflow: auto !important;">
						<table id="tbllistpatients" name="tbllistpatients" class="table table-striped table-bordered table-condensed tale-hover"> 
							<thead>
								<th>Options</th>
								<th>Id Patient</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Birth Date</th>
								<th>User</th>
								<th>Password</th>
								<th>Status</th>
							</thead>
							<tbody></tbody>
							<tfoot>
								<th>Options</th>
								<th>Id Patient</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Birth Date</th>
								<th>User</th>
								<th>Password</th>
								<th>Status</th>
							</tfoot>
						</table>
					</div>
				<div class="panel-body" id="divformpatient" name="divformpatient" style="height: auto !important; overflow: auto !important;">

					<form id="formdatapatient" name="formdatapatient" class="form-horizontal" method="POST">

						<?php
						if ($_SESSION['idTypeUser'] == 1) {
							echo '<input type="hidden" id="idpatient" name="idpatient" value="'.$_SESSION['idPatient'].'">';
						}else{
							echo '<input type="hidden" id="idpatient" name="idpatient">';
						}
 
						?>
						<input type="hidden" id="idUser" name="idUser">
						
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Demographics</a></li>
							<li role="presentation"><a href="#pregnancy" role="tab" id="pregnancy-tab" data-toggle="tab" aria-controls="pregnancy">Pregnancy</a></li>
							<li role="presentation"><a href="#providers" role="tab" id="providers-tab" data-toggle="tab" aria-controls="providers">Providers</a></li>                   
							<li role="presentation"><a href="#medicalhistory" role="tab" id="medicalhistory-tab" data-toggle="tab" aria-controls="medicalhistory">Medical History</a></li>	
							<li role="presentation"><a href="#genscreenfamhist" role="tab" id="genscreenfamhist-tab" data-toggle="tab" aria-controls="genscreenfamhist">Genetic Screening / Family History</a></li>
							<li role="presentation"><a href="#progressnotes" role="tab" id="progressnotes-tab" data-toggle="tab" aria-controls="progressnotes">Progress Notes</a></li>
							<li role="presentation"><a href="#physicalexam" role="tab" id="physicalexam-tab" data-toggle="tab" aria-controls="physicalexam">Physical Examination</a></li> 
						</ul>

						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<div class="form-body">									
									
									<div class="col-sm-12 form-group"><br>
										<label for="focusedinput" class="col-sm-2 control-label">First Name(s)</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="firstnamepa" name="firstnamepa" required>
										</div>
										<label for="focusedinput" class="col-sm-2 control-label">Last Name(s)</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="lastname" name="lastname" required>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Birth Date</label>
										<div class="col-sm-4">
											<input type="date" class="form-control1" id="birthdate" name="birthdate" required>
										</div>  
										<label for="focusedinput" class="col-sm-2 control-label">Birth Place</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="birthplace" name="birthplace" required>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Race</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="race" name="race">
										</div>    
										<label for="focusedinput" class="col-sm-2 control-label">Language</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="language" name="language">
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Marital Status</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="mstatus" name="mstatus" required>
										</div>    
										<label for="focusedinput" class="col-sm-2 control-label">Religion</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="religion"  name="religion">
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Education (last grade complete)</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="lastgrade" name="lastgrade" >
										</div>    
										<label for="focusedinput" class="col-sm-2 control-label">Education(Years)</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="educationyears" name="educationyears">
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Occupation</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="occupation" name="occupation">
										</div>      
										<label for="focusedinput" class="col-sm-2 control-label">Employer</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="employer" name="employer">
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Social Security Number</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="ssnumber" name="ssnumber">
										</div>
										<label for="focusedinput" class="col-sm-2 control-label">Insurance</label>
										<div class="col-sm-4">
											<label for="focusedinput" class="col-sm-2 control-label">Holder</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="insuranceholder" name="insuranceholder">
											</div>
											<div class="clearfix"></div>  
											<label for="focusedinput" class="col-sm-2 control-label">Account Number</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="insurancenumber" name="insurancenumber">
											</div>
										</div>                    
									</div>
									<div class="form-group">

										<div class="col-sm-12"><hr>
											<label for="" class="col-sm-12">Address:</label>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Street</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="street" name="street" required>
										</div>    
										<label for="focusedinput" class="col-sm-2 control-label">City</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="city" name="city" required>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">State</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="state" name="state" required>
										</div>        
										<label for="focusedinput" class="col-sm-2 control-label">Zip</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="zip" name="zip" required>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Phone</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="phone" name="phone"  required>
										</div>    
										<label for="focusedinput" class="col-sm-2 control-label">Home</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="homephone" name="homephone">
										</div>        
										<label for="focusedinput" class="col-sm-2 control-label">Alternate</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="phonealternate" name="phonealternate">
										</div>                    
									</div>
									<div class="form-group">

										<div class="col-sm-12"><hr>
											<label for="" class="col-sm-8">Partner:</label>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="lastnamepart" name="lastnamepart" required>
										</div>        
										<label for="focusedinput" class="col-sm-2 control-label">First Name</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="firstnamepart" name="firstnamepart" required>
										</div>        
										<label for="focusedinput" class="col-sm-2 control-label">Middle Initial</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="middlenamepart" name="middlenamepart">
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Relation</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="relationpart" name="relationpart" required>
										</div>      
										<label for="focusedinput" class="col-sm-2 control-label">Phone</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="phonepart" name="phonepart" required>
										</div>                    
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Employer</label>
										<div class="col-sm-4">
											<input type="text" class="form-control1" id="employerpart" name="employerpart">
										</div>        
										<label for="focusedinput" class="col-sm-2 control-label">Child's Father</label>
										<div class="col-sm-4">
											<div class="radio block">
												<label><input type="radio" id="yes" name="childfa"> Yes</label>
											</div>
											<div class="radio block">
												<label><input type="radio" id="no" name="childfa"> No</label>
											</div>
										</div>                    
									</div>
									<div class="form-group">

										<div class="col-sm-12"><hr>
											<label class="col-sm-8">Emergency Contact:</label>
										</div>      

									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="eclastname" name="eclastname"  required>
										</div>        
										<label for="focusedinput" class="col-sm-2 control-label">First Name</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="ecfirstname" name="ecfirstname"  required>
										</div>      
										<label for="focusedinput" class="col-sm-2 control-label">Middle Initial</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="ecmiddlename" name="ecmiddlename" >
										</div>  
									</div>


									<div class="form-group">      
										<label for="focusedinput" class="col-sm-2 control-label">Phone</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" id="ecphone" name="ecphone" required>
										</div>                    
									</div>

									<div class="form-group">
										<hr>
										<label for="focusedinput" class="col-sm-2 control-label">User</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" id="userpa" name="userpa" required>
										</div>                    
									</div>
									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control1" id="passwordpa" name="passwordpa" required="">
										</div>
									</div>

									<div class="form-group">

										<label for="mediuminput" class="col-sm-2 control-label">Type User</label>
										<div class="col-sm-8">
											<input type="text" disabled id="typeuser"  value="Patient" >

										</div>
										</div>

										<div class="form-group">
											<label for="radio" class="col-sm-2 control-label">Status</label>
											<div class="col-sm-8">
												<div class="radio block"><label>
													<input type="radio" id="active" name="status" checked> Active</label></div>
												<div class="radio block"><label>
													<input type="radio" id="inactive" name="status"> Inactive</label></div>

											</div>
										</div>								 
								</div>
							</div>


							<div id="pregnancy" class="tab-pane fade">
								<div class="form-body">

									<div class="form-group">

										<div class="col-sm-12"><br>
											<label for="" class="col-sm-8">Menstrual History</label>
										</div>     

									</div>

									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">LMP Date is</label>
										<div class="col-sm-4">
											<input type="date" class="form-control1" id="lmpdate" name="lmpdate">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">LMP normal?</label>
										<div class="col-sm-4">
											<input type="checkbox" class="form-control1" id="lpmnormal" name="lpmnormal">
										</div>
									</div>
									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Regular?</label>
										<div class="col-sm-4">
											<input type="checkbox" class="form-control1" id="regular" name="regular">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Interval</label>
										<div class="col-sm-3">
											<input type="text" class="form-control1" id="interval" name="interval">

										</div>
										<label class="col-sm-1">days</label>
									</div>

									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Duration</label>
										<div class="col-sm-3">
											<input type="text" class="form-control1" id="duration" name="duration">
										</div>
										<label class="col-sm-1">days</label>
										<label for="disabledinput" class="col-sm-2 control-label">Menarche</label>
										<div class="col-sm-3">
											<input type="text" class="form-control1" id="menarche" name="menarche">
										</div>
										<label class="col-sm-1">years</label>
									</div>
									<div class="form-group">

										<div class="col-sm-12"><hr>
											<label for="" class="col-sm-8">Pregnancy History</label>
										</div>      

									</div>
									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Pregnancy Number</label>
										<div class="col-sm-4">
											<input type="textna" class="form-control1" id="pregnancyno" name="pregnancyno" required>
										</div>

									</div>
									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Total Preg</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="totalpreg" name="totalpreg">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Ectopic Preg</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="ectopicpr" name="ectopicpr">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Abortions</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="abortions" name="abortions">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Born Alive</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="bornalive" name="bornalive">
										</div>
									</div>
									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Multiple Birth</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="multiplebirth" name="multiplebirth">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">At Term</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="atterm" name="atterm">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Preterm</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="preterm" name="preterm">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Parity</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="parity" name="parity">
										</div>
									</div>
									<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Contraceptive Type</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="contraceptivet" name="contraceptivet">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Contraceptive Discontinued</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="contraceptived" name="contraceptived">
										</div>
										<label for="disabledinput" class="col-sm-2 control-label">Pregnancy Planned</label>
										<div class="col-sm-2">
											<input type="text" class="form-control1" id="pregnancyplan" name="pregnancyplan">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12"><hr>
											<label class="col-sm-8">Gestation</label>
										</div>  
										<div class="tables">
											<table class="table table-bordered"> 
												<thead> 
													<tr> 
														<th></th> 
														<th> <label class="control-label">Date of</label></th> 
														<th> <label class="control-label">EDD(Cal.)</label></th> 
														<th> <label class="control-label">Gestion Age</label></th> 
														<th> <label class="control-label">Based on</label></th> 
													</tr> 
												</thead> 
												<tbody>
													<tr> 
														<th scope="row"><label class="control-label">LPM:</label></th> 
														<td><input type="date" name="lpmdat" id="lpmdat"></td> 
														<td><input type="text" name="lmpedd" id="lmpedd"></td> 
														<td><input type="text" name="lpmga" id="lpmga"></td> 
														<td><input type="checkbox" name="lpmbon" id="lpmbon"></td> 
													</tr> 
													<tr> 
														<th scope="row"><label class="control-label">US Exam:</label></th> 
														<td><input type="date" name="usdate" id="usdate"></td> 
														<td><input type="text" name="usedd" id="usedd"></td> 
														<td><input type="text" name="usga" id="usga"></td> 
														<td> <input type="checkbox" name="usbon" id="usbon"></td> 
													</tr>
													<tr> 
														<th scope="row"><label class="control-label">Transfer:</label></th> 
														<td><input type="date" name="trdate" id="trdate"></td> 
														<td><input type="text" name="tredd" id="tredd"></td> 
														<td><input type="text" name="trga" id="trga"></td> 
														<td><input type="checkbox" name="trbon" id="trbon"></td> 
													</tr>

												</tbody> 
											</table> 
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Pregnancy Comments:</label>
										<textarea class="form-control1" name="prcomments" id="prcomments"></textarea>
									</div>

								</div>
							</div>
							
							<!-- BUTTON TO SAVE CHANGES -->
							<div class="form-group">
								<div class="col-md-3"></div>
								<div class="col-md-3">
									  <button class="btn btn-primary" type="submit" id="btnsavepat"><i class="fa fa-save"></i>  SAVE CHANGES</button>
								</div>									
								<div class="col-md-3">
								<button id="btncancel" class="btn btn-danger" onclick="canceltrans()"><i class="fa fa-arrow-circle-left"></i> CANCEL</button> 
								</div>
								<div class="col-md-3"></div>
							</div>
						</div>
					</form>
					<!--End center -->
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
	</section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--End-Content-->

<?php
	require 'footer.php';
?>

<script type="text/javascript" src="scripts/patient.js"></script>

<?php 
}
ob_end_flush();
?>