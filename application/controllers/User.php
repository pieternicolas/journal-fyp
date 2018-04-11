<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}
	
	function create_user()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[v1student.v1username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[v1student.v1email]');
		$this->form_validation->set_rules('age', 'Age', 'required|callback_checkage');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]');

		if($this->form_validation->run() == FALSE)
   		{
     		$this->load->view('Signup_view');
   		}
   		else
   		{
			$this->user_model->create_user();
     		redirect('login', 'refresh');
   		}
	}
	
	function checkage($age)
	{
		if ($age > 18 || $age < 12)
		{
			$this->form_validation->set_message('checkage','Invalid age group (12 to 18 years old)');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function ver2() 
	{
		$this->load->view('signup2');
	}
	
	function ver3()
	{
		$this->load->view('signup3');
	}
}
?>