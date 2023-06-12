<?php
class profil_model extends CI_Model{
 
  public function update($data, $username)
{
    $this->db->where('username', $username);
    $this->db->update('user', $data);
    return $this->db->affected_rows();
}
 
}