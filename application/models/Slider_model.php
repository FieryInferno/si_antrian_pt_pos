<?php 
class Slider_model extends CI_model{
    private $_table = "iklantengah";
    public function view($table){
        return $this->db->get($table);
    }
    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    public function getsemuaslider()
    {
        return $this->db->get($this->_table); 
    }
    public function delete($id)
    {
        $this->db->delete($this->_table, array('id_slider' => $id));
    }
}