<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Help extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->library('email');
 	}
	
	function forget_username()
	{
		$this->load->view('help/username_view');
	}
	
	function mail_username()
	{		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('help/username_view');
		}
		else
		{
			redirect('login','refresh');
		}
	}
	
	function check_email($email)
	{		
		$result = $this->user_model->check_email_exist($email);
		
		if (!$result)
		{
			$this->form_validation->set_message('check_email', 'Invalid email');
			return false;
		}
		else
		{
			$username = $result['0']->V1UserName;
			$this->email->from('touchfyp@outlook.com', 'Touch cybersecurity journal');
			$this->email->to($email);
			
			$this->email->subject('Forget username');
			$this->email->message('Your username for email ' . $email . ' is: ' . $username);
			
			$this->email->send();
			
			return true;
		}
	}
	
	function forget_password()
	{
		$this->load->view('help/password_view');
	}
	
	function reset_password()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_password');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('help/password_view');
		}
		else
		{
			redirect('login','refresh');
		}
	}
	
	function check_password($email)
 	{		
		$this->load->helper('string');
		
   		$username = $this->input->post('username');
   		$result = $this->user_model->check_password_exist($username, $email);

	   	if(!$result)
	   	{
			$this->form_validation->set_message('check_password', 'Invalid username or email');
			return false;
		}
		else 
		{
			$new_password = random_string('alnum',8);	
			
			$this->user_model->reset_password($username, $new_password, $email);
			
			$this->email->from('touchfyp@outlook.com', 'Touch cybersecurity journal');
			$this->email->to($email);
		
			$this->email->subject('Forget password');
			$this->email->message('Your password of your account with the username ' . $username . ' has been reset. Please enter with your temporary password: ' . $new_password . ' to login and change your password within the system after login.');
		
			$this->email->send();
			
			return true;
		}
	}
}