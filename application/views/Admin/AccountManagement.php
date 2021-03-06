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
                <li class="dropdown">
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
						<li><a href="<?php echo base_url();?>AdminHome/do_logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>                        
						</li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Accounts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-15">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<a href="<?php echo base_url();?>createadmin/create_admintry"><i class="\"></i> Create User</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>NRIC</th>
										<th>Admin Number</th>
										<th>Name</th>
										<th>E-mail</th>
										<th>Mobile Number</th>
										<th>Points</th>
										<th>Active</th>
										<th></th>
										<th></th>
										
										<tbody>
										<?php for ($i = 0; $i < count($userlist); $i++) { ?>
										<tr>
										<td><?php echo ($i+1); ?></td>
										<td><?php echo $userlist[$i]->NRIC; ?></td>
										<td><?php echo $userlist[$i]->Username; ?></td>
										<td><?php echo $userlist[$i]->Display_Name; ?></td>
										<td><?php echo $userlist[$i]->Email; ?></td>
										<td><?php echo $userlist[$i]->Mobile_No; ?></td>
										<td><?php echo $userlist[$i]->Points; ?></td>
										<?php if($userlist[$i]->Is_Active) { ?>
										<td>Yes</td>
										<?php } else { ?>
										<td>No</td>
										<?php } ?>
										<td><p><a href="<?php echo base_url();?>UpdateAccount/GetAccountDetails/<?php echo ($userlist[$i]->Username) ?>"><button type="button" class="btn btn-primary">Edit</button></a></p> </td>
										<td><p><a href="<?php echo base_url();?>AccountManagement/delete_user/<?php 
										echo $userlist[$i]->Username ?>"><button type="button" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete?') ;">Delete</button></a></p> </td>
										
										
										</tr>
										<?php } ?>
										</tr>
										</tbody>
                                    </thead>
                                </table>
                            </div>			
                        </div>
                    </div>
                </div>
            </div>


                          

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/admin-bs/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/admin-bs/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/admin-bs/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?=base_url()?>assets/admin-bs/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/admin-bs/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin-bs/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/admin-bs/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
