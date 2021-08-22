<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
  private $_table = "pembayaran";

  public function getsemuapembayaran($tanggal_awal, $tanggal_akhir)
  {
    if ($tanggal_akhir != "" && $tanggal_awal != '') {
      $this->db->where('tanggalpembayaran >=', $tanggal_awal);
      $this->db->where('tanggalpembayaran <=', $tanggal_akhir);
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
    if ($this->input->get('tanggal')) {
      return $this->db->get_where('pembayaran', ['waktubuat' => $this->input->get('tanggal')])->num_rows();
    } else {
      $sql = "SELECT * FROM pembayaran where waktubuat = DATE(NOW())";
      $query = $this->db->query($sql);
      return $query->num_rows();
    }
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
