 <?php
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
 						<div class="col-md-6">
 							<h3 class="inner-tittle two">ANTENAL INPATIENT RECORDS</h3>
 						</div>

 					</div>
 					<!-- /.box-header -->
 					<!-- center -->

 					<div class="panel-body" style="height: 500px;" id="formularioregistros" style="overflow: auto !important;">


 						<!-- TAB MENU INFORMATION OF PATIENT -->
 						<ul id="myTab" class="nav nav-tabs" role="tablist">
 							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Antenatal Admissions</a></li>
 							<li role="presentation"><a href="#pregnancy" role="tab" id="pregnancy-tab" data-toggle="tab" aria-controls="pregnancy">Index of Antenatal Steroids Administration</a></li>
 							<li role="presentation"><a href="#providers" role="tab" id="providers-tab" data-toggle="tab" aria-controls="providers">Antenatal Record</a></li>
 							<li role="presentation"><a href="#medicalhistory" role="tab" id="medicalhistory-tab" data-toggle="tab" aria-controls="medicalhistory">Antenatal Daily Observations Record</a></li>                   

 						</ul>

 						<div class="tab-content">
 							<div id="home" class="tab-pane fade in active">
 								<div class="form-body">
 									<form class="form-horizontal">

 										<div><br>
 											<div class="tables">
 												<table class="table table-bordered table-hover"> 
 													<thead> 
 														<tr> 
 															<th>Date Admitted</th> 
 															<th>Reason for Admission</th> 
 															<th>Gestation</th>
 															<th>Date of Discharge</th>  
 														</tr> 
 													</thead> 
 													<tbody> 
 														<tr> 
 															<td></td> 
 															<td></td> 
 															<td></td> 
 															<td></td> 
 														</tr> 

 													</tbody> 
 												</table> 
 											</div>
 										</div>

 									</form>
 								</div>
 							</div>

 							<div id="pregnancy" class="tab-pane fade">
 								<div class="form-body">
 									<form class="form-horizontal">
 										<div> <br>
 											<div class="tables">
 												<table class="table table-bordered table-hover"> 
 													<thead> 
 														<tr> 
 															<th>Dose Number</th> 
 															<th>Date Dose Administered <br> (see Prescribed Medicines section for further details)</th> 
 														</tr> 
 													</thead> 
 													<tbody> 
 														<tr> 
 															<td></td> 
 															<td></td>  
 														</tr> 

 													</tbody> 
 												</table> 
 											</div>
 										</div>
 									</form>
 								</div>
 							</div>
 							<div id="providers" class="tab-pane fade">
 								<div class="form-body">
 									<form class="form-horizontal">
 										<div>
 											<div class="tables"> <br>
 												<table class="table table-bordered table-hover"> 
 													<thead> 
 														<tr> 
 															<th>Date & Time <br>(24 hour clock)</th> 
 															<th>All entries to nothes must be signed with a clear signature, PRINTED NAME, job title and bleep / identification number (e.g. IMC No.) where relevant</th> 
 														</tr> 
 													</thead> 
 													<tbody> 
 														<tr> 
 															<td></td> 
 															<td></td>  
 														</tr> 

 													</tbody> 
 												</table> 
 											</div>
 										</div>

 									</form>
 								</div>
 							</div>

 							<div id="medicalhistory" class="tab-pane fade">

 								<div class="form-body">
 									<form class="form-horizontal">

 										<div class="col-sm-12 form-group"><br>
 											<label  class="col-sm-2 control-label">Anti-D Given</label>

 											<div class="col-sm-2">
 												<label class="control-label">Yes</label>			
 												<input type="radio"id=" " name="antiDgiv">
 											</div>
 											<div class="col-sm-2">
 												<label class="control-label">No</label>
 												<input type="radio"id=" " name="antiDgiv">
 											</div>

 											<label  class="col-sm-2 control-label">Date</label>
 											<div class="col-sm-4">
 												<input type="date" class="form-control1" id=" " >
 											</div>
 											<div class="clearfix"></div> 
 											<label class="col-sm-12 highlightInfo" >If yes, please refer to section (Prescribed Medicines / Blood Products)</label>
 										</div>
 										<div class="col-sm-12 form-group">
 											<label class="col-sm-2 control-label">Fetal  Maternal Hemorrhage</label>
 											<div class="col-sm-2">
 												<label class="control-label">Yes</label>			
 												<input type="radio"id=" " name="fetalMa">
 											</div>
 											<div class="col-sm-2">
 												<label class="control-label">No</label>
 												<input type="radio"id=" " name="fetalMa">
 											</div> 
 											<label  class="col-sm-2 control-label">Date</label>
 											<div class="col-sm-4">
 												<input type="date" class="form-control1" id=" " >
 											</div>

 										</div>

 										<div class="col-sm-12 form-group">
 											<label  class="col-sm-2 control-label">Further Anti-D required</label>
 											<div class="col-sm-2">
 												<label class="control-label">Yes</label>			
 												<input type="radio"id=" " name="furtherAntiD">
 											</div>
 											<div class="col-sm-2">
 												<label class="control-label">No</label>
 												<input type="radio"id=" " name="furtherAntiD">
 											</div>  
 											<label  class="col-sm-2 control-label">Date</label>
 											<div class="col-sm-4">
 												<input type="date" class="form-control1" id=" " >
 											</div>

 										</div>

 										<div class="col-sm-12 form-group">
 											<label  class="col-sm-2 control-label">Agreed EDD</label>				
 											<div class="col-sm-10">
 												<input type="text" class="form-control1" id=" " >
 											</div>					                   
 										</div>



 										<div class="tables">
 											<table class="table table-bordered"> 
 												<thead> 
 													<tr> 														 
 														<th> <label class="control-label">Date</label></th>
 														<td><input type="date" name="" class="form-group1"></td>
 														<td><input type="date" name="" class="form-group1"></td>
 													</tr> 
 												</thead> 
 												<tbody>
 													<tr> 
 														<th>Time (24 hour clock)</th> 
 														<td><input type="time" name="" class="form-group1"></td> 
 														<td><input type="time" name="" class="form-group1"></td> 

 													</tr>
 													<tr> 
 														<th>Gestation</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>Legible Identification bracelet oresent</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Temperature</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>  
 													<tr> 
 														<th>Pulse</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>  
 													<tr> 
 														<th>Blood pressure</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>Oedema</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>4-hourly observation sheet required?</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>ABDOMINAL PALPITATION FINDIGS If SROM please record Date <input type="date" name="" class="form-group1"> Time (24 hour clock) <input type="time" name="" class="form-group1">
 														</th> 
 													</tr>
 													<tr> 
 														<th>Fundal height</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>  	
 													<tr> 
 														<th>Lie</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>Presentation</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Fifth palpable / engaged / not engaged</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>  	
 													<tr> 
 														<th>Position</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>Fetal heart rate (bpm)</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Fetal movements</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Membranes / Liquor</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr> 
 													<tr> 
 														<th>CTG morning (if indicated)</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>   
 													<tr> 
 														<th>CTG evening (if indicated)</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>	
 													<tr> 
 														<th>Ultrasound scan</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Sleep / Rest</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Emotional State</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Eating & Drinking</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Intake / Outputs sheet required?</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Bowels</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>PV loss</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Urinalysis:</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Protein</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Glucose</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Other</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th colspan="3">INVESTIGATIONS <br> * If any of these specimes have been taken , please tick - </th> 
 													</tr>
 													<tr> 
 														<th>* MSU</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* 24 hour collection</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* Total protein</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* FBC</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* U&E</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* Blood group & antibodies</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* Group & save</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>* HVS/LVS</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Other test (specify)</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Signature</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>PRINTED NAME</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>
 													<tr> 
 														<th>Job Title</th> 
 														<td><input type="text" name="" class="form-group1"></td> 
 														<td><input type="text" name="" class="form-group1"></td>
 													</tr>								 
 												</tbody> 
 											</table> 
 										</div>



 									</form>
 								</div>
 							</div>



 							<!-- BUTTON TO SAVE CHANGES -->
 							<div class="cont-btn" align="center">
 								<a class="btn blue four">SAVE CHANGES</a>
 							</div>


 						</div>



 					</div>
 					<!--End center -->
 				</div><!-- /.box -->
 			</div><!-- /.col -->
 		</div><!-- /.row -->
 	</section><!-- /.content -->

 </div><!-- /.content-wrapper -->
 <!--End-Content-->

 <?php
 	require 'footer.php';
 ?>
