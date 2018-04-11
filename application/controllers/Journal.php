<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Journal extends MY_Controller {

	function __construct()
 	{
   		parent::__construct();
		$this->load->model('journal_model');
		$this->load->library('form_validation');
 	}
	
	function view($id = NULL)
	{
		$data['journal_item'] = $this->journal_model->get_journal($id);
		if (empty($data['journal_item']))
		{
			show_404();
		}
		
		$data['title'] = $data['journal_item']['V1Title'];
		
		$this->load->view('template/home_header', $this->current_session['username']);
		$this->load->view('journal/view_journal', $data);
		$this->load->view('template/home_footer');
	}
	
	function create()
	{	
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/home_header', $this->current_session['username']);
			$this->load->view('journal/create');
			$this->load->view('template/home_footer');
		}
		else
		{
			$this->journal_model->set_journal();
			redirect('home', 'refresh');
		}
	}
	
	function fetch($id = NULL)
	{
		$data['journal_item'] = $this->journal_model->get_journal($id);
		if (empty($data['journal_item']))
		{
			show_404();
		}
		
		$data['journal_id'] = $data['journal_item']['V1JournalID'];
		$data['title'] = $data['journal_item']['V1Title'];
		$data['content'] = $data['journal_item']['V1Content'];
		
		$this->load->view('template/home_header', $this->current_session['username']);
		$this->load->view('journal/edit_journal', $data);
		$this->load->view('template/home_footer');
	}
	
	function edit()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		
		$journal_id1 = $this->input->post('journal_id');
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->fetch($journal_id1);
		}
		else
		{
			$this->journal_model->set_journal();
			redirect('home', 'refresh');
		}
	}
	
	function delete($id)
	{
		$this->journal_model->delete_journal($id);
		redirect('home');
	}
	
	public function search($search_term = NULL, $search_month = NULL)
	{
		$search_term = $this->input->post('search');
		$search_month = $this->input->post('searchmonth');
		$data['results'] = $this->journal_model->search_journal($search_term, $search_month);
		
		$this->load->view('template/home_header', $this->current_session['username']);
		if ($data['results'] == NULL)
		{
			$this->load->view('errors/empty_search');
		}
		else
		{
			$this->load->view('journal/search_result',$data); 
		}
		$this->load->view('template/home_footer');	
	}
}
?>