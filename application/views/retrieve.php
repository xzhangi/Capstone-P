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


	
<body>	
   <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

      <div class="carousel-reviews broun-block">
        <div class="container">
          <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

             
                <div class="item">
                   <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-8">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cta-text">
                      <h3>EWallet Amount</h3>
					  <?php var_dump($finalAmt);?>
					  <?php if(!empty($amount)): ?>
                      <p><?php echo $amount; ?></p>
					  <?php endif; ?>
					  <a href ="<?php echo base_url()?>Intro"><b>Head Back</b></a> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<a href ="<?php echo base_url()?>Intro">Head Back></a> 
			<!--<button type="cancel" class="btn btn-primary btn-block" a href ="<?php echo base_url('Intro');?> ">Submit</button>  -->
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
	</body>