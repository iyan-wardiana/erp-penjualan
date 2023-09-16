<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_it3ml15t extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('master/item/m_itemlist', '', TRUE);
	}

    public function index()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = "Daftar Menu";
            $data['url_Add']        = site_url('itemlist/add');
            $data['url_getAllData'] = site_url('master/item/c_it3ml15t/get_AllData');

            $this->load->view('master/item/itemlist/v_itemlist', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function get_AllData()
    {
        $list   = $this->m_itemlist->getData();
        $no     = 0;
        foreach ($list->result_array() as $dataL):
            $no             = $no + 1;
            $ITM_CODE       = $dataL['ITM_CODE'];
            $ITM_NAME       = $dataL['ITM_NAME'];
            $ITM_GROUP      = $dataL['ITM_GROUP'];
            $ITM_VOLMBG     = $dataL['ITM_VOLMBG'];
            $STATUS         = $dataL['STATUS'];

            $ITMGROUP_DESC  = "";
            $s_01           = "SELECT IC_Code, IC_Name FROM tbl_itemcategory WHERE IC_Code = '$ITM_GROUP'";
            $r_01           = $this->db->query($s_01);
            if($r_01->num_rows() > 0)
            {
                foreach($r_01->result_array() as $rw_01):
                    $ITMGROUP_DESC = $rw_01['IC_Name'];
                endforeach;
            }

            if($STATUS == 1) $STATUSD = "Active";
            else $STATUSD = "Non Active";

            $data[] = ["no"         => $no, 
                       "ITM_CODE"   => $ITM_CODE, 
                       "ITM_NAME"   => $ITM_NAME, 
                       "ITMGROUP"   => $ITMGROUP_DESC, 
                       "STATUS"     => $STATUSD,
                       "Action"     => "<div class='dropdown'><button class='btn btn-primary tp-btn-light sharp' type='button' data-bs-toggle='dropdown'>
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
        $data = $this->m_itemlist->GenerateUC();
        echo json_encode($data);
    }

    function add()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']      = "Add - Daftar Menu";
            $data['task']       = "add";
            $data['formAction'] = site_url('master/item/menulist/add_process');

            $this->load->view('master/item/itemlist/v_itemlist_form', $data);
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
            $this->m_itemlist->save();
            $url        = site_url('menulist');
            redirect($url);
        }
        else
        {
            redirect(base_url());
        }
    }
}