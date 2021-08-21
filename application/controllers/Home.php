<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cek_model');
    }

    public function index()
    {
        $this->load->view('index');
    }


    public function cekpengiriman()
    {
        $this->load->view('cekpengiriman');
    }

    public function cekwesel()
    {
        $this->load->view('cekwesel');
    }

    public function cekpembayaran()
    {
        $this->load->view('cekpembayaran');
    }

    public function cekgajipensiunan()
    {
        $this->load->view('cekgajipensiunan');
    }

    function getgajipensiunan(){
		$nip=$this->input->post('nip');
		$data=$this->cek_model->getgajipensiunan($nip);
		echo json_encode($data);
	}

    function getpengiriman(){
		$noresi=$this->input->post('noresi');
		$data=$this->cek_model->getpengiriman($noresi);
		echo json_encode($data);
	}

    function getwesel(){
		$nowesel=$this->input->post('nowesel');
		$data=$this->cek_model->getwesel($nowesel);
		echo json_encode($data);
	}

    function getpembayaran(){
		$novirtual=$this->input->post('novirtual');
		$data=$this->cek_model->getpembayaran($novirtual);
		echo json_encode($data);
	}
}
