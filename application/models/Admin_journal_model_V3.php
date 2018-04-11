<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_journal_model_V3 extends CI_Model {
	
	function __construct()
 	{
   		parent::__construct();
		$this->load->helper('string');
 	}
	
	function record_count() 
	{
        return $this->db->count_all('v3journal');
    }
	
	function get_journal_main($limit, $start)
	{
		$this->db->select('v3student.V3StudentID, v3student.V3StudFirstName, v3student.V3StudLastName, v3journal.V3JournalID, v3journal.V3Title, SUBSTRING(v3journal.V3Content,1,400) as V3Content, v3journal.V3LastChanged'); 
		$this->db->from('v3student');
		$this->db->join('v3journal','v3student.V3StudentID = v3journal.V3StudentID');
		$this->db->order_by('V3LastChanged','DESC');
		$this->db->limit($limit, $start);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_journal($journal_id = FALSE)
	{		
        if ($journal_id === FALSE)
        {	
			$this->db->select('v3student.V3StudentID, v3student.V3StudFirstName, v3student.V3StudLastName, v3journal.V3JournalID, v3journal.V3Title, v3journal.V3Content, v3journal.V3LastChanged'); 
			$this->db->from('v3student');
			$this->db->join('v3journal','v3student.V3StudentID = v3journal.V3StudentID');
			$this->db->order_by('V3LastChanged','ASC');
			$this->db->limit(5);
		
            $query = $this->db->get();
            return $query->result_array();
		}

		$this->db->select('v3student.V3StudentID, v3student.V3StudFirstName, v3student.V3StudLastName, v3journal.V3JournalID, v3journal.V3Title, v3journal.V3Content, v3journal.V3LastChanged'); 
		$this->db->where('V3journalid',$journal_id);
		$this->db->from('v3student');
		$this->db->join('v3journal','v3student.V3StudentID = v3journal.V3StudentID');

        $query = $this->db->get();
        return $query->row_array();
	}
	
public function search_journal($search_term, $search_month)
    {	
		if ($search_month == " ")
		{
			$search_month = NULL;
		}

		$this->db->select('v3student.V3StudentID, v3student.V3StudFirstName, v3student.V3StudLastName, v3journal.V3JournalID, v3journal.V3Title, v3journal.V3Content, v3journal.V3LastChanged'); 
		$this->db->from('v3student');
		$this->db->join('v3journal','v3student.V3StudentID = v3journal.V3StudentID');		
		
		if (isset($search_month))
		{
			$this->db->where('MONTH(V3LastChanged)', $search_month);
		}
	
		if (isset($search_term))
		{
       		$this->db->like('V3Content',$search_term);
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