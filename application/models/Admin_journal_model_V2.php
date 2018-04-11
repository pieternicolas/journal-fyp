<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_journal_model_V2 extends CI_Model {
	
	function __construct()
 	{
   		parent::__construct();
		$this->load->helper('string');
 	}
	
	function record_count() 
	{
        return $this->db->count_all('v2journal');
    }
	
	function get_journal_main($limit, $start)
	{
		$this->db->select('v2student.V2StudentID, v2student.V2StudFirstName, v2student.V2StudLastName, v2journal.V2JournalID, v2journal.V2Title, SUBSTRING(v2journal.V2Content,1,400) as V2Content, v2journal.V2LastChanged'); 
		$this->db->from('v2student');
		$this->db->join('v2journal','v2student.V2StudentID = v2journal.V2StudentID');
		$this->db->order_by('V2LastChanged','DESC');
		$this->db->limit($limit, $start);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_journal($journal_id = FALSE)
	{		
        if ($journal_id === FALSE)
        {	
			$this->db->select('V2student.V2StudentID, V2student.V2StudFirstName, V2student.V2StudLastName, V2journal.V2JournalID, V2journal.V2Title, V2journal.V2Content, V2journal.V2LastChanged'); 
			$this->db->from('V2student');
			$this->db->join('V2journal','V2student.V2StudentID = V2journal.V2StudentID');
			$this->db->order_by('V2LastChanged','ASC');
			$this->db->limit(5);
		
            $query = $this->db->get();
            return $query->result_array();
		}

		$this->db->select('v2student.V2StudentID, v2student.V2StudFirstName, v2student.V2StudLastName, v2journal.V2JournalID, v2journal.V2Title, v2journal.V2Content, v2journal.V2LastChanged'); 
		$this->db->where('V2journalid',$journal_id);
		$this->db->from('v2student');
		$this->db->join('v2journal','v2student.V2StudentID = v2journal.V2StudentID');

        $query = $this->db->get();
        return $query->row_array();
	}
	
public function search_journal($search_term, $search_month)
    {	
		if ($search_month == " ")
		{
			$search_month = NULL;
		}

		$this->db->select('v2student.V2StudentID, v2student.V2StudFirstName, v2student.V2StudLastName, v2journal.V2JournalID, v2journal.V2Title, v2journal.V2Content, v2journal.V2LastChanged'); 
		$this->db->from('v2student');
		$this->db->join('v2journal','v2student.V2StudentID = v2journal.V2StudentID');		
		
		if (isset($search_month))
		{
			$this->db->where('MONTH(V2LastChanged)', $search_month);
		}
	
		if (isset($search_term))
		{
       		$this->db->like('V2Content',$search_term);
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