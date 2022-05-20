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
						<h1 class="box-title">RADIOLGY AND DIAGNOSTIC IMAGING</h1><br><br>
						 
						<div class="box-tools pull-right">
						</div>
						
						 
					</div>
					<!-- /.box-header -->
					<!-- center -->
					 
				<!-- DIV TABLE  -->
					<div class="panel-body table-responsive" id="listfetalasse" style="overflow: auto !important;">
						<table id="tbllistpatients" class="table table-striped table-bordered table-condensed tale-hover">
							<thead>
								<th>Patient Full Name</th>								 
								<th>Date </th>
								<th>File</th>
								 
							</thead>
							<tbody></tbody>
							<tfoot>
								<th>Patient Full Name</th>								 
								<th>Date </th>
								<th>File</th>
							</tfoot>
						</table>
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

<script type="text/javascript" src="scripts/radiology.js"></script>

<?php 
}
ob_end_flush();
?>