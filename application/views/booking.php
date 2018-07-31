<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/CodeIgniter_v1/assets/Default-BS/css/booking.css" rel="stylesheet" type="text/css">
	<link href="/CodeIgniter_v1/assets/Default-BS/css/style.css" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
	
	
</head>

<body style="background-color: #ffffff;">

<div id="app">

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
          <a class="navbar-brand" href="index.html">
                    <img src="assets/Default-BS/img/logo.png" alt="" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#intro">Login</a></li>
            <li><a href="#service">About Us</a></li>
            <li><a href="#doctor">Lockers</a></li>
            <li><a href="#facilities">Locations</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a><!--<span class="badge custom-badge red pull-right">Extra</span>-->
              <ul class="dropdown-menu">
                <li><a href="index.html">FAQ</a></li>
                <li><a href="index-form.html">Contact Us</a></li>
                <li><a href="application/views/adminpanel.php">Admin Login</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

  <!-- Header -->
  <header class="container">
    <h1>Locker Booking</h1>
    <!-- <ul class="breadcrumb">
      <li>Home</li>
      <li>Locker Booking</li>
    </ul> -->
    <span class="count">{{ itemCount }} items in the bag</span>
  </header>
  <!-- End Header -->

  <!-- Product List -->
  <section class="container">
    <div v-if="products.length > 0">
      <ul class="products">
        <li class="row" v-for="(product, index) in products">
          <div class="col left">
            <div class="thumbnail">
              <a href="#">
              <img src="/CodeIgniter_v1/assets/Default-BS/img/team/small.png" width="150" height="150">
            </a>
            </div>
            <div class="detail">
              <div class="name"><a href="#">{{ product.name }}</a></div>
              <div class="description">{{ product.description }}</div>
              <div class="price">{{ product.price | currencyFormatted }}</div>
            </div>
          </div>

          <div class="col right">
            <div class="quantity">
              <input type="number" class="quantity" step="1" :value="product.quantity" @input="updateQuantity(index, $event)" @blur="checkQuantity(index, $event)" />
            </div>

            <div class="remove">
              <svg @click="removeItem(index)" version="1.1" class="close" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve"><polygon points="38.936,23.561 36.814,21.439 30.562,27.691 24.311,21.439 22.189,23.561 28.441,29.812 22.189,36.064 24.311,38.186 30.562,31.934 36.814,38.186 38.936,36.064 32.684,29.812"></polygon></svg>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div v-else style="text-align: center;">
      <h3>There are no products in your cart.</h3>
      <button style="font-size: 1.3rem; padding: 10px 30px;">Shopping now</button>
    </div>
  </section>
  <!-- End Product List -->

  <!-- Summary -->
  <section class="container" v-if="products.length > 0">

    <div class="summary">
      <ul>
        <li>Subtotal <span>{{ subTotal | currencyFormatted }}</span></li>
        <li v-if="discount > 0">Discount <span>{{ discountPrice | currencyFormatted }}</span></li>
        <li class="total">Total <span>{{ totalPrice | currencyFormatted }}</span></li>
      </ul>
    </div>

    <div class="checkout">
      <button type="button"><a href="/CodeIgniter_v1/application/views/eWallet.php">Check Out</button>
    </div>
  </section>
  <!-- End Summary -->
</div>

<!-- Yu Xuan's JavaScripts -->
  <script src="/CodeIgniter_v1/assets/Default-BS/js/booking_js.js"></script>
  <script src="/CodeIgniter_v1/application/views/assets/Default-BS/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>

</body>
</html>