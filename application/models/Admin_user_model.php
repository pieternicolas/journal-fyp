<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Admin_user_model extends CI_Model {
	
	function __construct()
 	{
   		parent::__construct();
		$this->load->helper('string');
 	}
	
	function login_user($username, $password)
	{
    	$this -> db -> select('*');
    	$this -> db -> from('admin');
    	$this -> db -> where('adminusername', $username);
    	$this -> db -> where('adminhashpassword', MD5($password));
    	$this -> db -> limit(1);

   		$query = $this -> db -> get();

   		if($query -> num_rows() == 1)
   		{
   			return $query->result();
   		}
   		else
   		{
    		return false;
   		}
 	}
	
	function create_user()
	{
		$random_id = random_string('numeric',8);
		$data = array(
			'adminid' => $random_id,
			'adminfirstname' => $this->input->post('firstname'),
			'adminlastname' => $this->input->post('lastname'),
			'adminusername' => $this->input->post('username'),
			'adminhashpassword' => md5($this->input->post('password'))
		);
		
		$dataclear = array (
			'adminpassword' => $this->input->post('password'),
			'adminid' => $random_id
		);
		
		$this->db->insert('admin',$data);
		$this->db->insert('adminpassword',$dataclear);
		return true;
	}
	
	function chgpass_user()
	{
		$current_user = $this->current_session['admin_id'];
		$data = array (
			'ADMINHASHPASSWORD' => md5($this->input->post('password'))
		);	
		$this->db->where('ADMINID', $current_user);
		$this->db->update('admin', $data);
	
		$dataclear = array (
			'ADMINPASSWORD' => $this->input->post('password')
		);
		$this->db->where('ADMINID', $current_user);
		$this->db->update('adminpassword', $dataclear);		
	}
	
	function get_admins($current_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('ADMINID !=', $current_admin);
		$this->db->where('ADMINID !=', '12345678');
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	function toggle_admin($admin_id,$admin_status)
	{		
		
		$data = array (
			'ADMINSTATUS' => $admin_status
		);

		$this->db->where('ADMINID',$admin_id);
		$this->db->update('admin',$data);
	}
}
?>