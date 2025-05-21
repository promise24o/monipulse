<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title>Mimi - Admin <?= $page_title ?></title>
	<meta name="description" content="Mimi Connects: Empowering Your Lifestyle with Unmatched Connectivity From Uninterrupted Power to High-Speed Data and Premium Entertainment Choices. Experience Convenience, Affordability, and Seamless Connectivity All in One Place. Join Mimi Communications for a World of Convenience and Reliable Connectivity Solutions!">

	<!-- FAVICON -->
	<link rel="icon" href="<?= base_url() ?>assets/auth/img/favicon.png">


	<!-- BOOTSTRAP CSS -->
	<link id="style" href="<?= base_url() ?>assets/auth/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- ICONS CSS -->
	<link href="<?= base_url() ?>assets/auth/plugins/web-fonts/icons.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/auth/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/auth/plugins/web-fonts/plugin.css" rel="stylesheet">

	<!-- STYLE CSS -->
	<link href="<?= base_url() ?>assets/auth/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/auth/css/plugins.css" rel="stylesheet">

	<!-- SWITCHER CSS -->
	<link href="<?= base_url() ?>assets/auth/switcher/css/switcher.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/auth/switcher/demo.css" rel="stylesheet">


</head>

<body class="ltr main-body leftmenu">

	<!-- SWITCHER -->

	<div class="switcher-wrapper">
		<div class="demo_changer">
			<div class="form_holder sidebar-right1">
				<div class="row">
					<div class="predefined_styles">
						<div class="swichermainleft">
							<h4>LTR and RTL Versions</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">LTR</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch7" id="myonoffswitch19" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch19" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">RTL</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch7" id="myonoffswitch20" class="onoffswitch2-checkbox">
											<label for="myonoffswitch20" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft menu-styles">
							<h4>Navigation Style</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">Vertical Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch01" id="myonoffswitch01" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch01" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Horizontal Click Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch01" id="myonoffswitch02" class="onoffswitch2-checkbox">
											<label for="myonoffswitch02" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Horizontal Hover Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch01" id="myonoffswitch03" class="onoffswitch2-checkbox">
											<label for="myonoffswitch03" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft">
							<h4>Light Theme Style</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">Light Theme</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch1" id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch1" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Light Primary</span>
										<div class="">
											<input class="wd-30 ht-30 input-color-picker color-primary-light" value="#6259ca" id="colorID" oninput="changePrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id7="transparentcolor" name="lightPrimary">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft">
							<h4>Dark Theme Style</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">Dark Theme</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch1" id="myonoffswitch2" class="onoffswitch2-checkbox">
											<label for="myonoffswitch2" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Dark Primary</span>
										<div class="">
											<input class="wd-30 ht-30 input-dark-color-picker color-primary-dark" value="#6259ca" id="darkPrimaryColorID" oninput="darkPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft menu-colors">
							<h4>Menu Styles</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle lightMenu d-flex">
										<span class="me-auto">Light Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch3" class="onoffswitch2-checkbox">
											<label for="myonoffswitch3" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle colorMenu d-flex mt-2">
										<span class="me-auto">Color Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch4" class="onoffswitch2-checkbox">
											<label for="myonoffswitch4" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle darkMenu d-flex mt-2">
										<span class="me-auto">Dark Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch5" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch5" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft header-colors">
							<h4>Header Styles</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle lightHeader d-flex">
										<span class="me-auto">Light Header</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch6" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch6" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle  colorHeader d-flex mt-2">
										<span class="me-auto">Color Header</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch7" class="onoffswitch2-checkbox">
											<label for="myonoffswitch7" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle darkHeader d-flex mt-2">
										<span class="me-auto">Dark Header</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch8" class="onoffswitch2-checkbox">
											<label for="myonoffswitch8" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft layout-width-style">
							<h4>Layout Width Styles</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">Full Width</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch4" id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch9" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Boxed</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch4" id="myonoffswitch10" class="onoffswitch2-checkbox">
											<label for="myonoffswitch10" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft layout-positions">
							<h4>Layout Positions</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">Fixed</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch5" id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch11" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Scrollable</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch5" id="myonoffswitch12" class="onoffswitch2-checkbox">
											<label for="myonoffswitch12" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft vertical-switcher">
							<h4>Sidemenu layout Styles</h4>
							<div class="skin-body">
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="me-auto">Default Menu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
											<label for="myonoffswitch13" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Icon with Text</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch14" class="onoffswitch2-checkbox">
											<label for="myonoffswitch14" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Icon Overlay</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch15" class="onoffswitch2-checkbox">
											<label for="myonoffswitch15" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Closed Sidemenu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch16" class="onoffswitch2-checkbox">
											<label for="myonoffswitch16" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Hover Submenu</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch17" class="onoffswitch2-checkbox">
											<label for="myonoffswitch17" class="onoffswitch2-label"></label>
										</p>
									</div>
									<div class="switch-toggle d-flex mt-2">
										<span class="me-auto">Hover Submenu Style 1</span>
										<p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch18" class="onoffswitch2-checkbox">
											<label for="myonoffswitch18" class="onoffswitch2-label"></label>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="swichermainleft">
							<h4>Reset All Styles</h4>
							<div class="skin-body">
								<div class="switch_section my-4">
									<button class="btn btn-danger btn-block" onclick="localStorage.clear();
											document.querySelector('html').style = '';
											names() ;
											resetData();" type="button">Reset All
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END SWITCHER -->

	<!-- LOADEAR -->
	<div id="global-loader">
		<img src="<?= base_url() ?>assets/auth/img/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- END LOADEAR -->

	<!-- PAGE -->
	<div class="page">

		<!-- HEADER -->

		<div class="main-header side-header sticky">
			<div class="main-container container-fluid">
				<div class="main-header-left">
					<a class="main-header-menu-icon" href="javascript:void(0);" id="mainSidebarToggle"><span></span></a>
					<div class="hor-logo">
						<a class="main-logo" href="<?= base_url()  ?>">
							<img src="<?= base_url() ?>assets/auth/img/logo.png" class="header-brand-img desktop-logo" alt="logo">
							<img src="<?= base_url() ?>assets/auth/img/logo-2.png" class="header-brand-img desktop-logo-dark" alt="logo">
						</a>
					</div>
				</div>
				<div class="main-header-center">
					<div class="responsive-logo">
						<a href="<?= base_url()  ?>"><img width="100" src="<?= base_url() ?>assets/auth/img/logo.png" class="mobile-logo" alt="logo"></a>
						<a href="<?= base_url()  ?>"><img width="100" src="<?= base_url() ?>assets/auth/img/logo-2.png" class="mobile-logo-dark" alt="logo"></a>
					</div>
					<!-- <div class="input-group">
						<div class="input-group-btn search-panel">
							<select class="form-control select2">
								<option label="All categories">
								</option>
								<option value="IT Projects">
									IT Projects
								</option>
								<option value="Business Case">
									Business Case
								</option>
								<option value="Microsoft Project">
									Microsoft Project
								</option>
								<option value="Risk Management">
									Risk Management
								</option>
								<option value="Team Building">
									Team Building
								</option>
							</select>
						</div>
						<input type="search" class="form-control rounded-0" placeholder="Search for anything...">
						<button class="btn search-btn"><i class="fe fe-search"></i></button>
					</div> -->
				</div>
				<div class="main-header-right">
					<button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
					</button><!-- Navresponsive closed -->
					<div class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
						<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
							<div class="d-flex order-lg-2 ms-auto">
								<!-- Search -->
								<div class="dropdown header-search">
									<a class="nav-link icon header-search">
										<i class="fe fe-search header-icons"></i>
									</a>
									<div class="dropdown-menu">
										<div class="main-form-search p-2">
											<div class="input-group">
												<div class="input-group-btn search-panel">
													<select class="form-control select2">
														<option label="All categories">
														</option>
														<option value="IT Projects">
															IT Projects
														</option>
														<option value="Business Case">
															Business Case
														</option>
														<option value="Microsoft Project">
															Microsoft Project
														</option>
														<option value="Risk Management">
															Risk Management
														</option>
														<option value="Team Building">
															Team Building
														</option>
													</select>
												</div>
												<input type="search" class="form-control" placeholder="Search for anything...">
												<button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
														<circle cx="11" cy="11" r="8"></circle>
														<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
													</svg></button>
											</div>
										</div>
									</div>
								</div>
								<!-- Search -->
								<!-- Theme-Layout -->
								<div class="dropdown d-flex main-header-theme">
									<a class="nav-link icon layout-setting">
										<span class="dark-layout">
											<i class="fe fe-sun header-icons"></i>
										</span>
										<span class="light-layout">
											<i class="fe fe-moon header-icons"></i>
										</span>
									</a>
								</div>
								<!-- Theme-Layout -->

								<!-- Full screen -->
								<div class="dropdown ">
									<a class="nav-link icon full-screen-link">
										<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
										<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
									</a>
								</div>
								<!-- Full screen -->


								<!-- Profile -->
								<div class="dropdown main-profile-menu">
									<a class="d-flex" href="javascript:void(0);">
										<span class="main-img-user"><img alt="avatar" src="<?= base_url() ?>assets/auth/img/user.png"></span>
									</a>
									<div class="dropdown-menu">
										<div class="header-navheading">
											<h6 class="main-notification-title"><?= $this->session->userdata('admin_fullname') ?></h6>
											<p class="main-notification-text">Administrator</p>
										</div>

										<a class="dropdown-item" href="<?= base_url('admin/account_settings') ?>">
											<i class="fe fe-settings"></i> Account Settings
										</a>

										<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
											<i class="fe fe-power"></i> Sign Out
										</a>
									</div>
								</div>
								<!-- Profile -->

							</div>
						</div>
					</div>
					<!-- <div class="d-flex header-setting-icon demo-icon fa-spin">
						<a class="nav-link icon" href="javascript:void(0);">
							<i class="fe fe-settings settings-icon "></i>
						</a>
					</div> -->
				</div>
			</div>
		</div>
		<!-- END HEADER -->

		<!-- SIDEBAR -->

		<div class="sticky">
			<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
				<div class="main-sidebar-header main-container-1 active">
					<div class="sidemenu-logo">
						<a class="main-logo" href="<?= base_url()  ?>">
							<img width="80" style="width: 80px;" src="<?= base_url() ?>assets/auth/img/logo-2.png" class="header-brand-img desktop-logo" alt="logo">
							<img width="80" style="width: 80px;" src="<?= base_url() ?>assets/auth/img/logo-2.png" class="header-brand-img icon-logo" alt="logo">
							<img width="80" style="width: 80px;" src="<?= base_url() ?>assets/auth/img/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
							<img width="80" style="width: 80px;" src="<?= base_url() ?>assets/auth/img/logo.png" class="header-brand-img icon-logo theme-logo" alt="logo">
						</a>
					</div>
					<div class="main-sidebar-body main-body-1">
						<div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
						<ul class="menu-nav nav">
							<li class="nav-header"><span class="nav-label">Dashboard</span></li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('admin/dashboard')  ?>">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<i class="ti-home sidemenu-icon menu-icon"></i>
									<span class="sidemenu-label">Dashboard</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('admin/users')  ?>">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<i class="ti-user sidemenu-icon menu-icon"></i>
									<span class="sidemenu-label">Users</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('admin/transactions')  ?>">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<i class="ti-credit-card sidemenu-icon menu-icon"></i>
									<span class="sidemenu-label">Transactions</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('admin/data_plans')  ?>">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<i class="ti-book sidemenu-icon menu-icon"></i>
									<span class="sidemenu-label">Data Plans</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('admin/account_settings')  ?>">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<i class="fe fe-settings sidemenu-icon menu-icon"></i>
									<span class="sidemenu-label">Account Settings</span>
								</a>
							</li>
							
    						<li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/announcements') ?>">
                                    <span class="shape1"></span>
                                    <span class="shape2"></span>
                                    <i class="fe fe-bell sidemenu-icon menu-icon"></i>
                                    <span class="sidemenu-label">Announcements</span>
                                </a>
                            </li>

							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('auth/logout')  ?>">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<i class="fe fe-power sidemenu-icon menu-icon"></i>
									<span class="sidemenu-label">Logout</span>
								</a>
							</li>



						</ul>
						<div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
					</div>
				</div>
			</div>
		</div>
		<!-- END SIDEBAR -->
