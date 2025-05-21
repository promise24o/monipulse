<div class="main-content app-content">
    <div class="main-container container-fluid d-block d-sm-none bg-white">
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
            </div>
        </div>
    </div>
    <div class="main-container container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Data Purchase</span>
            </div>
            <div class="justify-content-center mt-2 d-none d-sm-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sales</li>
                </ol>
            </div>
        </div>
        <div class="row row-sm justify-content-center">
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                <div class="card box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Buy Data From Wallet ₦<span id="walletBal1"><?= isset($user_wallet->amount) ? number_format($user_wallet->amount, 2) : '0.00'; ?></span></h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        $active_vtu = $this->crud_model->active_vtu();
                        if ($active_vtu === 'data24') : ?>
                            <form class="form-horizontal" id="SubmitData24Request">
                                <div class="form-group">
                                    <select name="network" id="data24_network" class="form-control form-select" data-bs-placeholder="Select Network" required="">
                                        <option value="">Select Network</option>
                                        <option value="MTN">MTN</option>
                                        <option value="AIRTEL">AIRTEL</option>
                                        <option value="GLO">GLO</option>
                                        <option value="9MOBILE">9MOBILE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="plan" id="data24_plan" class="form-control form-select" data-bs-placeholder="Select Plan" required="">
                                        <option value="">Select Plan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="phonenumber" id="data24_phonenumber" placeholder="Enter Phonenumber (07098877758)" maxlength="11" required="">
                                </div>
                                <div class="">
                                    <input type="checkbox" class="" id="data24_ported">
                                    <label class="">Allow Ported number</label>
                                </div>
                                <div class="form-group mb-3">
                                    <div>
                                        <button type="submit" class="btn btn-primary mg-t-40" style="width: 100%" id="data24_submit">Purchase Data
                                            <div id="data24_loading" class="text-center" style="display: none;">
                                                <div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($active_vtu === 'jonet') : ?>
                            <form class="form-horizontal" id="SubmitJonetDataRequest">
                                <div class="form-group">
                                    <select name="network" id="jonet_network" class="form-control form-select" required="">
                                        <option value="">Select Network</option>
                                        <option value="MTN">MTN</option>
                                        <option value="AIRTEL">AIRTEL</option>
                                        <option value="GLO">GLO</option>
                                        <option value="9MOBILE">9MOBILE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="plan" id="jonet_plan" class="form-control form-select" required="">
                                        <option value="">Select Plan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="phonenumber" id="jonet_phonenumber" placeholder="Enter Phonenumber (07098877758)" maxlength="11" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary mg-t-40" style="width: 100%" id="jonet_submit">Purchase Data
                                        <div id="jonet_loading" class="text-center" style="display: none;">
                                            <div class="spinner-border" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modaldemo3">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Data Discounts. Your account type is <u><b> Reseller One</b></u></h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <h6>Upgrade to enjoy better rates</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th>Network</th>
                                        <th>Data Plan</th>
                                        <th>Reseller One</th>
                                        <th>Reseller Two</th>
                                        <th>Reseller Three</th>
                                    </tr>
                                </thead>
                                <tbody>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-aio.min.js"></script>

<script>
$(document).ready(function() {
    <?php if ($active_vtu === 'data24') : ?>
        $('#data24_network').change(function() {
            var network = $(this).val();
            if (network) {
                $.ajax({
                        url: '<?= base_url('user/get_data24_plans') ?>',
                    type: 'POST',
                    data: { network: network },
                    dataType: 'json',
                    success: function(response) {
                        $('#data24_plan').empty().append('<option value="">Select Plan</option>');
                        if (response.status === 'success') {
                            $.each(response.plans, function(index, plan) {
                                $('#data24_plan').append(`<option value="${plan.id}" data-price="${plan.price}">${plan.dataplan} - ₦${plan.price}</option>`);
                            });
                        }
                    }
                });
            }
        });

        $('#SubmitData24Request').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $('#data24_submit').prop('disabled', true);
            $('#data24_loading').show();

            $.ajax({
                url: '<?= base_url('user/dataPurchase') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#data24_submit').prop('disabled', false);
                    $('#data24_loading').hide();
                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message);
                        setTimeout(() => location.reload(), 2000);
                    } else {
                        Notiflix.Notify.failure(response.message);
                    }
                },
                error: function() {
                    $('#data24_submit').prop('disabled', false);
                    $('#data24_loading').hide();
                    Notiflix.Notify.failure('An error occurred. Please try again.');
                }
            });
        });
    <?php elseif ($active_vtu === 'jonet') : ?>
        $('#jonet_network').change(function() {
            var network = $(this).val();
            if (network) {
                $.ajax({
                    url: '<?= base_url('user/get_jonet_plans') ?>',
                    type: 'POST',
                    data: { network: network },
                    dataType: 'json',
                    success: function(response) {
                        $('#jonet_plan').empty().append('<option value="">Select Plan</option>');
                        if (response.status === 'success') {
                            $.each(response.plans, function(index, plan) {
                                $('#jonet_plan').append(`<option value="${plan.code}" data-price="${plan.price}">${plan.name} - ₦${plan.price}</option>`);
                            });
                        }
                    }
                });
            }
        });

        $('#SubmitJonetDataRequest').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $('#jonet_submit').prop('disabled', true);
            $('#jonet_loading').show();

            $.ajax({
                url: '<?= base_url('user/purchase_jonet_data') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#jonet_submit').prop('disabled', false);
                    $('#jonet_loading').hide();
                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message);
                        setTimeout(() => location.reload(), 2000);
                    } else {
                        Notiflix.Notify.failure(response.message);
                    }
                },
                error: function() {
                    $('#jonet_submit').prop('disabled', false);
                    $('#jonet_loading').hide();
                    Notiflix.Notify.failure('An error occurred. Please try again.');
                }
            });
        });
    <?php endif; ?>
});
</script>