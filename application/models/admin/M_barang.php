<?php 
 
class M_barang extends CI_Model{

	public function kd_bar(){
	$sql = "select MAX(MID(id_bar,4,3)) as kd_bar from barang_dagang";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->kd_bar) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$kd_bar = "Bar".$no;
	return $kd_bar;
	}

    public function getnamakat(){
        return $this->db->get('kategori')->result_array();
    }

	public function getAllbarang(){
        return $this->db->get('barang_dagang')->result_array();
    }
    
    public function getbarangById($id)
    {
        $option =array('id_bar' =>$id);
        $query = $this->db->get_where('barang_dagang',$option);
        $ret = $query->row();
        return $ret;
    }

    public function tambahbarang()
    {
        
         $databarang = [

            'id_bar' => $this->input->post('id_bar', true),
            'nama_bar' => $this->input->post('nama_bar', true),
            'harga_jual' => $this->input->post('harga_jual', true),
            'harga_beli' => $this->input->post('harga_beli'),
            'stock'  => $this->input->post('stock'),
            'id_kat' => $this->input->post('id_kat', true),
        ];        


        $this->db->insert('barang_dagang', $databarang);
    }

    public function updatebarang()
    {
    
        $databarang = [
            'id_bar' => $this->input->post('id_bar', true) , 
            'nama_bar' => $this->input->post('nama_bar', true),
            'harga_jual' => $this->input->post('harga_jual', true),
            'harga_beli' => $this->input->post('harga_beli'),
            'stock'  => $this->input->post('stock'),
            'id_kat' => $this->input->post('id_kat', true),
        ];        

        $this->db->where('id_bar', $this->input->post('id_bar', true));
        $this->db->update('barang_dagang', $databarang);
    }

    public function deletebarang($id)
    {
        return $this->db->delete('barang_dagang', array("id_bar" => $id));
    }
}
