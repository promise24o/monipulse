<style>
	.card {
		text-align: center;
		padding: 20px;
		margin: 10px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		border-radius: 8px;
	}

	.icon {
		font-size: 2em;
		margin-bottom: 10px;
	}

	.button {
		background-color: #007bff;
		color: #fff;
		padding: 10px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
	}
</style>

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
				<span class="main-content-title mg-b-0 mg-b-lg-1 ">Support Center</span>
			</div>
			<div class="justify-content-center mt-2  d-none d-sm-block ">
				<ol class="breadcrumb">
					<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Support</li>
				</ol>
			</div>
		</div>
		<div class="main-container container-fluid">
			<!-- breadcrumb -->
			<!-- /breadcrumb -->
			<!-- row -->
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<i class="icon fab fa-whatsapp"></i>
						<p>Connect with us on WhatsApp</p>
						<a target="_blank" href="<?= isset($social_data->whatsapp) ? $social_data->whatsapp : '' ?>" class="button">WhatsApp</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<i class="icon fab fa-twitter"></i>
						<p>Connect with us on Twitter</p>
						<a target="_blank" href="<?= isset($social_data->twitter) ? $social_data->twitter : '' ?>" class="button">Twitter</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<i class="icon fab fa-facebook"></i>
						<p>Connect with us on Facebook</p>
						<a target="_blank" href="<?= isset($social_data->facebook) ? $social_data->facebook : '' ?>" class="button">Facebook</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<i class="icon fab fa-instagram"></i>
						<p>Connect with us on Instagram</p>
						<a target="_blank" href="<?= isset($social_data->instagram) ? $social_data->instagram : '' ?>" class="button">Instagram</a>
					</div>
				</div>
			</div>
			<!-- /row -->
			<!-- /row -->
		</div>
		<!-- /Container -->
	</div>
</div>
