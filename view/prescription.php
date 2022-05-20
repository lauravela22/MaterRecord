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
						<h1 class="box-title">PRESCRIPTION 
						<?php
						 if ($_SESSION['idTypeUser'] == 3){
						 	echo '<button class="btn btn-primary" id="btnaddpres" onclick="showhideform(true);"><i class="fa fa-plus-circle"></i> Add New Prescription</button>';

						 }
						 ?>
						
						</h1>
						<div class="box-tools pull-right"></div>
					</div>
					<!-- centro -->
					<div class="panel-body table-responsive" id="listpatients" name="listpatients" style="overflow: auto !important;">
						<table id="tbllistpatients" class="table table-striped table-bordered table-condensed tale-hover"> 
							<thead>
								<th>Options</th>
								<th>Pregnancy Number</th>
								<th>Patient Full Name</th>
								<th>Date </th>
								<th>Generic Drug Name </th>
								<th>Dose </th>
								<th>Duration of Treatment </th>
								<th>Comments/Instructions </th>
								<th>Prescribed By</th>
								<th>Status</th>
								
							</thead>
							<tbody></tbody>
							<tfoot>
								<th>Options</th>
								<th>Pregnancy Number</th>
								<th>Patient Full Name</th>
								<th>Date </th>
								<th>Generic Drug Name </th>
								<th>Dose </th>
								<th>Duration of Treatment </th>
								<th>Comments/Instructions </th>
								<th>Prescribed By</th>
								<th>Status</th>
							</tfoot>
						</table>
					</div>
				<div class="panel-body" id="divformprescription" name="divformprescription" style="height: auto !important; overflow: auto !important;">

					<form id="fromprescription" name="fromprescription" class="form-horizontal" method="POST">
						<input type="hidden" id="idpatient" name="idpatient">
						<input type="hidden" id="idpregnancy" name="idpregnancy">
						<input type="hidden" id="idPrescription" name="idPrescription">
						<div class="form-group col-md-12">
							<label class="col-md-2 control-label">Patient Full Name*</label>
							<div class="col-md-6">
								<!-- CALL TABLE TYPEUSER -->
								<select id="idpatfullname" name="idpatfullname" class="form-control selectpicker" data-live-search="true" required>
								</select>
							</div>	
							<label class="col-md-2 control-label">Date*</label>
							<div class="col-md-2">
								<input type="date" class="form-control1" id="dateP" name="dateP"  required>
							</div>								
						</div>	
						<div class="form-group col-md-12">
							<label class="col-md-2 control-label">Generic Drug Name*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="drug" name="drug"  required>
							</div>							
							<label class="col-md-2 control-label">Dose*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="dose" name="dose"  required>
							</div>							
						</div> 
						<div class="form-group col-md-12">
							<label class="col-md-2 control-label">Route*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="route" name="route"  required>
							</div>							
							<label class="col-md-2 control-label">Frecuency*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="frecuency" name="frecuency"  required>
							</div>							
						</div>
						<div class="form-group col-md-12">
							<label class="col-md-2 control-label">Duration of Treatment*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="durationt" name="durationt"  required>
							</div>							
							<label class="col-md-2 control-label">Comments/Instructions*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="comments" name="comments"  required>
							</div>							
						</div>
						<div class="form-group col-md-12">
							<label class="col-md-2 control-label">Prescribed By*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="prescribedby" name="prescribedby"  required>
							</div>							
							<label class="col-md-2 control-label">Bleep No*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="bleepno" name="bleepno"  required>
							</div>							
						</div>
						<div class="form-group col-md-12">
														
							<label class="col-md-2 control-label">Registered Doctor*</label>
							<div class="col-md-4">
								<input type="text" class="form-control1" id="regdoc" name="regdoc"  required>
							</div>							
						</div>       
							 

						<!-- BUTTON TO SAVE CHANGES -->
						<div class="form-group">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<button class="btn btn-primary" type="submit" id="btnsavepres"><i class="fa fa-save"></i>  SAVE CHANGES</button>
							</div>									
							<div class="col-md-3">
								<button id="btncancel" class="btn btn-danger" onclick="canceltrans()"><i class="fa fa-arrow-circle-left"></i> CANCEL</button> 
							</div>
							<div class="col-md-3"></div>
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

<script type="text/javascript" src="scripts/prescription.js"></script>

<?php 
}
ob_end_flush();
?>