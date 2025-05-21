<?php
class Crud_model extends CI_Model
{

	////////LOGIN VALIDATION//////////
	function validate($email = '', $password = '')
	{
		$user_credential = array('email' => $email, 'password' => MD5($password));

		// Checking login credential for Users
		$query = $this->db->get_where('users', $user_credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('user_login', TRUE);
			$this->session->set_userdata('user_id', $row->id);
			$this->session->set_userdata('user_encrypted_id', $row->encrypted_id);
			$this->session->set_userdata('user_fullname', $row->fullname);
			$this->session->set_userdata('user_reg_payment', $row->reg_payment);
			$this->session->set_userdata('user_email', $row->email);
			$this->session->set_userdata('logged_in', TRUE);
			return 'user';
		}

		$query = $this->db->get_where('admin', $user_credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('admin_login', TRUE);
			$this->session->set_userdata('admin_id', $row->id);
			$this->session->set_userdata('admin_encrypted_id', $row->encrypted_id);
			$this->session->set_userdata('admin_fullname', $row->name);
			$this->session->set_userdata('admin_email', $row->email);
			$this->session->set_userdata('logged_in', TRUE);
			return 'admin';
		}
	}

	////////CACHE CONTROL//////////
	function clear_cache()
	{
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	////////IMAGE URL//////////
	function get_image_url($type = '', $id = '')
	{
		if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
			$image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
		else
			$image_url = base_url() . 'uploads/user.png';

		return $image_url;
	}

	function check_login()
	{
		if ($this->session->userdata('user_login') === TRUE) {
			redirect(base_url('user/dashboard'));
		}

		if ($this->session->userdata('admin_login') === TRUE)
		redirect(base_url('admin/dashboard'), 'refresh');
	}

	public function get_social_data()
	{
		$this->db->where('id', 1);  
		$query = $this->db->get('social_settings');

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null; 
		}
	}

