<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_user_model','',TRUE);
	}
	
	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('admin/admin_login_view');
	}
 
 	function credential_validation()
 	{
  		$this->load->library('form_validation');

   		$this->form_validation->set_rules('username', 'Username', 'trim|required');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   		if($this->form_validation->run() == FALSE) //credential validation fail
   		{
     		$this->load->view('admin/admin_login_view');
   		}
   		else //credential validation success
   		{
     		redirect('admin_home/switch_version');
   		}

	}

 	function check_database($password)
 	{
   		//parse username
   		$username = $this->input->post('username');
		//query the database
   		$result = $this->admin_user_model->login_user($username, $password);

	   	if(!$result)
	   	{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
	     	return false;
	   	}
	   	else if ($result['0']->AdminStatus == 0)
	   	{
			$this->form_validation->set_message('check_database','This account is disabled');
	     	return false;
	   	}
		else 
		{
			$sess_array = array();
			
	     	foreach($result as $row)
	     	{
	       		$sess_array = array (
				'admin_id' => $row->AdminID,
	         	'username' => $row->AdminUsername,
				'firstname' => $row->AdminFirstName,
				'lastname' => $row->AdminLastName
	       		);
				
	       	$this->session->set_userdata('logged_in', $sess_array);
	    	}
	     	return TRUE;
		}
	}
}
 
?>