<?php

class M_itemlist extends CI_Model
{
    public function __construct() // GOOD
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getData()
    {
        $ITM_GROUP  = $this->input->post('ITM_GROUP');
        $ITM_NAME   = $this->input->post('ITM_NAME');
        $addQuery   = "";
        if($ITM_GROUP != '') $addQuery .= " AND ITM_GROUP = '$ITM_GROUP'";
        if($ITM_NAME != '') $addQuery .= " AND ITM_NAME LIKE '%$ITM_NAME%'";

        $sql    = "SELECT * FROM tbl_item WHERE PRJCODE = 'NKE' $addQuery ORDER BY ITM_NAME";
        return $this->db->query($sql);
    }
}