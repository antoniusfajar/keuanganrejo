<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_barang extends CI_Controller {

public function __construct(){

	parent::__construct();
	$this->load->model('admin/M_barang');
	$this->load->library('form_validation');
}

	public function tampil_barang(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$databar['barang'] = $this->db->get_where('barang_dagang')->result_array();

        $this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/barang_seting',$databar);
		$this->load->view('admin/admin_footer',$data);
	}

 public function tambahbarang(){

 		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get_where('kategori')->result();
        $data['kd_bar'] = $this->M_barang->kd_bar();
        $this->form_validation->set_rules('id_bar', 'id_bar', 'required');
        $this->form_validation->set_rules('stock', 'stock', 'required');
        $this->form_validation->set_rules('nama_bar', 'nama barang', 'required');
        $this->form_validation->set_rules('harga_jual', 'harga jual', 'required');
        $this->form_validation->set_rules('id_kat', 'id kategori', 'required');
        if( $this->form_validation->run() == FALSE ){
        $this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/tambahbarang',$data);
		$this->load->view('admin/admin_footer',$data);
        }else{
            $this->M_barang->tambahbarang();
            $this->session->set_flashdata('msg', 'Ditambahkan');
            redirect('admin_barang/tampil_barang');
        }

    }


    public function editbarang($id){
    	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $detail['detail'] = $this->M_barang->getbarangById($id);
        $this->form_validation->set_rules('id_bar', 'id_bar', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'required');
        $this->form_validation->set_rules('nama_bar', 'nama Barang', 'required');
        $this->form_validation->set_rules('id_kat', 'nama kategori', 'required');
        $this->form_validation->set_rules('stock', 'stock barang', 'required');
        if( $this->form_validation->run() == FALSE ){
  		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/editbarang',$detail);
		$this->load->view('admin/admin_footer');
        } else{

            $this->M_barang->updatebarang();

            $this->session->set_flashdata('msg', 'Diubah');

            redirect('admin_barang/tampil_barang');
        }

    }



    public function detailbarang($id){

    	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();

        $detail['detail'] = $this->M_barang->getbarangById($id);

        $this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/detailbarang',$detail);
		$this->load->view('admin/admin_footer');

    }

 	

    public function hapusbarang($id){

        $this->M_barang->deletebarang($id);

        $this->session->set_flashdata('msg', 'Dihapus');

        redirect('admin_barang/tampil_barang');


    }
}
