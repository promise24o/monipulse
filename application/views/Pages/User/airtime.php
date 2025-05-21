<div class="main-content app-content">
    <div class="main-container container-fluid d-block d-sm-none bg-white">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
            </div>
        </div>
    </div>

    <!-- large screen -->
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Airtime Purchase</span>
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
                        <h4 class="card-title mb-1">Buy Airtime From Wallet Balance: ₦ <span id="walletBal1"><?= isset($user_wallet->amount) ? number_format($user_wallet->amount, 2) : '0.00'; ?></span><span class="float-end"><a href="javascript:void(0);" class="btn btn-primary" data-bs-target="#modaldemo3" data-bs-toggle="modal">Enjoy Discount</a></span></h4>
                        <p class="mb-2">Click the view discount rate button to view discount rates</p>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" id="SubmitAirtimeRequest">
                            <div class="form-group">
                                <h4 class="card-title">You would be charged: <span class="float-end"><img src="<?= base_url() ?>assets/user/images/png/network.png" alt="none" id="networkLogo" height="40px" width="40px"></span></h4>
                                <center><span class="display-1" id="discount">0</span><small>NGN</small></center>
                                <input type="hidden" id="amount_charged" name="amount_charged">
                                <select name="network" id="network" class="form-control form-select" data-bs-placeholder="Select Network" onchange="calculateDiscountAndChangeSpanTag()" required>
                                    <option value="">Select Network</option>
                                    <?php $active_vtu = $this->crud_model->active_vtu(); ?>
                                    <?php if ($active_vtu === 'data24') : ?>
                                        <option value="1">MTN</option>
                                        <option value="2">9mobile</option>
                                        <option value="3">Glo</option>
                                        <option value="4">Airtel</option>
                                    <?php elseif ($active_vtu === 'jonet') : ?>
                                        <option value="MTN">MTN</option>
                                        <option value="9mobile">9mobile</option>
                                        <option value="Glo">Glo</option>
                                        <option value="Airtel">Airtel</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="phonenumber" id="phonenumber" placeholder="Enter Phonenumber (07098877758)" maxlength="11" onkeypress="calculateDiscountAndChangeSpanTag()" onkeyup="calculateDiscountAndChangeSpanTag()" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount" onkeypress="calculateDiscountAndChangeSpanTag()" onkeyup="calculateDiscountAndChangeSpanTag()" required>
                            </div>
                            <div class="">
                                <input type="checkbox" id="ported" name="_isPorted">
                                <label>Allow Ported number</label>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <button type="submit" class="btn btn-primary mg-t-40" style="width: 100%" id="submit">Submit Request
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

        <div class="modal fade" id="modaldemo3" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Airtime Discounts. Your account type is <u><b>Reseller One</b></u></h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <h6>Upgrade to enjoy better rates</h6>
                        <div class="table-responsive">
                            <table class="table mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>Network</th>
                                        <th>Reseller One</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MTN</td>
                                        <td><?= isset($airtime_discounts['mtn']) ? $airtime_discounts['mtn'] . '%' : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>9mobile</td>
                                        <td><?= isset($airtime_discounts['etisalat']) ? $airtime_discounts['etisalat'] . '%' : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Glo</td>
                                        <td><?= isset($airtime_discounts['glo']) ? $airtime_discounts['glo'] . '%' : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Airtel</td>
                                        <td><?= isset($airtime_discounts['airtel']) ? $airtime_discounts['airtel'] . '%' : ''; ?></td>
                                    </tr>
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

