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
							<img src="<?= base_url() ?>assets/auth/img/security.png" class="ht-100 mb-0" alt="key"> <!-- Changed icon -->
							<h5 class="mt-4 text-white">Forgot Your Password?</h5>
							<span class="tx-white-6 tx-13 mb-5 mt-xl-0">No worries! Enter your email address below, and we'll send you a new password to get you back on track.</span>
						</div>
					</div>
					<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
						<div class="main-container container-fluid">
							<div class="row row-sm">
								<div class="card-body mt-2 mb-2">
									<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/auth/img/logo.png" class="d-lg-none header-brand-img text-center mx-auto mb-4 error-logo-light" alt="logo" style="width: 100px;"></a>
									<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/auth/img/logo.png" class=" d-lg-none header-brand-img text-center mx-auto  mb-4 error-logo" alt="logo" style="width: 100px;"></a>
									<div class="clearfix"></div>
									<a href="<?= base_url('get-started') ?>"><i class="fa fa-arrow-left"></i> Back to Login</a>
									
                                    <?php if($this->session->flashdata('success_message')): ?>
                                        <div class="alert alert-success mt-3"><?= $this->session->flashdata('success_message'); ?></div>
                                    <?php endif; ?>
                                    <?php if($this->session->flashdata('error_message')): ?>
                                        <div class="alert alert-danger mt-3"><?= $this->session->flashdata('error_message'); ?></div>
                                    <?php endif; ?>
                                    
									<form method="post" action="<?= base_url('auth/process_forgot_password') ?>" class="mt-3">
										<h5 class="text-start mb-2">Reset Password</h5>
										<p class="text-muted text-start">Enter the email address associated with your account.</p>
										<div class="form-group text-start">
											<label>Email</label>
											<input class="form-control" required name="email" placeholder="Enter your email" type="email" value="<?= set_value('email') ?>">
                                            <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
										</div>
										<button type="submit" class="btn btn-main-primary btn-block text-white">Send New Password</button>
									</form>
									<div class="text-start mt-5 ms-0">
										<div>Remembered your password? <a href="<?= base_url('get-started') ?>">Sign In</a></div>
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