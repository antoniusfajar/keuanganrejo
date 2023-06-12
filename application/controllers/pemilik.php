<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemilik extends CI_Controller {
function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('pemilik_model');
		$this->load->library('form_validation');
}

	public function index(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		
	$namauser = $this->session->userdata('username');
	$status = $this->session->userdata('status');

	if ($status == 'pemilik'){
		$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('pemilik/h_pemilik');
		$this->load->view('pemilik/pemilik_footer',$data);
	}
	else {
		$this->load->view('pemilik/error_404');
	}
	}

	public function lihatLaporan(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		
	$namauser = $this->session->userdata('username');
	$hasil = $this->pemilik_model->tahunlaporan()->result_array();
	$data['tahun'] = $hasil;
	$status = $this->session->userdata('status');
	$this->load->view('pemilik/pemilik_header',$data);
	$this->load->view('pemilik/pemilik_sidebar',$data);
	$this->load->view('pemilik/pemilik_topbar',$data);
	$this->load->view('pemilik/pemilik_footer',$data);
	$this->load->view('pemilik/laporan',$data);
	}

    public function laporanbulan(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		
		$namauser = $this->session->userdata('username');
		$tahun = $this->input->post('tahun');
		$hasil = $this->pemilik_model->bulanlaporan($tahun)->result_array();
		$data['bulan'] = $hasil;
		$data['tahun'] = $tahun;
		$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('pemilik/pemilik_footer',$data);
		$this->load->view('pemilik/laporanbulan',$data);
	}

	public function buat_laporan(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$this->form_validation->set_rules('bulan', 'id laporan', 'required');
    $this->form_validation->set_rules('tahun', 'nama laporan', 'required');
    if( $this->form_validation->run() == FALSE ){
    	$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('pemilik/pemilik_footer',$data);
		$this->load->view('pemilik/laporanbulan',$data);
    }
    else{
	$data['bulan'] = $bulan;
	$data['tahun'] = $tahun;
	$data['akun'] = $this->pemilik_model->akun()->result_array();
	$data['uang'] = $this->pemilik_model->Uang($bulan,$tahun)->result_array();
	$data['barang'] = $this->pemilik_model->Bardag($bulan,$tahun)->result_array();
	$data['prif'] = $this->pemilik_model->prif($bulan,$tahun)->result_array();
	$data['piutang'] = $this->pemilik_model->Piutang($bulan,$tahun)->result_array();
	$data['hutang'] = $this->pemilik_model->Hutang($bulan,$tahun)->result_array();
	$data['biaya'] = $this->pemilik_model->Biaya($bulan,$tahun)->result_array();
	$data['modal'] = $this->pemilik_model->Modal($bulan,$tahun)->result_array();
		$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('pemilik/pemilik_footer',$data);
		$this->load->view('pemilik/tampillaporan',$data);
	}
	}

	public function laporan_jual(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();	
		$tanggal = date('Y-m-d');
		$hasil = $this->pemilik_model->penjualan($tanggal)->result_array();
		$data['jual'] = $hasil;
		$data['tanggal'] = $tanggal;
		$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('pemilik/pemilik_footer',$data);
		$this->load->view('pemilik/laporanjual',$data);
	}

	public function cek_hutang(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$hasil = $this->pemilik_model->gethutang()->result_array();
		$data['pembelian'] = $hasil;
		$namauser = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('pemilik/listhutang',$data);
		$this->load->view('pemilik/pemilik_footer',$data);
	}

	public function logout(){
	$this->session->unset_userdata('username');
	redirect('login');
}

}

