<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";
    private $_table2 = "konsultasi";

    public function cekLogin()
    {
        $query = $this->db->get_where(['username' => $username, 'password' => md5($password)]);
        return $query;
    }

    public function getorang($penerima)
    {
        return $this->db->get_where($this->_table, ["id_user" => $penerima])->row();
    }
    public function getByIdkasubsi($id_divisi)
    {
        // $this->db->where('divisi', $id_divisi);
        // $result = $this->db->get($this->_table4)->result();
        // return $result;
        $hak = "level";
        $sql = "SELECT * FROM user where divisi = '$id_divisi' AND $hak <> '6'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function penerimakasi($divisi)
    {
        $hak = "level";
        // $sql = "SELECT * FROM user where divisi = '$divisi' AND $hak <>'5' AND $hak<>'6'";
        $sql = "SELECT * FROM user where $hak = '4'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function penerimaasdatun()
    {
        $hak = "level";
        // $sql = "SELECT * FROM user where divisi = '$divisi' AND $hak <>'5' AND $hak<>'6'";
        $sql = "SELECT * FROM user where $hak = '5'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function penerimakasubsi($divisi)
    {
        $hak = "level";
        // $sql = "SELECT * FROM user where divisi = '$divisi' AND $hak <>'4' AND $hak <>'5' AND $hak<>'6'";
        $sql = "SELECT * FROM user where $hak ='3'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_category()
    {
        $query = $this->db->get('konsultasi');
        return $query;  
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }



    public function getid($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }
    public function satu($id)
    {
        $this->db->select('*');
        $this->db->from('user');        
        $this->db->join('konsultasi','konsultasi.id_user=user.id_user');
        //$this->db->group_by('jenis_kehamilan');
        $this->db->where('konsultasi.jenis_kehamilan',$id);
         $query = $this->db->get();
         return $query->result();
    }
    public function work($id)
    {
        $sql = "SELECT * FROM konsultasi JOIN user
        ON konsultasi.id_user=user.id_user  WHERE jenis_kehamilan = '$id' AND id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";

        $query = $this->db->query($sql);
        return $query->result();
    }
    public function hitungjumlah($id)
    {
        $sql = "SELECT * FROM konsultasi JOIN user
        ON konsultasi.id_user=user.id_user  WHERE jenis_kehamilan = '$id' AND id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";

        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function semua()
    {
        $sql = "SELECT * FROM konsultasi JOIN user
        ON konsultasi.id_user=user.id_user  WHERE id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getsemuauser()
    {
        return $this->db->get($this->_table); 
    }

    public function getpegawaikasi($id)
    {
        $hak = "level";
 
        //return $this->db->get_where($this->_table, ["divisi" => $id], ["level" => 0])->result();
        $sql = "SELECT * FROM user where divisi = '$id' AND $hak ='2'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getpegawaisemua()
    {
        $sql = "SELECT * FROM user where is_active = '1'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getpegawaistaff()
    {
        $hak = "level";
 
        //return $this->db->get_where($this->_table, ["divisi" => $id], ["level" => 0])->result();
        $sql = "SELECT * FROM user where $hak ='2' AND is_active = '1'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function jumlahpegawaiasisten()
    {
        $hak = "level";
        $id = $this->session->userdata('divisi');
        $instansisekarang = $this->session->userdata('instansisekarang');
        //return $this->db->get_where($this->_table, ["divisi" => $id], ["level" => 0])->result();
        $sql = "SELECT * FROM user where divisi = '$id' AND is_active = '1' AND instansisekarang = '$instansisekarang'
        AND $hak ='2'";
        $query = $this->db->query($sql);
        //return $query->result();
        return $query->num_rows();
    }
    public function jumlahpegawaidivisi($id)
    {
        $hak = "level";
 
        //return $this->db->get_where($this->_table, ["divisi" => $id], ["level" => 0])->result();
        $sql = "SELECT * FROM user where divisi = '$id' AND $hak ='2'";
        $query = $this->db->query($sql);
        //return $query->result();
        return $query->num_rows();
    }
    public function getpegawai($angkatan)
    {
        return $this->db->get_where($this->_table, [$angkatan])->result();

        //$this->db->select('user.*');
        //$this->db->join('user', 'user.id_user = '.$this->_table.'.id_user');
        //return $this->db->get_where($this->_table, ["id_konsultasi" => $id_konsultasi])->row();
    }

    public function dasboard()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('konsultasi','konsultasi.id_user=user.id_user');
        $this->db->join('keluhan_konsultasi','keluhan_konsultasi.id_konsultasi=konsultasi.id_konsultasi');
        $this->db->group_by('jenis_kehamilan');
         $query = $this->db->get();
         return $query->result();
    }
    // public function dasboard()
    // {
    //     $this->db->select('user.id_user, user.nama, konsultasi.jenis_kehamilan, max(konsultasi.id_konsultasi) as maxid , max(keluhan_konsultasi.keluhan) as maxkeluhan');
    //     $this->db->from('user');
    //     $this->db->join('konsultasi','konsultasi.id_user=user.id_user');
    //     $this->db->join('keluhan_konsultasi','keluhan_konsultasi.id_konsultasi=konsultasi.id_konsultasi');
    //     $this->db->group_by('id_user');
    //      $query = $this->db->get();
    //      return $query->result();
    // }
    public function join3table()
    {
        $this->db->select('user.id_user, user.nama, max(konsultasi.jenis_kehamilan) as jenis_kehamilan');
        $this->db->from('user');
        $this->db->join('konsultasi','konsultasi.id_user=user.id_user');
        $this->db->join('keluhan_konsultasi','keluhan_konsultasi.id_konsultasi=konsultasi.id_konsultasi');
        $this->db->where('user.id_user');
        //$this->db->order_by('tanggal',"DESC");
        //$this->db->limit(1);
        $this->db->group_by('tanggal');
         $query = $this->db->get();
         return $query->result();
    }


        public function getibuhamiljeniskehamilan()
    {
        $sql = "SELECT * FROM konsultasi WHERE id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function jumlahuser(){
        ///$query = $this->db->get($this->_table2);
        $sql = "SELECT * FROM konsultasi JOIN user
        ON konsultasi.id_user=user.id_user  WHERE id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function jumlahkehamilannormal(){
        $sql = "SELECT * FROM konsultasi JOIN user
        ON konsultasi.id_user=user.id_user  WHERE jenis_kehamilan = '1' AND id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";

        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function jumlahkehamilanberesiko(){
        $sql = "SELECT * FROM konsultasi JOIN user
        ON konsultasi.id_user=user.id_user  WHERE jenis_kehamilan = '2' AND id_konsultasi IN (SELECT MAX(id_konsultasi) FROM konsultasi  GROUP BY id_user);";

        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->where('id_user', $id)->update($this->_table, $data);
    }
    public function jumlah()
    {
        $sql = "SELECT * FROM user where is_active = '1'";

        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function checkPasswordLama()
    {
        // di cek ke database where id user =  id user yg login dengan session, apakah passwordnya = md5($passwordlama_inputan)
        return $this->db->get_where('user', ["id_user" => $this->session->userdata('id_user')])->row('password');
    }

    public function checkEmailLama($email_inputan)
    {


        return $this->db->get_where('user', ['email' => $email_inputan]);

    }

    public function checkusernameterdaftar($username_inputan)
    {


        return $this->db->get_where('user', ['username' => $username_inputan]);

    }
    public function checkusernamelama($username_inputan)
    {


        return $this->db->get_where('user', ['username' => $username_inputan]);

    }


    public function updateUsername($username_inputan, $id_useribu)
    {
        return $this->db->get_where('user', ['username' => $username_inputan, 'id_user !=' => $id_useribu]);
    }

    public function updateEmail($email_inputan, $id_useribu)
    {
        return $this->db->get_where('user', ['email' => $email_inputan, 'id_user !=' => $id_useribu]);
    }

    public function delete($id)
    {
        $this->db->delete($this->_table, array('id_user' => $id));
    }
}
