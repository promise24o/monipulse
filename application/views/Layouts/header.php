<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mimi - <?= $page_title ?></title>
	<meta name="description" content="Mimi Connects: Empowering Your Lifestyle with Unmatched Connectivity From Uninterrupted Power to High-Speed Data and Premium Entertainment Choices. Experience Convenience, Affordability, and Seamless Connectivity All in One Place. Join Mimi Communications for a World of Convenience and Reliable Connectivity Solutions!">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/landing/media/favicon.png">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/slick.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/slick-theme.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/sal.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/green-audio-player.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/vendor/odometer-theme-default.css">

	<!-- Site Stylesheet -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/app.css">

</head>

<body class="sticky-header">
	<!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->
	<a href="#main-wrapper" id="backto-top" class="back-to-top">
		<i class="far fa-angle-double-up"></i>
	</a>

	<!-- Preloader Start Here -->
	<div id="preloader"></div>
	<!-- Preloader End Here -->

	<div class="my_switcher d-none d-lg-block">
		<ul>
			<li title="Light Mode">
				<a href="javascript:void(0)" class="setColor light" data-theme="light">
					<i class="fal fa-lightbulb-on"></i>
				</a>
			</li>
			<li title="Dark Mode">
				<a href="javascript:void(0)" class="setColor dark" data-theme="dark">
					<i class="fas fa-moon"></i>
				</a>
			</li>
		</ul>
	</div>

	<div id="main-wrapper" class="main-wrapper">

		<!--=====================================-->
		<!--=        Header Area Start       	=-->
		<!--=====================================-->
		<header class="header axil-header header-style-1">
			<div id="axil-sticky-placeholder"></div>
			<div class="axil-mainmenu">
				<div class="container">
					<div class="header-navbar">
						<div class="header-logo">
							<a href="<?= base_url()  ?>"><img class="light-version-logo" src="<?= base_url() ?>assets/landing/media/logo.png" alt="logo" width="120"></a>
							<a href="<?= base_url()  ?>"><img class="dark-version-logo" src="<?= base_url() ?>assets/landing/media/logo-2.png" alt="logo" width="120"></a>
							<a href="<?= base_url()  ?>"><img class="sticky-logo" src="<?= base_url() ?>assets/landing/media/logo.png" alt="logo" width="120"></a>
						</div>
						<div class="header-main-nav">
							<!-- Start Mainmanu Nav -->
							<nav class="mainmenu-nav" id="mobilemenu-popup">
								<div class="d-block d-lg-none">
									<div class="mobile-nav-header">
										<div class="mobile-nav-logo">
											<a href="<?= base_url()  ?>">
												<img class="light-mode" src="<?= base_url() ?>assets/landing/media/logo-2.png" alt="Site Logo">
												<img class="dark-mode" src="<?= base_url() ?>assets/landing/media/logo-2.png" alt="Site Logo">
											</a>
										</div>
										<button class="mobile-menu-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
									</div>
								</div>
								<ul class="mainmenu">
									<li><a href="<?= base_url() ?>">Home</a></li>
									<li><a href="#services">Services</a></li>
									<li><a href="#whyUs">Why Us</a></li>
									<li><a href="<?= base_url('contact-us') ?>">Contact Us</a></li>
									<li><a style="line-height: 20px;" href="<?= base_url('get-started') ?>" class="axil-btn btn-fill-primary btn" tabindex="0">Get Started</a></li>
								</ul>
							</nav>
							<!-- End Mainmanu Nav -->
						</div>
						<div class="header-action">
							<ul class="list-unstyled">

								<li class="mobile-menu-btn sidemenu-btn d-lg-none d-block">
									<button class="btn-wrap" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
										<span></span>
										<span></span>
										<span></span>
									</button>
								</li>
								<li class="my_switcher d-block d-lg-none">
									<ul>
										<li title="Light Mode">
											<a href="javascript:void(0)" class="setColor light" data-theme="light">
												<i class="fal fa-lightbulb-on"></i>
											</a>
										</li>
										<li title="Dark Mode">
											<a href="javascript:void(0)" class="setColor dark" data-theme="dark">
												<i class="fas fa-moon"></i>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
