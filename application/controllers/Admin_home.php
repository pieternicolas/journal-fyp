<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_home extends MY_Controller {

	function __construct()
 	{
   		parent::__construct();
		$this->load->model('admin_journal_model_V1');
		$this->load->model('admin_journal_model_V2');
		$this->load->model('admin_journal_model_V3');
 	}

	function switch_version()
	{
		if (! $this->input->post('version'))
		{
			$version = 'V1';
		}
		else
		{
			$version = $this->input->post('version');
		}
				
		redirect('admin_home/' . $version . "/" . 1);
	}

	function index($version = 'V1', $page = 1)
 	{	
		$model_version = 'admin_journal_model_' . $version;
		
		$total_rows = $this->$model_version->record_count();
		$number_of_page = ($total_rows / 5);
		
		$page_number = array();
		
		for ($i=0; $i<$number_of_page; $i++)
		{
			$page_number[$i] = $i + 1;
		}
		
		$offset = ($page - 1) * 5;

		$data['username'] = $this->current_session['username'];
		$data['journal'] = $this->$model_version->get_journal_main(5 , $offset);
		$data['version'] = $version;
		$data['paging'] = $page_number;
		
		$this->load->view('template/admin_home_header', $this->current_session['username']);
		$this->load->view('admin/admin_home_view');
		if ($data['journal'] == NULL)
		{
			$this->load->view('errors/empty_journal');
		}
		else
		{
			$this->load->view('admin/admin_home_content_'.$version, $data);
		}
		$this->load->view('template/home_footer');
 	}

	function logout()
	{
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('admin_login', 'refresh');
 	}
}

?>