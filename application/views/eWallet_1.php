<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- css -->
	<link href="<?php echo base_url()?>assets/Default-BS/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>assets/Default-BS/css/eWallet.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>assets/Default-BS/css/style.css" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link href="/Capstone-P-yuxuan/assets/Default-BS/css/style.css" rel="stylesheet" type="text/css">
	
	<!-- boxed bg -->
    <link id="bodybg" href="<?php echo base_url()?>assets/Default-BS/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
    <link id="t-colors" href="<?php echo base_url()?>assets/Default-BS/color/default.css" rel="stylesheet">
	
</head>

<body>
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
          <a class="navbar-brand" href="Home">
                    <img src="<?php echo base_url()?>assets/Default-BS/img/logo.png" alt="" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>Home">Book a Locker</a></li>
      <li><a href="<?php echo base_url();?>Home#LockerStatus">Locker Booking Status</a></li>
            <li><a href="<?php echo base_url();?>Home#Lockers">Lockers</a></li>
            <li><a href="<?php echo base_url();?>Home#locations">Locations</a></li>
            <li><a href="<?php echo base_url();?>Home#pastTransactions">Past Transactions</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a><!--<span class="badge custom-badge red pull-right">Extra</span>-->
              <ul class="dropdown-menu">
                <li><a href="">FAQ</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="<?php echo base_url();?>Home/do_logout">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <section id="eWallet" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="well well-trans">
              <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <div class="section-heading text-center">
                  <h3 class="h-bold" style="text-align: center;"><?php echo $this->session->userdata('DName'); ?>'s eWallet</h3>
                  <!-- Show and hide this p accordingly -->
                  <p>Choose top up amount</p>
                </div>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                <h2>Current balance</h2><span> <input type="number" name="balance" id="balance" class="form-control input-md" style="font-size: 20px" value="<?php echo $userWallet ?>" disabled></span>
                <form action="<?php echo base_url();?>eWallet/top_up" method="post" role="form" id="topupform"> 
                <div class="card active" data-id="#{id}" style="margin-top: 10px">
                  <div class="row">
                    <input type="radio" id="topUp10" name="topupRadio" value="10" checked="checked"  />
                    <label style="font-size: 20px"> Top up :$10 </label>
                  </div>
                </div>
                <div class="card active" data-id="#{id}">
                  <div class="row">
                  <input type="radio" id="topUp20" name="topupRadio" value="20"  />
                  <label style="font-size: 20px"> Top up: $20 </label>
                </div>
              </div>
              <div class="card active" data-id="#{id}">
                <div class="row">
                  <input type="radio" id="topUp30" name="topupRadio" value="30"  />
                  <label style="font-size: 20px"> Top up: $30</label>
                </div>
              </div>
            </form>
                <input type="submit" value="Top Up" class="btn btn-primary btn-block btn-lg" form="topupform" style="margin-top: 15px;">
                <a href="<?php echo base_url();?>eWallet" class="btn btn-primary btn-block btn-lg" style="margin-top: 15px; margin-bottom: 15px;">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
<!-- Yu Xuan's JavaScripts -->
<script src="<?php echo base_url()?>assets/Default-BS/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/Default-BS/js/eWallet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/Default-BS/js/bootstrap.min.js"></script>
  
</body>
</html>