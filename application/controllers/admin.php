<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

public function __construct(){

	parent::__construct();
	$this->load->model('admin/M_user_setting');
	$this->load->library('form_validation');
}

	public function index(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $namauser = $this->session->userdata('username');
        $status = $this->session->userdata('status');
    if ($status == 'admin'){
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/h_admin',$data);
		$this->load->view('admin/admin_footer',$data);
	}
    else{
        $this->load->view('404');
    }
    }


	public function tampil_user(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$datausers['users'] = $this->db->get_where('user')->result_array();
        $namauser = $this->session->userdata('username');
        $status = $this->session->userdata('status');
    if ($status == 'admin'){
        $this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/user_seting',$datausers);
		$this->load->view('admin/admin_footer',$data);
	}
    else{
     $this->load->view('admin/error_404');   
    }
    }

 public function tambahuser(){
 		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('full_name', 'masukkan nama lengkap', 'required');
        $this->form_validation->set_rules('email', 'masukkan email', 'required');
        $namauser = $this->session->userdata('username');
        $status = $this->session->userdata('status');
    if ($status == 'admin'){
        if( $this->form_validation->run() == FALSE ){
        $this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/tambahuser');
		$this->load->view('admin/admin_footer',$data);
        }else{
            $this->M_user_setting->tambahuser();
            $this->session->set_flashdata('msg', 'Ditambahkan');
            redirect('admin/tampil_user');
        }
    }
    else{
        $this->load->view('admin/erorr_404');
    }
    }


    public function edituser($id){
    	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $detail['detail'] = $this->M_user_setting->getuserById($id);
        $this->form_validation->set_rules('full_name', 'username', 'required');
        $this->form_validation->set_rules('status', 'password', 'required');
        $namauser = $this->session->userdata('username');
        $status = $this->session->userdata('status');
    if ($status == 'admin'){
        if( $this->form_validation->run() == FALSE ){
  		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/edituser',$detail);
		$this->load->view('admin/admin_footer');
        } else{

            $this->M_user_setting->updateuser();
            $this->session->set_flashdata('msg', 'Diubah');
            redirect('admin/tampil_user');
        }
    }
    else{
      $this->load->view('admin/error_404');  
    }
    }


    public function detailuser($id){
    	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $detail['detail'] = $this->M_user_setting->getuserById($id);
        $namauser = $this->session->userdata('username');
        $status = $this->session->userdata('status');
    if ($status == 'admin'){
        $this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('admin/detailuser',$detail);
		$this->load->view('admin/admin_footer');
    }
    else{
       $this->load->view('admin/error_404');  
    }
    }

 
    public function hapususer($id){
        $this->M_user_setting->deleteuser($id);
        $this->session->set_flashdata('msg', 'Dihapus');
        redirect('admin/tampil_user');
    }

public function tampil_kategori(){
        $data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $datakategori['kategori'] = $this->db->get_where('kategori')->result_array();
        $namauser = $this->session->userdata('username');
        $status = $this->session->userdata('status');
    if ($status == 'admin'){
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admine_sidebar',$data);
        $this->load->view('admin/admin_topbar',$data);
        $this->load->view('admin/tampil_kategori',$datakategori);
        $this->load->view('admin/admin_footer',$data);
    }
    else{
      $this->load->view('admin/error_404');  
    }
}

 public function tambahkategori(){
        $data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $data2 = array('id_kat' => $this->M_user_setting->getidkat(), );
        $this->form_validation->set_rules('nama_kat', 'nama_kat', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        if( $this->form_validation->run() == FALSE ){
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admine_sidebar',$data);
        $this->load->view('admin/admin_topbar',$data);
        $this->load->view('admin/tambahkategori',$data2);
        $this->load->view('admin/admin_footer',$data);
        }else{
            $this->M_user_setting->tambahkat();
            $this->session->set_flashdata('msg', 'Ditambahkan');
            redirect('admin/tampil_kategori');
        }

    }


    public function editkategori($id){
        $data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $detail['detail'] = $this->M_user_setting->getkatbyid($id);
        $this->form_validation->set_rules('nama_kat', 'nama_kat', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        if( $this->form_validation->run() == FALSE ){
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admine_sidebar',$data);
        $this->load->view('admin/admin_topbar',$data);
        $this->load->view('admin/editkategori',$detail);
        $this->load->view('admin/admin_footer');
        } else{
            $this->M_user_setting->updatekat();
            $this->session->set_flashdata('msg', 'Diubah');
            redirect('admin/tampil_kategori');
        }

    }



    public function detailkategori($id){
        $data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
        $detail['detail'] = $this->M_user_setting->getkatbyid($id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admine_sidebar',$data);
        $this->load->view('admin/admin_topbar',$data);
        $this->load->view('admin/kategori_detail',$detail);
        $this->load->view('admin/admin_footer');

    }

    

    public function hapuskategori($id){
        $this->M_user_setting->deletkat($id);
        $this->session->set_flashdata('msg', 'Dihapus');
        redirect('admin/tampil_kategori');
    }

}
