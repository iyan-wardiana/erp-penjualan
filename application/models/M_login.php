<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    function check_user($Email) 
    {
        $getUser = "SELECT * FROM tbl_employee WHERE Emp_Status = 1
                    AND Email = '$Email'";
        return $this->db->query($getUser);
    }
}