<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('gajipensiunan_model');
    $this->load->model('pengiriman_model');
    $this->load->model('wesel_model');
    $this->load->model('pembayaran_model');
  }

  public function index()
  {
    $data['gajipensiunan']  = $this->gajipensiunan_model->jumlah();
    $data['pengiriman']     = $this->pengiriman_model->jumlah();
    $data['wesel']          = $this->wesel_model->jumlah();
    $data['pembayaran']     = $this->pembayaran_model->jumlah();
    $data['tanggal']        = $this->input->get('tanggal') ? $this->input->get('tanggal') : date('Y-m-d');
    $this->load->view("operator/index",$data);
  }


    public function profile()
    {
        // memanggil session
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();

        // $this->load->view('operator/_partials/navbar', $data);
        $this->load->view('operator/user/profile', $data);
    }

    // edit profile user operator
    public function edit_profile($id = null)
    {
        // memanggil session
        if (!isset($id)) redirect('operator/user/profile');

        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telephone', 'required|numeric');


        if ($this->form_validation->run()) {
            // die('a');

            $post_data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                // 'foto' => 'default.jpg',
            );
            // var_dump($post_data); die('$post_data');

            // edit foto
            $file = $_FILES;
            // var_dump($file['foto']["name"]); die('a');
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/user/';
                $config['allowed_types'] = 'gif|jpg|png';
                // $config['max_size']      = 100;
                // $config['max_width']     = 1024;
                // $config['max_height']    = 768;
                $config['file_name']     = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    // die('A');
                    $this->session->set_flashdata('gagal', 'Gagal upload foto user');
                    redirect(base_url('operator/user/add'));
                    exit();
                } else {
                    // die('B');
                    $uploaded = $this->upload->data();
                    $post_data['foto'] = $uploaded['file_name'];
                    // var_dump($data); die('a');
                }
            } else {
                $this->input->post('old_image');
            }

            $this->user_model->update($post_data, $id);

            $this->session->set_flashdata('success', 'Data operator berhasil diubah');

            redirect(base_url('operator/user/profile'));
        }

        $this->load->view('operator/user/edit_profile', $data);
    }

    public function detail($id = null)
    {
        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();

        $this->load->view('operator/user/detail_user', $data);
    }

    // form untuk menampilkan
    // $data dipindah di model
    // jalankan validasi
    // load view ke list
    public function add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'level' => 2,
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'foto' => 'default.jpg',
        );

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telephone', 'required|numeric');


        if ($this->form_validation->run()) {

            $file = $_FILES;
            // var_dump($file['foto']["name"]); die('a');
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/user/';
                $config['allowed_types'] = 'gif|jpg|png';
                // $config['max_size']      = 100;
                // $config['max_width']     = 1024;
                // $config['max_height']    = 768;
                $config['file_name']     = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    // die('A');
                    $this->session->set_flashdata('gagal', 'Gagal upload foto user');
                    redirect(base_url('operator/user/add'));
                    exit();
                } else {
                    // die('B');
                    $uploaded = $this->upload->data();
                    $data['foto'] = $uploaded['file_name'];
                    // var_dump($file); die('a');
                }
            }
            $this->user_model->save($data);

            $this->session->set_flashdata('success', 'Data ibu hamil berhasil ditambah');

            redirect(base_url('operator/user'));
        }

        $this->load->view('operator/user/new_user', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('operator/user/');

        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telephone', 'required|numeric');

        if ($this->form_validation->run()) {
            $post_data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                // 'foto' => 'default.jpg',
            );

            // edit foto
            $file = $_FILES;
            // var_dump($file['foto']["name"]); die('a');
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/user/';
                $config['allowed_types'] = 'gif|jpg|png';
                // $config['max_size']      = 100;
                // $config['max_width']     = 1024;
                // $config['max_height']    = 768;
                $config['file_name']     = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    // die('A');
                    $this->session->set_flashdata('gagal', 'Gagal upload foto user');
                    redirect(base_url('operator/user/add'));
                    exit();
                } else {
                    // die('B');
                    $uploaded = $this->upload->data();
                    $post_data['foto'] = $uploaded['file_name'];
                    // var_dump($data); die('a');
                }
            } else {
                $this->input->post('old_image');
            }

            $this->user_model->update($post_data, $id);

            $this->session->set_flashdata('success', 'Data  berhasil diubah');

            redirect(base_url('operator/user'));
        }

        $this->load->view('operator/user/edit_user', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->user_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect('operator/user/', 'refresh');
    }
}
