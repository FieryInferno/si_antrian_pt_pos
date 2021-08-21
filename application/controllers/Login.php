<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('daftar_model');
    }

    public function index()
    {
        $data['title'] = "Admin";
        $this->load->view('login', $data);
    }

    public function user_login()
    {
        $this->form_validation->set_rules('username', 'NIP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->login_model->cekLogin($username, $password)->row();
            if (isset($result)) {
                $session_login = array(
                    "id_user"    => $result->id_user,
                    "username"    => $result->username,
                    "nama"        => $result->nama,
                    "email"        => $result->email,
                    "level"     => $result->level,
                    "jabatan"   => $result->jabatan,
                    "foto"   => $result->foto,
                    "is_active"     => $result->is_active,
                );

                $this->session->set_userdata($session_login);
                $this->session->set_flashdata('success', '<h4> <i class="icon fa fa-check"></i> Success</h4> <p>Selamat anda berhasil login</p>');
                redirect(base_url('operator/overview'), 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password tidak valid');
                redirect(base_url('login'));
            }
        } else {
            $this->index();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('id_user', 'name', 'email', 'divisi', 'username', 'jabatan'));

        $this->session->sess_destroy();

        redirect(base_url());
    }

    // Daftar

    public function check_emaillama($email_inputan)
    {
        $email_db = $this->user_model->checkEmailLama($email_inputan)->row();

        if (!empty($email_db)) {
            $this->form_validation->set_message('check_emaillama', 'Email yang anda inputkan sudah ada');
            return FALSE;
        }
        return TRUE;
    }


    public function check_usernamelama($username_inputan)
    {
        $username_db = $this->user_model->checkUsernameLama($username_inputan)->row();
        // var_dump($username_db); die('ds');

        if (!empty($username_db)) {
            $this->form_validation->set_message('check_usernamelama', 'NIP yang anda inputkan sudah terdaftar');
            return FALSE;
        }
        return TRUE;
    }
}
