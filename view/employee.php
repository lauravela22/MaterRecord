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

<!-- Contains page content -->
<div class="content-wrapper">        
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">EMPLOYEE 
						<button class="btn btn-primary" id="btnaddnewemp" onclick="showhideform(true)"><i class="fa fa-plus-circle"></i> New Employee</button>
						</h3>
						<div class="box-tools pull-right">
						</div>
					</div>
					 
					<!-- DIV TABLE  -->
					<div class="panel-body table-responsive" id="listemployee" style="overflow: auto !important;">
						<table id="tbllist" class="table table-striped table-bordered table-condensed tale-hover">
							<thead>
								<th>Options</th>
								<th>Id User</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User</th>
								<th>Password</th>
								<th>Type User</th>
								<th>Register Number</th>
								<th>Status</th>
							</thead>
							<tbody></tbody>
							<tfoot>
								<th>Options</th>
								<th>Id User</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User</th>
								<th>Password</th>
								<th>Type User</th>
								<th>Register Number</th>
								<th>Status</th>
							</tfoot>
						</table>
					</div>

					<!-- DIV FORM -->
					<div class="panel-body" style="height: auto !important;" id="formemployee"   style="overflow: auto !important;">
					 						 
						<form class="form-horizontal" name="formdataemployee" id="formdataemployee" method="POST">
								<input type="hidden" id="idUser" name="idUser">
								<div class="form-group">
									<label class="col-md-12 control-label" style="color: red;">* REQUIRED FIELDS 
									</label>
								</div>
								<div class="form-group">
									<label for="" class="col-md-2 control-label">First Name(s)*</label>
									<div class="col-md-8">
										<input type="text" class="form-control1" id="firstname" name="firstname" required>
									</div>										
								</div>
								<div class="form-group">
									<label for="" class="col-md-2 control-label">Last Name(s)*</label>
									<div class="col-md-8">
										<input type="text" class="form-control1" id="lastname" name="lastname" required>
									</div>										
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-md-2 control-label">User*</label>
									<div class="col-md-8">
										<input type="text" class="form-control1" id="user" name="user" required >
									</div>										
								</div>
								<div class="form-group">
									<label for="disabledinput" class="col-md-2 control-label">Password*</label>
									<div class="col-md-8">
										<input type="text" class="form-control1" id="password" name="password" required>
									</div>
								</div>
								<div class="form-group">
									<label for="mediuminput" class="col-md-2 control-label">Type User*</label>
									<div class="col-md-8">
										<!-- CALL TABLE TYPEUSER -->
										<select id="idTypeUser" name="idTypeUser" class="form-control selectpicker" data-live-search="true" required>
										</select>
									</div>
								</div>
								<div class="clearfix"></div><br>
								<div class="form-group">
									<label for="disabledinput" class="col-md-2 control-label">Register Number</label>
									<div class="col-md-8">
										<input type="text" class="form-control1" id="regnumber" name="regnumber">
									</div>
								</div>

								<div class="form-group">
									<label for="radio" class="col-md-2 control-label">Status</label>
									<div class="col-md-8">
										<div class="radio block"><label>
											<input type="radio" id="active" name="status" checked value="1"> Active</label></div>
										<div class="radio block"><label>
											<input type="radio" id="inactive" name="status" value="0"> Inactive</label></div>

									</div>
								</div>
								<div class="form-group">
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
<script type="text/javascript" src="scripts/employee.js"></script>
<?php 
}
ob_end_flush();
?>