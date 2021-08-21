<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gajipensiunan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('gajipensiunan_model');
  }

  public function index($date="", $tanggal_akhir='')
  {
    $hari_ini = date("Y-m-d");
    $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
    $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

    $date = ($date=="") ? $tgl_pertama : $date ;
    $tanggal_akhir = ($tanggal_akhir=="") ? $tgl_terakhir : $tanggal_akhir ;
    $data['date'] = $date;
    $data['tanggal_akhir']  = $tanggal_akhir;
    $data['gajipensiunan'] = $this->gajipensiunan_model->getsemuagajipensiunan($date, $tanggal_akhir);
    $data['jumlah_gajipensiunan'] = $this->gajipensiunan_model->jumlahsemua();
    $this->load->view('operator/gajipensiunan/daftargajipensiunan', $data);
  }

    public function tambah()
    {
        $data = array(
            'nip'             => $this->input->post('nip'),
            'nama'             => $this->input->post('nama'),
            'judul'             => $this->input->post('judul'),
            'deskripsi'             => $this->input->post('deskripsi'),
            'gaji'     => $this->input->post('gaji'),
            'tanggal'              => $this->input->post('tanggal'),
            'kartutandapensiun'             => 'default.jpg',
        );
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('gaji', 'Gaji', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        if ($this->form_validation->run()) {
            $id = $this->session->userdata('id_user');
            $datapengupload['user'] = $this->user_model->getById($id);
            if (!$datapengupload['user']) show_404();
            $id_user = $datapengupload['user']->id_user;
            $nama = $datapengupload['user']->nama;

            $file = $_FILES;
            // var_dump($file['foto']["name"]); die('a');
            if (!empty($file['file']["name"])) {
                $filename = time() . $file['file']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/arsip/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|docx|doc|txt';
                $config['file_name']      = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    echo $this->upload->display_errors();
                    exit();
                } else {
                    // die('B');
                    $uploaded = $this->upload->data();
                    $data['kartutandapensiun'] = $uploaded['file_name'];
                    // var_dump($file); die('a');
                }
            }
            $this->gajipensiunan_model->save($data);




            $this->session->set_flashdata('success', 'Gaji Pensiunan Berhasil Di Tambah');

            redirect(base_url('operator/gajipensiunan/tambah'));
        }
        $this->load->view('operator/gajipensiunan/tambahgajipensiunan', $data);
    }


    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->gajipensiunan_model->delete($id);
        $this->session->set_flashdata('success', 'Gaji Pensiunan Berhasil Di Hapus');
        redirect('operator/gajipensiunan');
    }

 
}
