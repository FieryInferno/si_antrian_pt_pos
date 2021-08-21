<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function aktivasi($id = null)
    {
        $data = array(
            'is_active'            => '1',
        );
        $this->user_model->update($data, $id);
        redirect(base_url('operator/user/'));
    }
    public function index()
    {
        $data['daftaruser'] = $this->user_model->getsemuauser();
        $this->load->view('operator/user/list_user', $data);
    }
    public function check_usernameterdaftar($username_inputan)
    {
        $username_db = $this->user_model->checkusernameterdaftar($username_inputan)->row();

        if (!empty($username_db)) {
            $this->form_validation->set_message('check_usernameterdaftar', 'NIP yang anda daftarkan sudah ada');
            return FALSE;
        }
        return TRUE;
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
        if (!isset($id)) redirect('operator/user/profile');
        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telephone', 'required');


        if ($this->form_validation->run()) {
            $post_data = array(
                'username'         => $this->input->post('username'),
                'nama'             => $this->input->post('nama'),
                'jabatan'          => $this->input->post('jabatan'),
                'email'            => $this->input->post('email'),
                'no_telp'          => $this->input->post('no_telp'),
            );

            $file = $_FILES;
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/user/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';


                $config['file_name']      = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('gagal', 'Gagal upload foto user, file yang diperbolehkan hanya JPG, JPEG, dan PNG');
                    redirect(base_url('operator/user/profile'));

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

            $this->session->set_flashdata('success', 'Profil Berhasil Diubah');

            redirect(base_url('operator/user/profile'));
        } else {
            $this->session->set_flashdata('gagal', 'Profil Gagal Diubah');
        }


        $this->load->view('operator/user/profile', $data);
    }

    public function detail($id = null)
    {
        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();

        $this->load->view('operator/user/detail_user', $data);
    }


    public function tambah()
    {
        $level = $this->input->post('jabatan');
        if ($level == "Operator") {
            $levelpegawai = '2';
        } elseif ($level == "KPC") {
            $levelpegawai = '1';
        } else {
            $levelpegawai = '';
        }
        $data = array(
            'nama'             => $this->input->post('nama'),
            'jeniskelamin'     => $this->input->post('jeniskelamin'),
            'username'              => $this->input->post('username'),
            'jabatan'          => $this->input->post('jabatan'),
            'email'           => $this->input->post('email'),
            'no_telp'          => $this->input->post('no_telp'),
            'foto'             => 'default.png',
            'level'            => $levelpegawai,
            'password'         => '21232f297a57a5a743894a0e4a801fc3',
            'is_active'            => '1',
        );

        $this->form_validation->set_rules('username', 'NIP', 'required|callback_check_usernameterdaftar');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        if ($this->form_validation->run()) {

            $file = $_FILES;
            // var_dump($file['foto']["name"]); die('a');
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"]; // $post['id'].'-'.$mapel;

                $config['upload_path']   = './upload/user/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                // $config['max_size']      = 100;
                // $config['max_width']     = 1024;
                // $config['max_height']    = 768;
                $config['file_name']      = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    // die('A');
                    $this->session->set_flashdata('gagal', 'Gagal upload foto user');
                    redirect(base_url('operator/user/tambah'));
                    exit();
                } else {
                    // die('B');
                    $uploaded = $this->upload->data();
                    $data['foto'] = $uploaded['file_name'];
                    // var_dump($file); die('a');
                }
            }
            $this->user_model->save($data);

            $this->session->set_flashdata('success', 'Pegawai Berhasil Di Tambah');

            redirect(base_url('operator/user/tambah'));
        }
        $data['daftaruser'] = $this->user_model->getsemuauser();
        $this->load->view('operator/user/tambahuser', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('operator/user/');

        $data['user'] = $this->user_model->getById($id);
        if (!$data['user']) show_404();

        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run()) {
            $post_data = array(
                'level' => $this->input->post('level'),

            );



            $this->user_model->update($post_data, $id);

            $this->session->set_flashdata('success', 'Hak Akses Pegawai Berhasil Diubah');

            redirect(base_url('operator/datapegawai'));
        }

        $this->load->view('operator/user/edit_user', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->user_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect('operator/user');
    }
}
