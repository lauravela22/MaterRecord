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
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h1 class="box-title">CALENDAR 
              <?php
             if ($_SESSION['idTypeUser'] != 1 ){
              echo '<button id="btnnewapp" class="btn btn-success" onclick="showhideform(true)"><i class="fa fa-plus-circle"></i> Add Appointment</button>';
              }
              ?>

            </h1>
						<div class="box-tools pull-right">
						</div>
					</div>
					<!-- /.box-header -->
					<!-- centro -->

					<div class="panel-body table-responsive" id="formcalendar" name="formcalendar" >
						<div class="container py-5">

  <!-- For Demo Purpose -->
  
  <style type="text/css">
  	
  	/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
.clearfix::after,
.calendar ol::after {
  content: ".";
  display: block;
  height: 0;
  clear: both;
  visibility: hidden;
}

/* ================
Calendar Styling */
.calendar {
  border-radius: 10px;
}

.month {
  font-size: 2rem;
}

@media (min-width: 992px) {
  .month {
    font-size: 3.5rem;
  }
}

.calendar ol li {
  float: left;
  width: 14.28571%;
}

.calendar .day-names {
  border-bottom: 1px solid #eee;
}

.calendar .day-names li {
  text-transform: uppercase;
  margin-bottom: 0.5rem;
}

.calendar .days li {
  border-bottom: 1px solid #eee;
  min-height: 8rem;
}

.calendar .days li .date {
  margin: 0.5rem 0;
}

.calendar .days li .event {
  font-size: 0.75rem;
  padding: 0.4rem;
  color: white;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  border-radius: 4rem;
  margin-bottom: 1px;
}

.calendar .days li .event.span-2 {
  width: 200%;
}

.calendar .days li .event.begin {
  border-radius: 1rem 0 0 1rem;
}

.calendar .days li .event.end {
  border-radius: 0 1rem 1rem 0;
}

.calendar .days li .event.clear {
  background: none;
}

.calendar .days li:nth-child(n+29) {
  border-bottom: none;
}

.calendar .days li.outside .date {
  color: #ddd;
}
  </style>


  <!-- Calendar -->
  <div class="calendar shadow bg-white p-5">
    <div class="d-flex align-items-center">
      <h2 class="month font-weight-bold mb-0 text-uppercase">December 2019</h2>
    </div>
    <p class="font-italic text-muted mb-5">No events for this day.</p>
    <ol class="day-names list-unstyled">
      <li class="font-weight-bold text-uppercase">Sun</li>
      <li class="font-weight-bold text-uppercase">Mon</li>
      <li class="font-weight-bold text-uppercase">Tue</li>
      <li class="font-weight-bold text-uppercase">Wed</li>
      <li class="font-weight-bold text-uppercase">Thu</li>
      <li class="font-weight-bold text-uppercase">Fri</li>
      <li class="font-weight-bold text-uppercase">Sat</li>
    </ol>

    <ol class="days list-unstyled">
      <li>
        <div class="date">1</div>
        <div class="event bg-success">Event with Long Name</div>
      </li>
      <li>
        <div class="date">2</div>
      </li>
      <li>
        <div class="date">3</div>
      </li>
      <li>
        <div class="date">4</div>
      </li>
      <li>
        <div class="date">5</div>
      </li>
      <li>
        <div class="date">6</div>
      </li>
      <li>
        <div class="date">7</div>
      </li>
      <li>
        <div class="date">8</div>
      </li>
      <li>
        <div class="date">9</div>
      </li>
      <li>
        <div class="date">10</div>
      </li>
      <li>
        <div class="date">11</div>
      </li>
      <li>
        <div class="date">12</div>
      </li>
      <li>
        <div class="date">13</div>
        <div class="event all-day begin span-2 bg-warning">Event Name</div>
      </li>
      <li>
        <div class="date">14</div>
      </li>
      <li>
        <div class="date">15</div>
        <div class="event all-day end bg-success">Event Name</div>
      </li>
      <li>
        <div class="date">16</div>
      </li>
      <li>
        <div class="date">17</div>
      </li>
      <li>
        <div class="date">18</div>
      </li>
      <li>
        <div class="date">19</div>
      </li>
      <li>
        <div class="date">20</div>
      </li>
      <li>
        <div class="date">21</div>
        <div class="event bg-primary">Event Name</div>
        <div class="event bg-success">Event Name</div>
      </li>
      <li>
        <div class="date">22</div>
        <div class="event bg-info">Event with Longer Name</div>
      </li>
      <li>
        <div class="date">23</div>
      </li>
      <li>
        <div class="date">24</div>
      </li>
      <li>
        <div class="date">25</div>
      </li>
      <li>
        <div class="date">26</div>
      </li>
      <li>
        <div class="date">27</div>
      </li>
      <li>
        <div class="date">28</div>
      </li>
      <li>
        <div class="date">29</div>
      </li>
      <li>
        <div class="date">30</div>
      </li>
      <li>
        <div class="date">31</div>
      </li>
      <li class="outside">
        <div class="date">1</div>
      </li>
      <li class="outside">
        <div class="date">2</div>
      </li>
      <li class="outside">
        <div class="date">3</div>
      </li>
      <li class="outside">
        <div class="date">4</div>
      </li>
    </ol>
  </div>
					</div>
        </div>

					 <div class="panel-body" id="formappointments">
                  <form name="formnewapp" id="formnewapp" method="POST">
                    <input type="hidden" name="idpatient" id="idpatient">
                    <input type="hidden" name="idAppointment" id="idAppointment">
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
                  <div class="col-md-3">
                    <input type="date" class="form-control1" id="datepp" name="datepp"  required>
                  </div>     
                  <div class="col-md-1"></div>           
                  <label class="col-md-1 control-label">Hour*</label>
                  <div class="col-md-3">
                    <input type="time" class="form-control1" id="timeapp" name="timeapp"  required>
                  </div>                         
                </div> 
                <div class="form-group col-md-12">
                  <label for="mediuminput" class="col-md-2 control-label">Type of Appointment*</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control1" id="typeapp" name="typeapp"  required>
                  </div>
                  <div class="col-md-2"></div>
                </div>                      
                         
              <div class="form-group col-md-12">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <button type="submit" id="btnsaveapp" class="btn btn-success"><i class="fa fa-save"></i> SAVE CHANGES</button>
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
 
<script type="text/javascript" src="scripts/appointment.js"></script>
<?php
}
ob_end_flush();
?>