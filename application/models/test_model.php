<?php
class test_model extends CI_Model{
 
    function search_blog($cari){
        $this->db->like('nama_bar', $cari , 'both');
        $this->db->order_by('nama_bar', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang_dagang')->result();
    }
 
}