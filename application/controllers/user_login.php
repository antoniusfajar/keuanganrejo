<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index(){
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('pass','pass' ,'required|trim');
		if($this->form_validation->run() == false){
		$this->load->view('login');
		}
		else{
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$user= $this->db->get_where('user',['username' => $username])->row_array();
		if($user != null){
			if($password == $user['password']){
				$data=[
					'username' =>$user['username'],
					'status'=>$user['status']
				];
				if($user['status'] == 'admin'){
				$this->session->set_userdata($data);
				redirect('admin/index');
			    }
			    else if($user['status'] == 'keuangan'){
				$this->session->set_userdata($data);
				redirect('keuangan/index');
			    }
			    else if($user['status'] == 'kasir'){
				$this->session->set_userdata($data);
				redirect('kasir/index');
			    }
			    else {	
				$this->session->set_userdata($data);
				redirect('pemilik/index');
			    }
			}else{
				$this->session->set_flashdata('message','<div class="alert-danger" role="alert">password salah</div>');
				redirect('user_login');
			 }

		}else {
				$this->session->set_flashdata('message','<div class="alert-danger" role="alert">Username tidak terdaftar</div>');
				redirect('user_login');
			}
		}

}
public function logout(){
	$this->session->unset_userdata('username');
	redirect('user_login');
}
}