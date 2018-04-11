<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {

	function __construct()
 	{
   		parent::__construct();
		$this->load->model('journal_model');
 	}

	function pagination()
	{
		$total_rows = $this->journal_model->record_count();
		$number_of_page = ($total_rows / 5);
		
		$page_number = array();
		
		for ($i=0; $i<$number_of_page; $i++)
		{
			$page_number[$i] = $i + 1;
		}
		
		return $page_number;
	}

	function index($page = 1)
 	{
		$offset = ($page - 1) * 5;
		
		$data['username'] = $this->current_session['username'];
		$data['journal'] = $this->journal_model->get_journal_main(5, $offset);
		$data['paging'] = $this->pagination();
	
		$this->load->view('template/home_header', $data);
		if ($data['journal'] == NULL)
		{
			$this->load->view('errors/empty_journal');
		}
		else
		{
			$this->load->view('home_view', $data);
		}
		$this->load->view('template/home_footer');
 	}

	function logout()
	{
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('home', 'refresh');
 	}
}

?>