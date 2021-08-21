<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    // ambil data dari database yang usernamenya $username dan passwordnya p$assword
    public function cekLogin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(['username' => $username, 'password' => md5($password)]);     
        return $this->db->get();
    }
}