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
	<script src="https://codepen.io/andytran/pen/vLmRVp.js"></script>
	
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
	
<div id ="balance_yx">

<!-- Transaction Item-->
<div class="wallet">
  <div class="cards">
    <header>
      <h2>My Wallet</h2><!--<a id="add" href="#"></a>-->
    </header>
    <div class="content">
	<form action="<?php echo base_url();?>eWallet/top_up" method="post" role="form" id="topupform"> 
      <div class="card active" data-id="#{id}">
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
    </div>
  </div>
  </form>
  <div class="activity active" data-id="1234">
    <header>
      <h2>Balance</h2><span> <input type="number" name="balance" id="balance" class="form-control input-md" style="font-size: 20px" value="<?php echo $userWallet ?>" readonly></span>
    </header>
	<div class="form-wrapper" style="padding-top: 70px;">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                  <div class="panel panel-skin">
					<?php if(!is_null($MsgtoDisplay)) echo $MsgtoDisplay; ?>
                    <input type="submit" value="Top Up" class="btn btn-skin btn-block btn-lg" form="topupform">
                  </div>
                </div>		
    </div>
	
	<a href="<?php echo base_url();?>Home" class="btn btn-skin btn-block btn-lg">Back to Home</a>

  </div>

</div>
</div>

<!-- Yu Xuan's JavaScripts -->
<script src="<?php echo base_url()?>assets/Default-BS/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/Default-BS/js/eWallet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/Default-BS/js/bootstrap.min.js"></script>
<script src="https://codepen.io/andytran/pen/vLmRVp.js"></script>
  
</body>
</html>