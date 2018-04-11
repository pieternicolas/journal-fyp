<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_journal_model_V1 extends CI_Model {
	
	function __construct()
 	{
   		parent::__construct();
		$this->load->helper('string');
 	}
	
	function record_count() 
	{
        return $this->db->count_all('v1journal');
    }
	
	function get_journal_main($limit, $start)
	{
		$this->db->select('v1student.V1StudentID, v1student.V1StudFirstName, v1student.V1StudLastName, v1journal.V1JournalID, v1journal.V1Title, SUBSTRING(v1journal.V1Content,1,400) as V1Content, v1journal.V1LastChanged'); 
		$this->db->from('v1student');
		$this->db->join('v1journal','v1student.V1StudentID = v1journal.V1StudentID');
		$this->db->order_by('V1LastChanged','DESC');
		$this->db->limit($limit, $start);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_journal($journal_id = FALSE)
	{		
        if ($journal_id === FALSE)
        {	
			$this->db->select('v1student.V1StudentID, v1student.V1StudFirstName, v1student.V1StudLastName, v1journal.V1JournalID, v1journal.V1Title, v1journal.V1Content, v1journal.V1LastChanged'); 
			$this->db->from('v1student');
			$this->db->join('v1journal','v1student.V1StudentID = v1journal.V1StudentID');
			$this->db->order_by('V1LastChanged','ASC');
			$this->db->limit(5);
		
            $query = $this->db->get();
            return $query->result_array();
		}

		$this->db->select('v1student.V1StudentID, v1student.V1StudFirstName, v1student.V1StudLastName, v1journal.V1JournalID, v1journal.V1Title, v1journal.V1Content, v1journal.V1LastChanged'); 
		$this->db->where('v1journalid',$journal_id);
		$this->db->from('v1student');
		$this->db->join('v1journal','v1student.V1StudentID = v1journal.V1StudentID');

        $query = $this->db->get();
        return $query->row_array();
	}
	
public function search_journal($search_term, $search_month)
    {	
		if ($search_month == " ")
		{
			$search_month = NULL;
		}
		
		$this->db->select('v1student.V1StudentID, v1student.V1StudFirstName, v1student.V1StudLastName, v1journal.V1JournalID, v1journal.V1Title, SUBSTRING(v1journal.V1Content,1,400) as V1Content, v1journal.V1LastChanged'); 
		$this->db->from('v1student');
		$this->db->join('v1journal','v1student.V1StudentID = v1journal.V1StudentID');		
		
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