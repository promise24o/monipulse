<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function dashboard()
	{
		$data['page_title'] = "Dashboard";

		if ($this->session->userdata('admin_login') != TRUE)
			redirect(base_url(), 'refresh');
		
		$this->load->view('Layouts/admin-header', $data);
		$this->load->view('Pages/Admin/dashboard');
		$this->load->view('Layouts/admin-footer');
	}
	
    public function data_plans()
    {
        $data['page_title'] = "Data Plans";
    
        if ($this->session->userdata('admin_login') != TRUE) {
            redirect(base_url(), 'refresh');
        }
    
        // Fetch Data24 and Jonet data plans separately from the Crud_model
        $data['data24_plans'] = $this->crud_model->get_data24_data_plans();
        $data['jonet_plans'] = $this->crud_model->get_jonet_data_plans();
    
        $this->load->view('Layouts/admin-header', $data);
        $this->load->view('Pages/Admin/data-plans', $data);
        $this->load->view('Layouts/admin-footer');
    }
    
	public function blog()
	{
		$data['page_title'] = "Blog Post";

		if ($this->session->userdata('admin_login') != TRUE)
			redirect(base_url(), 'refresh');
		
		$this->load->view('Layouts/admin-header', $data);
		$this->load->view('Pages/Admin/blog');
		$this->load->view('Layouts/admin-footer');
	}

	public function users()
	{
		$data['page_title'] = "Users List";

		if ($this->session->userdata('admin_login') != TRUE)
			redirect(base_url(), 'refresh');
		
		$data['users'] = $this->crud_model->get_all_users();

		$this->load->view('Layouts/admin-header', $data);
		$this->load->view('Pages/Admin/users');
		$this->load->view('Layouts/admin-footer');
	}

	public function transactions()
	{
		$data['page_title'] = "Transactions List";

		if ($this->session->userdata('admin_login') != TRUE)
			redirect(base_url(), 'refresh');

		$data['users'] = $this->crud_model->get_all_users();
		$data['transactions'] = $this->crud_model->get_all_transactions();

		$this->load->view('Layouts/admin-header', $data);
		$this->load->view('Pages/Admin/transactions');
		$this->load->view('Layouts/admin-footer');
	}

	public function account_settings()
	{
		if ($this->session->userdata('admin_login') != TRUE)
			redirect(base_url(), 'refresh');

		$data['page_title'] = "Account Settings";

		// Retrieve social data
		$social_data = $this->crud_model->get_social_data();
		$data['social_data'] = $social_data;

		// Retrieve API data
		$api_data = $this->crud_model->get_api_data();
		$data['api_data'] = $api_data;

		// Retrieve API data
		$airtime_discounts  = $this->crud_model->get_airtime_discounts();
		$data['airtime_discounts'] = $airtime_discounts;

		// Retrieve API data
		$cable_discounts  = $this->crud_model->get_cable_discounts();
		$data['cable_discounts'] = $cable_discounts;

		$this->load->view('Layouts/admin-header', $data);
		$this->load->view('Pages/Admin/account-settings');
		$this->load->view('Layouts/admin-footer');
	}

	public function update_account_details()
	{
		if ($this->session->userdata('admin_login') != TRUE)
			redirect(base_url(), 'refresh');

		$admin_name = $this->input->post('admin_name');
		$admin_email = $this->input->post('admin_email');
		$twitter = $this->input->post('twitter');
		$facebook = $this->input->post('facebook');
		$whatsapp = $this->input->post('whatsapp');
		$instagram = $this->input->post('instagram');

		// Update admin table
		$admin_data = array(
			'name' => $admin_name,
			'email' => $admin_email,
		);
		$this->db->where('id', $this->session->userdata('admin_id'));
		$this->db->update('admin', $admin_data);

		// Update social_settings table
		$social_data = array(
			'twitter' => $twitter,
			'facebook' => $facebook,
			'whatsapp' => $whatsapp,
			'instagram' => $instagram,
		);

		// Check if data exists
		$this->db->where('id', 1);
		$query = $this->db->get('social_settings');
		$result = $query->row();

		if ($result) {
			// If data exists, update it
			$this->db->where('id', 1);
			$this->db->update('social_settings', $social_data);
		} else {
			// If data doesn't exist, insert a new record
			$this->db->insert('social_settings', $social_data);
		}

		// Redirect or show success message
		$this->session->set_flashdata('success_message', 'Account Updated Successfully');
		redirect(base_url('admin/account_settings'));
	}
	
    public function update_data_plan_price()
    {
        if ($this->session->userdata('admin_login') != TRUE) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }
    
        $plan_id = $this->input->post('plan_id');
        $price = $this->input->post('price');
        $status = $this->input->post('status');
        $source = $this->input->post('source');
    
        $table = ($source === 'jonet') ? 'jonet_dataplans' : 'data_plans';
    
        $plan_data = array(
            'price' => $price,
            'status' => in_array($status, ['AVAILABLE', 'unavailable']) ? $status : 'unavailable'
        );
    
        $this->db->where('id', $plan_id);
        $update = $this->db->update($table, $plan_data);
    
        if ($update) {
            $updated_data = ($source === 'jonet') ? $this->crud_model->get_jonet_data_plans() : $this->crud_model->get_data24_data_plans();
            echo json_encode([
                'status' => 'success',
                'message' => 'Price and Status Updated Successfully',
                'updated_data' => $updated_data
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update price or status']);
        }
    }

	public function change_password()
	{
		if ($this->session->userdata('admin_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}


		$this->form_validation->set_rules('current_password', 'Current Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

		if ($this->form_validation->run() == FALSE) {
			// Store individual form validation errors in flashdata

			if (form_error('current_password')) {
				$this->session->set_flashdata('error_message', form_error('current_password'));
			}

			if (form_error('new_password')) {
				$this->session->set_flashdata('error_message', form_error('new_password'));
			}

			if (form_error('confirm_password')) {
				$this->session->set_flashdata('error_message', form_error('confirm_password'));
			}

			redirect('admin/account_settings');
		} else {
			// Validation passed, proceed to change the password
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');

			$admin_id = $this->session->userdata('admin_id');
			$change_password_result = $this->crud_model->change_admin_password($admin_id, $current_password, $new_password);

			if ($change_password_result) {
				$this->session->set_flashdata('success_message', 'Password Changed Successfully');
				redirect('admin/account_settings');
			} else {
				// Set a custom error message in flashdata
				$this->session->set_flashdata('error_message', 'Failed to change password. Please check your current password.');
				redirect('admin/account_settings');
			}
		}
	}

  public function update_api()
    {
        if ($this->session->userdata('admin_login') != TRUE) {
            redirect(base_url(), 'refresh');
        }
    
        // Form validation rules
        $this->form_validation->set_rules('paystack_sk', 'Paystack Secret Key', 'required');
        $this->form_validation->set_rules('paystack_pk', 'Paystack Public Key', 'required');
        $this->form_validation->set_rules('monnify_api', 'Monnify API Key', 'required');
        $this->form_validation->set_rules('monnify_secret_key', 'Monnify Secret Key', 'required');
        $this->form_validation->set_rules('monnify_contract_code', 'Monnify Contract Code', 'required');
        $this->form_validation->set_rules('jonet_vtu', 'Jonet VTU Key', 'required');
        $this->form_validation->set_rules('vtu_api', 'Data24 VTU API', 'required');
        $this->form_validation->set_rules('active_vtu', 'Active VTU API', 'required|in_list[data24,jonet]');
    
        if ($this->form_validation->run() == FALSE) {
            if (form_error('paystack_sk')) {
                $this->session->set_flashdata('error_message', form_error('paystack_sk'));
            }
            if (form_error('paystack_pk')) {
                $this->session->set_flashdata('error_message', form_error('paystack_pk'));
            }
            if (form_error('monnify_api')) {
                $this->session->set_flashdata('error_message', form_error('monnify_api'));
            }
            if (form_error('monnify_secret_key')) {
                $this->session->set_flashdata('error_message', form_error('monnify_secret_key'));
            }
            if (form_error('monnify_contract_code')) {
                $this->session->set_flashdata('error_message', form_error('monnify_contract_code'));
            }
            if (form_error('jonet_vtu')) {
                $this->session->set_flashdata('error_message', form_error('jonet_vtu'));
            }
            if (form_error('vtu_api')) {
                $this->session->set_flashdata('error_message', form_error('vtu_api'));
            }
            if (form_error('active_vtu')) {
                $this->session->set_flashdata('error_message', form_error('active_vtu'));
            }
            redirect('admin/account_settings');
        } else {
            // Validation passed, proceed to update or insert the APIs
            $paystack_pk = $this->input->post('paystack_pk');
            $paystack_sk = $this->input->post('paystack_sk');
            $monnify_api = $this->input->post('monnify_api');
            $monnify_secret_key = $this->input->post('monnify_secret_key');
            $monnify_contract_code = $this->input->post('monnify_contract_code');
            $jonet_vtu = $this->input->post('jonet_vtu');
            $vtu_api = $this->input->post('vtu_api');
            $active_vtu = $this->input->post('active_vtu');
    
            // Check if the record with id 1 exists in the 'apis' table
            $existing_api = $this->db->get_where('apis', ['id' => 1])->row();
    
            if ($existing_api) {
                // If the record exists, update it
                $this->db->where('id', 1);
                $this->db->update('apis', [
                    'paystack_sk' => $paystack_sk,
                    'paystack_pk' => $paystack_pk,
                    'monnify_api' => $monnify_api,
                    'monnify_secret_key' => $monnify_secret_key,
                    'monnify_contract_code' => $monnify_contract_code,
                    'jonet_vtu' => $jonet_vtu,
                    'vtu' => $vtu_api,
                    'active_vtu' => $active_vtu
                ]);
            } else {
                // If the record doesn't exist, insert it
                $this->db->insert('apis', [
                    'id' => 1,
                    'paystack_sk' => $paystack_sk,
                    'paystack_pk' => $paystack_pk,
                    'monnify_api' => $monnify_api,
                    'monnify_secret_key' => $monnify_secret_key,
                    'monnify_contract_code' => $monnify_contract_code,
                    'jonet_vtu' => $jonet_vtu,
                    'vtu' => $vtu_api,
                    'active_vtu' => $active_vtu
                ]);
            }
    
            // Redirect to a success page or handle as needed
            $this->session->set_flashdata('success_message', 'APIs updated successfully');
            redirect('admin/account_settings');
        }
    }

	public function update_airtime_discounts()
	{
		if ($this->session->userdata('admin_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		// Validate form data
		$this->form_validation->set_rules('mtnDiscount', 'MTN Discount', 'required|numeric');
		$this->form_validation->set_rules('etisalatDiscount', '9mobile Discount', 'required|numeric');
		$this->form_validation->set_rules('gloDiscount', 'Glo Discount', 'required|numeric');
		$this->form_validation->set_rules('airtelDiscount', 'Airtel Discount', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			// Store individual form validation errors in flashdata
			if (form_error('mtnDiscount')) {
				$this->session->set_flashdata('error_message', form_error('mtnDiscount'));
			}

			if (form_error('etisalatDiscount')) {
				$this->session->set_flashdata('error_message', form_error('etisalatDiscount'));
			}

			if (form_error('gloDiscount')) {
				$this->session->set_flashdata('error_message', form_error('gloDiscount'));
			}

			if (form_error('airtelDiscount')) {
				$this->session->set_flashdata('error_message', form_error('airtelDiscount'));
			}

			redirect('admin/account_settings');
		} else {
			// Form validation passed, proceed to update the discounts

			// Form data
			$mtnDiscount = $this->input->post('mtnDiscount');
			$etisalatDiscount = $this->input->post('etisalatDiscount');
			$gloDiscount = $this->input->post('gloDiscount');
			$airtelDiscount = $this->input->post('airtelDiscount');

			// Update data
			$updateData = array(
				'mtn' => $mtnDiscount,
				'etisalat' => $etisalatDiscount,
				'glo' => $gloDiscount,
				'airtel' => $airtelDiscount,
				'last_updated' => date('Y-m-d H:i:s')
			);

			// Update the discounts in the airtime_discounts table
			$this->crud_model->update_airtime_discounts($updateData);

			$this->session->set_flashdata('success_message', 'Discounts updated successfully');
			redirect('admin/account_settings');
		}
	}

	public function update_cable_discounts()
	{
		if ($this->session->userdata('admin_login') != TRUE) {
			redirect(base_url(), 'refresh');
		}

		$discounts = $this->db->get('cable_discounts')->result_array();
		foreach($discounts as $discount){
			$data['last_updated']				=	date('F jS, Y | h:i:A');
			$data['ResellerPercentage']			=	$this->input->post($discount['id']);
			$this->db->where('id', $discount['id']); 
			$this->db->update('cable_discounts', $data);
		}

		$this->session->set_flashdata('success_message', 'Discounts updated successfully');
		redirect('admin/account_settings');
	}
	
    public function get_jonet_data_plans()
    {
        if ($this->session->userdata('admin_login') != TRUE) {
            redirect(base_url(), 'refresh');
        }
    
        // Fetch Jonet VTU API key from the database
        $api_data = $this->db->get_where('apis', ['id' => 1])->row_array();
        $jonet_vtu_key = $api_data['jonet_vtu'] ?? '';
    
        if (empty($jonet_vtu_key)) {
            $this->session->set_flashdata('error_message', 'Jonet VTU API key not configured.');
            redirect('admin/account_settings');
        }
    
        // Prepare API request to Jonet VTU to get data plans
        $api_url = 'https://jonet.com.ng/api_live/v1/get_data_bundles.php';
    
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPGET => true, // Explicitly set to GET method
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $jonet_vtu_key, // Updated Authorization header format (removing "Bearer")
                'Content-Type: application/json'
            ]
        ]);
    
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        echo $http_code . "<br>";
    
        // Process API response
        $data_plans = [];
        if ($http_code == 200) {
            $response_data = json_decode($response, true);
            if ($response_data) {
                $data_plans = $response_data; // The response is structured as per the documentation
            } else {
                $this->session->set_flashdata('error_message', 'Failed to fetch data plans: Invalid response format.');
            }
        } else {
            $this->session->set_flashdata('error_message', 'Error connecting to Jonet VTU API. HTTP Code: ' . $http_code);
        }
    
        print_r($data_plans);
    }
    
    public function announcements()
    {
        if ($this->session->userdata('admin_login') != TRUE)
            redirect(base_url(), 'refresh');
            
        $data['page_title'] = "Announcements";
        $data['announcements'] = $this->crud_model->get_all_announcements();
        
        $this->load->view('Layouts/admin-header', $data);
        $this->load->view('Pages/Admin/announcements', $data);
        $this->load->view('Layouts/admin-footer');
    }
    
    public function create_announcement()
    {
        if ($this->session->userdata('admin_login') != TRUE)
            redirect(base_url(), 'refresh');
    
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'is_active' => $this->input->post('is_active') ? 1 : 0,
            'created_at' => date('Y-m-d H:i:s')
        );
    
        $this->crud_model->create_announcement($data);
        $this->session->set_flashdata('success_message', 'Announcement Created Successfully');
        redirect(base_url('admin/announcements'));
    }
    
    public function edit_announcement($id)
    {
        if ($this->session->userdata('admin_login') != TRUE)
            redirect(base_url(), 'refresh');
    
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'is_active' => $this->input->post('is_active') ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
    
        $this->crud_model->update_announcement($id, $data);
        $this->session->set_flashdata('success_message', 'Announcement Updated Successfully');
        redirect(base_url('admin/announcements'));
    }
    
    public function delete_announcement($id)
    {
        if ($this->session->userdata('admin_login') != TRUE)
            redirect(base_url(), 'refresh');
    
        $this->crud_model->delete_announcement($id);
        $this->session->set_flashdata('success_message', 'Announcement Deleted Successfully');
        redirect(base_url('admin/announcements'));
    }

    public function reverse_payment()
    {
        if ($this->session->userdata('admin_login') != TRUE) {
            $response = ['status' => 'error', 'message' => 'Unauthorized access.'];
            echo json_encode($response);
            return;
        }

        $transaction_id = $this->input->post('transaction_id');
        $user_id = $this->input->post('user_id');
        $amount = $this->input->post('amount');

        // Validate inputs
        if (empty($transaction_id) || empty($user_id) || empty($amount)) {
            $response = ['status' => 'error', 'message' => 'Invalid input data.'];
            echo json_encode($response);
            return;
        }

        // Check if transaction exists and is paid
        $transaction = $this->db->get_where('transactions', ['transaction_id' => $transaction_id, 'status' => 1])->row_array();
        if (!$transaction) {
            $response = ['status' => 'error', 'message' => 'Transaction not found or already reversed.'];
            echo json_encode($response);
            return;
        }

        // Update transaction status to reversed (e.g., status = 3 for reversed)
        $this->db->where('transaction_id', $transaction_id);
        $this->db->update('transactions', ['status' => 3, 'description' => $transaction['description'] . ' [Reversed]']);

        // Refund amount to user's wallet
        $this->crud_model->add_wallet_balance($user_id, $amount);

        // Log the reversal
        $log_data = [
            'user' => $user_id,
            'transaction_type' => 'Payment Reversal',
            'transaction_id' => $transaction_id,
            'amount' => $amount,
            'amount_charged' => 0,
            'date' => date('Y-m-d H:i:s'),
            'description' => 'Reversed payment for transaction ' . $transaction_id,
            'status' => 1
        ];
        $this->db->insert('transactions', $log_data);

        $response = ['status' => 'success', 'message' => 'Payment reversed successfully.'];
        echo json_encode($response);
    }

    public function confirm_payment()
    {
        if ($this->session->userdata('admin_login') != TRUE) {
            $response = ['status' => 'error', 'message' => 'Unauthorized access.'];
            echo json_encode($response);
            return;
        }

        $transaction_id = $this->input->post('transaction_id');

        // Validate input
        if (empty($transaction_id)) {
            $response = ['status' => 'error', 'message' => 'Invalid transaction ID.'];
            echo json_encode($response);
            return;
        }

       // Allow confirming if status is 0 (pending), 2 (failed), or 3 (reversed)
        $transaction = $this->db->where('transaction_id', $transaction_id)
                            ->where_in('status', [0, 2, 3])
                            ->get('transactions')
                            ->row_array();
        if (!$transaction) {
            $response = ['status' => 'error', 'message' => 'Transaction not found or already confirmed.'];
            echo json_encode($response);
            return;
        }

        // Update transaction status to confirmed (status = 1)
        $this->db->where('transaction_id', $transaction_id);
        $this->db->update('transactions', ['status' => 1, 'description' => $transaction['description'] . ' [Confirmed]']);

        $response = ['status' => 'success', 'message' => 'Payment confirmed successfully.'];
        echo json_encode($response);
    }
}
