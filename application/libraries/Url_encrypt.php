<?php
class Url_encrypt {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('encryption');
    }

    public function encrypt_param($param) {
        return urlencode($this->CI->encryption->encrypt($param));
    }

    public function decrypt_param($encrypted_param) {
        return $this->CI->encryption->decrypt(urldecode($encrypted_param));
    }
}