<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Locka</title>

  <!-- css -->
  <link href="<?php echo base_url()?>assets/Default-BS/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/Default-BS/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Default-BS/plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="<?php echo base_url()?>assets/Default-BS/css/nivo-lightbox.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/Default-BS/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()?>assets/Default-BS/css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url()?>assets/Default-BS/css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url()?>assets/Default-BS/css/animate.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/Default-BS/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/Default-BS/css/custom.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="<?php echo base_url()?>assets/Default-BS/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="<?php echo base_url()?>assets/Default-BS/color/default.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Medicio
    Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <!--<div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">Hello</p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Whats Up</p>
            </div>
          </div>
        </div>
      </div>-->
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="<?php echo base_url();?>Home">
                    <img src="<?php echo base_url()?>assets/Default-BS/img/logo.png" alt="" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#BookLocker">Book a Locker</a></li>
            <li><a href="#LockerStatus">Locker Booking Status</a></li>
            <li><a href="#Lockers">Lockers</a></li>
            <li><a href="#locations">Locations</a></li>
            <li><a href="#pastTransactions">Past Transactions</a></li>
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a><!--<span class="badge custom-badge red pull-right">Extra</span>-->
              <ul class="dropdown-menu">
                
                <li><a href="<?php echo base_url();?>eWallet">eWallet</a></li>
                <li><a href="#footer">Contact Us</a></li>
                <li><a href="<?php echo base_url();?>Home/do_logout">Log Out</a></li>
              </ul>
            </li>
            <!-- /.dropdown -->
             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            <!-- /.dropdown-alerts -->
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <!-- Section: Book Locker -->
    <section id="BookLocker" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="well well-trans">
              <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
        				<div class="section-heading text-center">
        					<h3 class="h-bold" style="text-align: center;">Welcome <?php echo $this->session->userdata('DName'); ?>!</h3>
                  <!-- Show and hide this p accordingly -->
                  <?php if(!$bookingdetails['Rented']) { ?>
        					   <p>Select and book a locker here!</p>
                  <?php } else { ?>
                  <p>You can book a locker, check booking status, lockers, locations, eWallet... The world is your oyster!</p>
                  <?php } ?>
                </div>
              </div>
			   <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                <!-- If user has not rented any lockers, show locker rental portion -->
                <?php if(!$bookingdetails['Rented']) { ?>
                <!-- Locker size selector -->
                 <div class="cc-selector"> <!-- class to hide radio buttons -->
  				        <div class="col-md-4">
						   <div class="image-padding">
							<!-- small locker -->
							  <input type="radio" id="LockerRadioSmall" name="LockerRadioSelector" value="Small"">
							  <label class="lockerImgSmall" for="LockerRadioSmall">
							  <img src="<?php echo base_url()?>assets/Default-BS/img/team/small.png">
							  </label>
						   </div>
  				        </div>
  				        <div class="col-md-4">
						  <div class="image-padding">
							<!-- medium locker -->
							<label>
							  <input type="radio" id="LockerRadioMedium" name="LockerRadioSelector" value="Medium"">
							  <img src="<?php echo base_url()?>assets/Default-BS/img/team/medium.png">
							</label>
						  </div>
  				        </div>
  				        <div class="col-md-4">
						  <div class="image-padding">
							<!-- big locker -->
							<label>
							  <input type="radio" id="LockerRadioBig" name="LockerRadioSelector" value="Large"">
							  <img src="<?php echo base_url()?>assets/Default-BS/img/team/big.png">
							</label>
						  </div>
						</div>
          </div>
				      
                <form action="<?php echo base_url();?>Home/book_locker" method="post" role="form">
                  <div style="text-align: center">
                    <select name="lockerselected" id="lockerselected" style="padding: 5px; margin: 10px;" required>
                      <option value="" disabled selected>Select a Locker</option>
                      <?php foreach($availablelockerlist as $lockerItem)
                      { ?>
                          <option value="<?php echo $lockerItem->LockerID; ?>" ><?php echo $lockerItem->Name; ?></option>
                  <?php 
                      } ?>
                    </select>
                    
                    <select name="rentaltypeselected" id="rentaltypeselected" style="padding: 5px; margin: 10px;" required>
                      <option value="" selected>Select a Rental Type</option>
                      <?php foreach($availablerentaltype as $rentalItem)
                      { ?>
                          <option value="<?php echo $rentalItem->Rental_Type_ID; ?>" ><?php echo $rentalItem->Name; ?></option>
                  <?php 
                      } ?>
                    </select>
          
                    <input type="checkbox" onclick="javascript:generatePinCheck();" name="autogeneratepin" id="autogeneratepin" style="margin: 10px;"><label for="generatepin">Automatically Generate PIN</label></input>
                    <input type="password" name="pincode" id="pincode" style="margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Enter a 6 Digit Pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" Title="Please enter 6 digits" required>
                    <input type="password" name="pincode_confirm" id="pincode_confirm" style="margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Confirm your Pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" oninput="check(this)" Title="Please enter 6 digits" required>
                    <div class="validation"></div>
                  </div>
                  <div>
                    <input type="submit" value="Book Locker!" class="btn btn-skin btn-block btn-lg">
                  </div>
                </form>
                <!-- User already rented locker, hide locker booking portion -->
                <?php } else { ?>
                <?php } ?>

              </div>
          </div>
		</div>
      </div>
	  </div>
    </section>
    <!-- /Section: Book Locker -->

    <!-- Section: Locker Status -->
	
    <section id="LockerStatus" class="home-section nopadding paddingtop-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 50px; margin-bottom: 5px;">
			        <div class="section-heading text-center">
                <h3 class="h-bold">Locker Booking Status</h3>
                <p>Check the status of your locker booking here!</p>
              </div>
            </div>
			<div class="divider-short"></div>
			<?php if ($bookingdetails['Rented']) { ?>
    <div class="table-responsive">
			<table class="table table-hover">
        <thead class="thead-light">
				<tr>
					<th>Locker ID</th>
					<th>Rental Type</th>
					<th>Rent Start Date/Time</th>
					<th>Rent End Date/Time</th>
					<th>Pin Code</th>
					<th>Unlocked</th>
				</tr>
      </thead>
				<tr>
					<td><?php echo $bookingdetails['Locker_ID'] ?></td>
          <?php if($bookingdetails['Rental_Type'] == 1 || $bookingdetails['Rental_Type'] == 2 || $bookingdetails['Rental_Type'] == 3) { ?>
            <td>Per Minute Rental</td>
          <?php } else { ?>
            <td>Month Rental</td>
          <?php } ?>
					<td><?php echo $bookingdetails['Rent_From_Date'] ?></td>
          <?php if(empty($bookingdetails['Rent_To_Date'])) { ?> <!-- echo - if no end date-->
            <td><?php echo '----' ?></td>
          <?php } else { ?>
          <td><?php echo $bookingdetails['Rent_To_Date'] ?></td>
					<?php } ?>
					<td><?php echo $bookingdetails['Pin_Code'] ?></td>
          <?php if ($bookingdetails['Locker_Unlocked']) { ?>
					  <td>Unlocked</td>
          <?php } else { ?>
            <td>Locked</td>
          <?php } ?>
				</tr>
			</table>
    </div>

      <form action="<?php echo base_url();?>Home/change_pin" method="post">
        <div class="col-md-3" style="margin-top: 10px;">
          <input type="password" name="pincode_old" id="pincode_old" style="margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Enter your old pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" Title="Please enter 6 digits" required>
        <input type="password" name="pincode" id="pincode" style="margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Enter a 6 digit pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" Title="Please enter 6 digits" required>
        <input type="password" name="pincode_confirm" id="pincode_confirm" style="margin-bottom: 15px;" maxlength="6" pattern="[0-9]{6}" placeholder="Confirm your pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" oninput="check(this)" Title="Please enter 6 digits" required>
        <input type="submit" value="Change pin" class="btn btn-skin btn-block btn-lg">
        <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php if(!is_null($pinErrMsg)) echo $pinErrMsg; ?>
          </div>
        </div>
      </form>

      <form action="<?php echo base_url();?>Home/show_pin" method="post">
       <div class="col-md-9">
        <?php if ($bookingdetails['Pin_Code'] == '******') { ?>
          <input type="password" name="userPass" id="userPass" style="margin-top: -5px; margin-bottom: 5px;" placeholder="Enter your password" class="form-control input-md" Title="Please enter your password" required>
          <input type="submit" id="showPinBtn" name="showPinBtn" style="margin-bottom: 3px;" value="Show Pin" class="btn btn-skin btn-block btn-lg">
        <?php } else { ?>
          <input type="text" name="userPass" id="userPass" style="margin-top: -5px; margin-bottom: 5px;" placeholder="Enter your password" class="form-control input-md" value="-" Title="Please enter your password" readonly>
          <input type="submit" id="showPinBtn" name="showPinBtn" style="margin-bottom: 3px;" value="Hide Pin" class="btn btn-skin btn-block btn-lg">
        <?php } ?>
     </form>
       </div>
       
       <form  action="<?php echo base_url();?>Home/unlock_locker" method="post">
       <div class="col-md-6">
        <input type="password" name="pincode" id="pincode" style="margin-top: 5px; margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Enter your pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" Title="Please enter 6 digits" required>
       </div>
        <div class="col-md-3" style="margin-top: 2px;">
        <?php if ($bookingdetails['Locker_Unlocked']) { ?>
          <input type="submit" value="Lock Locker" class="btn btn-skin btn-block btn-lg">
        <?php } else { ?>
          <input type="submit" value="Unlock Locker" class="btn btn-skin btn-block btn-lg">
        <?php } ?>
      </form>
       </div>
    <div class="col-md-9" style="margin-top: 15px;">
      <form action="<?php echo base_url();?>Home/complete_booking" method="post">
        <!-- Workaround to get Locker_ID rented > sending the booking detail's locker_id through post -->
        <input type="hidden" name="lockerselected" value="<?php echo $bookingdetails['Locker_ID'] ?>">
        <input type="submit" value="Complete Booking!" style="margin-top: -13px;" class="btn btn-skin btn-block btn-lg">
        <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php if(!is_null($msg2)) echo $msg2; ?>
          </div>
      </form>
    </div>

			<?php } else { ?>
			<h3 class="section-heading text-center">You are not renting any lockers currently!</h3>
			<?php } ?>
          </div>
		</div>
    </section>
	
    <!-- /Section: Locker Status -->


    <!-- Section: locker availability list -->
    <section id="Lockers" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h3 class="h-bold">Lockers</h2>
                <p>Check for available lockers around the campus here!</p>
                <p>Occupied lockers are greyed out.</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
		  
		  <div class="col-lg-12"> 
      <div class="row">
        <?php foreach($availablelockerlist as $lockerItem) { ?>
          <?php if ($lockerItem->Is_Available) { ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="lockerboxavailable"></div>
                <?php if ($lockerItem->Locker_Size_ID == '1') { ?>
                  <div class="smallavailable"></div>
                <?php } else if ($lockerItem->Locker_Size_ID == '2'){ ?>
                  <div class="mediumavailable"></div>
                <?php } else { ?>
                  <div class="largeavailable"></div>
                <?php } ?>

              <div style="text-align: center;"><?php echo $lockerItem->Name ?></div>
            </div>
          <?php } else { ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <?php if ($lockerItem->Locker_Size_ID == '1') { ?>
                  <div class="smallunavailable"></div>
                <?php } else if ($lockerItem->Locker_Size_ID == '2'){ ?>
                  <div class="mediumunavailable"></div>
                <?php } else { ?>
                  <div class="largeunavailable"></div>
                <?php } ?>
              <div><?php echo $lockerItem->Name ?></div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      
        </div>
		  
        </div>
      </div>
    </section>
    <!-- /Section: locker availability list -->



    <!-- Section: works -->
    <section id="locations" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h3 class="h-bold">Locations</h3>
                <p>Our lockers are all around campus for your convenience!</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
			  <div id="googleMap" style="width:100%;height:400px;"></div>
				
              </div>
			</div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: works -->


    <!-- Section: Past Rental Transactions -->
    <section id="pastTransactions" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="section-heading text-center">
                <h3 class="h-bold">Past Transactions</h3>
                <p>View your past locker bookings here!</p>
              </div>
            </div>
            <div class="divider-short"></div>
            <?php if ($pastlockertransactionslist != false) { ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                  <th>Locker ID</th>
                  <th>Rental Type</th>
                  <th>Rent Start Date/Time</th>
                  <th>Rent End Date/Time</th>
                  <th>Rented By</th>
                  <th>Paid</th>
                </tr>
              </thead>
                <?php foreach($pastlockertransactionslist as $trans) { ?>
                <tr>
                  <td><?php echo $trans->Locker_ID ?></td>
                  <?php if($trans->Rental_Type == 1 || $trans->Rental_Type == 2 || $trans->Rental_Type == 3) { ?>
                  <td>Per Minute Rental</td>
                <?php } else { ?>
                  <td>Month Rental</td>
                <?php } ?>
                  <td><?php echo $trans->Rent_From_Date ?></td>
                  <td><?php echo $trans->Rent_To_Date ?></td>
                  <td><?php echo $trans->Rented_By ?></td>
                  <?php if($trans->Paid) { ?>
                    <td>Yes</td>
                    <?php } else { ?>
                    <td>No</td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </table>
              <?php } else { ?>
              <h3 class="section-heading text-center">You do not have any past transactions.</h3>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: Past Rental Transactions -->

        <footer id="footer">
      <div class="container" style="padding: 50px;">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>About Locka</h5>
                <p>
                  NYP's Locker Rental Application designed for every student's needs!
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Contact Us</h5>
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                </span> 24/7
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                </span> +65 6451 5115
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                </span>contact@locka.com
                  </li>
                </ul>
              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Follow us</h5>
                <ul class="company-social">
                  <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                  <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Our location</h5>
                <p>180 Ang Mo Kio Avenue 8, 569830</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.660983819964!2d103.84683261484682!3d1.3800708989934878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16eb64b0249d%3A0xe5f10ff680eed942!2sNanyang+Polytechnic!5e0!3m2!1sen!2ssg!4v1533220202597" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy;Copyright - Locka. All rights reserved.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="text-right">
                  <div class="credits">
                    <!--
                      All the links in the footer should remain intact. 
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medicio
                    -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <script src="<?php echo base_url()?>assets/Default-BS/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/wow.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/jquery.scrollTo.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/jquery.appear.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/stellar.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/nivo-lightbox.min.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/js/custom.js"></script>
  <script src="<?php echo base_url()?>assets/Default-BS/contactform/contactform.js"></script>
  
  <!-- Google maps API -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM_ruwPbWftocXUf_rT2ieceDrKLhMMc8&callback=googleMap"></script>
  <script src="<?php echo base_url()?>assets/GoogleMap.js"></script>
  
  <!-- Custom Script -->
  <script src="<?php echo base_url()?>assets/User-Home.js"></script>
</body>