<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal_model extends CI_Model {
	
	function __construct()
 	{
   		parent::__construct();
		$this->load->helper('string');
 	}
	
	function record_count() 
	{
		$this->db->where('V1StudentID', $this->current_session['student_id']);
        return $this->db->count_all_results('v1journal');
    }
	
	function get_journal_main($limit, $start)
	{
		$student_id = $this->current_session['student_id'];
		
		$this->db->select('V1JournalID, V1Title, SUBSTRING(V1Content,1,400) as V1Content, V1LastChanged');
		$this->db->where('V1StudentID',$student_id);
		$this->db->order_by('V1LastChanged','DESC');
		$this->db->limit($limit, $start);
		
        $query = $this->db->get('v1journal');
        return $query->result_array();
	}
	
	function get_journal($journal_id = FALSE)
	{
		$student_id = $this->current_session['student_id'];
		
        if ($journal_id === FALSE)
        {	
			$this->db->select('V1JournalID, V1Title, SUBSTRING(V1Content,1,400) as V1Content, V1LastChanged');
			$this->db->where('v1studentid',$student_id);
			$this->db->order_by('V1LastChanged','DESC');
			$this->db->limit(5);
            $query = $this->db->get('v1journal');
            return $query->result_array();
        }

        $query = $this->db->get_where('v1journal', array('v1journalid' => $journal_id));
        return $query->row_array();
	}
	
	function set_journal()
	{
		$journal_id = $this->input->post('journal_id');
		
		if (!$journal_id)
		{
			$journal_id = random_string('alnum',16);
			$update_method = "insert";
		}
		else
		{
			$update_method = "replace";
		}
		
		$data = array(
			'v1journalid' => $journal_id,
			'v1title' => $this->input->post('title'),
			'v1content' => nl2br($this->input->post('content')),
			'v1lastchanged' => date('Y-m-d H:i:s'),
			'v1studentid' => $this->current_session['student_id']
		);
		
		return $this->db->$update_method('v1journal', $data);
	}
	
	function delete_journal($journal_id)
	{
		$this->db->where('v1journalid', $journal_id);
		$this->db->where('v1studentid', $this->current_session['student_id']);
		$this->db->delete('v1journal');
	}
	
	public function search_journal($search_term, $search_month)
    {	
		if ($search_month == " ")
		{
			$search_month = NULL;
		}
		
        $this->db->select('V1JournalID, V1Title, SUBSTRING(V1Content,1,400) as V1Content, V1LastChanged');
        $this->db->from('v1journal');
		$this->db->where('v1studentid', $this->current_session['student_id']);
		
		if (isset($search_month))
		{
			$this->db->where('MONTH(V1LastChanged)', $search_month);
		}
	
		if (isset($search_term))
		{
       		$this->db->like('v1content',$search_term);
		}
		else
		{
			$this->db->limit(10);
		}

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
		if(!$query)
		{
			show_404();
		}
		else
		{
        	return $query->result_array();
		}
    }
}
?>