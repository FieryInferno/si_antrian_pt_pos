<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wesel_model extends CI_Model
{
  private $_table = "wesel";

  public function getsemuawesel($tanggal_awal, $tanggal_akhir)
  {
    if ($tanggal_awal!="" && $tanggal_akhir != "") {
        $this->db->where('waktubuat >=', $tanggal_awal);
        $this->db->where('waktubuat <=', $tanggal_akhir);
    }
    return $this->db->get($this->_table);
  }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->where('idwesel', $id)->update($this->_table, $data);
    }
    public function jumlah()
    {
        $sql = "SELECT * FROM wesel where waktubuat = DATE(NOW())";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function jumlahsemua()
    {
        $sql = "SELECT * FROM wesel";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    public function delete($id)
    {
        $this->db->delete($this->_table, array('idwesel' => $id));
    }

   
}
