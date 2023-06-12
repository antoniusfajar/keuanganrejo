<?php
class pemilik_model extends CI_Model{
 
public function getlaporan(){
	return $this->db->query('SELECT * from laporan' );
}
 
}