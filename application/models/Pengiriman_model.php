<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman_model extends CI_Model
{
  private $_table = "pengiriman";

  public function getsemuapengiriman($tanggal_awal, $tanggal_akhir)
  {
    if ($tanggal_awal != "" && $tanggal_akhir != "") {
        $this->db->where('tanggalpengiriman >=', $tanggal_awal);
        $this->db->where('tanggalpengiriman <=', $tanggal_akhir);
    }
    return $this->db->get($this->_table);
  }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->where('idpengiriman', $id)->update($this->_table, $data);
    }
    public function jumlah()
    {
        $sql = "SELECT * FROM pengiriman where waktubuat = DATE(NOW())";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function jumlahsemua()
    {
        $sql = "SELECT * FROM pengiriman";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function delete($id)
    {
        $this->db->delete($this->_table, array('idpengiriman' => $id));
    }

   
}
