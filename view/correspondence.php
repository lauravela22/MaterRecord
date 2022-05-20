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
						<h1 class="box-title">CORRESPONDENCE LIST</h1>
						<?php
						 if ($_SESSION['idTypeUser'] != 1){
						echo '<button class="btn btn-primary" id="btnaddnewcc" onclick="showhideform(true)"><i class="fa fa-plus-circle"></i> Add Correspondence</button>
												</h3>';
						}
						?>
						<div class="box-tools pull-right">
						</div>
					</div>
					 
					<!-- DIV TABLE  -->
					<div class="panel-body table-responsive" id="listcorrespondence" style="overflow: auto !important;">
						<table id="tbllistmed" class="table table-striped table-bordered table-condensed tale-hover">
							<thead>
								<th>Options</th>
								<th>Patient</th>
								<th>Date </th>
								<th>Type of Correspondence</th>
								<th>File</th>
							</thead>
							<tbody></tbody>
							<tfoot>
								<th>Options</th>
								<th>Patient</th>
								<th>Date </th>
								<th>Type of Correspondence</th>
								<th>File</th>
							</tfoot>
						</table>
					</div>
					<div class="panel-body" id="formnewcorrespondence">
                        <form name="frmcorrespondence" id="frmcorrespondence" method="POST">
                        	<input type="hidden" name="idpatient" id="idpatient">
                        	<input type="hidden" name="idCorrespondence" id="idCorrespondence">
                  <div class="form-group col-md-12">

									<label class="col-md-2 control-label">Patient Full Name*</label>
									<div class="col-md-8">
										<!-- CALL TABLE TYPEUSER -->
										<select id="idpatfullname" name="idpatfullname" class="form-control selectpicker" data-live-search="true" required>
										</select>
									</div>	
									<div class="col-md-2"></div>								
								</div>								 
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label">Date*</label>
									<div class="col-md-8">
										<input type="date" class="form-control1" id="dateCC" name="dateCC"  required>
									</div>
									<div class="col-md-2"></div>								
								</div> 
								<div class="form-group col-md-12">
									<label for="mediuminput" class="col-md-2 control-label">Type of Correspondence*</label>
									<div class="col-md-8">
										<!-- CALL TABLE TYPEUSER -->
										<select id="typeCC" name="typeCC" class="form-control">
											<option value="">Select one option</option>
											<option value="1">Referral Letter</option>
											<option value="2">Discharge Communication</option>
											<option value="3">Ambulance Transer Sheet</option>
											<option value="4">Other</option>
										</select>
									</div>
									<div class="col-md-2"></div>
								</div>
                          <div class="form-group col-md-12">
                            <label class="col-md-2 control-label">Select File:</label>
                            <div class="col-md-8">
                            <input type="file" class="form-control" name="fileCC" id="fileCC" >
                          
                        	</div>
                          </div>
                         
                         <div class="form-group col-md-12">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<button type="submit" id="btnsaveempl" class="btn btn-success"><i class="fa fa-save"></i> SAVE CHANGES</button>
							</div>									
							<div class="col-md-3">
								<button id="btncancel" class="btn btn-danger" onclick="canceltrans()"><i class="fa fa-arrow-circle-left"></i> CANCEL</button> 

							</div>
							<div class="col-md-3"></div>
						</div>
                        </form>
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

<script type="text/javascript" src="scripts/correspondence.js"></script>

<?php 
}
ob_end_flush();
?>