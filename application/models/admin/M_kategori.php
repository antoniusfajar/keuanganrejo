<?php 
 
class M_kategori extends CI_Model{


	    public function getAlluser()
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
        $no = sprintf("%'.03d", $n);
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

        $this->db->where('kategori', $this->input->post('id_kat', true));
        $this->db->update('kategori', $datakat);
    }

    public function deletkat($id)
    {
        return $this->db->delete('kategori', array("id_kat" => $id));
    }
}
