<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_h0m3 extends CI_Controller {
    function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $First_Name = $this->session->userdata('First_Name');
            $Last_Name  = $this->session->userdata('Last_Name');

            $data['fullName']   = "$First_Name $Last_Name";
            // echo "welcome $fullName -> ".anchor($this->session->sess_destroy(),'logout');

            $this->load->view('dashboard', $data);
        }
        else
        {
            redirect(base_url());
        }
    }
}