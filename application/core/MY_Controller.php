<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	public $current_session;
	public $username;
	
    function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('logged_in'))
        {
            redirect('login','refresh');
        }
		else
		{
			$this->current_session = $this->session->userdata('logged_in');
			$this->username = $this->current_session['username'];
		}
    }
}
?>