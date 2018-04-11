<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_user_model','',TRUE);
	}
	
	function create_user()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.adminusername]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]');

		
		if($this->form_validation->run() == FALSE)
   		{
     		$this->load->view('admin/Admin_signup_view');
   		}
   		else
   		{
			$this->admin_user_model->create_user();
     		redirect('admin_home', 'refresh');
   		}
	}
	
	function change_password()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('current', 'Current Password', 'required|callback_check_database');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]');
		
		if($this->form_validation->run() == FALSE)
   		{
     		$this->load->view('admin/admin_changepass_view');
   		}
   		else
   		{
			$this->admin_user_model->chgpass_user();
     		redirect ('admin_home','refresh');
   		}
	}
	
	function check_database($current)
 	{
		$username = $this->current_session['username'];
   		$result = $this->admin_user_model->login_user($username, $current);
	
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
	
	function view_admins() 
	{
		$current_admin = $this->current_session['admin_id'];
		$data['admin_list'] = $this->admin_user_model->get_admins($current_admin);
		
		$this->load->view('template/admin_home_header', $this->current_session['username']);
		$this->load->view('admin/admin_list_view',$data);
		$this->load->view('template/home_footer');
	}
	
	function toggle_status($id,$status)
	{
		if ($status == 1)
		{
			$updated = FALSE;
		}
		else
		{
			$updated = TRUE;
		}
		$this->admin_user_model->toggle_admin($id,$updated);
		
		$this->view_admins();
	}
}
?>