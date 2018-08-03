<!DOCTYPE html>
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
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Status of Lockers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped" id="dataTables-example">
                                <thead>	
                                    <tr>
                                        <th>#</th>
										<th>
										<a href="<?php echo base_url();?>LockerInfo"><i class=""></i> Location ID</a>                        
										</th>
										<th>
										<a href="<?php echo base_url();?>LockerSize"><i class=""></i> Locker Size</a>                        
										</th>
										<th>Name</th>
										<th>Locker Active</th>
										<th>Locker Available</th>
										<th>Created Date</th>
										<th></th>
										
										<tbody>
										<?php for ($i = 0; $i < count($lockerlist); $i++) { ?>
										<tr>
										<td><?php echo $lockerlist[$i]->Locker_ID ?></td>
										<td><?php echo $lockerlist[$i]->Location_ID; ?></td>
										<td><?php echo $lockerlist[$i]->Locker_Size_ID; ?></td>
										<td><?php echo $lockerlist[$i]->Name; ?></td>
										<?php if ($lockerlist[$i]->Is_Active) { ?>
										<td>Yes</td>
										<?php } else { ?>
										<td>No</td> <?php } ?>
										<?php if ($lockerlist[$i]->Is_Available) { ?>
										<td>Yes</td>
										<?php } else { ?>
										<td>No</td> <?php } ?>
										<td><?php echo $lockerlist[$i]->Created_Date; ?></td>
										<td><p><a href="<?php echo base_url();?>LockerStatus/UpdateLockerStatus/<?php echo $lockerlist[$i]->Locker_ID?>"><button type="submit" class="btn btn-primary" value="Update">Change Locker Status</button></a></p></td>
                                        </div>
										</tr>
										<?php } ?>
										
                                    </tr>
									
                                </thead>                       
                            </table>
                        </div>
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