<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')=="") {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
		$this->load->view('operator/overview', $data);
    }   

    public function logout() {
		$this->session->unset_userdata(array('id_user','username','name', 'email','level'));

		$this->session->sess_destroy();

        redirect(base_url('auth'));                
	}
    
}