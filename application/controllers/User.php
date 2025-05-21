<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


	public function dashboard()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		// Fetch user wallet details
		$data['user_wallet'] = $this->crud_model->get_user_wallet($userId);

		// Fetch user transactions
		$data['user_transactions'] = $this->crud_model->get_user_transactions($userId);

		// Get today's sales from the CRUD model
		$todaySales = $this->crud_model->get_today_sales();
		
		$data['announcements'] = $this->crud_model->get_active_announcements($this->session->userdata('user_encrypted_id'));

		// Pass the data to the view
		$data['todaySales'] = $todaySales;

		$data['page_title'] = "Dashboard";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/dashboard');
		$this->load->view('Layouts/user-footer');
	}

	public function airtime()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		// Fetch user wallet details
		$data['user_wallet'] = $this->crud_model->get_user_wallet($userId);

		// Retrieve API data
		$airtime_discounts  = $this->crud_model->get_airtime_discounts();
		$data['airtime_discounts'] = $airtime_discounts;

		$data['page_title'] = "Airtime Purchase";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/airtime');
		$this->load->view('Layouts/user-footer');
	}

	public function cable()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		// Fetch user wallet details
		$data['user_wallet'] = $this->crud_model->get_user_wallet($userId);

		// Retrieve API data
		$cable_discounts  = $this->crud_model->get_cable_discounts();
		$data['cable_discounts'] = $cable_discounts;

		$data['page_title'] = "Cable Purchase";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/cable');
		$this->load->view('Layouts/user-footer');
	}

	public function data()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		// Fetch user wallet details
		$data['user_wallet'] = $this->crud_model->get_user_wallet($userId);

		// Retrieve API data
		$airtime_discounts  = $this->crud_model->get_airtime_discounts();
		$data['airtime_discounts'] = $airtime_discounts;

		$data['page_title'] = "Data Purchase";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/data');
		$this->load->view('Layouts/user-footer');
	}

	public function electricity()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		// Fetch user wallet details
		$data['user_wallet'] = $this->crud_model->get_user_wallet($userId);

		$data['page_title'] = "Electricity Purchase";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/electricity');
		$this->load->view('Layouts/user-footer');
	}

	public function change_password()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		// Fetch user wallet details
		$data['user_wallet'] = $this->crud_model->get_user_wallet($userId);

		$data['page_title'] = "Change Password";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/change_password');
		$this->load->view('Layouts/user-footer');
	}

	public function support()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}
		// Get user ID from session
		$userId = $this->session->userdata('user_encrypted_id');

		$data['social_data'] = $this->crud_model->get_social_data();

		$data['page_title'] = "Support";

		$this->load->view('Layouts/user-header', $data);
		$this->load->view('Pages/User/support');
		$this->load->view('Layouts/user-footer');
	}

	public function initializePayment()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		$amount = $this->input->post('amount');
		$email = $this->session->userdata('user_email');
		// Call the initializePayment function (you can place this function in a model)
		$this->initializePaymentProcess($email, $amount);
	}

	private function initializePaymentProcess($email, $amount)
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Paystack API endpoint for initializing transactions
		$url = "https://api.paystack.co/transaction/initialize";


		// Set your Paystack secret key
		$secretKey = $this->crud_model->getSecretKey('paystack_sk');


		// Prepare the request data
		$fields = [
			'email' => $email,
			'amount' => $amount * 100,
			'callback_url' => base_url('user/paystack_callback'),
		];

		$fields_string = http_build_query($fields);

		// Initialize cURL session
		$ch = curl_init();

		// Set cURL options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $secretKey",
			"Cache-Control: no-cache",
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute cURL session
		$result = curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			echo 'Curl error: ' . curl_error($ch);
		}

		// Close cURL session
		curl_close($ch);

		// Decode the JSON response
		$response = json_decode($result, true);

		// Check if the transaction was successfully initialized
		if ($response && isset($response['status']) && $response['status']) {
			// Retrieve the authorization URL
			$authorizationUrl = $response['data']['authorization_url'];
			$transactionData = [
				'user' => $this->session->userdata('user_encrypted_id'),
				'transaction_type' => 'Funding Wallet',
				'transaction_id' => $response['data']['reference'],
				'amount' => $amount, // Set your desired amount
				'amount_charged' => $amount, // Set your desired amount charged
				'date' => date('Y-m-d H:i:s'),
				'description' => 'Funding of wallet',
				'status' => 0, // 0 for pending
			];

			$this->crud_model->insert_transaction($transactionData);

			// Redirect the user to the Paystack payment page
			redirect($authorizationUrl);
		} else {
			// Handle the error, e.g., log it or display an error message
			$this->session->set_flashdata('error_message', $response['message']);
			redirect('user/dashboard');
		}
	}

	public function paystack_callback()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Get the transaction reference from Paystack callback
		$transactionReference = $this->input->get('trxref');

		// Fetch the Paystack secret key from the database
		$secretKey = $this->crud_model->getSecretKey('paystack_sk');

		// Check if the secret key is available
		if (!$secretKey) {
			// Handle the case where the secret key is not found
			echo 'Error: Paystack secret key not found.';
			return;
		}

		// Verify the transaction with Paystack
		$verifyUrl = "https://api.paystack.co/transaction/verify/{$transactionReference}";

		// Initialize cURL session
		$ch = curl_init();

		// Set cURL options
		curl_setopt($ch, CURLOPT_URL, $verifyUrl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			"Authorization: Bearer $secretKey",
			"Cache-Control: no-cache",
		]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute cURL session
		$result = curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			echo 'Curl error: ' . curl_error($ch);
			return;
		}

		// Close cURL session
		curl_close($ch);

		// Decode the JSON response
		$response = json_decode($result, true);

		$reg_payment = $this->crud_model->get_reg_payment_status(); 
		
		// Check if the transaction verification was successful
		if ($response && isset($response['status']) && $response['status']) {
			$userEncryptedId = $this->session->userdata('user_encrypted_id');
			$amountPaid = $response['data']['amount'] / 100;

			// Add the necessary logic to update the user's wallet
			$updateWalletData = [
				'user' => $userEncryptedId,
				'amount' => $reg_payment == 1? $amountPaid: $amountPaid - 100,
				'last_updated' => date('Y-m-d H:i:s'),
			];

			if($reg_payment == 0){
				// create new transaction for one time payment
				$transactionData = [
					'user' => $this->session->userdata('user_encrypted_id'),
					'transaction_type' => 'Registration Fee',
					'transaction_id' => random_string('alnum', 8),
					'amount' =>100, // Set your desired amount
					'amount_charged' =>100, // Set your desired amount charged
					'date' => date('Y-m-d H:i:s'),
					'description' => 'One Time Registration Fee',
					'status' => 1, 
				];
				$this->crud_model->update_req_payment();
				
				$this->crud_model->insert_transaction($transactionData);
			}
			// Update the wallet in the database (Assuming you have a method to handle wallet updates)
			$this->crud_model->update_user_wallet($updateWalletData);

			// Add logic to update the status in the transactions table
			$transactionStatus = [
				'status' => 1, // Assuming 1 for success
			];

			// Update the status in the transactions table
			$this->crud_model->update_transaction_status($transactionReference, $transactionStatus);

			$this->session->set_flashdata('success_message', "Account Funded Successfully");
			redirect('user/dashboard');
		} else {
			// Add logic to update the status in the transactions table
			$transactionStatus = [
				'status' => 2, // Assuming 2 for failed
			];

			// Update the status in the transactions table
			$this->crud_model->update_transaction_status($transactionReference, $transactionStatus);

			$this->session->set_flashdata('error_message', 'Error verifying payment: ' . $response['message']);
			redirect('user/dashboard');
		}
	}

	public function get_airtime_discounts()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		$airtime_discounts = $this->crud_model->get_airtime_discounts();  
		// Return discounts as JSON
		echo json_encode($airtime_discounts);
	}

   public function airtimePurchaseJonet()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            redirect(base_url(), 'refresh');
        }

        $network = $this->input->post('network');
        $amount = $this->input->post('amount');
        $phone = $this->input->post('phonenumber');
        $amountCharged = $this->input->post('amount_charged');

        if (empty($network) || empty($amount) || empty($phone)) {
            header('Content-Type: application/json');
            echo json_encode(['code' => 400, 'message' => 'All fields are required.']);
            return;
        }

        if (!preg_match('/^0[789][0-1]\d{8}$/', $phone)) {
            header('Content-Type: application/json');
            echo json_encode(['code' => 400, 'message' => 'Invalid phone number format. Must be 11 digits starting with 07, 08, or 09.']);
            return;
        }

        if (!is_numeric($amount) || $amount < 50) {
            header('Content-Type: application/json');
            echo json_encode(['code' => 400, 'message' => 'Invalid amount. Must be at least N50.']);
            return;
        }

        if (!in_array($network, ['MTN', 'Glo', 'Airtel', '9mobile'])) {
            header('Content-Type: application/json');
            echo json_encode(['code' => 400, 'message' => 'Invalid network. Must be MTN, Glo, Airtel, or 9mobile.']);
            return;
        }

        $customerId = date('YmdHi') . mt_rand(100000, 999999);
        $userEncryptedId = $this->session->userdata('user_encrypted_id');
        $userWalletBalance = $this->crud_model->get_user_wallet_balance($userEncryptedId);

        if ($userWalletBalance >= $amountCharged) {
            $transactionData = [
                'user' => $userEncryptedId,
                'transaction_type' => 'Airtime Purchase',
                'transaction_id' => $customerId,
                'amount' => $amount,
                'amount_charged' => $amountCharged,
                'date' => date('Y-m-d H:i:s'),
                'description' => 'Pending ' . $network . ' airtime purchase of ' . $amount . ' to ' . $phone,
                'status' => 0
            ];
            $this->crud_model->insert_transaction($transactionData);
            $this->crud_model->deduct_wallet_balance($userEncryptedId, $amountCharged);

            $apiUrl = 'https://jonet.com.ng/api_live/v1/purchase_airtime.php';
            $apiKey = $this->crud_model->getSecretKey('jonet_vtu');
            $apiHeaders = [
                'Content-Type: application/json',
                "Authorization: Bearer $apiKey"
            ];
            $apiData = [
                'network' => $network,
                'amount' => (string)$amount,
                'phone' => $phone,
                'customer_id' => (string)$customerId
            ];

            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $apiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($apiData),
                CURLOPT_HTTPHEADER => $apiHeaders,
            ]);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                $this->crud_model->update_transaction_by_ref($customerId, [
                    'description' => 'Failed airtime purchase due to cURL error: ' . $error,
                    'status' => 2
                ]);
                header('Content-Type: application/json');
                echo json_encode(['code' => 500, 'message' => 'Curl error: ' . $error]);
                curl_close($ch);
                return;
            }

            curl_close($ch);
            $responseData = json_decode($response, true);

            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                $updateData = [
                    'description' => $network . ' airtime purchase of ' . $amount . ' to ' . $phone,
                    'status' => 1
                ];
                $this->crud_model->update_transaction_by_ref($customerId, $updateData);
                header('Content-Type: application/json');
                echo json_encode(['code' => 200, 'message' => 'Airtime purchase successful.']);
            } else {
                $errorMessage = isset($responseData['message']) ? $responseData['message'] : 'Airtime purchase failed.';
                $this->crud_model->update_transaction_by_ref($customerId, [
                    'description' => 'Failed airtime purchase: ' . $errorMessage,
                    'status' => 2
                ]);
                header('Content-Type: application/json');
                echo json_encode(['code' => 400, 'message' => $errorMessage]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(['code' => 400, 'message' => 'Insufficient wallet balance.']);
        }
    }

    public function airtimePurchase()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            redirect(base_url(), 'refresh');
        }

        $network = $this->input->post('network');
        $amount = $this->input->post('amount');
        $amountCharged = $this->input->post('amount_charged');
        $phone = $this->input->post('phonenumber');

        if (empty($network) || empty($amount) || empty($amountCharged) || empty($phone)) {
            $errorResponse = [
                'code' => 400,
                'message' => 'All fields are required.',
            ];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            return;
        }

        if (!preg_match('/^0[789][0-1]\d{8}$/', $phone)) {
            $errorResponse = [
                'code' => 400,
                'message' => 'Invalid phone number format. Must be 11 digits starting with 07, 08, or 09.',
            ];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            return;
        }

        if (!is_numeric($amount) || $amount <= 0) {
            $errorResponse = [
                'code' => 400,
                'message' => 'Invalid amount. Must be a positive number.',
            ];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            return;
        }

        if (!is_numeric($amountCharged) || $amountCharged <= 0 || $amountCharged > $amount) {
            $errorResponse = [
                'code' => 400,
                'message' => 'Invalid charged amount.',
            ];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            return;
        }

        if (!in_array($network, ['1', '2', '3', '4'])) {
            $errorResponse = [
                'code' => 400,
                'message' => 'Invalid network ID. Must be 1 (MTN), 2 (9mobile), 3 (Glo), or 4 (Airtel).',
            ];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            return;
        }

        $userEncryptedId = $this->session->userdata('user_encrypted_id');
        $customRef = random_string('alnum', 16);
        $userWalletBalance = $this->crud_model->get_user_wallet_balance($userEncryptedId);

        if ($userWalletBalance >= $amountCharged) {
            $transactionData = [
                'user' => $userEncryptedId,
                'transaction_type' => 'Airtime Purchase',
                'transaction_id' => $customRef,
                'amount' => $amount,
                'amount_charged' => $amountCharged,
                'date' => date('Y-m-d H:i:s'),
                'description' => 'Pending airtime purchase of ' . $amount . ' (charged ' . $amountCharged . ') to ' . $phone,
                'status' => 0,
            ];
            $this->crud_model->insert_transaction($transactionData);
            $this->crud_model->deduct_wallet_balance($userEncryptedId, $amountCharged);

            $apiUrl = 'https://data24app.com.ng/api/v1/airtime/purchase';
            $bearerToken = $this->crud_model->getSecretKey('vtu');
            $apiHeaders = [
                'Accept: application/json',
                'Content-Type: application/json',
                "Authorization: Bearer $bearerToken",
            ];

            $apiData = [
                'network_id' => (string)$network,
                'amount' => (int)$amount,
                'phone' => $phone,
                'customRef' => $customRef,
            ];

            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $apiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($apiData),
                CURLOPT_HTTPHEADER => $apiHeaders,
            ]);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                $this->crud_model->add_wallet_balance($userEncryptedId, $amountCharged);
                $this->crud_model->update_transaction_by_ref($customRef, [
                    'description' => 'Failed airtime purchase due to cURL error: ' . $error,
                    'status' => 2
                ]);
                $errorResponse = [
                    'code' => 500,
                    'message' => 'Curl error: ' . $error,
                ];
                header('Content-Type: application/json');
                echo json_encode($errorResponse);
                curl_close($ch);
                return;
            }

            curl_close($ch);
            $responseData = json_decode($response, true);

            switch ($network) {
                case '1':
                    $networkName = 'MTN';
                    break;
                case '2':
                    $networkName = '9mobile';
                    break;
                case '3':
                    $networkName = 'Glo';
                    break;
                case '4':
                    $networkName = 'Airtel';
                    break;
                default:
                    $networkName = 'Unknown Network';
                    break;
            }

            if (isset($responseData['status']) && $responseData['status'] === true) {
                $updateData = [
                    'description' => ucfirst($networkName) . ' airtime purchase of ' . $amount . ' (charged ' . $amountCharged . ') to ' . $phone,
                    'status' => 1,
                ];
                $this->crud_model->update_transaction_by_ref($customRef, $updateData);
                header('Content-Type: application/json');
                echo json_encode(['code' => 200, 'message' => 'Airtime purchase successful.']);
            } else {
                $errorMessage = isset($responseData['display_message']) ? $responseData['display_message'] : 'Airtime purchase failed.';
                if (isset($responseData['data']['errors']) && is_array($responseData['data']['errors'])) {
                    $errorMessage .= ' Details: ' . implode(', ', $responseData['data']['errors']);
                }
                // $this->crud_model->add_wallet_balance($userEncryptedId, $amountCharged);
                $this->crud_model->update_transaction_by_ref($customRef, [
                    'description' => 'Failed airtime purchase: ' . $errorMessage,
                    'status' => 2
                ]);
                $errorResponse = [
                    'code' => 400,
                    'message' => $errorMessage,
                ];
                header('Content-Type: application/json');
                echo json_encode($errorResponse);
            }
        } else {
            $errorResponse = [
                'code' => 400,
                'message' => 'Insufficient wallet balance.',
            ];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
        }
    }

	// Inside your controller
	public function fetchNetworks()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Set your VTU secret key
		$secretKey = $this->crud_model->getSecretKey('vtu');

		// Initialize cURL session
		$ch = curl_init();

		// Set cURL options
		curl_setopt_array($ch, [
			CURLOPT_URL => 'https://data24app.com.ng/api/v1/networks',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => [
				'Accept: application/json',
				'Content-Type: application/json',
				"Authorization: Bearer $secretKey"
			],
		]);

		// Execute cURL session
		$response = curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			$error = curl_error($ch);
			echo 'Curl error: ' . $error;
		}

		// Close cURL session
		curl_close($ch);

		// Send the API response back to the client
		header('Content-Type: application/json');
		echo $response;
	}

	 

	public function fetchDataTypes($networkId)
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		$dataTypes = $this->crud_model->getDataTypesByNetwork($networkId);
		// Return data as JSON response
		header('Content-Type: application/json');
		echo json_encode($dataTypes);
		 
	}

	 public function fetchDataPlan($networkId, $dataType) {
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		$planTypes = $this->crud_model->getPlanTypesByNetwork($networkId,$dataType);
		// Return data as JSON response
		header('Content-Type: application/json');
		echo json_encode($planTypes);
	 }

	public function dataPurchase()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Fetch user details or any other required data
		$network = $this->input->post('network');
		$plan = $this->input->post('plan');
		$selectedDataPlan = $this->input->post('selectedDataPlan');
		$phonenumber = $this->input->post('phonenumber');
		$isPorted = $this->input->post('_isPorted');

		// Customize the 'customRef' value using the user's encrypted ID
		$customRef = random_string('alnum', 10);

		// Check user wallet balance
		$userEncryptedId = $this->session->userdata('user_encrypted_id');
		$userWalletBalance = $this->crud_model->get_user_wallet_balance($userEncryptedId);

		$planPrice = $this->crud_model->getPlanPrice($plan);

		// Check if the wallet balance is sufficient
		if ($userWalletBalance >= $planPrice) {
			// Set the API URL
			$apiUrl = 'https://data24app.com.ng/api/v1/data/purchase';

			// Set your API secret key
			$secretKey = $this->crud_model->getSecretKey('vtu');

			// Set the API headers
			$apiHeaders = [
				'Accept: application/json',
				'Content-Type: application/json',
				"Authorization: Bearer $secretKey",
			];

			// Set the API data
			$apiData = [
				'network_id' => $network,
				'plan_id' => $plan,
				'phone' => $phonenumber,
				'customRef' => $customRef,
			];

			// Initialize cURL session
			$ch = curl_init();

			// Set cURL options
			curl_setopt_array($ch, [
				CURLOPT_URL => $apiUrl,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => json_encode($apiData),
				CURLOPT_HTTPHEADER => $apiHeaders,
			]);

			// Execute cURL session
			$response = curl_exec($ch);

			// Check for cURL errors
			if (curl_errno($ch)) {
				$error = curl_error($ch);
				// Return an error message if cURL request fails
				$errorResponse = [
					'code' => 500,
					'message' => 'Internal Server Error: ' . $error,
				];
				$this->output->set_status_header(500);
				$this->output->set_content_type('application/json')->set_output(json_encode($errorResponse));
				return;
			}

			// Close cURL session
			curl_close($ch);

			// Decode the API response
			$responseData = json_decode($response, true);

			// Check if the data purchase was successful
			if ($responseData['status'] === true) {
				// Update the user's transaction table
				$transactionData = [
					'user' => $userEncryptedId, // Assuming you have the user's encrypted ID stored in a session variable
					'transaction_type' => 'Data Purchase',
					'transaction_id' => $customRef,
					'amount' => $planPrice, // Update this based on your data purchase logic
					'amount_charged' => $planPrice, // Assuming the entire amount is charged
					'date' => date('Y-m-d H:i:s'),
					'description' =>  $selectedDataPlan . ' Data Purchase  for ' . $phonenumber .' was successful',
					'status' => 1, 
				];

				// Insert or update the transaction in the database
				$this->crud_model->insert_transaction($transactionData);

				// Deduct the purchased amount from the user's wallet
				$this->crud_model->deduct_wallet_balance($userEncryptedId, $planPrice);

				// Send the API response back to the JavaScript
				header('Content-Type: application/json');
				echo $response;
			} else {
				// Return an error message if the airtime purchase fails
				$errorResponse = [
					'code' => 400,
					'message' => $responseData['display_message'],
				];

				header('Content-Type: application/json');
				echo json_encode($errorResponse);
			}
		} else {
			// Return an error message if the wallet balance is insufficient
			$errorResponse = [
				'code' => 400,
				'message' => 'Insufficient wallet balance.',
			];

			header('Content-Type: application/json');
			echo json_encode($errorResponse);
		}

		
	}


	public function fetchCablePlan($plan)
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		$apiUrl = 'https://data24app.com.ng/api/v1/cable/plans';

		// Set your API secret key
		$secretKey = $this->crud_model->getSecretKey('vtu');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $apiUrl,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'Content-Type: application/json',
				"Authorization: Bearer $secretKey",
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		// Decode the JSON response
		$responseData = json_decode($response, true);

		// Check if the plan exists in the response
		if (isset($responseData['data'][$plan])) {
			// Filter plans based on the provided plan value
			$filteredPlans = $responseData['data'][$plan];

			// Return the filtered plans as JSON
			header('Content-Type: application/json');
			echo json_encode($filteredPlans);
		} else {
			// Return an error message if the plan is not found
			header('Content-Type: application/json');
			echo json_encode(['error' => 'Invalid plan']);
		}
	}

	public function fetchCustomer($iucNumber, $providerId)
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}


		// Set the API endpoint for customer information
		$apiUrl = 'https://data24app.com.ng/api/v1/cable/validate_iuc_number';

		// Set your API secret key
		$secretKey = $this->crud_model->getSecretKey('vtu');
	
		// Prepare the request data
		$requestData = array(
			'provider_id' => $providerId,
			'iuc_number' => $iucNumber,
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $apiUrl,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($requestData),
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'Content-Type: application/json',
				'Authorization: Bearer ' . $secretKey,
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		// Return the customer information as JSON
		header('Content-Type: application/json');
		echo $response;
	}

	public function cablePurchase()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Get data from the AJAX request
		$cable = $this->input->post('cable');
		$plan = $this->input->post('plan');
		$iuc = $this->input->post('iuc');
		$duration = $this->input->post('duration');
		$selectedPlanPrice = $this->input->post('selectedPlanPrice');

		$discount = $this->crud_model->get_cable_discount($cable);
		$amount_charged = $selectedPlanPrice * $duration * $discount;

		// Customize the 'customRef' value using the user's encrypted ID
		$customRef = random_string('alnum', 10);

		// Check user wallet balance
		$userEncryptedId = $this->session->userdata('user_encrypted_id');
		$userWalletBalance = $this->crud_model->get_user_wallet_balance($userEncryptedId);

		if($userWalletBalance > ($selectedPlanPrice * $duration)){
			// Set the API endpoint for cable purchase
			$apiUrl = 'https://data24app.com.ng/api/v1/cable/purchase';

			// Set your API secret key
			$secretKey = $this->crud_model->getSecretKey('vtu');

			// Prepare the request data
			$requestData = array(
				'provider_id' => $cable,
				'iuc_number' => $iuc,
				'duration' => $duration,
				'plan_id' => $plan,
				'customRef' => $customRef,
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => $apiUrl,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => json_encode($requestData),
				CURLOPT_HTTPHEADER => array(
					'Accept: application/json',
					'Content-Type: application/json',
					'Authorization: Bearer ' . $secretKey,
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);

			// Decode the JSON response
			$responseData = json_decode($response, true);

			// Check if the data purchase was successful
			if ($responseData['status'] === true) {
				// Update the user's transaction table
				$transactionData = [
					'user' => $userEncryptedId,  
					'transaction_type' => 'Cable Purchase',
					'transaction_id' => $customRef,
					'amount' => $selectedPlanPrice * $duration,  
					'amount_charged' => $amount_charged, 
					'date' => date('Y-m-d H:i:s'),
					'description' =>  $responseData['data']['plan'] . ' Cable Purchase  for ' . $iuc . ' was successful',
					'status' => 1,
				];

				// Insert or update the transaction in the database
				$this->crud_model->insert_transaction($transactionData);

				// Deduct the purchased amount from the user's wallet
				$this->crud_model->deduct_wallet_balance($userEncryptedId, $amount_charged);

				// Send the API response back to the JavaScript
				header('Content-Type: application/json');
				echo $response;
			} else {
				// Return an error message if the airtime purchase fails
				$errorResponse = [
					'code' => 400,
					'message' => $responseData['display_message'],
				];

				header('Content-Type: application/json');
				echo json_encode($errorResponse);
			}
		} else {
			// Return an error message if the wallet balance is insufficient
			$errorResponse = [
				'code' => 400,
				'message' => 'Insufficient wallet balance.',
			];

			header('Content-Type: application/json');
			echo json_encode($errorResponse);
		}
		
	}

	public function fetchCustomerMeterDetails($meterNo, $providerId)
	{
		// Validate input parameters, if needed

		// Call the external API to fetch meter details
		$apiUrl = 'https://data24app.com.ng/api/v1/electricity/validate_meter_no';
		$requestData = array(
			'meter_no' => $meterNo,
			'provider_id' => $providerId,
		);

		// Set your API secret key
		$secretKey = $this->crud_model->getSecretKey('vtu');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $apiUrl,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($requestData),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				"Authorization: Bearer $secretKey",
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		// Output the API response
		echo $response;
	}

	public function electricityPurchase()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Get data from the AJAX request
		$provider = $this->input->post('provider');
		$phonenumber = $this->input->post('phonenumber');
		$amount = $this->input->post('amount');
		$meterNo = $this->input->post('meterNo');

		// Customize the 'customRef' value using a random string
		$customRef = random_string('alnum', 10);

		// Check user wallet balance
		$userEncryptedId = $this->session->userdata('user_encrypted_id');
		$userWalletBalance = $this->crud_model->get_user_wallet_balance($userEncryptedId);

		if ($userWalletBalance >= $amount) {
			// Set the API endpoint for electricity purchase
			$apiUrl = 'https://data24app.com.ng/api/v1/electricity/purchase';

			// Set your API secret key
			$secretKey = $this->crud_model->getSecretKey('vtu');

			// Prepare the request data
			$requestData = array(
				'meter_no' => $meterNo,
				'provider_id' => $provider,
				'phonenumber' => $phonenumber,
				'amount' => $amount,
				'customRef' => $customRef,
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => $apiUrl,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => json_encode($requestData),
				CURLOPT_HTTPHEADER => array(
					'Accept: application/json',
					'Content-Type: application/json',
					'Authorization: Bearer ' . $secretKey,
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);

			// Decode the JSON response
			$responseData = json_decode($response, true);

			// Check if the electricity purchase was successful
			if ($responseData['status'] === true) {
				// Update the user's transaction table
				$transactionData = [
					'user' => $userEncryptedId,
					'transaction_type' => 'Electricity Purchase',
					'transaction_id' => $customRef,
					'amount' => $amount,
					'date' => date('Y-m-d H:i:s'),
					'description' => 'Electricity Purchase for ' . $meterNo . ' was successful',
					'status' => 1,
				];

				// Insert or update the transaction in the database
				$this->crud_model->insert_transaction($transactionData);

				// Deduct the purchased amount from the user's wallet
				$this->crud_model->deduct_wallet_balance($userEncryptedId, $amount);

				// Send the API response back to the JavaScript
				header('Content-Type: application/json');
				echo $response;
			} else {
				// Return an error message if the electricity purchase fails
				$errorResponse = [
					'code' => 400,
					'message' => $responseData['display_message'],
				];

				header('Content-Type: application/json');
				echo json_encode($errorResponse);
			}
		} else {
			// Return an error message if the wallet balance is insufficient
			$errorResponse = [
				'code' => 400,
				'message' => 'Insufficient wallet balance.',
			];

			header('Content-Type: application/json');
			echo json_encode($errorResponse);
		}
	}

	public function confirm_change_password()
	{
		if ($this->session->userdata('user_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Get data from the form
		$oldPassword = md5($this->input->post('oldPassword'));
		$newPassword = md5($this->input->post('newPassword'));

		// Check if the old password matches the user's current password
		$userEncryptedId = $this->session->userdata('user_encrypted_id');
		$currentUser = $this->crud_model->get_user_by_id($userEncryptedId);

		if ($currentUser['password'] === $oldPassword) {
			// Old password matches, proceed with updating the password
			$updateData = [
				'password' => $newPassword,
			];

			$this->crud_model->update_user($userEncryptedId, $updateData);

			$this->session->set_flashdata('success_message', "Password Changed successfully");
			redirect(base_url('user/dashboard'), 'refresh');
		} else {
			// Old password doesn't match, show an error or redirect to a password change form
			$this->session->set_flashdata('error_message', 'Old password is incorrect.');
			redirect(base_url('user/change_password'), 'refresh');
		}
	}

	
	
 public function initializeMonnifyPayment()
{
    if ($this->session->userdata('user_login') != TRUE) {
        redirect(base_url(), 'refresh');
    }

    $amount = $this->input->post('amount');
    $user = $this->session->userdata('user_fullname');
    $email = $this->session->userdata('user_email');
    $phone = $this->session->userdata('user_phone');

    // Fetch Monnify API credentials from the database
    $api_data = $this->db->get_where('apis', ['id' => 1])->row();
    if (!$api_data) {
        $this->session->set_flashdata('error_message', 'Monnify API credentials not found in the database');
        redirect(base_url('user/dashboard'));
    }

    $apiKey = $api_data->monnify_test;
    $secretKey = $api_data->monnify_secret_key;
    $contractCode = $api_data->monnify_contract_code;
    $baseUrl = 'https://sandbox.monnify.com';

    // Validate API credentials
    if (empty($apiKey) || empty($secretKey) || empty($contractCode)) {
        $this->session->set_flashdata('error_message', 'Monnify API credentials are incomplete in the database');
        redirect(base_url('user/dashboard'));
    }

    // Generate a unique payment reference
    $paymentReference = 'MNFY_' . time() . '_' . rand(1000, 9999);

    // Prepare the payload for Monnify
    $payload = [
        'amount' => $amount,
        'customerName' => $user,
        'customerEmail' => $email,
        'customerMobileNumber' => $phone,
        'paymentReference' => $paymentReference,
        'paymentDescription' => 'Account Funding via Monnify',
        'currencyCode' => 'NGN',
        'contractCode' => $contractCode,
        'redirectUrl' => base_url('user/verifyMonnifyPayment'),
        'paymentMethods' => ['CARD', 'ACCOUNT_TRANSFER', 'USSD']
    ];

    // Authenticate with Monnify to get access token
    $authString = base64_encode($apiKey . ':' . $secretKey);
    $authResponse = $this->makeCurlRequest(
        $baseUrl . '/api/v1/auth/login',
        'POST',
        ['Authorization: Basic ' . $authString]
    );

    // Log the raw response for debugging
    log_message('debug', 'Monnify Auth Response: ' . json_encode($authResponse));

    // Check for successful authentication with updated condition
    if (
        !isset($authResponse['responseCode']) || $authResponse['responseCode'] != 0 ||
        !isset($authResponse['responseBody']['responseBody']['accessToken'])
    ) {
        $errorMessage = 'Failed to authenticate with Monnify: ' . 
            ($authResponse['responseBody']['responseMessage'] ?? 'Unknown error');
        $this->session->set_flashdata('error_message', $errorMessage);
        redirect(base_url('user/dashboard'));
    }

    $accessToken = $authResponse['responseBody']['responseBody']['accessToken'];

    // Initialize the transaction with Monnify
    $initResponse = $this->makeCurlRequest(
        $baseUrl . '/api/v1/merchant/transactions/init-transaction',
        'POST',
        [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json'
        ],
        json_encode($payload)
    );
    
    // Log the init response for debugging
    log_message('debug', 'Monnify Init Transaction Response: ' . json_encode($initResponse));

    if (
        !isset($initResponse['responseCode']) || $initResponse['responseCode'] != 0 ||
        !isset($initResponse['responseBody']['responseBody']['transactionReference'])
    ) {
        $errorMessage = 'Failed to initialize Monnify payment: ' . 
            ($initResponse['responseBody']['responseMessage'] ?? 'Unknown error');
        $this->session->set_flashdata('error_message', $errorMessage);
        redirect(base_url('user/dashboard'));
    }

    $transactionReference = $initResponse['responseBody']['responseBody']['transactionReference'];
    $checkoutUrl = $initResponse['responseBody']['responseBody']['checkoutUrl'];

    // Store transaction details in the database for verification
    $transactionData = [
        'user' => $this->session->userdata('user_encrypted_id'),
        'transaction_id' => $paymentReference,
        'monnify_transaction_ref' => $transactionReference,
        'amount' => $amount,
        'amount_charged' => $amount,
        'transaction_type' => 'Funding Wallet',
        'description' => 'Account Funding via Monnify',
        'status' => 0,
        'date' => date('Y-m-d H:i:s'),
        'source' => 'Monnify'
    ];
    $this->db->insert('transactions', $transactionData);

    // Redirect user to Monnify checkout page
    redirect($checkoutUrl);
}

public function verifyMonnifyPayment()
{
    if ($this->session->userdata('user_login') != TRUE) {
        redirect(base_url(), 'refresh');
    }

    // Get the payment reference from the query parameter
    $paymentReference = $this->input->get('paymentReference');

    if (empty($paymentReference)) {
        $this->session->set_flashdata('error_message', 'Invalid payment reference');
        redirect(base_url('user/dashboard'));
    }

    // Fetch the transaction from the database to get Monnify's transaction reference
    $this->db->where('transaction_id', $paymentReference);
    $transaction = $this->db->get('transactions')->row();

    if (!$transaction || empty($transaction->monnify_transaction_ref)) {
        $this->session->set_flashdata('error_message', 'Transaction not found or invalid Monnify transaction reference');
        redirect(base_url('user/dashboard'));
    }

    $transactionReference = $transaction->monnify_transaction_ref;

    // Fetch Monnify API credentials from the database
    $api_data = $this->db->get_where('apis', ['id' => 1])->row();
    if (!$api_data) {
        $this->session->set_flashdata('error_message', 'Monnify API credentials not found in the database');
        redirect(base_url('user/dashboard'));
    }

    $apiKey = $api_data->monnify_test;
    $secretKey = $api_data->monnify_secret_key;
    $baseUrl = 'https://sandbox.monnify.com'; // Use sandbox for testing; switch to 'https://api.monnify.com' for production

    // Validate API credentials
    if (empty($apiKey) || empty($secretKey)) {
        $this->session->set_flashdata('error_message', 'Monnify API credentials are incomplete in the database');
        redirect(base_url('user/dashboard'));
    }

    // Authenticate with Monnify to get access token
    $authString = base64_encode($apiKey . ':' . $secretKey);
    $authResponse = $this->makeCurlRequest(
        $baseUrl . '/api/v1/auth/login',
        'POST',
        ['Authorization: Basic ' . $authString]
    );
    
  
    
   $accessToken = $authResponse['responseBody']['responseBody']['accessToken'];

    // Verify the transaction with Monnify
    $verifyResponse = $this->makeCurlRequest(
        $baseUrl . '/api/v2/transactions/' . urlencode($transactionReference),
        'GET',
        [
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json'
        ]
    );

    
      if ($verifyResponse['responseCode'] !== '0' || !isset($verifyResponse['responseBody']['responseBody']['paymentStatus'])) {
        $errorMessage = 'Failed to verify Monnify payment: ' . ($verifyResponse['responseBody']['responseMessage'] ?? 'Unknown error');
        $this->session->set_flashdata('error_message', $errorMessage);
        redirect(base_url('user/dashboard'));
    }

    $transactionDetails = $verifyResponse['responseBody']['responseBody'];
    $paymentStatus = $transactionDetails['paymentStatus'];

    $updateData = [
        'status' => ($paymentStatus === 'PAID') ? 1 : 2,
        'amount_charged' => $transactionDetails['amountPaid'] ?? $transaction->amount
    ];
    $this->db->where('transaction_id', $paymentReference);
    $this->db->update('transactions', $updateData);

    if ($paymentStatus === 'PAID') {
        $user_encrypted_id = $this->session->userdata('user_encrypted_id');
        $this->db->where('user', $user_encrypted_id);
        $wallet = $this->db->get('wallets')->row();

        if ($wallet) {
            $newBalance = $wallet->amount + $transactionDetails['amountPaid'];
            $this->db->where('user', $user_encrypted_id);
            $this->db->update('wallets', [
                'amount' => $newBalance,
                'last_updated' => date('Y-m-d H:i:s')
            ]);
        } else {
            $this->db->insert('wallets', [
                'user' => $user_encrypted_id,
                'amount' => $transactionDetails['amountPaid'],
                'last_updated' => date('Y-m-d H:i:s')
            ]);
        }

        $this->session->set_flashdata('success_message', 'Account funded successfully');
    } else {
        $this->session->set_flashdata('error_message', 'Payment failed or was not completed');
    }

    redirect(base_url('user/dashboard'));
}


public function initializeMonnifyPaymentProd()
{
    if ($this->session->userdata('user_login') != TRUE) {
        redirect(base_url(), 'refresh');
    }

    $amount = $this->input->post('amount');
    $user = $this->session->userdata('user_fullname');
    $email = $this->session->userdata('user_email');
    $phone = $this->session->userdata('user_phone');

    $api_data = $this->db->get_where('apis', ['id' => 1])->row();
    if (!$api_data) {
        $this->session->set_flashdata('error_message', 'Monnify API credentials not found in the database');
        redirect(base_url('user/dashboard'));
    }

    $apiKey = $api_data->monnify_api;
    $secretKey = $api_data->monnify_secret_key;
    $contractCode = $api_data->monnify_contract_code;
    $baseUrl = 'https://api.monnify.com';

    if (empty($apiKey) || empty($secretKey) || empty($contractCode)) {
        $this->session->set_flashdata('error_message', 'Monnify API credentials are incomplete in the database');
        redirect(base_url('user/dashboard'));
    }

    $paymentReference = 'MNFY_' . time() . '_' . rand(1000, 9999);

    $payload = [
        'amount' => $amount,
        'customerName' => $user,
        'customerEmail' => $email,
        'customerMobileNumber' => $phone,
        'paymentReference' => $paymentReference,
        'paymentDescription' => 'Account Funding via Monnify',
        'currencyCode' => 'NGN',
        'contractCode' => $contractCode,
        'redirectUrl' => base_url('user/verifyMonnifyPaymentProd'),
        'paymentMethods' => ['CARD', 'ACCOUNT_TRANSFER', 'USSD']
    ];

    $authString = base64_encode($apiKey . ':' . $secretKey);
    $authResponse = $this->makeCurlRequest(
        $baseUrl . '/api/v1/auth/login',
        'POST',
        ['Authorization: Basic ' . $authString]
    );

    // log_message('debug', 'Monnify Auth Response (Prod): ' . json_encode($authResponse));

    if (
        !isset($authResponse['responseCode']) || $authResponse['responseCode'] != 0 ||
        !isset($authResponse['responseBody']['responseBody']['accessToken'])
    ) {
        $errorMessage = 'Failed to authenticate with Monnify: ' . 
            ($authResponse['responseBody']['responseMessage'] ?? 'Unknown error');
        $this->session->set_flashdata('error_message', $errorMessage);
        redirect(base_url('user/dashboard'));
    }

    $accessToken = $authResponse['responseBody']['responseBody']['accessToken'];

    $initResponse = $this->makeCurlRequest(
        $baseUrl . '/api/v1/merchant/transactions/init-transaction',
        'POST',
        [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json'
        ],
        json_encode($payload)
    );
    
    log_message('debug', 'Monnify Init Transaction Response (Prod): ' . json_encode($initResponse));

    if (
        !isset($initResponse['responseCode']) || $initResponse['responseCode'] != 0 ||
        !isset($initResponse['responseBody']['responseBody']['transactionReference'])
    ) {
        $errorMessage = 'Failed to initialize Monnify payment: ' . 
            ($initResponse['responseBody']['responseMessage'] ?? 'Unknown error');
        $this->session->set_flashdata('error_message', $errorMessage);
        redirect(base_url('user/dashboard'));
    }

    $transactionReference = $initResponse['responseBody']['responseBody']['transactionReference'];
    $checkoutUrl = $initResponse['responseBody']['responseBody']['checkoutUrl'];

    $transactionData = [
        'user' => $this->session->userdata('user_encrypted_id'),
        'transaction_id' => $paymentReference,
        'monnify_transaction_ref' => $transactionReference,
        'amount' => $amount,
        'amount_charged' => $amount,
        'transaction_type' => 'Funding Wallet',
        'description' => 'Account Funding via Monnify',
        'status' => 0,
        'date' => date('Y-m-d H:i:s'),
        'source' => 'Monnify'
    ];
    $this->db->insert('transactions', $transactionData);

    redirect($checkoutUrl);
}

    public function verifyMonnifyPaymentProd()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            redirect(base_url(), 'refresh');
        }
    
        $paymentReference = $this->input->get('paymentReference');
    
        if (empty($paymentReference)) {
            $this->session->set_flashdata('error_message', 'Invalid payment reference');
            redirect(base_url('user/dashboard'));
        }
    
        $this->db->where('transaction_id', $paymentReference);
        $transaction = $this->db->get('transactions')->row();
    
        if (!$transaction || empty($transaction->monnify_transaction_ref)) {
            $this->session->set_flashdata('error_message', 'Transaction not found or invalid Monnify transaction reference');
            redirect(base_url('user/dashboard'));
        }
    
        if ($transaction->status == 1) {
            // Already marked as paid via webhook
            $this->session->set_flashdata('success_message', 'Account funded successfully');
            redirect(base_url('user/dashboard'));
        }
    
        // If webhook hasn't updated it yet, just show pending message
        $this->session->set_flashdata('info_message', 'Payment is being processed. Please check back in a few minutes.');
        redirect(base_url('user/dashboard'));
    }

    
    // Helper function to make cURL requests
    private function makeCurlRequest($url, $method, $headers = [], $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
        }
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        return [
            'responseCode' => $httpCode == 200 ? '0' : $httpCode,
            'responseBody' => json_decode($response, true)
        ];
    }

    public function monnifyWebhook()
    {
        // Get raw POST data
        $input = file_get_contents('php://input');
        $webhookData = json_decode($input, true);
    
        // Log the webhook data for debugging
        log_message('debug', 'Monnify Webhook Received: ' . $input);
    
        // Verify webhook signature (Monnify sends signature in header)
        $signature = $_SERVER['HTTP_MONNIFY_SIGNATURE'] ?? '';
        $api_data = $this->db->get_where('apis', ['id' => 1])->row();
        
        if (!$api_data || empty($api_data->monnify_secret_key)) {
            log_message('error', 'Monnify API credentials not found');
            http_response_code(500);
            exit;
        }
    
        $secretKey = $api_data->monnify_secret_key;
        $computedSignature = hash_hmac('sha512', $input, $secretKey);
    
        if ($signature !== $computedSignature) {
            log_message('error', 'Invalid webhook signature');
            http_response_code(401);
            exit;
        }
    
        // Check if event data exists
        if (empty($webhookData) || !isset($webhookData['eventType']) || !isset($webhookData['eventData'])) {
            log_message('error', 'Invalid webhook data format');
            http_response_code(400);
            exit;
        }
    
        $eventType = $webhookData['eventType'];
        $eventData = $webhookData['eventData'];
    
        // Handle different event types
        switch ($eventType) {
            case 'SUCCESSFUL_TRANSACTION':
                $transactionReference = $eventData['transactionReference'] ?? '';
                $paymentReference = $eventData['paymentReference'] ?? '';
                $amountPaid = $eventData['amountPaid'] ?? 0;
                $paymentStatus = $eventData['paymentStatus'] ?? '';
                $customerEmail = $eventData['customer']['email'] ?? '';
    
                // Find transaction in database
                $this->db->where('monnify_transaction_ref', $transactionReference);
                $transaction = $this->db->get('transactions')->row();
    
                if (!$transaction) {
                    log_message('error', 'Transaction not found for reference: ' . $transactionReference);
                    http_response_code(200); // Still return 200 to acknowledge receipt
                    exit;
                }
                
                if ($transaction->status == 1) {
                    log_message('info', 'Transaction already processed: ' . $transactionReference);
                    http_response_code(200);
                    exit;
                }
    
                // Update transaction status
                $updateData = [
                    'status' => ($paymentStatus === 'PAID') ? 1 : 2,
                    'amount_charged' => $amountPaid
                ];
                $this->db->where('monnify_transaction_ref', $transactionReference);
                $this->db->update('transactions', $updateData);
    
                if ($paymentStatus === 'PAID') {
                    // Find user by email or transaction data
                    $this->db->where('email', $customerEmail);
                    $user = $this->db->get('users')->row();
                    
                    if ($user) {
                        $user_encrypted_id = $user->encrypted_id;
                        $this->db->where('user', $user_encrypted_id);
                        $wallet = $this->db->get('wallets')->row();
    
                        if ($wallet) {
                            $newBalance = $wallet->amount + $amountPaid;
                            $this->db->where('user', $user_encrypted_id);
                            $this->db->update('wallets', [
                                'amount' => $newBalance,
                                'last_updated' => date('Y-m-d H:i:s')
                            ]);
                        } else {
                            $this->db->insert('wallets', [
                                'user' => $user_encrypted_id,
                                'amount' => $amountPaid,
                                'last_updated' => date('Y-m-d H:i:s')
                            ]);
                        }
                    }
                }
                break;
    
            case 'FAILED_TRANSACTION':
                $transactionReference = $eventData['transactionReference'] ?? '';
                $this->db->where('monnify_transaction_ref', $transactionReference);
                $this->db->update('transactions', ['status' => 2]);
                break;
    
            default:
                log_message('info', 'Unhandled webhook event type: ' . $eventType);
                break;
        }
    
        // Respond with 200 OK to acknowledge receipt
        http_response_code(200);
        exit;
    }
    
    
    public function get_jonet_plans()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }
    
        $network = $this->input->post('network');
        $plans = $this->crud_model->get_jonet_data_plans_by_network($network);
        
        echo json_encode([
            'status' => 'success',
            'plans' => $plans
        ]);
    }
    
    public function get_data24_plans()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }
    
        $network = $this->input->post('network');
        $plans = $this->crud_model->get_data24_data_plans_by_network($network);
        
        echo json_encode([
            'status' => 'success',
            'plans' => $plans
        ]);
    }
    
    public function purchase_jonet_data()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }
    
        $network = $this->input->post('network');
        $plan_code = $this->input->post('plan');
        $phone = $this->input->post('phonenumber');
        $user_id = $this->session->userdata('user_encrypted_id');
    
        // Validate phone number
        if (!preg_match('/^0[789][0-1]\d{8}$/', $phone)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format']);
            return;
        }
    
        // Get wallet balance
        $wallet = $this->db->get_where('wallets', ['user' => $user_id])->row();
        if (!$wallet) {
            echo json_encode(['status' => 'error', 'message' => 'Wallet not found']);
            return;
        }
    
        // Get plan details
        $plan = $this->db->get_where('jonet_dataplans', ['code' => $plan_code, 'network' => $network])->row();
        if (!$plan || $plan->status !== 'AVAILABLE') {
            echo json_encode(['status' => 'error', 'message' => 'Invalid or unavailable plan']);
            return;
        }
    
        if ($wallet->amount < $plan->price) {
            echo json_encode(['status' => 'error', 'message' => 'Insufficient wallet balance']);
            return;
        }
    
        // Generate customer ID
        $customer_id = date('YmdHis') . rand(1000, 9999);
    
        // Jonet API credentials
        $api_data = $this->db->get_where('apis', ['id' => 1])->row();
        $api_key = $api_data->jonet_vtu;
    
        // Prepare request
        $payload = [
            'code' => $plan_code,
            'phone' => $phone,
            'customer_id' => $customer_id
        ];
    
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://jonet.com.ng/api_live/v1/purchase_data.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $api_key,
                'Content-Type: application/json'
            ]
        ]);
    
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        $result = json_decode($response, true);
    
        if ($http_code == 200 && isset($result['responseCode']) && $result['responseCode'] == '200') {
            // Success
            $new_balance = $wallet->amount - $plan->price;
            $this->db->where('user', $user_id)->update('wallets', [
                'amount' => $new_balance,
                'last_updated' => date('Y-m-d H:i:s')
            ]);
    
            $this->db->insert('transactions', [
                'user' => $user_id,
                'transaction_id' => $customer_id,
                'amount' => $plan->price,
                'amount_charged' => $plan->price,
                'transaction_type' => 'Data Purchase',
                'description' => "Purchased {$plan->name} for $phone",
                'status' => 1,
                'date' => date('Y-m-d H:i:s'),
                'source' => 'Jonet'
            ]);
    
            echo json_encode([
                'status' => 'success',
                'message' => $result['message']
            ]);
        } elseif (isset($result['responseCode']) && $result['responseCode'] == '203') {
            // Processing
            $this->db->insert('transactions', [
                'user' => $user_id,
                'transaction_id' => $customer_id,
                'amount' => $plan->price,
                'amount_charged' => $plan->price,
                'transaction_type' => 'Data Purchase',
                'description' => "Purchased {$plan->name} for $phone (Processing)",
                'status' => 0,
                'date' => date('Y-m-d H:i:s'),
                'source' => 'Jonet'
            ]);
    
            echo json_encode([
                'status' => 'processing',
                'message' => $result['message']
            ]);
        } else {
            // Failed
            echo json_encode([
                'status' => 'error',
                'message' => $result['message'] ?? 'Transaction failed'
            ]);
        }
    }
    
    
    public function mark_announcement_read()
    {
        if ($this->session->userdata('user_login') != TRUE) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }
    
        $announcement_id = $this->input->post('announcement_id');
        $user_id = $this->session->userdata('user_encrypted_id');
    
        // Check if already marked as read
        $existing = $this->db->get_where('announcement_views', [
            'user_id' => $user_id,
            'announcement_id' => $announcement_id
        ])->row();
    
        if (!$existing) {
            $this->db->insert('announcement_views', [
                'user_id' => $user_id,
                'announcement_id' => $announcement_id,
                'viewed_at' => date('Y-m-d H:i:s')
            ]);
        }
    
        echo json_encode(['status' => 'success']);
    }

   public function jonetWebhookListener()
    {
        // Get raw POST data
        $rawData = $this->input->raw_input_stream;
        log_message('info', 'Jonet Raw Input: ' . $rawData);

        // Verify API key from header
        $apiKey = $this->crud_model->getSecretKey('jonet_vtu');
        $receivedApiKey = $this->input->get_request_header('Authorization', TRUE);
        $receivedApiKey = str_replace('Bearer ', '', $receivedApiKey);

        if ($receivedApiKey !== $apiKey) {
            $errorResponse = [
                'code' => 401,
                'message' => 'Unauthorized: Invalid API key.'
            ];
            $this->output
                ->set_status_header(401)
                ->set_content_type('application/json')
                ->set_output(json_encode($errorResponse));
            $this->crud_model->log_webhook_error('jonet', 'Unauthorized: Invalid API key');
            return;
        }

        // Respond quickly with 200 status
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => 'received']));

        // Extract values from raw data using regex
        $status         = $this->extractJsonValue($rawData, 'status');
        $serverResponse = $this->extractJsonValue($rawData, 'server_response');
        $type           = $this->extractJsonValue($rawData, 'type');
        $customerId     = $this->extractJsonValue($rawData, 'customer_id');
        $recipient      = $this->extractJsonValue($rawData, 'receipent');
        $vendorId       = $this->extractJsonValue($rawData, 'vendor_id');
        $balance        = $this->extractJsonValue($rawData, 'balance');

        if (!$customerId) {
            $this->crud_model->log_webhook_error('jonet', 'Missing or invalid customer_id from raw input');
            return;
        }

        // Find transaction by customer_id
        $transaction = $this->crud_model->get_transaction_by_ref($customerId);
        if (!$transaction) {
            $this->crud_model->log_webhook_error('jonet', 'Transaction not found for customer_id: ' . $customerId);
            return;
        }

        // Map status
        $transactionStatus = ($serverResponse === 'Successful' || $serverResponse === 'Processing') ? 1 : 2;

        $updateData = [
            'status' => $transactionStatus,
            'description' => ucfirst($type) . ' purchase to ' . $recipient . ' ' . strtolower($status)  
        ];

        $this->crud_model->update_transaction_by_ref($customerId, $updateData);
        $this->crud_model->log_webhook_success('jonet', 'Transaction updated for customer_id: ' . $customerId . ' with status: ' . $status);
    }

    // Helper function to extract values from raw JSON string using regex
    private function extractJsonValue($raw, $key)
    {
        $pattern = '/"' . preg_quote($key, '/') . '"\s*:\s*"([^"]*)"/';
        if (preg_match($pattern, $raw, $matches)) {
            return $matches[1];
        }
        return '';
    }
    
     public function fetchJonetTvPackages() {
        $api_data = $this->db->get_where('apis', ['id' => 1])->row();
        $api_key = $api_data->jonet_vtu;

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://jonet.com.ng/api_live/v1/get_tv_packages.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Authorization: ' . $api_key]
        ]);

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code == 200) {
            $packages = json_decode($response, true);
            echo json_encode([
                'status' => 'success',
                'data' => $packages
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to fetch TV packages'
            ]);
        }
    }

}