<?php if ($page_title == "Airtime Purchase") : ?>
    <script>
        // Clear textfield on pageload
        window.addEventListener('load', (event) => {
            clearFields();
        });

        // Clear textfield function
        function clearFields() {
            $('#network').val('');
            $('#amount').val('');
            $('#phonenumber').val('');
            $('#amount_charged').val('');
            document.getElementById("discount").textContent = 0;
        }

        // Display the discounted price
        function calculateDiscountAndChangeSpanTag() {
            // Fetch airtime discounts via AJAX
            $.ajax({
                url: '<?php echo base_url('user/get_airtime_discounts'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Once the discounts are fetched, proceed with calculations
                    applyDiscounts(response);
                },
                error: function(error) {
                    console.error('Error fetching airtime discounts:', error);
                }
            });
        }

        function applyDiscounts(discounts) {
            // Parse discounts as integers
            var mtnDiscount = parseInt(discounts.mtn);
            var airtelDiscount = parseInt(discounts.airtel);
            var etisalatDiscount = parseInt(discounts.etisalat);
            var gloDiscount = parseInt(discounts.glo);

            // Get user input
            var network = $('#network').val();
            var amount = parseInt($('#amount').val()) || 0;
            var text = $('#amount').val();

            // Check for special characters
            var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            if (format.test(text)) {
                showNotification('Illegal character encountered', 'error');
                return;
            }

            // Determine active VTU
            var activeVtu = '<?php echo $this->crud_model->active_vtu(); ?>';

            // Calculate and display discount based on network
            if (activeVtu === 'data24') {
                network = parseInt(network);
                switch (network) {
                    case 1:
                        displayDiscount(amount, mtnDiscount, 'https://data24app.com.ng/public/images/mtn.png');
                        break;
                    case 2:
                        displayDiscount(amount, etisalatDiscount, 'https://data24app.com.ng/public/images/9mobile.jpg');
                        break;
                    case 3:
                        displayDiscount(amount, gloDiscount, 'https://data24app.com.ng/public/images/glo.png');
                        break;
                    case 4:
                        displayDiscount(amount, airtelDiscount, 'https://data24app.com.ng/public/images/airtel.png');
                        break;
                    default:
                        resetDiscountAndLogo();
                        break;
                }
            } else if (activeVtu === 'jonet') {
                switch (network) {
                    case 'MTN':
                        displayDiscount(amount, mtnDiscount, 'https://data24app.com.ng/public/images/mtn.png');
                        break;
                    case '9mobile':
                        displayDiscount(amount, etisalatDiscount, 'https://data24app.com.ng/public/images/9mobile.jpg');
                        break;
                    case 'Glo':
                        displayDiscount(amount, gloDiscount, 'https://data24app.com.ng/public/images/glo.png');
                        break;
                    case 'Airtel':
                        displayDiscount(amount, airtelDiscount, 'https://data24app.com.ng/public/images/airtel.png');
                        break;
                    default:
                        resetDiscountAndLogo();
                        break;
                }
            }

            if (amount == 0 || document.getElementById("amount").value.length == 0) {
                document.getElementById("discount").textContent = 0;
                $('#amount_charged').val('');
                return;
            }
        }

        function displayDiscount(amount, discountPercentage, networkLogo) {
            var discount = (amount / 100) * discountPercentage;
            var chargedAmount = amount - discount;
            $('#discount').text(chargedAmount.toFixed(2));
            $('#amount_charged').val(chargedAmount.toFixed(2));
            $('#networkLogo').attr('src', networkLogo);
        }

        function resetDiscountAndLogo() {
            $('#discount').text(0);
            $('#amount_charged').val('');
            $('#networkLogo').attr('src', '<?= base_url() ?>assets/user/images/png/network.png');
        }

        function showNotification(message, type) {
            swal({
                title: 'Notification!!',
                text: message,
                icon: type,
                type: type,
                button: 'close',
            });
        }

        $('#SubmitAirtimeRequest').on('submit', function(e) {
            e.preventDefault();
            purchaseAirtime();
        });

        function animationToggle(status) {
            var loadingAnimation = document.getElementById('loading-animation');
            var button = document.getElementById('submit');
            if (status === 'hide') {
                button.disabled = false;
                button.innerHTML = 'Submit Request <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation" style="display: none;"></span>';
                loadingAnimation.style.display = 'none';
            } else {
                button.disabled = true;
                button.textContent = 'processing';
                button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation"></span> Processing...';
                loadingAnimation.style.display = 'block';
            }
        }

        function purchaseAirtime() {
            var network = $('#network').val().toString().trim();
            var amount = parseInt($('#amount').val());
            var amountCharged = parseFloat($('#amount_charged').val());
            var phonenumber = $('#phonenumber').val();
            var isPorted = document.querySelector('#ported').checked;

            if (amount == 0 || amount == '' || isNaN(amount)) {
                swal("Notice!", 'Please enter a valid amount', "error");
                return;
            }
            if (phonenumber == '' || network == '') {
                swal("Notice!", 'Ensure network is selected and phone number has been entered', "error");
                return;
            }
            if (phonenumber.length < 10 || phonenumber.length > 11) {
                swal("Notice!", 'Please ensure number is 11 digit', "error");
                return;
            }
            if (amountCharged <= 0 || isNaN(amountCharged)) {
                swal("Notice!", 'Invalid charged amount. Please select a network and enter an amount.', "error");
                return;
            }

            animationToggle('show');
            var activeVtu = '<?php echo $this->crud_model->active_vtu(); ?>';
            var url = activeVtu === 'data24' ? 'airtimePurchase' : 'airtimePurchaseJonet';

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    network: network,
                    amount: amount,
                    amount_charged: amountCharged,
                    phonenumber: phonenumber,
                    _isPorted: isPorted
                },
                success: function(response) {
                    if (response.code == 200 || response.status === true) {
                        clearFields();
                        swal({
                            title: "Notification!",
                            text: response.message || response.display_message || 'Airtime purchase successful.',
                            icon: "success",
                            type: 'success',
                            button: "close",
                        }).then(() => {
                            window.location.href = '<?= base_url() ?>user/dashboard';
                        });
                        animationToggle('hide');
                    } else {
                        swal({
                            title: "Notification!",
                            text: response.message || response.display_message || 'Airtime purchase failed.',
                            icon: "error",
                            type: 'error',
                            button: "close",
                        });
                        animationToggle('hide');
                    }
                },
                error: function(response) {
                    animationToggle('hide');
                    swal({
                        title: "Notification!",
                        text: response.message || response.display_message || 'An error occurred.',
                        icon: "error",
                        type: 'error',
                        button: "close",
                    });
                }
            });
        }
    </script>
<?php endif; ?>