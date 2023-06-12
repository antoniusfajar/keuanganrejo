<?php 
 
class M_user_setting extends CI_Model{


	    public function getAlluser()
    {
        return $this->db->get('user')->result_array();
    }
    
    public function getuserById($id)
    {
        $option =array('user_id' =>$id);
        $query = $this->db->get_where('user',$option);
        $ret = $query->row();
        return $ret;
    }

    public function tambahuser()
    {
         $userdata = [

            'user_id' => ('') , 
            'username' => $this->input->post('username', true),
            'photo' => $this->input->post('photo', true),
            'password' => $this->input->post('password'),
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email', true),
            'status' =>$this->input->post('status', true)
        ];        


        $this->db->insert('user', $userdata);
    }

    public function updateuser()
    {
    
        $datauser = [
            'user_id' =>$this->input->post('user_id', true) , 
            'username' =>$this->input->post('username', true),
            'photo' =>$this->input->post('photo', true),
            'password' =>$this->input->post('password'),
            'full_name' =>$this->input->post('full_name'),
            'email' =>$this->input->post('email', true),
            'status' =>$this->input->post('status', true)
        ];        

        $this->db->where('user_id', $this->input->post('user_id', true));
        $this->db->update('user', $datauser);
    }

    public function deleteuser($id)
    {
        return $this->db->delete('user', array("user_id" => $id));
    }


    public function getAllkategori()
    {
        return $this->db->get('kategori')->result_array();
    }
    
    public function getkatbyid($id)
    {
        $option =array('id_kat' =>$id);
        $query = $this->db->get_where('kategori',$option);
        $ret = $query->row();
        return $ret;
    }

public function getidkat(){
    $sql = "select MAX(MID(id_kat,4,3)) as id_kat from kategori";

    $query = $this->db->query($sql);
    if($query->num_rows() > 0){
        $row = $query->row();
        $n = ((int)$row->id_kat) + 1 ;
        $no = sprintf("%'.02d", $n);
    }
    else {
        $no = "01";
    }
    $id_kat = "kat".$no;
    return $id_kat;
}

    public function tambahkat()
    {
         $katdata = [

            'id_kat' =>  $this->input->post('id_kat', true), 
            'nama_kat' => $this->input->post('nama_kat', true),
            'satuan' => $this->input->post('satuan', true)
                    ];        


        $this->db->insert('kategori', $katdata);
    }

    public function updatekat()
    {
    
        $datakat = [
            'id_kat' =>  $this->input->post('id_kat', true), 
            'nama_kat' => $this->input->post('nama_kat', true),
            'satuan' => $this->input->post('satuan', true)
        ];        

        $this->db->where('id_kat', $this->input->post('id_kat', true));
        $this->db->update('kategori', $datakat);
    }

    public function deletkat($id)
    {
        return $this->db->delete('kategori', array("id_kat" => $id));
    }
}

