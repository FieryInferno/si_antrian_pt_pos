<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pembayaran_model');
  }

  public function index($date = "", $tanggal_akhir = '')
  {
    $hari_ini                   = date("Y-m-d");
    $tgl_pertama                = date('Y-m-01', strtotime($hari_ini));
    $tgl_terakhir               = date('Y-m-t', strtotime($hari_ini));
    $date                       = ($date=="") ? $tgl_pertama : $date ;
    $tanggal_akhir              = ($tanggal_akhir=="") ? $tgl_terakhir : $tanggal_akhir ;
    $data['date']               = $date;
    $data['tanggal_akhir']      = $tanggal_akhir;
    $data['pembayaran']         = $this->pembayaran_model->getsemuapembayaran($date, $tanggal_akhir);
    $data['jumlah_pembayaran']  = $this->pembayaran_model->jumlahsemua();
    $this->load->view('operator/pembayaran/daftarpembayaran', $data);
  }

    public function tambah()
    {
        $data = array(
            'novirtual'             => $this->input->post('novirtual'),
            'judul'             => $this->input->post('judul'),
            'nama'             => $this->input->post('nama'),
            'biaya'             => $this->input->post('biaya'),
            'tanggalpembayaran'             => $this->input->post('tanggalpembayaran'),
        );
        $this->form_validation->set_rules('novirtual', 'No Virtual', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('tanggalpembayaran', 'Tanggal pembayaran', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        
            $this->pembayaran_model->save($data);
            $this->session->set_flashdata('success', 'Pembayaran Berhasil Di Tambah');

            redirect(base_url('operator/pembayaran/tambah'));
        
        $this->load->view('operator/pembayaran/tambahpembayaran', $data);
    }


    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->pembayaran_model->delete($id);
        $this->session->set_flashdata('success', 'Pembayaran Berhasil Di Hapus');
        redirect('operator/pembayaran');
    }
}
