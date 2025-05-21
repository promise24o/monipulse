<!-- END PAGE -->
<div class="page main-signin-wrapper">
	<!-- Row -->
	<div class="row signpages text-center">
		<div class="col-md-12">
			<div class="card">
				<div class="row row-sm">
					<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
						<div class="mt-5 pt-4 p-2 pos-absolute">
							<img src="<?= base_url() ?>assets/auth/img/logo-2.png" class="header-brand-img mb-4" alt="logo" style="width: 100px;">
							<div class="clearfix"></div>
							<img src="<?= base_url() ?>assets/auth/img/svgs/user.svg" class="ht-100 mb-0" alt="user">
							<h5 class="mt-4 text-white">Access Dashboard</h5>
							<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Login now to create, discover, and connect with the global community. Unlock the power of seamless connectivity at your fingertips.</span>

						</div>
					</div>
					<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
						<div class="main-container container-fluid">
							<div class="row row-sm">
								<div class="card-body mt-2 mb-2">
									<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/auth/img/logo.png" class="d-lg-none header-brand-img text-center mx-auto mb-4 error-logo-light" alt="logo" style="width: 100px;"></a>

									<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/auth/img/logo.png" class=" d-lg-none header-brand-img text-center mx-auto  mb-4 error-logo" alt="logo" style="width: 100px;"></a>
									<div class="clearfix"></div>
									<a href="<?= base_url() ?>"><i class="fa fa-arrow-left"></i> Go Back</a>
									<form method="post" action="<?= base_url('auth/confirm_login') ?>">
										<h5 class="text-start mb-2">Sign In</h5>
										<div class="form-group text-start">
											<label>Email</label>
											<input class="form-control" required name="email" placeholder="Enter your email" type="text">
										</div>
										<div class="form-group text-start">
											<label>Password</label>
											<input class="form-control" name="password" placeholder="Enter your password" type="password" required>
										</div>
										<button  type="submit" class="btn btn-main-primary btn-block text-white">Sign In</button>
									</form>
									<div class="text-start mt-5 ms-0">
										<div class="mb-1"><a href="<?= base_url('forgot-password') ?>">Forgot password?</a></div>
										<div>Don't have an account? <a href="<?= base_url('create-account') ?>">Register Here</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row -->
</div>
<!-- END PAGE -->
