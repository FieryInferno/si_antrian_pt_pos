<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Daftar_model extends CI_Model
{
    private $_table = "user";

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update($data, $nip)
    {
        $this->db->where('nip', $nip);
        $this->db->update($this->_table, $data);
    }
}
