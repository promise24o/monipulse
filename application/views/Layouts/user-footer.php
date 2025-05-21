	<!-- Footer opened -->
	<div class="main-footer">
		<div class="col-md-12 col-sm-12 text-center">
			<!--<div class="container-fluid pt-0 ht-100p">-->
			<!--	Copyright © <script>-->
			<!--		document.write(new Date().getFullYear())-->
			<!--	</script> Designed with <span class="fa fa-heart text-danger"></span> by <a href="https://www.softpathtech.tech"> SoftPath Tech </a> All rights reserved-->
			<!--</div>-->
		</div>
	</div>
	<!-- Footer closed -->
	</div>
	<!-- End Page -->
	<?php
	$request = $this->crud_model->get_reg_payment_status();
	if ($request == 0) :
	?>
		<!--<div class="modal fade" id="modaldemo4" aria-hidden="true">-->
		<!--	<div class=" modal-dialog modal-dialog-centered" role="document">-->
		<!--		<div class="modal-content tx-size-sm">-->
		<!--			<div class="modal-header">-->
		<!--				<span class="tx-25">Notification ></span>-->
		<!--				<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>-->
		<!--			</div>-->
		<!--			<div class="modal-body tx-center pd-y-20 pd-x-20">-->
		<!--				<h4 class="tx-success tx-semibold mg-b-20">Hello, <?= $this->session->userdata('user_fullname') ?></h4>-->
		<!--				<p class="mg-b-20 mg-x-50 tx-20">You will be required to pay <strong>₦100</strong> on your first deposit as a one-time registration fee</p><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#fundAccount" class="btn btn-success">Fund Account Now</a>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->
	<?php endif; ?>
	<!-- Back-to-top -->
	<a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>
	 
	<!-- JQuery min js -->
<script src="https://data24app.com.ng/public/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap js -->
<script src="https://data24app.com.ng/public/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="https://data24app.com.ng/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Internal Chart.Bundle js-->
<script src="../assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Moment js -->
<script src="https://data24app.com.ng/public/assets/plugins/moment/moment.js"></script>

<!-- INTERNAL Apexchart js -->
<script src="https://data24app.com.ng/public/assets/js/apexcharts.js"></script>

<!--Internal Sparkline js -->
<script src="https://data24app.com.ng/public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Moment js -->
<script src="https://data24app.com.ng/public/assets/plugins/raphael/raphael.min.js"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="https://data24app.com.ng/public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://data24app.com.ng/public/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Eva-icons js -->
<script src="https://data24app.com.ng/public/assets/js/eva-icons.min.js"></script>

<!-- right-sidebar js -->
<script src="https://data24app.com.ng/public/assets/plugins/sidebar/sidebar.js"></script>
<script src="https://data24app.com.ng/public/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- Sidebar js -->
<script src="https://data24app.com.ng/public/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Sticky js -->
<script src="https://data24app.com.ng/public/assets/js/sticky.js"></script>

<!--Internal  index js -->
<script src="https://data24app.com.ng/public/assets/js/index.js"></script>

<!-- Chart-circle js -->
<script src="https://data24app.com.ng/public/assets/js/circle-progress.min.js"></script>

<!-- Internal Data tables -->
<script src="https://data24app.com.ng/public/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="https://data24app.com.ng/public/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="https://data24app.com.ng/public/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="https://data24app.com.ng/public/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>

<!-- INTERNAL Select2 js -->
<script src="https://data24app.com.ng/public/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="https://data24app.com.ng/public/assets/js/select2.js"></script>

