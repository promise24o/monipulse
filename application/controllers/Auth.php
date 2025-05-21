<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


	public function index()
	{
		$data['page_title'] = "Get Started";
		$this->crud_model->check_login();
		$this->load->view('Layouts/auth-header', $data);
		$this->load->view('Pages/Auth/login');
		$this->load->view('Layouts/auth-footer');
	}

	public function admin()
	{
		$data['page_title'] = "Admin Login";
		$this->crud_model->check_login();
		$this->load->view('Layouts/auth-header', $data);
		$this->load->view('Pages/Auth/admin-login');
		$this->load->view('Layouts/auth-footer');
	}

	public function register()
	{
		$data['page_title'] = "Create Account";
		$this->crud_model->check_login();
		$this->load->view('Layouts/auth-header', $data);
		$this->load->view('Pages/Auth/register');
		$this->load->view('Layouts/auth-footer');
	}
	
	public function forgot_password()
	{
		$data['page_title'] = "Forgot Password";

        $this->load->view('Layouts/auth-header', $data);
		$this->load->view('Pages/Auth/forgot_password');
		$this->load->view('Layouts/auth-footer');
	}
	 

	public function confirm_register()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');
		if ($this->form_validation->run() === FALSE) {
			if (form_error('email') != '') {
				$this->session->set_flashdata('error_message', 'User with this Email Address Already Exists');
				redirect(base_url('create-account'));
			}
			if (form_error('password') != '') {
				$this->session->set_flashdata('error_message', form_error('password'));
				redirect(base_url('create-account'));
			}
		} else {
			$fullname 				=	trim(ucwords($this->input->post('fullname')));
			$email					=	strtolower(trim($this->input->post('email')));
			$encrypted_id			=	random_string('alnum', 100);
			$password				=	$this->input->post('password');
			$data['fullname']		=	$fullname;
			$data['phone']			=	$this->input->post('phone');
			$data['email']			=	$email;
			$data['password']		=	md5($password);
			$data['date_joined']	=	date('F jS, Y | h:i A');
			$data['encrypted_id']	=	$encrypted_id;

			$this->db->insert('users', $data);

			$this->session->set_flashdata('success_message', 'Registered Successfully');
			redirect(base_url('get-started'));
		}
	}

	function confirm_login()
	{
		$email    = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$user_status = $this->crud_model->validate($email, $password);

		if ($user_status == 'admin') {
			redirect('admin/dashboard');
		} else if ($user_status == 'user') {
			redirect('user/dashboard');
		} else {
			$this->session->set_flashdata('error_message', 'Incorrect Email Address or Password');
			redirect(base_url('get-started'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('success_message', 'Logout Successfully');
		redirect(base_url(), 'refresh');
	}
	
	
	public function process_forgot_password() {
        $email = $this->input->post('email', TRUE); 
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error_message', 'Please enter a valid email address.');
            redirect('forgot-password');
            return;
        }
    
        $user = $this->crud_model->get_user_by_email($email);
    
        if ($user) {
            $new_password = random_string('alnum', 10);
            $hashed_password = md5($new_password);
    
            if ($this->crud_model->update_password_by_email($email, $hashed_password)) {
                $user_name = isset($user->fullname) ? $user->fullname : (isset($user->fullname) ? $user->fullname : 'User');
    
                if ($this->email_model->send_forgot_password_email($email, $new_password, $user_name)) {
                    $this->session->set_flashdata('success_message', 'A new password has been sent to your email address. Please check your inbox (and spam folder).');
                } else {
                    $this->session->set_flashdata('error_message', 'Could not send the new password. Please try again later or contact support.');
                }
            } else {
                $this->session->set_flashdata('error_message', 'Failed to update password. Please try again.');
            }
        } else {
            log_message('info', 'Forgot Password attempt for non-existent email: ' . $email);
            $this->session->set_flashdata('success_message', 'If an account with that email exists, a new password has been sent.');
        }
    
        redirect('forgot-password');
    }
}
