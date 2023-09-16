<?php

class M_accountlist extends CI_Model
{
    public function __construct() // GOOD
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getData()
    {
        $PRJCODE            = $this->input->post('PRJCODE');
        $Account_Category   = $this->input->post('Account_Category');
        $Account_Name       = $this->input->post('Account_Name');
        $addQuery           = "";
        if($Account_Category != '') $addQuery .= " AND Account_Category = '$Account_Category'";
        if($Account_Name != '') $addQuery .= " AND Account_Name LIKE '%$Account_Name%'";

        $sql    = "SELECT * FROM tbl_chartaccount WHERE PRJCODE = '$PRJCODE' $addQuery ORDER BY ORD_ID";
        return $this->db->query($sql);
    }
}