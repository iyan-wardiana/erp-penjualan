<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_it3mc4t39 extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('master/item/m_itemcategory', '', TRUE);

        $LangID     = $this->session->userdata('LangID');
        $this->data['menu_name']    = "";
        $dt_mn                      = $this->db->select("menu_name_$LangID AS menu_name")->get_where("tbl_menu", ["menu_code" => "MN0018"]);
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
            $data['url_Add']        = site_url('itemcategory/add');
            $data['url_getAllData'] = site_url('master/item/c_it3mc4t39/get_AllData');

            $this->load->view('master/item/itemcategory/v_itemcategory', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function get_AllData()
    {
        $list   = $this->m_itemcategory->getData();
        $no     = 0;
        foreach ($list->result_array() as $dataL):
            $no             = $no + 1;
            $CATEG_NUM      = base64_encode($dataL['IC_Num']);
            $CATEG_CODE     = $dataL['IC_Code'];
            $CATEG_NAME     = $dataL['IC_Name'];
            $CATEG_DESC     = $dataL['IC_DESC'];

            $data[] = ["no"         => urlencode($CATEG_NUM),
                       "CATEG_CODE" => $CATEG_CODE, 
                       "CATEG_NAME" => $CATEG_NAME, 
                       "CATEG_DESC" => $CATEG_DESC,
                       "Action"     => ""];
        endforeach;

        // $output = ["data" => $data];

        echo json_encode($data);
    }

    function chkCode()
    {
        $IC_Num     = $_GET['id'];
        $IC_Code    = $this->input->post('IC_Code');
        $data       = $this->m_itemcategory->getDataByCode($IC_Num, $IC_Code)->num_rows();

        echo $data > 0 ? "false" : "true";
    }

    function getGenerateUC()
    {
        $data = $this->m_itemcategory->GenerateUC();
        echo json_encode($data);
    }

    function add()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = $this->data['menu_name'];
            $data['task']           = "add";
            $data['url_saveData']   = site_url('master/item/c_it3mc4t39/saveData');

            $data['IC_Num']         = "IC".date('YmdHis');     
            $data['IC_Code']        = "";      
            $data['IC_Name']        = "";  
            $data['IC_DESC']        = "";  

            $this->load->view('master/item/itemcategory/v_itemcategory_form', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    function saveData()
    {
        $data   = ["IC_Num"     => $this->input->post('IC_Num'),
                   "IC_Code"    => $this->input->post('IC_Code'),
                   "IC_Name"    => $this->input->post('IC_Name'),
                   "IC_DESC"    => $this->input->post('IC_DESC')];
        $this->m_itemcategory->saveAllData($data);
        echo json_encode(["message" => "Data berhasil disimpan"]);
    }

    function update($id)
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $data['title']          = $this->data['menu_name'];
            $data['task']           = "update";
            $data['formAction']     = site_url('master/item/c_it3mc4t39/update_process');
            
            $IC_Num                 = urldecode($id);
            $dataL                  = $this->m_itemcategory->getUpdateData(base64_decode($IC_Num))->row_array();
            $data['IC_Num']         = $dataL['IC_Num'];      
            $data['IC_Code']        = $dataL['IC_Code'];      
            $data['IC_Name']        = $dataL['IC_Name'];      
            $data['IC_DESC']        = $dataL['IC_DESC'];      

            $data['url_saveData']   = site_url('master/item/c_it3mc4t39/updateData/'.base64_decode($IC_Num));

            $this->load->view('master/item/itemcategory/v_itemcategory_form', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    function updateData($IC_Num)
    {
        $data   = ["IC_Code"    => $this->input->post('IC_Code'),
                   "IC_Name"    => $this->input->post('IC_Name'),
                   "IC_DESC"    => $this->input->post('IC_DESC')];
        $this->m_itemcategory->updateAllData($data, $IC_Num);
        echo json_encode(["message" => "Data berhasil disimpan"]);
    }

    function deleteData()
    {
        $IC_Num = urldecode($this->input->get('id'));
        $reason = $this->input->get('reason');

        $data   = $this->m_itemcategory->deleteData(base64_decode($IC_Num));
        echo json_encode("Data Berhasil Dihapus");
    }
}