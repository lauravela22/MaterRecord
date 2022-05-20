<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mater Health Record</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">

        <!--Calender-->

  <link rel="stylesheet" href="../public/css/clndr.css" type="text/css" />
  <script src="../public/js/underscore-min.js" type="text/javascript"></script>
  <script src= "../public/js/moment-2.2.1.js" type="text/javascript"></script>
  <script src="../public/js/clndr.js" type="text/javascript"></script>
  <script src="../public/js/site.js" type="text/javascript"></script>
  <script src="../public/js/bootstrap.bundle.min.js" type="text/javascript"></script>

 


    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="icon" href="../public/img/hse-icon2.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    


    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">  
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"> <img src="../public/img/hse-icon2.png"  width="50px" height= "50px"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Maternity Record</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $_SESSION['fileimg']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['fullname']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $_SESSION['fileimg']; ?>" class="img-circle" alt="User Image">
                    <p>
                       <?php echo $_SESSION['typeuser']; ?>
                      <small></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/users.php?op=endSession" class="btn btn-default btn-flat">Close</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="medicaldirectory.php">
                <i class="fa fa-phone-square"></i> <span>Medical Directory</span>
              </a>               
            </li>  
            <li>
              <a href="#">
                <i class="fa fa-list-alt"></i> <span>Administrative Section</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="calendar.php"><i class="fa fa-calendar"></i> Calendar</a></li>
                <li><a href="patient.php"><i class="fa fa-user"></i> Patients</a></li>
                <li><a href="correspondence.php"><i class="fa fa-envelope"></i> Correspondence</a></li>
              </ul>
              
            </li>            
            <li class="treeview">
              <a href="fetalassessment.php">
                <i class="fa fa-desktop"></i>
                <span>Fetal Assessment</span>
              </a>
              
            </li>
            
            <li class="treeview">
              <a href="antenatalrecord.php">
                <i class="fa fa-file-text"></i>
                <span>Antenatal Inpatient Records</span> 
              </a> 
            </li>
            <li class="treeview">
              <a href="prescription.php">
                <i class="fa fa-pencil-square-o"></i>
                <span>Prescribed Medicine /<br> Blood products</span>
              </a>
            </li>                       
           
            <li class="treeview">
              <a href="laboratory.php">
                <i class="fa fa-flask"></i> <span>Laboratory</span> 
              </a>
              
            </li>
            <li class="treeview">
              <a href="radiologydiagnostic.php">
                <i class="fa fa-file-image-o"></i> <span>Radiology & Diagnostic<br> Imaging</span>
                
              </a> 
            </li>
            <!-- VALIDATION FOR USER TYPE ADMIN CAN ADD EMPLOYEES -->
             <?php if ($_SESSION['idTypeUser']== 4)
            {
              echo '<li class="treeview">
                      <a href="employee.php"><i class="fa fa-users"></i> <span>Users</span></a>              
                    </li>';

            }
            ?>  
            
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
