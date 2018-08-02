<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="<?php echo base_url()?>assets/Default-BS/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>assets/Default-BS/css/eWallet.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>assets/Default-BS/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>assets/Default-BS/css/cardDetails.css" rel="stylesheet" type="text/css">
	
	<!-- boxed bg -->
    <link id="bodybg" href="<?php echo base_url()?>assets/Default-BS/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
    <link id="t-colors" href="<?php echo base_url()?>assets/Default-BS/color/default.css" rel="stylesheet">
</head>

<body background="Locka/assets/Default-BS/img/dummy/lockers.png">
<div class="eWallet_yx">
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
  <header class="container">
    <h1>Payment</h1>
    <!-- <ul class="breadcrumb">
      <li>Home</li>
      <li>Shopping Cart</li>
    </ul> -->
  </header>
  
<div class="tab_container">

    <h4 class="payment-title">Choose your payment method</h4>
    <form action="" method="post">
      <div class="pymt-radio">

      </div>
      <div class="pymt-radio">

        <div class="row-payment-method payment-row-last">
          <div class="select-icon hr">
            <input type="radio" id="radio2" name="radios" value="pp" checked>
            <label for="radio2"></label>
          </div>
          <div class="select-txt hr">
            <p class="pymt-type-name">Credit Card</p>
            <p class="pymt-type-desc">Safe money transfer using your bank account. Safe payment online. Credit card needed. Visa, Maestro, Discover, American Express</p>
          </div>
          <div class="select-logo">
            <div class="select-logo-sub logo-spacer">
              <img src="https://www.dropbox.com/s/by52qpmkmcro92l/logo-visa.png?raw=1" alt="Visa" />
            </div>
            <div class="select-logo-sub">
              <img src="https://www.dropbox.com/s/6f5dorw54xomw7p/logo-mastercard.png?raw=1" alt="MasterCard" /></div>
          </div>

        </div>
      </div>
      <div class="form-cc">
        <div class="row-cc">
          <div class="cc-field">
            <div class="cc-title">Credit Card Number
            </div>
            <input type="text" class="input cc-txt text-validated" value="4542 9931 9292 2293" />
          </div>
        </div>
        <div class="row-cc">
          <div class="cc-field">
            <div class="cc-title">Expiry Date
            </div>
            <select class="input cc-ddl">
            <option selected>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>          
          </select>
            <select class="input cc-ddl">
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option selected>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>            
          </select>
          </div>
          <div class="cc-field">
            <div class="cc-title">CVV Code<span class="numberCircle">?</span>
            </div>
            <input type="password" />
          </div>
        </div>
        <div class="row-cc">
          <div class="cc-field">
            <div class="cc-title">Name on Card
            </div>
            <input type="text" class="input cc-txt" />
          </div>
        </div>

      </div>
      <div class="button-master-container">
        <div class="button-container"><a href="<?php echo base_url();?>eWallet">Return to Booking</a>
        </div>
        <!--<div class="button-container button-finish"><a href="/CodeIgniter_v1/application/views/balance.php">Top Up</a>-->
		<a href="<?php echo base_url();?>eWallet_1" class="button-container button-finish">Top Up</a>
        </div>
      </div>
    </form>
</div>
</div>

<!-- Yu Xuan's JavaScripts -->
  <!-- <script src="/assets/Default-BS/js/eWallet_js.js"></script> -->
    <script src="/CodeIgniter_v1/application/views/assets/Default-BS/js/bootstrap.min.js"></script>
  
</body>
</html>