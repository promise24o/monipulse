<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	 
	public function index()
	{
		$data['page_title'] = "Home";

		$this->load->view('Layouts/header', $data);
		$this->load->view('Pages/Landing/index');
		$this->load->view('Layouts/footer');
	}
	 
	public function contact()
	{
		$data['page_title'] = "Contact Us";

		// Retrieve social data
		$social_data = $this->crud_model->get_social_data();
		$data['social_data'] = $social_data;

		$this->load->view('Layouts/header', $data);
		$this->load->view('Pages/Landing/contact');
		$this->load->view('Layouts/footer');
	}
}
