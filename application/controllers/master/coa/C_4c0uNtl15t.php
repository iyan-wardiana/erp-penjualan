<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_4c0uNtl15t extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('master/coa/m_accountlist', '', TRUE);
	}

    public function index()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = "Daftar Menu";
            $data['url_Add']        = site_url('accountlist/add');
            $data['url_getAllData'] = site_url('master/coa/c_4c0uNtl15t/get_AllData');

            $this->load->view('master/coa/accountlist/v_accountlist', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function get_AllData()
    {
        $list   = $this->m_accountlist->getData();
        $no     = 0;
        $saldo  = 0;
        foreach ($list->result_array() as $dataL):
            $no                 = $no + 1;
            $Account_Number     = $dataL['Account_Number'];
            $Account_Name       = $dataL['Account_Name'];
            $Account_Class      = $dataL['Account_Class'];
            $Base_Debet         = $dataL['Base_Debet'];
            $Base_Kredit        = $dataL['Base_Kredit'];
            $saldo              = $Base_Debet - $Base_Kredit;
            $STATUS             = $dataL['Account_Stat'];

            $Type  = "";
            if($Account_Class == 2) $Type = "Detail";
            elseif($Account_Class == 3) $Type = "Detail Cash";
            elseif($Account_Class == 4) $Type = "Detail Bank";
            elseif($Account_Class == 5) $Type = "Detail Cheque";
            else $Type = "Header";

            if($STATUS == 1) $STATUSD = "Active";
            else $STATUSD = "Non Active";

            $data[] = ["Account_Number" => $Account_Number, 
                       "Account_Name"   => $Account_Name, 
                       "Type"           => $Type, 
                       "Debit"          => $Base_Debet, 
                       "Kredit"         => $Base_Kredit, 
                       "Saldo"          => $saldo, 
                       "STATUS"         => $STATUSD,
                       "Action"         => "<div class='dropdown'><button class='btn btn-primary tp-btn-light sharp' type='button' data-bs-toggle='dropdown'>
                                                <span class='fs--1'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='18px' height='18px' viewBox='0 0 24 24' version='1.1'><g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'><rect x='0' y='0' width='24' height='24'></rect><circle fill='#000000' cx='5' cy='12' r='2'></circle><circle fill='#000000' cx='12' cy='12' r='2'></circle><circle fill='#000000' cx='19' cy='12' r='2'></circle></g></svg></span></button>
                                                <div class='dropdown-menu dropdown-menu-end border py-0'>
                                                    <div class='py-2'><a class='dropdown-item'  href='#!'><i class='fa fa-edit'></i>&nbsp;Edit</a>
                                                    <a class='dropdown-item text-danger' href='#!'><i class='fa fa-trash'></i>&nbsp;Delete</a></div>
                                                </div>
                                            </div>"];
        endforeach;

        // $output = ["data" => $data];

        echo json_encode($data);
    }

    function getGenerateUC()
    {
        $data = $this->m_accountlist->GenerateUC();
        echo json_encode($data);
    }

    function add()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']      = "Add - Daftar Menu";
            $data['task']       = "add";
            $data['formAction'] = site_url('master/coa/menulist/add_process');

            $this->load->view('master/coa/accountlist/v_accountlist_form', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    function add_process()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $this->m_accountlist->save();
            $url        = site_url('menulist');
            redirect($url);
        }
        else
        {
            redirect(base_url());
        }
    }
}