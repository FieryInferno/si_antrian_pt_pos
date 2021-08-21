<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wesel extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('wesel_model');
  }

  public function index($date = "", $tanggal_akhir = '')
  {
    $hari_ini               = date("Y-m-d");
    $tgl_pertama            = date('Y-m-01', strtotime($hari_ini));
    $tgl_terakhir           = date('Y-m-t', strtotime($hari_ini));
    $date                   = ($date=="") ? $tgl_pertama : $date ;
    $tanggal_akhir          = ($tanggal_akhir=="") ? $tgl_terakhir : $tanggal_akhir ;
    $data['date']           = $date;
    $data['tanggal_akhir']  = $tanggal_akhir;
    $data['wesel']          = $this->wesel_model->getsemuawesel($date, $tanggal_akhir);
    $data['jumlah_wesel']   = $this->wesel_model->jumlahsemua();
    $this->load->view('operator/wesel/daftarwesel', $data);
  }

    public function tambah()
    {
        $data = array(
            'nowesel'             => $this->input->post('nowesel'),
            'nama'             => $this->input->post('nama'),
            'noktp'             => $this->input->post('noktp'),
            'biaya'             => $this->input->post('biaya'),
            'tanggalwesel'             => $this->input->post('tanggalwesel'),
        );
        $this->form_validation->set_rules('nowesel', 'No Eesel', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('noktp', 'No KTP', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('tanggalwesel', 'Tanggal Wesel', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        if ($this->form_validation->run()) {
            $this->wesel_model->save($data);
            $this->session->set_flashdata('success', 'Wesel Berhasil Di Tambah');

            redirect(base_url('operator/wesel/tambah'));
        }
        $this->load->view('operator/wesel/tambahwesel', $data);
    }


    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->wesel_model->delete($id);
        $this->session->set_flashdata('success', 'Wesel Berhasil Di Hapus');
        redirect('operator/wesel');
    }

 
}
