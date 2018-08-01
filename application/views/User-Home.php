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
            <li><a href="<?php echo base_url();?>eWallet">eWallet</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a><!--<span class="badge custom-badge red pull-right">Extra</span>-->
              <ul class="dropdown-menu">
                <li><a href="index.html">FAQ</a></li>
                <li><a href="index-form.html">Contact Us</a></li>
				<li><a href="<?php echo base_url();?>cardDetails_conc/cardDetails">Payment</a></li>
                <li><a href="<?php echo base_url();?>Home/do_logout">Log Out</a></li>
              </ul>
            </li>
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
        					<h3 class="h-bold" style="text-align: center;">Book a Locker</h3>
                  <!-- Show and hide this p accordingly -->
                  <?php if(!$bookingdetails['Rented']) { ?>
        					   <p>Select and book a locker here!</p>
                  <?php } else { ?>

                  <?php } ?>
                </div>
        			  <div class="divider-short" style="margin-bottom: 20px;"></div>
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
                      <option value="" disabled selected>Select a Rental Type</option>
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
                  <h3 class="section-heading text-center">You are currently renting a locker!</h3>
                <?php } ?>

              </div>
          </div>
		</div>
      </div>
	  </div>
    </section>

    <!-- /Section: intro -->

				        
			         </div>
        </div>
      </div>

    </section>
    <!-- /Section: boxes -->

    <!-- /Section: Book Locker -->

    <!-- Section: Locker Status -->
	
    <section id="LockerStatus" class="home-section nopadding paddingtop-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
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
					<th>Rented By</th>
					<th>Pin Code</th>
				</tr>
      </thead>
				<tr>
					<td><?php echo $bookingdetails['Locker_ID'] ?></td>
          <td><?php echo $bookingdetails['Rental_Type'] ?></td>
					<td><?php echo $bookingdetails['Rent_From_Date'] ?></td>
          <?php if(empty($bookingdetails['Rent_To_Date'])) { ?> <!-- echo - if no end date-->
            <td><?php echo '----' ?></td>
          <?php } else { ?>
          <td><?php echo $bookingdetails['Rent_To_Date'] ?></td>
					<?php } ?>
					<td><?php echo $bookingdetails['Rented_By'] ?></td>
					<td><?php echo $bookingdetails['Pin_Code'] ?></td>
				</tr>
			</table>
    </div>

      <form action="<?php echo base_url();?>Home/change_pin" method="post">
        <div class="col-md-3" style="margin-top: 10px;">
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php if(!is_null($pinErrMsg)) echo $pinErrMsg; ?>
          </div>
          <input type="password" name="pincode_old" id="pincode_old" style="margin-top: 5px; margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Enter your old pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" Title="Please enter 6 digits" required>
        <input type="password" name="pincode" id="pincode" style="margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Enter a 6 digit pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" Title="Please enter 6 digits" required>
        <input type="password" name="pincode_confirm" id="pincode_confirm" style="margin-bottom: 10px;" maxlength="6" pattern="[0-9]{6}" placeholder="Confirm your pin" class="form-control input-md" data-rule="minlen:6" data-msg="Please enter 6 Digits only" oninput="check(this)" Title="Please enter 6 digits" required>
        <input type="submit" value="Change pin" class="btn btn-skin btn-block btn-lg">
        </div>
      </form>

      <form action="<?php echo base_url();?>Home/show_pin" method="post">
       <div class="col-md-6">
        <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php if(!is_null($lockerUnlockMsg)) echo $lockerUnlockMsg; ?>
          
          </div>
          <input type="password" name="userPass" id="userPass" style="margin-bottom: 10px;" placeholder="Enter your password" class="form-control input-md" Title="Please enter your password" required>
          <input type="submit" id="showPinBtn" name="showPinBtn" value="Show Pin" class="btn btn-skin btn-block btn-lg">
       </div>
     </form>

       <div class="col-md-3">
      <form  action="<?php echo base_url();?>Home/unlock_locker" method="post">
        <?php if(!is_null($showPinMsg)) echo $showPinMsg; ?>
        <input type="submit" value="Unlock Locker" class="btn btn-skin btn-block btn-lg">
      </form>
      <form action="<?php echo base_url();?>Home/complete_booking" method="post">
        <!-- Workaround to get Locker_ID rented > sending the booking detail's locker_id through post -->
        <input type="hidden" name="lockerselected" value="<?php echo $bookingdetails['Locker_ID'] ?>">
        <input type="submit" value="Complete Booking!" class="btn btn-skin btn-block btn-lg">
      </form>
    </div>

			<?php } else { ?>
			<h3 class="section-heading text-center">You are not renting any lockers currently!</h3>
			<?php } ?>
          </div>
		</div>
    </section>
	
    <!-- /Section: Locker Status -->


    <!-- Section: team -->
    <section id="Lockers" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h3 class="h-bold">Lockers</h2>
                <p>Locker Availability</p>
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
						</div>
					<?php } else { ?>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="lockerboxunavailable"></div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		  
		  </div>
		  
        </div>
      </div>
    </section>
    <!-- /Section: team -->



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


    <!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

      <div class="carousel-reviews broun-block">
        <div class="container">
          <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
                <div class="item active">
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Love it!</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Love the convenience! Booked a locker for an hour for such an affordable rate.</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php echo base_url()?>assets/Default-BS/img/testimonials/girl.png" alt="" class="person img-circle" />
                      <a title="" href="#">Anna Tan</a>
                      <span>SIT</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Website is awesome :)</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span>
                        <span
                          data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Would be great if there was a mobile application specifically for this... but still great!</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php echo base_url()?>assets/Default-BS/img/testimonials/guy.png" alt="" class="person img-circle" />
                      <a title="" href="#">Ben Wong</a>
                      <span>SEG</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">This is the best.</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                      </div>
                      <p>This has made my life so much easier! No longer have to bring my lab coat home everyday!!</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php echo base_url()?>assets/Default-BS/img/testimonials/girl.png" alt="" class="person img-circle" />
                      <a title="" href="#">Angel Lim</a>
                      <span>SHS</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Pleasant experience!</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Forgot my pin and was able to change it easily! Thumbs up</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php echo base_url()?>assets/Default-BS/img/testimonials/guy.png" alt="" class="person img-circle" />
                      <a title="" href="#">Ahmad Ibrahim</a>
                      <span>SBM</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Well designed..</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span>
                        <span
                          data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Like that i can choose from different kinds of packages instead of renting for a semester! :)</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php echo base_url()?>assets/Default-BS/img/testimonials/girl.png" alt="" class="person img-circle" />
                      <a title="" href="#">Siti Aishah</a>
                      <span>SDN</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">So much convenience</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                      </div>
                      <p>Never knew having a locker was so much convenience!! I can even put my bag in it and go out for lunch.. This is awesome :)</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php echo base_url()?>assets/Default-BS/img/testimonials/guy.png" alt="" class="person img-circle" />
                      <a title="" href="#">Adam Tan</a>
                      <span>SIDM</span>
                    </div>
                  </div>
                </div>


              </div>

              <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
              <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: testimonial -->


    <!-- Section: pricing -->
    <section id="pricing" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h3 class="h-bold">Pricing</h3>
                <p>Choose from a variety of pricing packages!</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">

        <div class="row">

          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.1s">
              <div class="pricing-content general">
                <h2>Basic Fit 1 Package</h2>
                <h3>$33<sup>.99</sup> <span>/ one time</span></h3>
                <ul>
                  <li>Anthropometry (BMI, WH Ratio) <i class="fa fa-check icon-success"></i></li>
                  <li>Post Examination Review <i class="fa fa-check icon-success"></i></li>
                  <li>General Screening – Basic <i class="fa fa-check icon-success"></i></li>
                  <li><del>Health Screening Report</del> <i class="fa fa-times icon-danger"></i></li>
                </ul>

                <div class="price-bottom">
                  <a href="#" class="btn btn-skin btn-lg">Purchase</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 pricing-box featured-price">
            <div class="wow bounceInUp" data-wow-delay="0.3s">
              <div class="pricing-content featured">
                <h2>Golden Glow Package</h2>
                <h3>$65<sup>.99</sup> <span>/ one time</span></h3>
                <ul>
                  <li>Anthropometry (BMI, WH Ratio) <i class="fa fa-check icon-success"></i></li>
                  <li>Post Examination Review <i class="fa fa-check icon-success"></i></li>
                  <li>General Screening – Basic <i class="fa fa-check icon-success"></i></li>
                  <li>Body Composition Analysis <i class="fa fa-check icon-success"></i></li>
                  <li>GR Assessment & Scoring <i class="fa fa-check icon-success"></i></li>
                </ul>

                <div class="price-bottom">
                  <a href="#" class="btn btn-skin btn-lg">Purchase</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div class="pricing-content general last">
                <h2>Basic Fit 2 Package</h2>
                <h3>$47<sup>.99</sup> <span>/ one time</span></h3>
                <ul>
                  <li>Anthropometry (BMI, WH Ratio) <i class="fa fa-check icon-success"></i></li>
                  <li>Post Examination Review <i class="fa fa-check icon-success"></i></li>
                  <li>General Screening – Regular <i class="fa fa-check icon-success"></i></li>
                  <li><del>Health Screening Report</del> <i class="fa fa-times icon-danger"></i></li>
                </ul>

                <div class="price-bottom">
                  <a href="#" class="btn btn-skin btn-lg">Purchase</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- /Section: pricing -->

    <section id="partner" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our partner</h2>
                <p>Take charge of your health today with our specially designed health packages</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="<?php echo base_url()?>assets/Default-BS/img/dummy/partner-1.jpg" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="<?php echo base_url()?>assets/Default-BS/img/dummy/partner-2.jpg" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="<?php echo base_url()?>assets/Default-BS/img/dummy/partner-3.jpg" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="<?php echo base_url()?>assets/Default-BS/img/dummy/partner-4.jpg" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>About Medicio</h5>
                <p>
                  Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                </p>
              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Information</h5>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Laboratory</a></li>
                  <li><a href="#">Medical treatment</a></li>
                  <li><a href="#">Terms & conditions</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Medicio center</h5>
                <p>
                  Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                </p>
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Saturday, 8am to 10pm
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +62 0888 904 711
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> hello@medicio.com
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Our location</h5>
                <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

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
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy;Copyright - Medicio Theme. All rights reserved.</p>
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
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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