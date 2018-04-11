<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_journal extends MY_Controller {

	function __construct()
 	{
   		parent::__construct();
		$this->load->model('admin_journal_model_V1');
		$this->load->model('admin_journal_model_V2');
		$this->load->model('admin_journal_model_V3');
		$this->load->library('form_validation');
 	}
	
	function view($version = 'V1',$id = NULL)
	{
		$model_version = 'admin_journal_model_' . $version;
		
		$data['journal_item'] = $this->$model_version->get_journal($id);
		if (empty($data['journal_item']))
		{
			show_404();
		}
		$data['version'] = $version;
		
		$this->load->view('template/admin_home_header', $this->current_session['username']);
		$this->load->view('admin/journal/view_journal_' . $version, $data);
		$this->load->view('template/home_footer');
	}
	
	public function search($search_term = NULL,$search_version = NULL,$search_month = NULL)
	{
		$search_term = $this->input->post('search');
		$search_month = $this->input->post('searchmonth');
		$search_version = $this->input->post('searchversion');
		
		$model_version = 'admin_journal_model_' . $search_version;
		
		$data['results_V1'] = NULL;
		$data['results_V2'] = NULL;
		$data['results_V3'] = NULL;
		
		if ($search_version == " ")
		{
			$data['results_V1'] = $this->admin_journal_model_V1->search_journal($search_term, $search_month);
			$data['results_V2'] = $this->admin_journal_model_V2->search_journal($search_term, $search_month);
			$data['results_V3'] = $this->admin_journal_model_V3->search_journal($search_term, $search_month);
		}
		else
		{
			$data['results_' . $search_version] = $this->$model_version->search_journal($search_term, $search_month);
		}
		
		$this->load->view('template/admin_home_header', $this->current_session['username']);
		if ($data['results_V1'] == NULL && $data['results_V2'] == NULL && $data['results_V3'] == NULL)
		{
			$this->load->view('errors/empty_search');
		}
		else
		{
			if ($search_version == " ")
			{
				$this->load->view('admin/journal/search_result_V1',$data);
				$this->load->view('admin/journal/search_result_V2',$data);
				$this->load->view('admin/journal/search_result_V3',$data); 
			}
			else
			{
				$this->load->view('admin/journal/search_result_' . $search_version,$data); 
			}
		}
		$this->load->view('template/home_footer');	
	}
}
?>