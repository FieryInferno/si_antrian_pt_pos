<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pengiriman_model');
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
    $data['pengiriman']         = $this->pengiriman_model->getsemuapengiriman($date, $tanggal_akhir);
    $data['jumlah_pengiriman']  = $this->pengiriman_model->jumlahsemua();
    $this->load->view('operator/pengiriman/daftarpengiriman', $data);
  }

    public function tambah()
    {
        $data = array(
            'tanggalpengiriman'              => $this->input->post('tanggalpengiriman'),
            'noresi'             => $this->input->post('noresi'),
            'namapengirim'             => $this->input->post('namapengirim'),
            'nohppengirim'             => $this->input->post('nohppengirim'),
            'namapenerima'             => $this->input->post('namapenerima'),
            'nohppenerima'             => $this->input->post('nohppenerima'),
            'alamatpenerima'             => $this->input->post('alamatpenerima'),
            'kota'             => $this->input->post('kota'),
            'namabarang'             => $this->input->post('namabarang'),
            'jenisbarang'             => $this->input->post('jenisbarang'),
            'beratbarang'             => $this->input->post('beratbarang'),
            'jumlahbarang'             => $this->input->post('jumlahbarang'),
            'biaya'             => $this->input->post('biaya'),
        );
        $this->form_validation->set_rules('tanggalpengiriman', 'Tanggal Pengiriman', 'required');
        $this->form_validation->set_rules('noresi', 'No Resi', 'required');
        $this->form_validation->set_rules('namapengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('nohppengirim', 'No HP Pengirim', 'required');
        $this->form_validation->set_rules('namapenerima', 'Nama Penerima', 'required');
        $this->form_validation->set_rules('nohppenerima', 'No HP Penerima', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenisbarang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('beratbarang', 'Berat Barang', 'required');
        $this->form_validation->set_rules('jumlahbarang', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        if ($this->form_validation->run()) {
            $this->pengiriman_model->save($data);
            $this->session->set_flashdata('success', 'Pengiriman Berhasil Di Tambah');

            redirect(base_url('operator/pengiriman/tambah'));
        }
        $this->load->view('operator/pengiriman/tambahpengiriman', $data);
    }


    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->pengiriman_model->delete($id);
        $this->session->set_flashdata('success', 'Pengiriman Berhasil Di Hapus');
        redirect('operator/pengiriman');
    }
}
