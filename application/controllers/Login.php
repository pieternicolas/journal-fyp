<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}
	
	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('login_view');
	}
 
 	function credential_validation()
 	{
  		$this->load->library('form_validation');

   		$this->form_validation->set_rules('username', 'Username', 'trim|required');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   		if($this->form_validation->run() == FALSE) //credential validation fail
   		{
     		$this->load->view('login_view');
   		}
   		else //credential validation success
   		{
     		redirect('home','refresh');
   		}

	}

 	function check_database($password)
 	{
   		//parse username
   		$username = $this->input->post('username');
		//query the database
   		$result = $this->user_model->login_user($username, $password);
	
	   	if($result)
	   	{
	    	$sess_array = array();
			
	     	foreach($result as $row)
	     	{
	       		$sess_array = array (
				'student_id' => $row->V1StudentID,
	         	'username' => $row->V1UserName,
				'firstname' => $row->V1StudFirstName,
				'lastname' => $row->V1StudLastName
	       		);
	       	$this->session->set_userdata('logged_in', $sess_array);
	    	}
	     	return TRUE;
	   	}
	   	else
	   	{
	   		$this->form_validation->set_message('check_database', 'Invalid username or password');
	     	return false;
	   	}
	}
}
 
?>