<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pgscom</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

	<!-- Stylesheets -->
	<!-- Dropdown Menu -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/superfish.css'); ?>">
	<!-- Owl Slider -->
	<!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
	<!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap-datepicker.min.css'); ?>">
	<!-- CS Select -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/cs-select.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/user/css/cs-skin-border.css'); ?>">

	<!-- Themify Icons -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/themify-icons.css'); ?>">
	<!-- Flat Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/flaticon.css'); ?>">
	<!-- Icomoon -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/icomoon.css'); ?>">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/flexslider.css'); ?>">

	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url('assets/user/css/style.css'); ?>">

	<!-- Modernizr JS -->
	<script src="<?= base_url('assets/user/js/modernizr-2.6.2.min.js'); ?>"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
			<div id="fh5co-header">
				<header id="fh5co-header-section">
					<div class="container">
						<div class="nav-header">
							<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
							<h1 id="fh5co-logo"><a href="index.html">Pgscom</a></h1>
							<nav id="fh5co-menu-wrap" role="navigation">
								<ul class="sf-menu" id="fh5co-primary-menu">
									<li><a class="active" href="index.html">Home</a></li>
									<li><a href="services.html">Rute</a></li>
									<!-- <li><a href="contact.html">Contact</a></li> -->
									<?php if ($this->session->logged_in) : ?>
										<li>
											<a href="javascript:void(0)" class="fh5co-sub-ddown"><?= $this->session->nama; ?></a>
											<ul class="fh5co-sub-menu">
												<?php if ($this->session->level == 'user') : ?>
													<li><a href="#">Cek Tiket Mudik</a></li>
												<?php endif; ?>
												<li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
											</ul>
										</li>
									<?php else : ?>
										<li><a href="<?= base_url('auth/login'); ?>">Login</a></li>

									<?php endif; ?>
								</ul>
							</nav>
						</div>
					</div>
				</header>

			</div>
			<!-- end:fh5co-header -->
			<div class="fh5co-parallax" style="background-image: url(<?php echo base_url('assets/user/images/kmp.jpg'); ?>);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
							<div class="fh5co-intro fh5co-table-cell">
								<h1 class="text-center">Mudik Bareng Pgscom</h1>
								<p>Jangan Lupa Tetap Jaga 3M karena Covid-19 Belum Usai</a></p>
								<div id="fh5co-counter-section" style="padding:0 !important;" class="fh5co-counters">
									<div class="container">
										<div class="row">
											<div class="col-md-3 text-center">
												<span style="color:white !important;" class="fh5co-counter js-counter" data-from="<?= $confirm; ?>" data-to="<?= $confirm; ?>" data-speed="5000" data-refresh-interval="50"></span>
												<span style="color:white !important;" class="fh5co-counter-label">Terkonfirmasi</span>
											</div>
											<div class="col-md-3 text-center">



												<span style="color:white !important;" class="fh5co-counter js-counter" data-from="<?= $death; ?>" data-to="<?= $death; ?>" data-speed="5000" data-refresh-interval="50"></span>
												<span style="color:white !important;" class="fh5co-counter-label">Meninggal</span>
											</div>
											<div class="col-md-3 text-center">
												<span style="color:white !important;" class="fh5co-counter js-counter" data-from="<?= $recovered; ?>" data-to="<?= $recovered; ?>" data-speed="5000" data-refresh-interval="50"></span>
												<span style="color:white !important;" class="fh5co-counter-label">Sembuh</span>
											</div>
											<div class="col-md-3 text-center">
												<span style="color:white !important;" class="fh5co-counter js-counter" data-from="<?= $active; ?>" data-to="<?= $active; ?>" data-speed="5000" data-refresh-interval="50"></span>
												<span style="color:white !important;" class="fh5co-counter-label">Aktif</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap">
				<div class="container">
					<div class="row">
						<div id="availability">
							<form action="#">

								<div class="a-col">
									<section>
										<select class="cs-select ">
											<option value="" disabled selected>Select Hotel</option>
											<option value="email">Luxe Hotel</option>
											<option value="twitter">Deluxe Hotel</option>
											<option value="linkedin">Five Star Hotel</option>
										</select>
									</section>
								</div>
								<div class="a-col alternate">
									<div class="input-field">
										<label for="date-start">Check In</label>
										<input type="text" class="form-control" id="date-start" />
									</div>
								</div>
								<div class="a-col alternate">
									<div class="input-field">
										<label for="date-end">Check Out</label>
										<input type="text" class="form-control" id="date-end" />
									</div>
								</div>
								<div class="a-col action">
									<a href="#">
										<span>Check</span>

									</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<style>
				.card-boking {
					background: white;

				}

				.card-boking>.card-body {
					padding: 10px;
				}

				span.c {
					display: block;
					width: 100px;
					/* height: 100px; */
					padding: 5px;
					border: 1px solid blue;
					background-color: yellow;
				}

				span.b {
					display: inline-block;
					width: 100px;
					/* height: 100px; */
					padding: 5px;
					border: 1px solid blue;
					background-color: yellow;
				}
			</style>
			<div id="featured-hotel" class="fh5co-bg-color">
				<div class="container">
					<div class="row">
						<div class="col-md-6" style="margin-top:10px !important;">
							<div class="card card-boking">
								<!-- <img class="card-img-top" src="<?php echo base_url('assets/user/images/image-1.jpg') ?>" alt="image" style="width:100%"> -->
								<div class="card-body">
									<h4 class="card-title"><b> Mode Transportasi Bus </b></h4>
									<div class="row">
										<div class="col-sm-4"><b>Kota Asal</b></div>
										<div class="col-sm-8">: Bandung dari 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-4"><b>Kota Tujuan</b></div>
										<div class="col-sm-8">: Surabaya sampai 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-4"><b>Slot Tersedia</b></div>
										<div class="col-sm-8"><b>: 3</b></div>
										<div class="col-sm-4">Sisa Slot</div>
										<div class="col-sm-3"><b>9</b></div>
										<div class="col-sm-12">
											<input class="form-control" type="number" value="0">
										</div>
										<div class="col-sm-12 " style="margin-top:10px !important;">
											<a href="javascript:void(0)" class="btn btn-primary  input-block-level form-control">Boking Tiket</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="margin-top:10px !important;">
							<div class="card card-boking">
								<!-- <img class="card-img-top" src="<?php echo base_url('assets/user/images/image-1.jpg') ?>" alt="image" style="width:100%"> -->
								<div class="card-body">
									<h4 class="card-title"><b> Mode Transportasi Bus </b></h4>
									<div class="row">
										<div class="col-sm-6 col-lg-4"><b>Kota Asal</b></div>
										<div class="col-sm-6 col-lg-8">: Bandung dari 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-6 col-lg-4"><b>Kota Tujuan</b></div>
										<div class="col-sm-6 col-lg-8">: Surabaya sampai 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-6 col-lg-4"><b>Slot Tersedia</b></div>
										<div class="col-sm-6 col-lg-8"><b>: 3</b></div>
										<div class="col-sm-6 col-lg-4">Sisa Slot</div>
										<div class="col-sm-6 col-lg-8"><b>9</b></div>
										<div class="col-sm-12">
											<input class="form-control" type="number" value="0">
										</div>
										<div class="col-sm-12 " style="margin-top:10px !important;">
											<a href="javascript:void(0)" class="btn btn-primary  input-block-level form-control">Boking Tiket</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="margin-top:10px !important;">
							<div class="card card-boking">
								<!-- <img class="card-img-top" src="<?php echo base_url('assets/user/images/image-1.jpg') ?>" alt="image" style="width:100%"> -->
								<div class="card-body">
									<h4 class="card-title"><b> Mode Transportasi Bus </b></h4>
									<div class="row">
										<div class="col-sm-4"><b>Kota Asal</b></div>
										<div class="col-sm-8">: Bandung dari 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-4"><b>Kota Tujuan</b></div>
										<div class="col-sm-8">: Surabaya sampai 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-4"><b>Slot Tersedia</b></div>
										<div class="col-sm-8"><b>: 3</b></div>
										<div class="col-sm-4">Sisa Slot</div>
										<div class="col-sm-3"><b>9</b></div>
										<div class="col-sm-12">
											<input class="form-control" type="number" value="0">
										</div>
										<div class="col-sm-12 " style="margin-top:10px !important;">
											<a href="javascript:void(0)" class="btn btn-primary  input-block-level form-control">Boking Tiket</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="margin-top:10px !important;">
							<div class="card card-boking">
								<!-- <img class="card-img-top" src="<?php echo base_url('assets/user/images/image-1.jpg') ?>" alt="image" style="width:100%"> -->
								<div class="card-body">
									<h4 class="card-title"><b> Mode Transportasi Bus </b></h4>
									<div class="row">
										<div class="col-sm-4"><b>Kota Asal</b></div>
										<div class="col-sm-8">: Bandung dari 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-4"><b>Kota Tujuan</b></div>
										<div class="col-sm-8">: Surabaya sampai 12 Jan 2022 07:53 AM </div>
										<div class="col-sm-4"><b>Slot Tersedia</b></div>
										<div class="col-sm-8"><b>: 3</b></div>
										<div class="col-sm-4">Sisa Slot</div>
										<div class="col-sm-3"><b>9</b></div>
										<div class="col-sm-12">
											<input class="form-control" type="number" value="0">
										</div>
										<div class="col-sm-12 " style="margin-top:10px !important;">
											<a href="javascript:void(0)" class="btn btn-primary  input-block-level form-control">Boking Tiket</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>



			<div class=" ">
				<div class="row">

				</div>

				<footer id="footer" class=" ">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<div class="copyright">
									<p><small>© 2016 Free HTML5 Template. <br> All Rights Reserved. <br>
											Designed by <a href="http://freehtml5.co" target="_blank">FreeHTML5.co</a> <br>
											Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
									</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										<h3>Company</h3>
										<ul class="link">
											<li><a href="#">About Us</a></li>
											<li><a href="#">Hotels</a></li>
											<li><a href="#">Customer Care</a></li>
											<li><a href="#">Contact Us</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<h3>Our Facilities</h3>
										<ul class="link">
											<li><a href="#">Resturant</a></li>
											<li><a href="#">Bars</a></li>
											<li><a href="#">Pick-up</a></li>
											<li><a href="#">Swimming Pool</a></li>
											<li><a href="#">Spa</a></li>
											<li><a href="#">Gym</a></li>
										</ul>
									</div>
									<div class="col-md-6">
										<h3>Subscribe</h3>
										<p>Sed cursus ut nibh in semper. Mauris varius et magna in fermentum. </p>
										<form action="#" id="form-subscribe">
											<div class="form-field">
												<input type="email" placeholder="Email Address" id="email">
												<input type="submit" id="submit" value="Send">
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<ul class="social-icons">
									<li>
										<a href="#"><i class="icon-twitter-with-circle"></i></a>
										<a href="#"><i class="icon-facebook-with-circle"></i></a>
										<a href="#"><i class="icon-instagram-with-circle"></i></a>
										<a href="#"><i class="icon-linkedin-with-circle"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>


		</div>
		<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- Javascripts -->
	<script src="<?= base_url('assets/user/js/jquery-2.1.4.min.js'); ?>"></script>
	<!-- Dropdown Menu -->
	<script src="<?= base_url('assets/user/js/hoverIntent.js'); ?>"></script>
	<script src="<?= base_url('assets/user/js/superfish.js'); ?>"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url('assets/user/js/bootstrap.min.js'); ?>"></script>
	<!-- Waypoints -->
	<script src="<?= base_url('assets/user/js/jquery.waypoints.min.js'); ?>"></script>
	<!-- Counters -->
	<script src="<?= base_url('assets/user/js/jquery.countTo.js'); ?>"></script>
	<!-- Stellar Parallax -->
	<script src="<?= base_url('assets/user/js/jquery.stellar.min.js'); ?>"></script>
	<!-- Owl Slider -->
	<!-- // <script src="js/owl.carousel.min.js"></script> -->
	<!-- Date Picker -->
	<script src="<?= base_url('assets/user/js/bootstrap-datepicker.min.js'); ?>"></script>
	<!-- CS Select -->
	<script src="<?= base_url('assets/user/js/classie.js'); ?>"></script>
	<script src="<?= base_url('assets/user/js/selectFx.js'); ?>"></script>
	<!-- Flexslider -->
	<script src="<?= base_url('assets/user/js/jquery.flexslider-min.js'); ?>"></script>

	<script src="<?= base_url('assets/user/js/custom.js'); ?>"></script>

</body>

</html>
