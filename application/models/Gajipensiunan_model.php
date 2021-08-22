<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gajipensiunan_model extends CI_Model
{
  private $_table = "gajipensiunan";

  public function getsemuagajipensiunan($tanggal_awal, $tanggal_akhir)
  {
    if ($tanggal_awal!="" && $tanggal_akhir != "") {
      $this->db->where('tanggal >=', $tanggal_awal);
      $this->db->where('tanggal <=', $tanggal_akhir);
    }
    return $this->db->get($this->_table);
  }
  
  public function save($data)
  {
    $this->db->insert($this->_table, $data);
  }

  public function update($data, $id)
  {
    return $this->db->where('idgajipensiunan', $id)->update($this->_table, $data);
  }
  public function jumlah()
  {
    if ($this->input->get('tanggal')) {
      return $this->db->get_where('gajipensiunan', ['waktubuat' => $this->input->get('tanggal')])->num_rows();
    } else {
      $sql    = "SELECT * FROM gajipensiunan where waktubuat = DATE(NOW())";
      $query  = $this->db->query($sql);
      return $query->num_rows();
    }
  }
  public function jumlahsemua()
  {
      $sql = "SELECT * FROM gajipensiunan";
      $query = $this->db->query($sql);
      return $query->num_rows();
  }
  public function delete($id)
  {
      $this->db->delete($this->_table, array('idgajipensiunan' => $id));
  }
}
