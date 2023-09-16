<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() // GOOD
	{
		parent::__construct();
		$this->load->model('m_login', '', TRUE);
	}
    
	public function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			redirect(site_url('home'));
		}
		else
		{
			$data['form_acton'] = site_url("auth/login_process");
			$this->load->view('auth/login/v_login', $data);
		}
	}

	function login_process()
	{
		$Email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));
		$getUser 	= $this->m_login->check_user($Email);
		if($getUser->num_rows() > 0)
		{
			// check password
				foreach($getUser->result() as $u):
					$EmpID		= $u->EmpID;
					$First_Name	= $u->First_Name;
					$Last_Name	= $u->Last_Name;
					$FlagUSER	= $u->FlagUSER;
					$user_name	= $u->user_name;
					$Email		= $u->Email;
					$user_pass	= $u->user_pass;

					if($user_pass == $password)
					{
						// login success & set session
							$data = ["EmpID" => $EmpID, "First_Name" => $First_Name, "Last_Name" => $Last_Name, "Email" => $Email, "FlagUSER" => $FlagUSER, "LangID" => "ENG", "login" => true];
							$this->session->set_userdata($data);

							$url = site_url('home');
					}
					else
					{
						$this->session->set_flashdata('message','Your password wrong!');
						$url = base_url();
					}
				endforeach;
		}
		else
		{
			$this->session->set_flashdata('message','Email not registered!');
			$url = base_url();
		}

		redirect($url);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}