<!-- Sweet-alert js  -->
<script src="https://data24app.com.ng/public/assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script type="text/javascript">
		$(function() {
			var table = $('.yajra-datatable').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#modaldemo4').modal('show');
		});
	</script>
    <!-- Theme Color js -->
    <script src="https://data24app.com.ng/public/assets/js/themecolor.js"></script>
    
    <!-- custom js -->
    <script src="https://data24app.com.ng/public/assets/js/custom.js"></script>

	<!-- Switcher js -->
	<script src="https://app.data24app.com.ng/public/assets/switcher/js/switcher.js"></script>
	<script type="text/javascript">
		(function() {
			var options = {
				whatsapp: "++2347030601336", // WhatsApp number
				call_to_action: "Need Support...Send us a message", // Call to action
				position: "left", // Position may be 'right' or 'left'
			};
			var proto = document.location.protocol,
				host = "getbutton.io",
				url = proto + "//static." + host;
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = url + '/widget-send-button/js/init.js';
			s.onload = function() {
				WhWidgetSendButton.init(host, proto, options);
			};
			var x = document.getElementsByTagName('script')[0];
			x.parentNode.insertBefore(s, x);
		})();
	</script>
	<script src=" https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-aio-3.2.6.min.js "></script>
	<!-- END SCRIPTS -->
	<!-- SHOW TOASTR NOTIFIVATION -->
	<?php if ($this->session->flashdata('success_message') != "") : ?>
		<script type="text/javascript">
			Notiflix.Notify.success("<?php echo $this->session->flashdata("success_message"); ?>", {
				timeout: 5923,
				showOnlyTheLastOne: true,
			});
		</script>
	<?php endif; ?>
	<?php if ($this->session->flashdata('error_message') != "") : ?>
		<script type="text/javascript">
			Notiflix.Notify.failure("<?php echo $this->session->flashdata("error_message"); ?>", {
				timeout: 5923,
				showOnlyTheLastOne: true,
			});
		</script>
	<?php endif; ?>


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
            var amount = parseInt($('#amount').val());
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
                return;
            }
        }

       function displayDiscount(amount, discountPercentage, networkLogo) {
            if (!amount || isNaN(amount) || !discountPercentage || isNaN(discountPercentage)) {
                resetDiscountAndLogo();
                return;
            }

            var discountValue = (amount / 100) * discountPercentage;
            var chargedAmount = amount - discountValue;

            if (isNaN(chargedAmount)) {
                resetDiscountAndLogo();
                return;
            }

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
            var phonenumber = $('#phonenumber').val();
            var cb = document.querySelector('#ported');
            var amountCharged = parseFloat($('#amount_charged').val());

            if (amount == 0 || amount == '') {
                swal("Notice!", 'Please enter an amount', "error");
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

            animationToggle('show');
            var activeVtu = '<?php echo $this->crud_model->active_vtu(); ?>';
            var url = activeVtu === 'data24' ? 'airtimePurchase' : 'airtimePurchaseJonet';

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    network: network,
                    amount: amount,
                    phonenumber: phonenumber,
                    amount_charged: amountCharged,
                    _isPorted: cb.checked,
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


	<?php if ($page_title == "Data Purchase") : ?>
		<script>
			// Clear textfield on pageload
			window.addEventListener('load', (event) => {
				clearFields()
			});
			//clear textfield function
			function clearFields() {
				$('#network').val('');
				$('#data-type').val('');
				$('#plan').val('');
				$('#phonenumber').val('');
			}
			// Fetch and populate network dropdown
			$(document).ready(function() {
				// Call fetchNetworks method
				$.ajax({
					url: '<?php echo base_url('user/fetchNetworks'); ?>',
					type: 'GET',
					dataType: 'json',
					success: function(response) {
						if (response.status && response.data && response.data.networks) {
							var networks = response.data.networks;
							var len = networks.length;
							for (var i = 0; i < len; i++) {
								// Append option to the network dropdown
								$('#network').append('<option value="' + networks[i].id + '">' + networks[i].name + '</option>');
							}
						} else {
							console.error('Invalid response structure for fetchNetworks');
						}
					},
					error: function(error) {
						console.error('Error fetching networks:', error);
					}
				});
				// Add change event listener to network dropdown
				$('#network').on('change', function() {
					var networkId = $(this).val();
					$('select[name="data-type"]').empty().append('<option value="">- Select Data Type -</option>');
					// Call fetchDataType method based on selected network
					$.ajax({
						url: '<?php echo base_url('user/fetchDataTypes'); ?>/' + networkId,
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							var len = data.length;
							for (var i = 0; i < len; i++) {
								$('select[name="data-type"]').append('<option value="' + data[i].type + '">' + data[i].type + '</option>');
							}
						},
						error: function(error) {
							console.error('Error fetching data types:', error);
						}
					});
				});
				$('select[name="data-type"]').on('change', function() {
					var networkId = $('#network').val();
					var dataType = $('#data-type').val();
					$('select[name="plan"]').empty();
					$('select[name="plan"]').append('<option value="">- Select Plan -</option>');
					$.ajax({
						url: '<?php echo base_url('user/fetchDataPlan'); ?>/' + networkId + '/' + dataType,
						type: "GET",
						dataType: "json",
						success: function(data) {
							//$('select[name="batch_expiry"]').empty();
							var len = data.length;
							for (var i = 0; i < len; i++) {
								$('select[name="plan"]').append('<option value="' + data[i].id + '" data-plan="' + data[i].dataplan + '">' + data[i].dataplan + '  ₦' + data[i].price + '</option>');
							}
						}
					});
				});
			});
			$('#SubmitAirtimeRequest').on('submit', function(e) {
				e.preventDefault();
				purchaseData()
			});

			function animationToggle(status) {
				var loadingAnimation = document.getElementById('loading-animation');
				var button = document.getElementById('submit');
				if (status === 'hide') {
					button.disabled = false; // Re-enable the button
					button.innerHTML = 'Submit Request <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation"  style="display: none;"></span>'; // Restore the original button text
					loadingAnimation.style.display = 'none'; // Hide the loading animation
				} else {
					button.disabled = true; // Disable the button
					button.textContent = 'processing';
					button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation"></span> Processing...';
					loadingAnimation.style.display = 'block';
				}
			}

			function purchaseData() {
				var network = parseInt($('#network').val());
				var plan = $('#plan').val();
				var selectedOption = $('#plan option:selected');
				var selectedDataPlan = selectedOption.data('plan');
				var phonenumber = $('#phonenumber').val();
				var cb = document.querySelector('#ported');
				if (plan == 0) {
					swal("Notice!", 'Please select plan', "error");
					return
				}
				if (phonenumber == '' || network == '') {
					swal("Notice!", 'Ensure network is selected and phone number has been entered', "error");
					return
				}
				if (phonenumber.length < 10 || phonenumber.length > 11) {
					swal("Notice!", 'Please ensure number is 11 digit', "error");
					return;
				}
				animationToggle('show');
				let _url = '<?= base_url('user/dataPurchase') ?>';
				$.ajax({
					url: _url,
					type: "POST",
					data: {
						network: network,
						plan: plan,
						selectedDataPlan: selectedDataPlan,
						phonenumber: phonenumber,
						_isPorted: cb.checked,
					},
					success: function(response) {
						if (response.status == true) {
							clearFields();
							swal({
								title: "Notification!",
								text: response.message || response.display_message,
								icon: "success",
								type: 'success',
								button: "close",
							}).then(() => {
								// Redirect to user/dashboard
								window.location.href = '<?= base_url() ?>user/dashboard';
							});
							animationToggle('hide');
						} else {
							swal({
								title: "Notification!",
								text: response.message || response.display_message,
								icon: "error",
								type: 'error',
								button: "close",
							});
							animationToggle('hide');
						}
					},
					error: function(response) {
						swal({
							title: "Notification!",
							text: response.message || response.display_message,
							icon: "error",
							type: 'error',
							button: "close",
						});
						animationToggle('hide');
					}
				});
			}
		</script>
	<?php endif; ?>

   <?php if ($page_title == "Cable Purchase") : ?>
       <?php $active_vtu = $this->crud_model->active_vtu(); ?>
        <script>
        window.addEventListener('load', (event) => {
            clearFields();
        });

        function clearFields() {
            $('#cable').val('');
            $('#plan').val('');
            $('#iuc').val('');
            $('#duration').val('');
            $('#subscription_type').val('');
        }

        function showImage() {
            var cable = $('#cable').val();
            var activeVtu = '<?= $active_vtu ?>';
            var logos = {
                'gotv': 'https://data24app.com.ng/public/images/gotv.jpg',
                'dstv': 'https://data24app.com.ng/public/images/dstv.jpg',
                'startimes': 'https://data24app.com.ng/public/images/starttimes.jpg'
            };
            document.getElementById("networkLogo").src = logos[cable] || '<?= base_url() ?>assets/user/images/png/network.png';
        }

        function fetchPlans() {
            var cable = $('#cable').val();
            var activeVtu = '<?= $active_vtu ?>';
            var subscriptionType = $('#subscription_type').val();
            $('select[name="plan"]').empty();
            $('select[name="plan"]').append('<option value="" data-planPrice="">Select Plan</option>');
            if (cable && (activeVtu !== 'jonet' || subscriptionType)) {
                $.ajax({
                    url: activeVtu === 'jonet' ? '<?= base_url('user/fetchJonetTvPackages') ?>' : '<?= base_url('user/getCablePlans') ?>',
                    type: "POST",
                    dataType: "json",
                    data: { cable: cable, active_vtu: activeVtu },
                    success: function(data) {
                        if (data.status === 'success' && data.data) {
                            if (activeVtu === 'jonet') {
                                Object.values(data.data).flat().forEach(function(plan) {
                                    if (plan.service_type === cable) {
                                        $('select[name="plan"]').append('<option value="' + plan.code + '" data-planPrice="' + plan.price + '">' + plan.title + ' (' + plan.months + ' Month' + (plan.months > 1 ? 's' : '') + ') ₦' + plan.price + '</option>');
                                    }
                                });
                            } else {
                                data.plans.forEach(function(plan) {
                                    $('select[name="plan"]').append('<option value="' + plan.id + '" data-planPrice="' + plan.price + '">' + plan.title + ' ₦' + plan.price + '</option>');
                                });
                            }
                        }
                    }
                });
            }
        }

        $(document).ready(function() {
            $('select[name="cable"]').on('change', function() {
                showImage();
                fetchPlans();
            });

            $('select[name="subscription_type"]').on('change', function() {
                fetchPlans();
            });

            $('#iuc').on('blur', function() {
                var activeVtu = '<?= $active_vtu ?>';
                if (activeVtu !== 'jonet') return;
                var iuc = this.value;
                var cable = $('#cable').val();
                if (iuc && cable) {
                    $.ajax({
                        url: '<?= base_url('user/getSmartCardInfo') ?>',
                        type: "POST",
                        dataType: "json",
                        data: { iuc: iuc, cable: cable },
                        success: function(data) {
                            if (data.code === 200) {
                                swal('SmartCard Valid: ' + data.data.user.customerName, {
                                    icon: 'success',
                                    title: 'SmartCard Information',
                                    text: 'Current Bouquet: ' + data.data.currentBouquet
                                });
                            } else {
                                swal('Notice!', data.message, 'error');
                            }
                        }
                    });
                }
            });
        });

        $('#SubmitCableRequest').on('submit', function(e) {
            e.preventDefault();
            fetchCustomer();
        });

        function fetchCustomer() {
            var activeVtu = '<?= $active_vtu ?>';
            var providerId = $('#cable').val();
            var iucNumber = $('#iuc').val();
            var url = activeVtu === 'jonet' ? '<?= base_url('user/getSmartCardInfo') ?>' : '<?= base_url('user/fetchCustomer') ?>/' + iucNumber + '/' + providerId;
            var data = activeVtu === 'jonet' ? { iuc: iucNumber, cable: providerId } : {};

            $.ajax({
                url: url,
                type: activeVtu === 'jonet' ? "POST" : "GET",
                dataType: "json",
                data: data,
                success: function(data) {
                    if ((activeVtu === 'jonet' && data.code === 200) || (activeVtu !== 'jonet' && data.status == true)) {
                        var customerName = activeVtu === 'jonet' ? data.data.user.customerName : data.data.customer_name;
                        var customerInfo = activeVtu === 'jonet' ? 'Current Bouquet: ' + data.data.currentBouquet : 'Customer Name: ' + customerName;
                        swal('Customer Name: ' + customerName, {
                            icon: 'success',
                            title: 'Customer Information',
                            text: customerInfo,
                            buttons: {
                                cancel: {
                                    text: "Cancel",
                                    value: 'wrong',
                                    visible: true,
                                    className: "btn-danger",
                                    closeModal: true
                                },
                                confirm: {
                                    text: "Proceed, Customer name is correct",
                                    value: 'right',
                                    visible: true,
                                    className: "",
                                    closeModal: true
                                }
                            }
                        }).then((value) => {
                            switch (value) {
                                case "wrong":
                                    swal("Please enter the correct IUC and TV Provider");
                                    break;
                                case "right":
                                    purchaseCable();
                                    break;
                                default:
                                    swal("An error occurred");
                            }
                        });
                    } else {
                        swal("Notice!", activeVtu === 'jonet' ? data.message : 'Customer not found', 'error');
                    }
                }
            });
        }

        function animationToggle(status) {
            var loadingAnimation = document.getElementById('loading-animation');
            var button = document.getElementById('submit');
            if (status === 'hide') {
                button.disabled = false;
                button.innerHTML = 'Submit Request <div id="loading-animation" class="text-center" style="display: none;"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>';
                loadingAnimation.style.display = 'none';
            } else {
                button.disabled = true;
                button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation"></span> Processing...';
                loadingAnimation.style.display = 'block';
            }
        }

        function purchaseCable() {
            var cable = $('#cable').val();
            var plan = $('#plan').val();
            var selectedPlanPrice = $('select[name="plan"] option:selected').data('planPrice');
            var iuc = $('#iuc').val();
            var duration = parseInt($('#duration').val());
            var subscription_type = $('#subscription_type').val();
            var activeVtu = '<?= $active_vtu ?>';

            if (!plan) {
                swal("Notice!", 'Please select plan', "error");
                return;
            }
            if (!iuc) {
                swal("Notice!", 'Ensure IUC has been entered', "error");
                return;
            }
            if (iuc.length < 9) {
                swal("Notice!", 'Please ensure IUC is complete', "error");
                return;
            }
            if (activeVtu === 'jonet' && !subscription_type) {
                swal("Notice!", 'Please select subscription type', "error");
                return;
            }

            let _url = '<?= base_url('user/cablePurchase') ?>';
            animationToggle('show');
            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    cable: cable,
                    plan: plan,
                    iuc: iuc,
                    selectedPlanPrice: selectedPlanPrice,
                    duration: duration,
                    subscription_type: subscription_type
                },
                success: function(response) {
                    if (response.code == 200) {
                        clearFields();
                        swal({
                            title: "Notification!",
                            text: response.message || response.display_message,
                            icon: "success",
                            button: "close"
                        }).then(() => {
                            window.location.href = '<?= base_url('user/dashboard') ?>';
                        });
                        animationToggle('hide');
                    } else {
                        swal({
                            title: "Notification!",
                            text: response.message || response.display_message,
                            icon: "error",
                            button: "close"
                        });
                        animationToggle('hide');
                    }
                },
                error: function(response) {
                    swal({
                        title: "Notification!",
                        text: response.message || response.display_message || 'An error occurred',
                        icon: "error",
                        button: "close"
                    });
                    animationToggle('hide');
                }
            });
        }
    </script>
    <?php endif; ?>

	<?php if ($page_title == "Electricity Purchase") : ?>
		<script>
			// Clear textfield on pageload
			window.addEventListener('load', (event) => {
				clearFields()
			});
			//clear textfield function
			function clearFields() {
				$('#provider').val('');
				$('#phone').val('');
				$('#amount').val('');
				$('#meterNo').val('');
			}

			function showImage() {
				var provider = parseInt($('#provider').val());
				console.log('1');
				switch (provider) {
					case 1:
					case 2:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/jos.png";
						break;
					case 3:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/kaduna.jpg";
						break;
					case 4:
					case 5:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/eko.jpg";
						break;
					case 6:
					case 7:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/ibadan.png";
						break;
					case 8:
					case 9:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/phed.png";
						break;
					case 10:
					case 11:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/enugu.jpg";
						break;
					case 12:
					case 13:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/abuja.jpg";
						break;
					case 14:
					case 15:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/kano.png";
						break;
					case 16:
					case 17:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/ikeja.png";
						break
					case 18:
					case 19:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/benin.jpg";
						break;
					case 20:
					case 21:
						document.getElementById("networkLogo").src = "https://data24app.com.ng/public/images/yola.PNG";
						break;
					default:
						console.log('none');
						document.getElementById("networkLogo").src = "<?= base_url() ?>assets/user/images/png/network.png";
						break;
				}
			}
			$('#SubmitAirtimeRequest').on('submit', function(e) {
				e.preventDefault();
				fetchCustomer();
				//getTransactionPinFromUser();
			});

			function fetchCustomer() {
				var providerId = parseInt($('#provider').val());
				var meterNo = $('#meterNo').val();
				$.ajax({
					url: '<?= base_url() ?>user/fetchCustomerMeterDetails/' + meterNo + '/' + providerId,
					type: "GET",
					dataType: "json",
					success: function(data) {
						if (data.status == true) {
							// Assuming 'data' is your response object
							var customerName = data.data.meterDetails.customerName;
							var customerAddress = data.data.meterDetails.customerAddress;
							// Create a div element to hold the HTML content
							var contentDiv = document.createElement('div');
							// Add HTML content to the div
							contentDiv.innerHTML = '<strong>Customer Name: </strong>' + customerName + '<br><strong>Customer Address: </strong>' + customerAddress;
							// Display Swal with HTML content
							swal({
									icon: 'success',
									title: 'Customer Information',
									content: contentDiv,
									buttons: {
										cancel: {
											text: "Cancel",
											value: 'wrong',
											visible: true,
											className: "btn-danger",
											closeModal: true,
										},
										confirm: {
											text: "Proceed, Customer name is correct",
											value: 'right',
											visible: true,
											className: "",
											closeModal: true
										}
									},
								})
								.then((value) => {
									switch (value) {
										case "wrong":
											swal("Please enter the correct Meter Number and Provider");
											break;
										case "right":
											purchaseElectricity();
											break;
										default:
											swal("An error occured");
									}
								});
						} else {
							swal("Notice!", 'Customer not found', "error");
						}
					}
				});
			}

			function animationToggle(status) {
				var loadingAnimation = document.getElementById('loading-animation');
				var button = document.getElementById('submit');
				if (status === 'hide') {
					button.disabled = false; // Re-enable the button
					button.innerHTML = 'Submit Request <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation"  style="display: none;"></span>'; // Restore the original button text
					loadingAnimation.style.display = 'none'; // Hide the loading animation
				} else {
					button.disabled = true; // Disable the button
					button.textContent = 'processing';
					button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading-animation"></span> Processing...';
					loadingAnimation.style.display = 'block';
				}
			}

			function purchaseElectricity() {
				var provider = parseInt($('#provider').val());
				var phonenumber = $('#phone').val();
				var meterNo = $('#meterNo').val();
				var amount = parseInt($('#amount').val());
				if (provider == '') {
					swal("Notice!", 'Please select provider', "error");
					return
				}
				if (meterNo == '') {
					swal("Notice!", 'Ensure meterNo has been entered', "error");
					return
				}
				if (amount == '') {
					swal("Notice!", 'Ensure amount has been entered', "error");
					return
				}
				if (phone == '') {
					swal("Notice!", 'Ensure phone has been entered', "error");
					return
				}
				let _url = '<?= base_url() ?>user/electricityPurchase';
				animationToggle('show');
				$.ajax({
					url: _url,
					type: "POST",
					data: {
						provider: provider,
						phonenumber: phonenumber,
						amount: amount,
						meterNo: meterNo,
					},
					success: function(response) {
						if (response.status == true) {
							clearFields();
							swal({
								title: "Notification!",
								text: response.message || response.display_message,
								icon: "success",
								button: "close",
							});
							animationToggle('hide');
						} else {
							console.log(response.message);
							swal({
								title: "Notification!",
								text: response.message || response.display_message,
								icon: "error",
								type: 'error',
								button: "close",
							});
							animationToggle('hide');
						}
					},
					error: function(response) {
						console.log(response);
						console.log('error')
						animationToggle('hide');
						swal({
							title: "Notification!",
							text: response.message || response.display_message,
							icon: "error",
							type: 'error',
							button: "close",
						});
					}
				});
			}
		</script>
	<?php endif; ?>

	</body>

	</html>
