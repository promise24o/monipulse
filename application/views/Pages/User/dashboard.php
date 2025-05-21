    <!-- main-content -->
    <div class="main-content app-content">
    
        <div class="main-container container-fluid d-block d-sm-none bg-white" style="margin-top: -19px">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1 mt-10 ">Hi, <?= $this->session->userdata("user_fullname") ?></span>
                </div>
            </div>
    
            <div class="d-block d-sm-none">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <div class="row bg-white">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12">
                                <div class="card sales-card circle-image1 card-image" style="background-color: #06046e !important; color:white;">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-4 pt-4 pe-3 pb-4">
                                                <div class="">
                                                    <h6 class="mb-2 tx-12 ">Account Balance</h6>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex mb-4">
                                                        <h4 class="tx-20 font-weight-semibold mb-10">₦ <span id="walletBal2"><?= isset($user_wallet->amount) ? number_format($user_wallet->amount, 2) : '0.00'; ?></span></h4>
                                                    </div>
                                                    <p data-bs-toggle="modal" data-bs-target="#fundAccount" class="mb-0 tx-12 mt-6">Fund Now<i class="fa fa-caret-up mx-2 "></i>
                                                        <span class="text-success font-weight-semibold"> </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="circle-icon bg-primary-transparent text-center align-self-center overflow-hidden" style="background-color: #e59138 !important;">
                                                <i class="ti-wallet tx-16 text-white" data-bs-toggle="tooltip" title="" data-bs-original-title="ti-wallet" aria-label="ti-wallet"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 mb-3 mt-4">
                                <h6 class="mb-2 tx-12 heading-style">Select Service</h6>
                                <div class="horizontal-line-sm mb-3"></div>
    
                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-3 ">
                                            <div class="row" style="margin-left:0px !important">
                                                <a href="<?= base_url('user/airtime') ?>">
                                                    <div class="col-12 ml-4">
                                                        <i class="fa fa-phone fa-2x"></i>
                                                    </div>
                                                    <div class="col-12 ml-4 ">
                                                        <span class="bigfont">Airtime</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3 d-flex align-items-start justify-content-center ">
                                            <div class="row">
                                                <a href="<?= base_url('user/data') ?>">
                                                    <div class="col-12 d-flex align-items-start justify-content-center">
                                                        <i class="fa fa-wifi fa-2x"></i>
                                                    </div>
                                                    <div class="col-12 d-flex align-items-start justify-content-center">
                                                        <span class="bigfont">Data</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3 d-flex align-items-start justify-content-center ">
                                            <div class="row">
                                                <a href="<?= base_url('user/cable') ?>">
                                                    <div class="col-12 d-flex align-items-start justify-content-center">
                                                        <i class="fa fa-tv fa-2x"></i>
                                                    </div>
                                                    <div class="col-12 d-flex align-items-start justify-content-center">
                                                        <span class="bigfont">Cable</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3 d-flex align-items-start justify-content-end ">
                                            <div class="row">
                                                <a href="<?= base_url('user/electricity') ?>">
                                                    <div class="col-12 d-flex align-items-start justify-content-center">
                                                        <i class="fa fa-lightbulb fa-2x" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-12 d-flex align-items-start justify-content-center">
                                                        <span class="bigfont">Electricity</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 mb-2 mt-4">
                                <h5 class="mb-4 bigfont">Instant Account Funding</h5>
                                <div class="horizontal-line-sm mb-2"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                                                            <p class="text text-center">Make payment with Card, USSD, Bank Transfer, or QR with Paystack to Topup your Account.</p>
                                                            <img src="<?= base_url() ?>assets/auth/img/secured-by-paystack.png" class="img-fluid" alt="Bank Card Image" width="150px" height="100px">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#fundAccount" class="btn btn-primary mt-3">Fund Account Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="horizontal-line-center mb-3"></div>
                                </div>
                            </div>
    
                            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 mb-3 mt-4">
                                <h5 class="mb-2 bigfont">Announcements</h5>
                                <div class="horizontal-line-sm mb-3"></div>
                                <?php if (empty($announcements)) : ?>
                                    <p class="text-muted text-center">No announcements available at the moment.</p>
                                <?php else : ?>
                                    <ul class="list-group">
                                        <?php foreach ($announcements as $announcement) : 
                                            if ($announcement['is_active']) : ?>
                                                <li class="list-group-item">
                                                    <strong><?= $announcement['title'] ?></strong>
                                                    <p class="mb-0"><?= htmlspecialchars($announcement['content']) ?></p>
                                                    <!--<small class="text-muted"><?= date('jS F, Y h:iA', strtotime($announcement['created_at'])) ?></small>-->
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- large screen -->
        <div class="main-container container-fluid d-none d-sm-block">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Dashboard</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
                    </ol>
                </div>
            </div>
    
            <style>
                h3 {
                    font-size: 20px;
                }
                @media (max-width: 575.98px) {
                    h3 {
                        font-size: 18px;
                    }
                }
                @media (min-width: 576px) and (max-width: 767.98px) {
                    h3 {
                        font-size: 22px;
                    }
                }
                @media (min-width: 768px) and (max-width: 991.98px) {
                    h3 {
                        font-size: 26px;
                    }
                }
            </style>
            <!-- /breadcrumb -->
    
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="card primary-custom-card1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="text-justified align-items-center">
                                        <h2 class="text-dark font-weight-semibold mb-3 mt-2">Hi, Welcome <strong class="text-primary"> <?= $this->session->userdata('user_fullname') ?></strong></h2>
                                        <p class="text-dark tx-17 mb-2 lh-3"> We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment and Airtime to Cash.</p>
                                        <marquee behavior="scroll" direction="left" onmouseout="this.start();" style="background-color:#06046e;color:white">
                                            <h4>Use *323# to check data balance for all networks</h4>
                                        </marquee>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="card sales-card circle-image1">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12 ">Account Balance</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex mb-4">
                                                    <h4 class="tx-20 font-weight-semibold mb-10">₦ <span id="walletBal2"><?= isset($user_wallet->amount) ? number_format($user_wallet->amount, 2) : '0.00'; ?></span></h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">Fund Now<i class="fa fa-caret-up mx-2 text-success"></i>
                                                    <span class="text-success font-weight-semibold"> </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-primary-transparent text-center align-self-center overflow-hidden">
                                            <i class="ti-wallet tx-16 text-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="ti-wallet" aria-label="ti-wallet"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="card sales-card circle-image2">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12">Today's Transactions</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-20 font-weight-semibold mb-2">₦ <?php echo number_format($todaySales, 2); ?></h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">Today's Sales <i class="fa fa-caret-down mx-2 text-danger"></i>
                                                    <span class="font-weight-semibold text-danger"> </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-info-transparent text-center align-self-center overflow-hidden">
                                            <i class="bi bi-cash tx-16 text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="card sales-card circle-image3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12">Account Type</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-15 font-weight-semibold mb-2">ACTIVE</h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">Type<i class="fa fa-caret-up mx-2 text-success"></i>
                                                    <span class=" text-success font-weight-semibold"> </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-secondary-transparent text-center align-self-center overflow-hidden">
                                            <i class="ti-user tx-16 text-secondary" data-bs-toggle="tooltip" title="" data-bs-original-title="ti-user" aria-label="ti-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="card sales-card circle-image4">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12">Customer Care</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-15 font-weight-semibold mb-2">07030601336</h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">Contact<i class="fa fa-caret-down mx-2 text-danger"></i>
                                                    <span class="text-danger font-weight-semibold"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-warning-transparent text-center align-self-center overflow-hidden">
                                            <i class="ti-tablet tx-16 text-warning" data-bs-toggle="tooltip" title="" data-bs-original-title="support channel" aria-label="ti-tablet"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
    
            <!-- Announcements Section for Large Screen -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-header">
                            <h4 class="card-title">Announcements</h4>
                        </div>
                        <div class="card-body">
                            <?php if (empty($announcements)) : ?>
                                <p class="text-muted text-center">No announcements available at the moment.</p>
                            <?php else : ?>
                                <ul class="list-group">
                                    <?php foreach ($announcements as $announcement) : 
                                        if ($announcement['is_active']) : ?>
                                            <li class="list-group-item">
                                                <strong><?= $announcement['title'] ?></strong>
                                                <p class="mb-0"><?= htmlspecialchars($announcement['content']) ?></p>
                                                <!--<small class="text-muted"><?= date('jS F, Y h:iA', strtotime($announcement['created_at'])) ?></small>-->
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mg-b-20" id="tabs-style2">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Fund your wallet
                            </div>
                            <p class="mg-b-20">Find the information below to fund your account</p>
                            <div class="text-wrap">
                                <div class="example">
                                    <div class="panel panel-primary tabs-style-2">
                                        <div class="tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <ul class="nav panel-tabs main-nav-line">
                                                    <li><a href="#tab6" class="nav-link active" data-bs-toggle="tab">Paystack</a></li>
                                                    <li><a href="#tab7" class="nav-link" data-bs-toggle="tab">Monnify</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab6" style="background-color:#06046e; color:white;">
                                                    <div class="row mt-2 p-3">
                                                        <div class="col-xs-12 col-md-3 mt-4 ml-3 mb-3">
                                                            <img src="<?= base_url() ?>assets/auth/img/secured-by-paystack.png" width="150px" height="130px">
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col-xs-12 col-md-6 mt-2">
                                                            <p class="text">Make payment with Card, USSD, Bank Transfer, or QR with Paystack to Topup your Account.</p>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#fundAccountPaystack" class="btn btn-success">Fund Account Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab7" style="background-color:#06046e; color:white;">
                                                    <div class="row mt-2 p-3">
                                                        <div class="col-xs-12 col-md-3 mt-4 ml-3 mb-3">
                                                            <img src="https://logosandtypes.com/wp-content/uploads/2024/02/Monnify.png" width="150px" height="130px">
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col-xs-12 col-md-6 mt-2">
                                                            <p class="text">Make payment with Card, USSD, Bank Transfer, or QR with Monnify to Topup your Account.</p>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#fundAccountMonnify" class="btn btn-success">Fund Account Now</a>
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
            </div>
    
            <!-- row -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Transaction History</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 yajra-datatable">
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th class="text-center">Transaction ID</th>
                                            <th>Transaction Type</th>
                                            <th>Amt</th>
                                            <th>Amt.Charged</th>
                                            <th>Details</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($user_transactions)) {
                                            $sn = 1;
                                            foreach ($user_transactions as $transaction) {
                                        ?>
                                                <tr>
                                                    <td><?= $sn++; ?></td>
                                                   <td class="text-center">
                                                        <?= $transaction->transaction_id; ?>
                                                        <?php
                                                            $status = (int)$transaction->status;
                                                            $statusBadge = [
                                                                0 => '<span class="badge badge-warning w-100">Pending</span>',
                                                                1 => '<span class="badge badge-success w-100">Paid</span>',
                                                                2 => '<span class="badge badge-danger w-100">Failed</span>',
                                                                3 => '<span class="badge badge-secondary w-100">Reversed</span>',
                                                            ];
                                                            echo $statusBadge[$status] ?? '<span class="badge badge-dark w-100">Unknown</span>';
                                                        ?>
                                                    </td>
    
                                                    <td><?= $transaction->transaction_type; ?></td>
                                                    <td>₦<?= number_format($transaction->amount, 2); ?></td>
                                                    <td>₦<?= number_format($transaction->amount_charged, 2); ?></td>
                                                    <td><?= $transaction->description; ?></td>
                                                    <td><?= date('Y-m-d H:i:s', strtotime($transaction->date)); ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Fund Account Modal for Paystack -->
    <div class="modal fade" id="fundAccountPaystack" tabindex="-1" role="dialog" aria-labelledby="fundAccountPaystackLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fundAccountPaystackLabel">Fund Account with Paystack</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('user/initializePayment') ?>">
                        <div class="form-group">
                            <label for="amountPaystack">Enter Amount:</label>
                            <input type="number" name="amount" required class="form-control" id="amountPaystack" placeholder="Enter amount">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Proceed</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Fund Account Modal for Monnify -->
    <div class="modal fade" id="fundAccountMonnify" tabindex="-1" role="dialog" aria-labelledby="fundAccountMonnifyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fundAccountMonnifyLabel">Fund Account with Monnify</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('user/initializeMonnifyPaymentProd') ?>">
                        <div class="form-group">
                            <label for="amountMonnify">Enter Amount:</label>
                            <input type="number" name="amount" required class="form-control" id="amountMonnify" placeholder="Enter amount">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Proceed</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
   <!-- Fund Account Modal (Unified for Mobile) -->
<div class="modal fade" id="fundAccount" tabindex="-1" role="dialog" aria-labelledby="fundAccountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fundAccountLabel">Fund Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="fundAccountForm">
                    <div class="form-group">
                        <label for="amount">Enter Amount:</label>
                        <input type="number" name="amount" required class="form-control" id="amount" placeholder="Enter amount">
                    </div>
                    <div class="form-group">
                        <label for="paymentMethod">Select Payment Method:</label>
                        <select name="payment_method" id="paymentMethod" class="form-control" required>
                            <option value="" disabled selected>Select a payment method</option>
                            <option value="paystack">Paystack</option>
                            <option value="monnify">Monnify</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    
    <!-- Announcement Modals -->
    <?php if (!empty($announcements)) : ?>
        <?php foreach ($announcements as $index => $announcement) : 
            if ($announcement['is_active']) : ?>
                <div class="modal fade" id="announcementModal<?= $announcement['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel<?= $announcement['id'] ?>" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="announcementModalLabel<?= $announcement['id'] ?>"><?= htmlspecialchars($announcement['title']) ?></h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><?= htmlspecialchars($announcement['content']) ?></p>
                                <small class="text-muted"><?= date('jS F, Y h:iA', strtotime($announcement['created_at'])) ?></small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mark-as-read" data-announcement-id="<?= $announcement['id'] ?>" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle announcement modals
        <?php if (!empty($announcements)) : ?>
            <?php foreach ($announcements as $index => $announcement) : 
                if ($announcement['is_active']) : ?>
                    // Check if announcement has been viewed
                    if (!sessionStorage.getItem('announcement_<?= $announcement['id'] ?>_viewed')) {
                        setTimeout(() => {
                            const modal = new bootstrap.Modal(document.getElementById('announcementModal<?= $announcement['id'] ?>'), {
                                backdrop: 'static',
                                keyboard: false
                            });
                            modal.show();
                        }, <?= $index * 1000 ?>); // Stagger modals by 1 second
                    }
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    
        // Mark announcement as read when modal is closed
        document.querySelectorAll('.mark-as-read').forEach(button => {
            button.addEventListener('click', function () {
                const announcementId = this.getAttribute('data-announcement-id');
                sessionStorage.setItem('announcement_' + announcementId + '_viewed', 'true');
                
                // Send AJAX request to mark announcement as read in the backend
                fetch('<?= base_url('user/mark_announcement_read') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ announcement_id: announcementId })
                });
            });
        });
    });
    </script>
    
    <!-- Fund Account Modal (Unified for Mobile) -->
<div class="modal fade" id="fundAccount" tabindex="-1" role="dialog" aria-labelledby="fundAccountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fundAccountLabel">Fund Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="fundAccountForm">
                    <div class="form-group">
                        <label for="amount">Enter Amount:</label>
                        <input type="number" name="amount" required class="form-control" id="amount" placeholder="Enter amount">
                    </div>
                    <div class="form-group">
                        <label for="paymentMethod">Select Payment Method:</label>
                        <select name="payment_method" id="paymentMethod" class="form-control" required>
                            <option value="" disabled selected>Select a payment method</option>
                            <option value="paystack">Paystack</option>
                            <option value="monnify">Monnify</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Proceed</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('fundAccountForm');
        const paymentMethodSelect = document.getElementById('paymentMethod');
    
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const paymentMethod = paymentMethodSelect.value;
            const amount = form.querySelector('#amount').value;
    
            if (paymentMethod === 'paystack') {
                form.action = '<?= base_url('user/initializePayment') ?>';
            } else if (paymentMethod === 'monnify') {
                form.action = '<?= base_url('user/initializeMonnifyPaymentProd') ?>';
            }
    
            if (amount && paymentMethod) {
                form.submit();
            }
        });
    });
</script>