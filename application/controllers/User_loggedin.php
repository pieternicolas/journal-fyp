<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_loggedin extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}
	
    function change_password()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('current', 'Current Password', 'required|callback_check_database');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]');
		
		if($this->form_validation->run() == FALSE)
   		{
     		$this->load->view('changepass_view');
   		}
   		else
   		{
			$this->user_model->chgpass_user();
     		redirect ('home','refresh');
   		}
	}
	
	function check_database($current)
 	{
		$username = $this->current_session['username'];
   		$result = $this->user_model->login_user($username, $current);
	
	   	if($result)
	   	{
	     	return TRUE;
	   	}
	   	else
	   	{
	   		$this->form_validation->set_message('check_database', 'Invalid password');
	     	return false;
	   	}
	}
	
	function bug_report()
	{
		$this->load->view('help/bug_view');
	}
	
	function mail_bugreport()
	{
		$this->load->library('email');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('help/bug_view');
		}
		else
		{
			$bug_title = $this->input->post('title');
			$bug_content = $this->input->post('content');
			
			$this->email->from('touchfyp@outlook.com', 'Touch cybersecurity journal');
			$this->email->to('touchfyp@outlook.com');
			
			$this->email->subject('Bug report - ' . $bug_title);
			$this->email->message(
			'Student Name: ' . $this->current_session['firstname'] . " " . $this->current_session['lastname'] . '<br>' . 
			'Student ID: ' . $this->current_session['student_id'] . '<br>' .
			'Bug report: ' . $bug_content
			);
			
			$this->email->send();
			
			redirect('home','refresh');
		}
	}
	
	function ver2() 
	{
		$this->load->view('changepass2');
	}
	
	function ver3()
	{
		$this->load->view('changepass3');
	}
	
}
?>