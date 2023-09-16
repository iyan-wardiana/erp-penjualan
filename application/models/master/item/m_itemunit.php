<?php

class M_itemunit extends CI_Model
{
    public function __construct() // GOOD
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getData()
    {
        $UNIT_NAME   = $this->input->post('UNIT_NAME');
        $addQuery   = "";
        if($UNIT_NAME != '') $addQuery = "WHERE UNIT_NAME LIKE '%$UNIT_NAME%'";

        $sql    = "SELECT * FROM tbl_itemunit $addQuery";
        return $this->db->query($sql);
    }

    public function getDataByCode($UNIT_NUM, $UNIT_CODE)
    {
        $sql    = "SELECT * FROM tbl_itemunit WHERE UNIT_NUM != '$UNIT_NUM' AND UNIT_CODE = '$UNIT_CODE'";
        return $this->db->query($sql);
    }

    public function getUpdateData($UNIT_NUM)
    {
        $sql    = "SELECT * FROM tbl_itemunit WHERE UNIT_NUM = '$UNIT_NUM'";
        return $this->db->query($sql);
    }

    public function saveAllData($data)
    {
        $this->db->insert('tbl_itemunit', $data);
    }

    public function updateAllData($data, $UNIT_NUM)
    {
        $this->db->where("UNIT_NUM", $UNIT_NUM);
        $this->db->update("tbl_itemunit", $data);
    }

    public function deleteData($UNIT_NUM)
    {
        $this->db->where("UNIT_NUM", $UNIT_NUM);
        $this->db->delete("tbl_itemunit");
    }
}