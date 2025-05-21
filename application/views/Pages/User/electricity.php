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
				<span class="main-content-title mg-b-0 mg-b-lg-1 ">Electricity Purchase</span>
			</div>
			<div class="justify-content-center mt-2  d-none d-sm-block ">
				<ol class="breadcrumb">
					<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Sales</li>
				</ol>
			</div>
		</div>


		<div class="row row-sm justify-content-center">
			<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
				<div class="card  box-shadow-0">
					<div class="card-header">
						<h4 class="card-title mb-1">Buy Electricity From Wallet Balance ₦<span id="walletBal1"><?= isset($user_wallet->amount) ? number_format($user_wallet->amount, 2) : '0.00'; ?></span></h4>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="SubmitAirtimeRequest">
							<div class="form-group">
								<h4 class="card-title">you selected: <span class="mg-10"><img src="<?= base_url() ?>assets/user/images/png/network.png" alt="(no provider selected yet)" id="networkLogo" height="60px" width="80px"></span></h4>
								<br>
								<label>Electricity Company</label>
								<select name="provider" id="provider" class="form-control form-select" onchange="showImage()" onselect="showImage()" required="">
									<option value=""> Select Electricity Disco</option>
									<option value="1"> Jos Electricity PostPaid</option>
									<option value="2"> Jos Electricity Prepaid</option>
									<option value="3"> Kaduna Electricity Prepaid</option>
									<option value="4"> Eko Electricity Prepaid</option>
									<option value="5"> Eko Electricity Postpaid</option>
									<option value="6"> Ibadan Disco Prepaid</option>
									<option value="8"> Port Harcourt Postpaid</option>
									<option value="9"> Port Harcourt Prepaid</option>
									<option value="10"> Enugu Postpaid</option>
									<option value="11"> Enugu Prepaid</option>
									<option value="12"> Abuja Postpaid</option>
									<option value="13"> Abuja Prepaid</option>
									<option value="14"> Kano Electricity Postpaid</option>
									<option value="15"> Kano Electricity Prepaid</option>
									<option value="16"> Ikeja Disco Bill Payment</option>
									<option value="17"> Ikeja Disco Token Vending</option>
									<option value="18"> Benin Electricity Postpaid</option>
									<option value="19"> Benin Electricity Postpaid</option>
									<option value="20"> Yola Electricity Postpaid</option>
									<option value="21"> Yola Electricity Prepaid</option>
								</select>
							</div>

							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone number" maxlength="11" required="">
							</div>

							<div class="form-group">
								<label>Amount</label>
								<input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount" required="">
							</div>

							<div class="form-group">
								<label>Meter Number</label>
								<input type="text" class="form-control" name="meterNo" id="meterNo" placeholder="Enter Meter No" required="">
							</div>


							<div class="form-group mb-3  ">
								<div>
									<button type="submit" class="btn btn-primary mg-t-40 " style="width: 100%" id="submit">Submit Request
										<div id="loading-animation" class="text-center" style="display: none;">
											<div class="spinner-border" role="status">
												<span class="visually-hidden">Loading...</span>
											</div>
										</div>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Container -->
	</div>
</div>
