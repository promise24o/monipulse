<div class="main-content app-content">
    <div class="main-container container-fluid d-block d-sm-none bg-white">
        <!-- Mobile breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Cable Purchase</span>
            </div>
        </div>
    </div>

    <!-- Large screen -->
    <div class="main-container container-fluid">
        <!-- Breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Cable Purchase</span>
            </div>
            <div class="justify-content-center mt-2 d-none d-sm-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cable Purchase</li>
                </ol>
            </div>
        </div>

        <div class="row row-sm justify-content-center">
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                <div class="card box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">
                            Buy Cable Subscription From Wallet Balance ₦ 
                            <span id="walletBal1"><?= isset($user_wallet->amount) ? number_format($user_wallet->amount, 2) : '0.00'; ?></span>
                            <span class="float-end">
                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-target="#modaldemo3" data-bs-toggle="modal">View Discounts</a>
                            </span>
                        </h4>
                        <p class="mb-2">Select a provider, plan, and duration to purchase a cable subscription.</p>
                    </div>
                    <div class="card-body">
                        <?php $active_vtu = $this->crud_model->active_vtu(); ?>
                        <form class="form-horizontal" id="SubmitCableRequest" action="<?= base_url('user/cablePurchase') ?>" method="POST">
                            <div class="form-group">
                                <h4 class="card-title">
                                    You selected: 
                                    <span class="mg-10">
                                        <img src="<?= base_url() ?>assets/user/images/png/network.png" alt="(no provider selected yet)" id="networkLogo" height="60px" width="80px">
                                    </span>
                                </h4>
                                <br>
                                <select name="cable" id="cable" class="form-control form-select" data-bs-placeholder="Select Provider" required>
                                    <option value="">Select Cable Provider</option>
                                    <option value="gotv">GOtv</option>
                                    <option value="dstv">DStv</option>
                                    <option value="startimes">StarTimes</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <?php if ($active_vtu === 'jonet') : ?>
                                    <label for="subscription_type">Subscription Type</label>
                                    <select name="subscription_type" id="subscription_type" class="form-control form-select" required>
                                        <option value="">Select Subscription Type</option>
                                        <option value="renew">Renew (Same Bouquet)</option>
                                        <option value="change">Change (New Bouquet)</option>
                                    </select>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <select name="plan" id="plan" class="form-control form-select" data-bs-placeholder="Select Plan" required>
                                    <option value="" data-planPrice="">Select Plan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="duration" id="duration" class="form-control form-select" data-bs-placeholder="Select Duration" required>
                                    <option value="">Select Duration</option>
                                    <?php if ($active_vtu === 'jonet') : ?>
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="4">4 Months</option>
                                        <option value="5">5 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="7">7 Months</option>
                                        <option value="8">8 Months</option>
                                        <option value="9">9 Months</option>
                                        <option value="10">10 Months</option>
                                        <option value="11">11 Months</option>
                                        <option value="12">12 Months</option>
                                    <?php else : ?>
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="4">4 Months</option>
                                        <option value="5">5 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="7">7 Months</option>
                                        <option value="8">8 Months</option>
                                        <option value="9">9 Months</option>
                                        <option value="10">10 Months</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="iuc" id="iuc" placeholder="Enter IUC/SmartCard Number" maxlength="11" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary mg-t-40" style="width: 100%" id="submit">
                                    Submit Request
                                    <div id="loading-animation" class="text-center" style="display: none;">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Discount Modal -->
        <div class="modal fade" id="modaldemo3" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Cable Subscription Discounts. Your account type is <u><b>Reseller One</b></u></h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th>Provider</th>
                                        <th>Reseller One Discount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cable_discounts as $discount) : ?>
                                        <tr>
                                            <td><?= $discount['Provider'] ?></td>
                                            <td><?= $discount['ResellerPercentage'] ?>%</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>