<div class="main-content app-content">
	<div class="main-container container-fluid d-block d-sm-none bg-white">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between">
			<div class="left-content">
			</div>
		</div>
		<!-- /Container -->
	</div>
	<!-- large screen -->
	<div class="main-container container-fluid  ">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between ">
			<div class="left-content">
				<span class="main-content-title mg-b-0 mg-b-lg-1 ">Change Password</span>
			</div>
			<div class="justify-content-center mt-2  d-none d-sm-block ">
				<ol class="breadcrumb">
					<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Sales</li>
				</ol>
			</div>
		</div>
		<div class="main-container container-fluid">
			<!-- breadcrumb -->
			<!-- /breadcrumb -->
			<!-- row -->
			<div class="row  justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="card custom-card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								Change Password
							</div>
							<p class="mg-b-20">Enter old and new password to continue.</p>
							<form action="<?= base_url('user/confirm_change_password') ?>" method="POST">
								<div class="d-flex flex-column pd-30 pd-sm-20">
									<div class="form-group">
										<label for="exampleInputEmail1">Old Password</label>
										<input class="form-control" placeholder="Enter old Password" type="password" name="oldPassword" required="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">New Password</label>
										<input class="form-control" placeholder="Enter Your new Password" type="password" name="newPassword">
									</div>
									<button class="btn ripple btn-primary" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->
			<!-- /row -->
		</div>
		<!-- /Container -->
	</div>
</div>
