<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">User Lists</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
						<li class="breadcrumb-item active" aria-current="page">User Lists</li>
					</ol>
				</div>

			</div>
			<!-- End Page Header -->
			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card overflow-hidden">
						<div class="card-body">
							<div>
								<h6 class="main-content-label mb-1">Registered Users</h6>
								<p class="text-muted card-sub-title">Searching, ordering and paging can be done on the user lists</p>
							</div>
							<div class="table-responsive">
								<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

									<div class="row">
										<div class="col-sm-12">
											<table class="table table-bordered border-bottom dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
												<thead>
													<tr role="row">
														<th class="wd-20p" style="width: 109.969px;">S/N</th>
														<th class="wd-20p" style="width: 109.969px;">Name</th>
														<th class="wd-25p" style="width: 180.234px;">Email</th>
														<th class="wd-20p" style="width: 99.4531px;">Phone</th>
														<th class="wd-15p" style="width: 56.7188px;">Date Joined</th>
														<th class="wd-20p" style="width: 93.625px;">Payment Status</th>
													</tr>
												</thead>
												<tbody>
													<?php $count = 1;
													foreach ($users as $user) : ?>
														<tr class="odd">
															<td class="sorting_1"><?= $count++ ?>.</td>
															<td class="sorting_1"><?= $user['fullname'] ?></td>
															<td><?= $user['email'] ?></td>
															<td><?= $user['phone'] ?></td>
															<td><?= $user['date_joined'] ?></td>
															<td><?= $user['reg_payment'] == 0 ? '<span class="badge bg-danger">Unpaid</span>' : '<span class="badge bg-success">Paid</span>' ?></td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
