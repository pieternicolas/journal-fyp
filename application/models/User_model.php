<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_model extends CI_Model {
	
	function __construct()
 	{
   		parent::__construct();
		$this->load->helper('string');
 	}
	
	function login_user($username, $password)
	{
    	$this -> db -> select('*');
    	$this -> db -> from('v1student');
    	$this -> db -> where('v1username', $username);
    	$this -> db -> where('v1hashpass', MD5($password));
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
		$random_id = "V1_" . random_string('numeric',8);
		
		$data = array(
			'v1studentid' => $random_id,
			'v1studfirstname' => $this->input->post('firstname'),
			'v1studlastname' => $this->input->post('lastname'),
			'v1username' => $this->input->post('username'),
			'v1email' => $this->input->post('email'),
			'v1age' => $this->input->post('age'),
			'v1hashpass' => md5($this->input->post('password')),
			'v1studcreateddate' => date('Y-m-d H:i:s')
		);
		
		$dataclear = array (
			'v1password' => $this->input->post('password'),
			'v1studentid' => $random_id
		);
		
		$this->db->insert('v1student',$data);
		$this->db->insert('v1clearpassword',$dataclear);
		return true;
	}
	
	function chgpass_user()
	{
		$current_user = $this->current_session['student_id'];
		$data = array (
			'V1HashPass' => md5($this->input->post('password'))
		);	
		$this->db->where('V1StudentID', $current_user);
		$this->db->update('v1student', $data);
	
		$dataclear = array (
			'V1Password' => $this->input->post('password')
		);
		$this->db->where('V1StudentID', $current_user);
		$this->db->update('v1clearpassword', $dataclear);		
	}
	
	function check_email_exist($email)
	{
		$this->db->select('*');
		$this->db->from('v1student');
		$this->db->where('V1Email',$email);
		$this->db->limit(1);

   		$query = $this->db->get();

   		if($query->num_rows() == 1)
   		{
   			return $query->result();
   		}
   		else
   		{
    		return false;
   		}
	}
	
	function check_password_exist($username, $email)
	{
		$this->db->select('*');
		$this->db->from('v1student');
		$this->db->where('V1UserName',$username);
		$this->db->where('V1Email',$email);
		$this->db->limit(1);
		
		$query = $this->db->get();

   		if($query->num_rows() == 1)
   		{
   			return $query->result();
   		}
   		else
   		{
    		return false;
   		}
	}
	
	function reset_password($username, $new_password, $email)
	{
		$data = array (
			'V1HashPass' => md5($new_password)
		);
		$this->db->where('V1UserName', $username);
		$this->db->update('v1student', $data);
	}
}
?>