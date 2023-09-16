<?php

class M_itemcategory extends CI_Model
{
    public function __construct() // GOOD
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getData()
    {
        $CATEG_NAME   = $this->input->post('CATEG_NAME');
        $addQuery   = "";
        if($CATEG_NAME != '') $addQuery = "WHERE IC_Name LIKE '%$CATEG_NAME%'";

        $sql    = "SELECT * FROM tbl_itemcategory $addQuery";
        return $this->db->query($sql);
    }

    public function getDataByCode($IC_Num, $IC_Code)
    {
        $sql    = "SELECT * FROM tbl_itemcategory WHERE IC_Num != '$IC_Num' AND IC_Code = '$IC_Code'";
        return $this->db->query($sql);
    }

    public function getUpdateData($IC_Num)
    {
        $sql    = "SELECT * FROM tbl_itemcategory WHERE IC_Num = '$IC_Num'";
        return $this->db->query($sql);
    }

    public function saveAllData($data)
    {
        $this->db->insert('tbl_itemcategory', $data);
    }

    public function updateAllData($data, $IC_Num)
    {
        $this->db->where("IC_Num", $IC_Num);
        $this->db->update("tbl_itemcategory", $data);
    }

    public function deleteData($IC_Num)
    {
        $this->db->where("IC_Num", $IC_Num);
        $this->db->delete("tbl_itemcategory");
    }
}