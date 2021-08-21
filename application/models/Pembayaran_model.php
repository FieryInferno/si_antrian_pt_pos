<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    private $_table = "pembayaran";

    public function getsemuapembayaran($where)
    {
        if ($where!="") {
            $this->db->where('tanggalpembayaran', $where);
        }

        return $this->db->get($this->_table);
    }
    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->where('idpembayaran', $id)->update($this->_table, $data);
    }
    public function jumlah()
    {
        $sql = "SELECT * FROM pembayaran where waktubuat = DATE(NOW())";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function jumlahsemua()
    {
        $sql = "SELECT * FROM pembayaran";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function delete($id)
    {
        $this->db->delete($this->_table, array('idpembayaran' => $id));
    }

   
}