	public function get_api_data()
	{
		$this->db->where('id', 1);  
		$query = $this->db->get('apis');

		// Check if there is a row
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return array();  
		}
	}

	public function change_admin_password($admin_id, $current_password, $new_password)
	{
		$admin = $this->db->get_where('admin', ['id' => $admin_id])->row();

		if ($admin && md5($current_password) === $admin->password) {
			// Current password is correct, proceed to change the password
			$hashed_password = md5($new_password);
			$this->db->where('id', $admin_id);
			$this->db->update('admin', ['password' => $hashed_password]);

			return true; // Password changed successfully
		} else {
			return false; // Current password is incorrect
		}
	}

	public function getSecretKey($apiName)
	{
		// Fetch the API secret key from the database based on the provided API name
		$query = $this->db->get_where('apis', array('id' => 1));
		$result = $query->row()->$apiName;
		if ($result) {
			return $result;
		} else {
			// Handle the case where the API key is not found
			return null;
		}
	}

	public function update_user_wallet($data)
	{
		// Check if the user's wallet already exists
		$existingWallet = $this->db->get_where('wallets', ['user' => $data['user']])->row();

		if ($existingWallet) {
			// Update the existing wallet
			$this->db->where('user', $data['user']);
			$this->db->update('wallets', [
				'amount' => $existingWallet->amount + $data['amount'],
				'last_updated' => $data['last_updated'],
			]);
		} else {
			// Create a new wallet entry if it doesn't exist
			$this->db->insert('wallets', [
				'user' => $data['user'],
				'amount' => $data['amount'],
				'last_updated' => $data['last_updated'],
			]);
		}
	}

	public function get_user_wallet_balance($userEncryptedId)
	{
		// Assuming you have a table named 'wallets' with fields 'user', 'amount', 'last_updated'
		$this->db->select('amount');
		$this->db->from('wallets');
		$this->db->where('user', $userEncryptedId);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row();
			return $result->amount;
		} else {
			return 0; // Return 0 if the user's wallet record is not found
		}
	}
	
    public function active_vtu()
    {
        return $this->db->get_where('apis', ['id' => 1])->row()->active_vtu;
    }
	
	public function insert_transaction($data)
	{
		$this->db->insert('transactions', $data);
	}

	public function update_transaction_status($transactionId, $data)
	{
		// Update the status in the transactions table based on the transaction ID
		$this->db->where('transaction_id', $transactionId);
		$this->db->update('transactions', $data);
	}

	public function get_user_wallet($userId)
	{
		// Assuming 'wallets' is the name of your wallets table
		return $this->db->get_where('wallets', ['user' => $userId])->row();
	}

	public function get_user_transactions($userId)
	{
		// Assuming 'transactions' is the name of your transactions table
		$this->db->order_by('date', 'desc'); // Order by date in descending order
		return $this->db->get_where('transactions', ['user' => $userId])->result();
	}

    public function get_transaction_by_ref($ref)
    {
        $this->db->where('transaction_id', $ref);
        return $this->db->get('transactions')->row_array();
    }

    public function update_transaction_by_ref($ref, $data)
    {
        $this->db->where('transaction_id', $ref);
        return $this->db->update('transactions', $data);
    }

    public function log_webhook_error($service, $message)
    {
        $data = [
            'service' => $service,
            'message' => $message,
            'raw_data' => json_encode($this->input->request_headers()) . ' | ' . $this->input->raw_input_stream,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('webhook_logs', $data);
    }

    public function log_webhook_success($service, $message)
    {
        $data = [
            'service' => $service,
            'message' => $message,
            'raw_data' => json_encode($this->input->request_headers()) . ' | ' . $this->input->raw_input_stream,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('webhook_logs', $data);
    }


	public function update_airtime_discounts($data)
	{
		// Check if there is already a record with id 1
		$existing_data = $this->db->get_where('airtime_discounts', ['id' => 1])->row();

		if ($existing_data) {
			// Update existing record
			$this->db->where('id', 1);
			$this->db->update('airtime_discounts', $data);
		} else {
			$this->db->insert('airtime_discounts', $data);
		}
	}

	public function get_airtime_discounts()
	{
		return $this->db->get_where('airtime_discounts', ['id' => 1])->row_array();
	}

	public function get_cable_discounts()
	{
		return $this->db->get('cable_discounts')->result_array();
	}
	
	public function get_all_users()
	{
		return $this->db->get('users')->result_array();
	}

	public function get_all_transactions()
	{
		return $this->db->get('transactions')->result_array();
	}

	public function get_cable_discount($discount_id)
	{
		return $this->db->get_where('cable_discounts', ['id' => $discount_id])->row()->ResellerPercentage;
	}

	public function deduct_wallet_balance($userEncryptedId, $amount)
	{
		// Fetch the current wallet balance
		$currentBalance = $this->get_user_wallet_balance($userEncryptedId);

		// Check if the wallet balance is sufficient for the deduction
		if ($currentBalance >= $amount) {
			// Deduct the amount from the current balance
			$newBalance = $currentBalance - $amount;

			// Update the user's wallet balance
			$this->db->where('user', $userEncryptedId);
			$this->db->update('wallets', ['amount' => $newBalance]);

			return true; // Indicate successful deduction
		}

		return false; // Insufficient balance
	}

    public function add_wallet_balance($userEncryptedId, $amount)
    {
        // Fetch the current wallet balance
        $currentBalance = $this->get_user_wallet_balance($userEncryptedId);

        // Add the amount to the current balance
        $newBalance = $currentBalance + $amount;

        // Update the user's wallet balance
        $this->db->where('user', $userEncryptedId);
        $this->db->update('wallets', ['amount' => $newBalance]);

        return true; // Indicate successful addition
    }


	public function get_today_sales()
	{
		$today = date('Y-m-d');
		$this->db->select_sum('amount');
		$this->db->where('user', $this->session->userdata('user_encrypted_id'));
		$this->db->where('date >=', $today . ' 00:00:00');
		$this->db->where('date <=', $today . ' 23:59:59');
		$query = $this->db->get('transactions');

		return $query->row()->amount;
	}

	public function get_today_revenue()
	{
		$today = date('Y-m-d');
		$this->db->select_sum('amount');
		$this->db->where('transaction_type !=', 'Funding Wallet');
		$this->db->where('date >=', $today . ' 00:00:00');
		$this->db->where('date <=', $today . ' 23:59:59');
		$query = $this->db->get('transactions');

		$result = $query->row();
		return $result ? $result->amount : 0;
	}


	public function getDataTypesByNetwork($networkId)
	{
		// Map network IDs to their corresponding names
		$networkNames = [
			'1' => 'Mtn',
			'2' => '9mobile',
			'3' => 'Glo',
			'4' => 'Airtel',
		];

		// Get the network name based on the provided network ID
		$networkName = $networkNames[$networkId] ?? '';

		$this->db->distinct();
		$this->db->select('type');
		$this->db->where('network_name', $networkName);
		$query = $this->db->get('data_plans');

		return $query->result_array();
	}

	public function getPlanTypesByNetwork($networkId, $dataType)
	{
		// Map network IDs to their corresponding names
		$networkNames = [
			'1' => 'Mtn',
			'2' => '9mobile',
			'3' => 'Glo',
			'4' => 'Airtel',
		];

		// Get the network name based on the provided network ID
		$network_name = $networkNames[$networkId] ?? '';

		$this->db->where('network_name', $network_name);
		$this->db->where('type', $dataType);
		$query = $this->db->get('data_plans');

		return $query->result_array();
	}

	public function getPlanPrice($plan)
	{
		// Assuming 'data_plans' is the name of your table
		$this->db->where('id', $plan);
		$query = $this->db->get('data_plans');
		$result = $query->row_array();
		// Check if a result is found
		if (!empty($result)) {
			// Assuming 'price' is the column in your 'data_plans' table that holds the price
			$price = $result['price'];
			// Return the price
			return $price;
		} else {
			// If no result is found, you might want to handle this case accordingly
			return null;
		}
	}

	public function get_user_by_id($userEncryptedId)
	{
		return $this->db
			->where('encrypted_id', $userEncryptedId)
			->get('users')
			->row_array();
	}

	public function get_reg_payment_status()
	{
		$this->db->where('encrypted_id', $this->session->userdata('user_encrypted_id')); 
		$query = $this->db->get('users')->row()->reg_payment; 
		return $query;
	}

	public function update_req_payment()
	{
		$this->db->where('encrypted_id', $this->session->userdata('user_encrypted_id'));
		$query = $this->db->update('users', array("reg_payment" => 1));

		// Check if the update was successful
		if ($query) {
			return true;
		} else {
			return false;
		}
	} 

	public function update_user($userEncryptedId, $updateData)
	{
		$this->db
			->where('encrypted_id', $userEncryptedId)
			->update('users', $updateData);

		return $this->db->affected_rows();
	}

	public function get_user_fullname($userEncryptedId)
	{
		$query = $this->db->get_where('users', array('encrypted_id' => $userEncryptedId));
		return $query->row()->fullname;
	}

    // Fetch Data24 data plans from the data_plans table
    public function get_data24_data_plans()
    {
        return $this->db->get('data_plans')->result_array();
    }
    
    // Fetch Jonet data plans from the jonet_dataplans table
    public function get_jonet_data_plans()
    {
        return $this->db->get('jonet_dataplans')->result_array();
    }
    
    // Optional: If you still need a method to fetch all data plans (combined)
    public function get_all_data_plans()
    {
        // You can combine both tables if needed, but for now, we'll keep them separate
        $data24_plans = $this->db->get('data_plans')->result_array();
        $jonet_plans = $this->db->get('jonet_dataplans')->result_array();
        return array_merge($data24_plans, $jonet_plans);
    }
    
    public function get_jonet_data_plans_by_network($network)
    {
        $this->db->where('network', $network);
        $this->db->where('status', 'AVAILABLE');
        return $this->db->get('jonet_dataplans')->result_array();
    }
    
    public function get_data24_data_plans_by_network($network)
    {
        $this->db->where('network_name', $network);
        $this->db->where('status', 'AVAILABLE');
        return $this->db->get('data_plans')->result_array();
    }

    public function get_all_announcements()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('announcements')->result_array();
    }
    
    public function create_announcement($data)
    {
        return $this->db->insert('announcements', $data);
    }
    
    public function update_announcement($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('announcements', $data);
    }
    
    public function delete_announcement($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('announcements');
    }
    
    public function get_announcement($id)
    {
        return $this->db->get_where('announcements', ['id' => $id])->row_array();
    }
    
    public function get_active_announcements($user_id)
    {
        // Build the subquery for announcement_views
        $subquery = $this->db->select('announcement_id')
                             ->from('announcement_views')
                             ->where('user_id', $user_id)
                             ->get_compiled_select();
    
        // Main query
        $this->db->select('a.*')
                 ->from('announcements a')
                 ->where('a.is_active', 1)
                 ->where_not_in('a.id', "($subquery)", FALSE)
                 ->order_by('a.created_at', 'DESC');
    
        $query = $this->db->get();
        return $query->result_array();
    }
    
     public function update_password_by_email($email, $new_password_hash) {
        $this->db->where('email', $email);
        return $this->db->update('users', array('password' => $new_password_hash)); 
    }
    
     public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->row();  
        }
        return null;
    }

}
