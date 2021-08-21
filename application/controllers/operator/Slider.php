<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('slider_model');
    }

    public function tambah()
    {

        $data = array(
            'judul'             => $this->input->post('judul'),
            'pengupload'        => $this->session->userdata('nama'),
        );

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        if ($this->form_validation->run()) {

            $file = $_FILES;
            // var_dump($file['foto']["name"]); die('a');
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/slider/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                // $config['max_size']      = 100;
                // $config['max_width']     = 1024;
                // $config['max_height']    = 768;
                $config['file_name']      = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    // die('A');
                    $this->session->set_flashdata('gagal', 'Gagal Upload Foto Slider');
                    redirect(base_url('operator/slider/tambah'));
                    exit();
                } else {
                    // die('B');
                    $uploaded = $this->upload->data();
                    $data['foto'] = $uploaded['file_name'];
                    // var_dump($file); die('a');
                }
            }
            $this->slider_model->save($data);

            $this->session->set_flashdata('success', 'Slider Banner Berhasil Ditambah');

            redirect(base_url('operator/slider/tambah'));
        }
        $data['bannerslider'] = $this->slider_model->getsemuaslider();
        $this->load->view('operator/slider/tambahslider', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->slider_model->delete($id);
        $this->session->set_flashdata('success', 'Slider Berhasil Di Hapus');
        redirect(base_url('operator/slider/tambah'));
    }
}
