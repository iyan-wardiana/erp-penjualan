<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_it3mun1t extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('master/item/m_itemunit', '', TRUE);

        $LangID     = $this->session->userdata('LangID');
        $this->data['menu_name']    = "";
        $dt_mn                      = $this->db->select("menu_name_$LangID AS menu_name")->get_where("tbl_menu", ["menu_code" => "MN0020"]);
        if($dt_mn->num_rows() > 0)
        {
            foreach($dt_mn->result_array() as $rw_mn):
                $this->data['menu_name']    = $rw_mn['menu_name'];
            endforeach;
        }
	}

    public function index()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = $this->data['menu_name'];
            $data['url_Add']        = site_url('itemunit/add');
            $data['url_getAllData'] = site_url('master/item/c_it3mun1t/get_AllData');

            $this->load->view('master/item/itemunit/v_itemunit', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function get_AllData()
    {
        $list   = $this->m_itemunit->getData();
        $no     = 0;
        foreach ($list->result_array() as $dataL):
            $no             = $no + 1;
            $UNIT_NUM       = base64_encode($dataL['UNIT_NUM']);
            $UNIT_CODE      = $dataL['UNIT_CODE'];
            $UNIT_NAME      = $dataL['UNIT_NAME'];
            $UNIT_DESC      = $dataL['UNIT_DESC'];

            $data[] = ["no"         => urlencode($UNIT_NUM),
                       "UNIT_CODE" => $UNIT_CODE, 
                       "UNIT_NAME" => $UNIT_NAME, 
                       "UNIT_DESC" => $UNIT_DESC,
                       "Action"     => ""];
        endforeach;

        // $output = ["data" => $data];

        echo json_encode($data);
    }

    function chkCode()
    {
        $UNIT_NUM     = $_GET['id'];
        $UNIT_CODE    = $this->input->post('UNIT_CODE');
        $data       = $this->m_itemunit->getDataByCode($UNIT_NUM, $UNIT_CODE)->num_rows();

        echo $data > 0 ? "false" : "true";
    }

    function getGenerateUC()
    {
        $data = $this->m_itemunit->GenerateUC();
        echo json_encode($data);
    }

    function add()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = $this->data['menu_name'];
            $data['task']           = "add";
            $data['url_saveData']   = site_url('master/item/c_it3mun1t/saveData');

            $data['UNIT_NUM']         = "UN".date('YmdHis');     
            $data['UNIT_CODE']        = "";      
            $data['UNIT_NAME']        = "";  
            $data['UNIT_DESC']        = "";  

            $this->load->view('master/item/itemunit/v_itemunit_form', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    function saveData()
    {
        $data   = ["UNIT_NUM"     => $this->input->post('UNIT_NUM'),
                   "UNIT_CODE"    => $this->input->post('UNIT_CODE'),
                   "UNIT_NAME"    => $this->input->post('UNIT_NAME'),
                   "UNIT_DESC"    => $this->input->post('UNIT_DESC')];
        $this->m_itemunit->saveAllData($data);
        echo json_encode(["message" => "Data berhasil disimpan"]);
    }

    function update($id)
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = $this->data['menu_name'];
            $data['task']           = "update";
            $data['formAction']     = site_url('master/item/c_it3mun1t/update_process');
            
            $UNIT_NUM                 = urldecode($id);
            $dataL                  = $this->m_itemunit->getUpdateData(base64_decode($UNIT_NUM))->row_array();
            $data['UNIT_NUM']         = $dataL['UNIT_NUM'];      
            $data['UNIT_CODE']        = $dataL['UNIT_CODE'];      
            $data['UNIT_NAME']        = $dataL['UNIT_NAME'];      
            $data['UNIT_DESC']        = $dataL['UNIT_DESC'];      

            $data['url_saveData']   = site_url('master/item/c_it3mun1t/updateData/'.base64_decode($UNIT_NUM));

            $this->load->view('master/item/itemunit/v_itemunit_form', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    function updateData($UNIT_NUM)
    {
        $data   = ["UNIT_CODE"    => $this->input->post('UNIT_CODE'),
                   "UNIT_NAME"    => $this->input->post('UNIT_NAME'),
                   "UNIT_DESC"    => $this->input->post('UNIT_DESC')];
        $this->m_itemunit->updateAllData($data, $UNIT_NUM);
        echo json_encode(["message" => "Data berhasil disimpan"]);
    }

    function deleteData()
    {
        $UNIT_NUM = urldecode($this->input->get('id'));
        $reason = $this->input->get('reason');

        $data   = $this->m_itemunit->deleteData(base64_decode($UNIT_NUM));
        echo json_encode("Data Berhasil Dihapus");
    }
}