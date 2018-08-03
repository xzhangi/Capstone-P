<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/admin-bs/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/admin-bs/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?=base_url()?>assets/admin-bs/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url()?>assets/admin-bs/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/admin-bs/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/admin-bs/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="AdminHome">Locka Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<li>
                            <a href="<?php echo base_url()?>AdminHome"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>accountmanagement"><i class="fa fa-dashboard fa-fw"></i> Account Management</a>
                        </li>
						 <li>
                            <a href="<?php echo base_url()?>rentaltransactions"><i class="fa fa-table fa-fw"></i>Rental Transactions</a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>lockerstatus"><i class="fa fa-edit fa-fw"></i>Status of Lockers</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>AdminNotifications"><i class="fa fa-bell fa-fw"></i> User Notifications</a>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>userreport"><i class="fa fa-edit fa-fw"></i>Report Misuse</a>
                        </li> 

                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Account</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						User Details                 
						</div>
                        <div class="panel-body">
							<form role="form" method="post">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
										<label>Name</label>
										<input name="name" id="name" class="form-control" value="<?php echo $Userdata['Display_Name']; ?>" type="text">
										</div>
										<div class="form-group">
										<label>Admin Number (if applicable)</label>
											<input name="username" class="form-control" value="<?php echo $Userdata['Username']; ?>" type="text" readonly>
										</div>
										<div class="form-group">
										<label>Email</label>
											<input name="email" class="form-control" value="<?php echo $Userdata['Email']; ?>" type="email">
										</div>
										<div class="form-group">
										 <label>Activation</label>
										 <select class="form-control">
										 <option>Active</option>
										 <option>Inactive</option>
											</select>
										</div>
										<button type="submit" class="btn btn-success">Update</button>
										<button type="reset" class="btn btn-default">Reset</button>
										<div class="form-group">
										   <label></label>
											<p class="form-control-static"></p>
										</div>
									</div>
									
									<div class="col-lg-6">

										<div class="form-group">
											<label>NRIC</label>
											<input name="nric" class="form-control" value="<?php echo $Userdata['NRIC'] ?>" type="text" >
										</div>
										<div class="form-group">
											<label>Mobile Number</label>
											<input name="mobile" class="form-control" value="<?php echo $Userdata['Mobile_No'] ?>" type="text">
										</div>
									</div>
									
								</div>
							</form> <!-- Ensure all fields + buttons are within this tag -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
