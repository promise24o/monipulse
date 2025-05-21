<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Account Settings</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="row square">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="profile-tab tab-menu-heading">
                                <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#security">Security</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#api">API</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#airtimeDiscounts">Airtime Discounts</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#cableDiscounts">Cable Discounts</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card main-content-body-profile">
                        <div class="tab-content">
                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="edit">
                                <div class="card-body border">
                                    <div class="mb-4 main-content-label">Personal Information</div>
                                    <form class="form-horizontal" method="post" action="<?= base_url('admin/update_account_details') ?>">
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Fullname</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="admin_name" required class="form-control" placeholder="Full Name" value="<?= $this->session->userdata('admin_fullname') ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 main-content-label">Contact Info</div>
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Email<i>(required)</i></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Email" name="admin_email" required value="<?= $this->session->userdata('admin_email') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Website</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input readonly type="text" class="form-control" placeholder="Website" value="<?= base_url() ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 main-content-label">Social Info</div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Twitter</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="twitter" class="form-control" placeholder="twitter" value="<?= isset($social_data->twitter) ? $social_data->twitter : '' ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Facebook</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="facebook" class="form-control" placeholder="facebook" value="<?= isset($social_data->facebook) ? $social_data->facebook : '' ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Whatsapp</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input name="whatsapp" type="text" class="form-control" placeholder="whatsapp" value="<?= isset($social_data->whatsapp) ? $social_data->whatsapp : '' ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Instagram</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="instagram" name="instagram" value="<?= isset($social_data->instagram) ? $social_data->instagram : '' ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary my-2 btn-icon-text">
                                            <i class="fe fe-download-cloud me-2"></i> Update Details
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="main-content-body tab-pane border-top-0" id="security">
                                <div class="border p-4">
                                    <div class="main-content-body main-content-body-profile">
                                        <div class="mb-4 main-content-label">Change Password</div>
                                        <div class="card-body">
                                            <div class="d-flex flex-column">
                                                <form action="<?= base_url('admin/change_password') ?>" method="post">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Current Password" type="password" name="current_password" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="New Password" type="password" name="new_password" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Confirm New Password" type="password" name="confirm_password" required>
                                                    </div>

                                                    <button type="submit" class="btn ripple btn-main-primary">Change Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <div class="main-content-body p-4 border tab-pane border-top-0" id="api">
                                <div class="card-body">
                                    <form action="<?= base_url('admin/update_api') ?>" method="post">
                                        <div class="form-group">
                                            <label for="paystack_pk">Paystack Public Key:</label>
                                            <input class="form-control" placeholder="Paystack Public Key" type="text" name="paystack_pk" value="<?= $api_data['paystack_pk'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="paystack_sk">Paystack Secret Key:</label>
                                            <input class="form-control" placeholder="Paystack Secret Key" type="text" name="paystack_sk" value="<?= $api_data['paystack_sk'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="monnify_api">Monnify API Key:</label>
                                            <input class="form-control" placeholder="Monnify API Key" type="text" name="monnify_api" value="<?= $api_data['monnify_api'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="monnify_secret_key">Monnify Secret Key:</label>
                                            <input class="form-control" placeholder="Monnify Secret Key" type="text" name="monnify_secret_key" value="<?= $api_data['monnify_secret_key'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="monnify_contract_code">Monnify Contract Code:</label>
                                            <input class="form-control" placeholder="Monnify Contract Code" type="text" name="monnify_contract_code" value="<?= $api_data['monnify_contract_code'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jonet_vtu">Jonet VTU Key:</label>
                                            <input class="form-control" placeholder="Jonet VTU Key" type="text" name="jonet_vtu" value="<?= $api_data['jonet_vtu'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="vtu_api">Data24 VTU API:</label>
                                            <input class="form-control" placeholder="Data24 VTU API" type="text" name="vtu_api" value="<?= $api_data['vtu'] ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="active_vtu">Active VTU API:</label>
                                            <select class="form-control" name="active_vtu" id="active_vtu" required>
                                                <option value="data24" <?= isset($api_data['active_vtu']) && $api_data['active_vtu'] == 'data24' ? 'selected' : '' ?>>Data24</option>
                                                <option value="jonet" <?= isset($api_data['active_vtu']) && $api_data['active_vtu'] == 'jonet' ? 'selected' : '' ?>>Jonet</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn ripple btn-main-primary">Update APIs</button>
                                    </form>
                                </div>
                            </div>


                            <div class="main-content-body p-4 border tab-pane border-top-0" id="airtimeDiscounts">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Airtime Discounts (All values are in percentage %)</h5>

                                    <form method="post" action="<?= base_url('admin/update_airtime_discounts') ?>">
                                        <div class="form-group row">
                                            <label for="mtnDiscount" class="col-sm-2 col-form-label">MTN Discount</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" required name="mtnDiscount" placeholder="Enter MTN Discount" value="<?= isset($airtime_discounts['mtn']) ? $airtime_discounts['mtn'] : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="etisalatDiscount" class="col-sm-2 col-form-label">9mobile Discount</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" required name="etisalatDiscount" placeholder="Enter 9mobile Discount" value="<?= isset($airtime_discounts['etisalat']) ? $airtime_discounts['etisalat'] : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="gloDiscount" class="col-sm-2 col-form-label">Glo Discount</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" required name="gloDiscount" placeholder="Enter Glo Discount" value="<?= isset($airtime_discounts['glo']) ? $airtime_discounts['glo'] : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="airtelDiscount" class="col-sm-2 col-form-label">Airtel Discount</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" required name="airtelDiscount" placeholder="Enter Airtel Discount" value="<?= isset($airtime_discounts['airtel']) ? $airtime_discounts['airtel'] : ''; ?>">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Discounts</button>
                                    </form>
                                </div>
                            </div>

                            <div class="main-content-body p-4 border tab-pane border-top-0" id="cableDiscounts">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Cable Discounts (All values are in percentage %)</h5>

                                    <form method="post" action="<?= base_url('admin/update_cable_discounts') ?>">
                                        <?php
                                        foreach ($cable_discounts as $discount) :
                                        ?>
                                            <div class="form-group row">
                                                <label for="mtnDiscount" class="col-sm-2 col-form-label"><?= $discount['Provider'] ?> Discount</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" required name="<?= $discount['id'] ?>" placeholder="Enter Discount" value="<?= isset($discount['ResellerPercentage']) ? $discount['ResellerPercentage'] : ''; ?>" step="0.01">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <button type="submit" class="btn btn-primary">Update Discounts</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>