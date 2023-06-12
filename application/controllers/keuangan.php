<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keuangan extends CI_Controller {

function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('keuangan/keuangan_model');
		$this->load->library('form_validation');
	}

	public function index(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		
	$namauser = $this->session->userdata('username');
	$status = $this->session->userdata('status');

	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/h_keu',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	else {
		$this->load->view('keuangan/error_404');
	}
	}

	public function tampilpembelian(){
		$kodeawal = "PEM";
		$id_user = $this->session->userdata('username');
		$max = $this->db->query("SELECT MAX(RIGHT(id_pembelian,3)) AS last FROM pembelian ");
		$x = $max->row_array();
		$last = $x['last'];
		$cek = $this->db->query("SELECT * FROM pembelian WHERE substr(id_pembelian,-3)='$last'");
		$i = $cek->row_array();
		$selesai = $i['selesai'];
		if ( $selesai == '0') {
			$id_pembelian = $kodeawal . $last;
		} else {
			$id_pembelian = $this->keuangan_model->getidpembelian();
			$nama_pemasok = "";
			$data = array(
				'id_pembelian' => $id_pembelian,
				'id_nota_beli' => ' ',
				'nama_pemasok' => $nama_pemasok,
				'total_pembelian' => '0',
				'sisa'=>'0',
				'status_beli' => ' ',
				'selesai' => '0'
			);
			$this->db->insert('pembelian', $data);
		}
		redirect('keuangan/pembelian/' . $id_pembelian, 'refresh');
	}

	public function pembelian(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$id_pembelian = $this->uri->segment(3);
	$username = $this->session->userdata('username');
	$data_beli = $this->keuangan_model->getDatapembelian($id_pembelian)->row();
	$list_beli = $this->keuangan_model->getlistpembelian($id_pembelian);
	$namauser = $this->session->userdata('username');
	$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		if ($data_beli) {
			$data['nota'] = $data_beli;
			$data['list'] = $list_beli;
			$data['tot_item'] = 0;
			$data['tot_belanja'] = 0;
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/pembelian',$data);
		$this->load->view('keuangan/keu_footer',$data);
		} 
		else {
			$this->load->view('error404');
		}
	}
	else {
			$this->load->view('keuangan/error_404');
	}
	}

 	public function tambahtransaksipembelian(){
 	$id_beli = $this->input->post('idpembelian');
 	$id_nota = $this->input->post('idnota');
 	$tanggal_beli = $this->input->post('tanggalbeli');
 	$status_beli = $this->input->post('statusbeli');
 	$hargabeli = $this->input->post('hargabeli');
 	$id_barang = $this->input->post('idbar');
 	$hargabelilama = $this->input->post('hargabelilama');
 	$namabar = $this->input->post('namabar');
 	$jumlah_beli = $this->input->post('jumlahbeli');
 	$nama_pemasok = $this->input->post('nama_pemasok');
 	$this->form_validation->set_rules('idpembelian', 'id pembelian', 'required');
   	$this->form_validation->set_rules('idnota', 'tanggal pembelian', 'required');
    $this->form_validation->set_rules('tanggalbeli', 'total beli', 'required');
   	$this->form_validation->set_rules('statusbeli', 'Sisa beli', 'required');
    $this->form_validation->set_rules('hargabeli', 'cara pembayaran', 'required');
    	 if( $this->form_validation->run() == FALSE ){
			$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
			$username = $this->session->userdata('username');
			$data_beli = $this->keuangan_model->getDatapembelian($idpembelian)->row();
			$list_beli = $this->keuangan_model->getlistpembelian($idpembelian);
			if ($data_beli) {
			$data['nota'] = $data_beli;
			$data['list'] = $list_beli;
			$data['tot_item'] = 0;
			$data['tot_belanja'] = 0;
			$this->load->view('keuangan/keu_header',$data);
			$this->load->view('keuangan/keu_sidebar',$data);
			$this->load->view('keuangan/keu_topbar',$data);
			$this->load->view('keuangan/pembelian',$data);
			$this->load->view('keuangan/keu_footer',$data);
			}	
		}
	else{
    $barang = $this->keuangan_model->getbarang($id_barang);
 	$cekbarang = $this->keuangan_model->cek_sudah_ada($id_barang,$id_beli);
 	$keterangan = "Pembelian " .$namabar. " dengan jumlah" .$jumlah_beli. " "; 			
 	$uri = base_url('index.php/keuangan/pembelian/') . $id_beli;
    $subtotal = ($jumlah_beli * $hargabeli);
 	if($cekbarang->num_rows() > 0){
 	echo $this->session->set_flashdata('error', 'Barang sudah ada');
	header("Location: " . $uri, TRUE, $http_response_code);
 	}
 	else{
 	$x = $barang->row_array();
 	$harga_jual = $x['harga_jual'];
 	$stock = $x['stock'];
 	$id_kat = $x['id_kat'];
 	$noref = $x['no_ref'];
 	$stocks = ($stock + $jumlah_beli);
 	$id_bukbes = $this->keuangan_model->getidjurnal();
 	$iddetbeli = $this->keuangan_model->getiddetpembelian();
 		if($hargabelilama != $hargabeli){
  		$detbel= array(
  			'id_det_beli' => $iddetbeli,
  			'id_bar' => $id_barang,
  			'id_pembelian' => $id_beli,
  			'jumlah_beli' => $jumlah_beli,
  			'tanggal_pembelian' => $tanggal_beli,
  			'sub_total_beli' => $subtotal,
  			'keterangan' => $keterangan, 
  		);

  		$bukbes = array(
			'no_jurnal' => $id_bukbes,
			'id_transaksi' => $iddetbeli,
			'tanggal' => $tanggal_beli,
			'no_ref'=> $noref,
			'keterangan' => $keterangan,
			'debit' => $subtotal,
			'kredit'=> '0'	
		);
  		$this->db->query("UPDATE barang_dagang set harga_beli ='$hargabeli', stock='$stocks' where id_bar='$id_barang'");
  		$this->db->insert('detail_beli', $detbel);
  		$this->db->insert('buku_besar', $bukbes);
 		}
 		else{
 		$detbel= array(
  			'id_det_beli' => $iddetbeli,
  			'id_bar' => $id_barang,
  			'id_pembelian' => $id_beli,
  			'jumlah_beli' => $jumlah_beli,
  			'tanggal_pembelian' => $tanggal_beli,
  			'sub_total_beli' => $subtotal,
  			'keterangan' => $keterangan, 
  		);

  		$bukbes = array(
			'no_jurnal' => $id_bukbes,
			'id_transaksi' => $iddetbeli,
			'tanggal' => $tanggal_beli,
			'no_ref'=> $noref,
			'keterangan' => $keterangan,
			'debit' => $subtotal,
			'kredit'=> '0'
		);
  		$this->db->query("UPDATE barang_dagang set stock='$stocks' where id_bar='$id_barang'");
		$this->db->insert('detail_beli', $detbel);
  		$this->db->insert('buku_besar', $bukbes);
 		}
 		$pembelian = array(
  			'id_nota_beli' => $id_nota,
  			'nama_pemasok' => $nama_pemasok,
  			'tanggal' => $tanggal_beli,
  			'status_beli' => $status_beli,
  		);
   		$this->db->where('id_pembelian',$id_beli);
   		$this->db->update('pembelian',$pembelian);
   		header("Location: " . $uri, TRUE, $http_response_code);
 		}
 	}
 }

	public function hapus_barang_beli() {
		$id_nota = urldecode($this->uri->segment(3));
		$id_bar = urldecode($this->uri->segment(4));
		$id_detail = urldecode($this->uri->segment(5));
		$uri = base_url('index.php/kasir/mesin_kasir/') . $id_nota;
		$this->db->query("DELETE FROM buku_besar WHERE id_transaksi ='$id_detail'");
		$this->db->query("DELETE FROM detail_jual WHERE id_nota ='$id_nota' AND id_bar ='$id_bar'");
		header("Location: " . $uri, TRUE, $http_response_code);
	}

	public function pembelianselesai(){
		$idpembelian = $this->input->post('idpembelian');
		$totalblanja = $this->input->post('totalblanja');
		$jumlahbayar = $this->input->post('jumlahbayar');
		$sisa = $this->input->post('sisab');
		$tglbeli = $this->input->post('tglbeli');
		$jenisbayar = $this->input->post('carabayar');
	 	$this->form_validation->set_rules('idpembelian', 'id pembelian', 'required');
   		$this->form_validation->set_rules('tglbeli', 'tanggal pembelian', 'required');
    	$this->form_validation->set_rules('totalblanja', 'total beli', 'required');
   		$this->form_validation->set_rules('sisab', 'Sisa beli', 'required');
    	$this->form_validation->set_rules('carabayar', 'cara pembayaran', 'required');
    	 if( $this->form_validation->run() == FALSE ){
			$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
			$username = $this->session->userdata('username');
			$data_beli = $this->keuangan_model->getDatapembelian($idpembelian)->row();
			$list_beli = $this->keuangan_model->getlistpembelian($idpembelian);
			if ($data_beli) {
			$data['nota'] = $data_beli;
			$data['list'] = $list_beli;
			$data['tot_item'] = 0;
			$data['tot_belanja'] = 0;
			$this->load->view('keuangan/keu_header',$data);
			$this->load->view('keuangan/keu_sidebar',$data);
			$this->load->view('keuangan/keu_topbar',$data);
			$this->load->view('keuangan/pembelian',$data);
			$this->load->view('keuangan/keu_footer',$data);
			}	
		}
		else{
		$idbyrbeli = $this->keuangan_model->getidbyrpem();
		$selesai = "1";
		$saldokas = $this->keuangan_model->ceksaldokas($jenisbayar);
		$s = $saldokas->row_array();
		$saldo = $s['saldo'];
		$perkas = $saldo - $jumlahbayar;
		if($saldo > $totalblanja){
		$keterangan = "Pembayaran Pembelian Barang";
		if($sisa > 0 ){
			$hurang = $this->keuangan_model->getsaldohutang();
			$h = $hurang->row_array();
			$saldohutang = $h['total_saldo'] + $sisa;
			$idjurnal = $this->keuangan_model->getidjurnal();
			$noref = "411";
			$keterangan1 = "Hutang Pembelian Barang " ;
			$status_beli="Hutang";
			$data=array(
				'id_byr_beli' => $idbyrbeli,
				'id_pembelian' =>$idpembelian,
				'id_kas' => $jenisbayar,
				'jumlah_byr' => $jumlahbayar,
				'tgl_byr_beli' => $tglbeli,
				'keterangan' => $keterangan
			);

			$bukbes = array(
				'no_jurnal' => $idjurnal,
				'id_transaksi' => $idbyrbeli,
				'tanggal' => $tglbeli,
				'no_ref'=> $noref,
				'keterangan' => $keterangan1,
				'debit' => '0',
				'kredit'=> $sisa
			);
			$this->db->query("UPDATE akun set total_saldo='$saldohutang' where no_ref='$noref' ");
			$this->db->insert('buku_besar',$bukbes);
			$this->db->insert('byr_pembelian',$data);
			}

			else if($sisa <=0){
				$status_beli="Lunas";
				$data=array(
					'id_byr_beli' => $idbyrbeli,
					'id_pembelian' =>$idpembelian,
					'id_kas' => $jenisbayar,
					'jumlah_byr' => $jumlahbayar,
					'tgl_byr_beli' => $tglbeli,
					'keterangan' => $keterangan
				);
			$this->db->insert('byr_pembelian',$data);		
			}
		$idjurnal1 = $this->keuangan_model->getidjurnal();
		$bukbes1 = array(
			'no_jurnal' => $idjurnal1,
			'id_transaksi' => $idbyrbeli,
			'tanggal' => $tglbeli,
			'no_ref'=> '111',
			'keterangan' => $keterangan,
			'debit' => '0',
			'kredit'=> $jumlahbayar
		);
		$this->db->insert('buku_besar',$bukbes1);
		$this->db->query('update kas set saldo="$perkas" where
			id_kas="jenisbayar" ');
		$update= array(
			'total_pembelian' => $totalblanja,
			'sisa'=> $sisa,
			'status_beli' => $status_beli,
			'selesai' => $selesai
		);
		$this->db->where('id_pembelian',$idpembelian);
		$this->db->update('pembelian',$update);
		redirect('keuangan/transaksilainselesai/');
		}
	else {
		echo 'Saldo Tidak Cukup';
		}
	}
	}

public function bukubesar(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$hasil = $this->keuangan_model->getbukbes()->result_array();
		$saldo = $this->keuangan_model->akun()->result_array();
		$data['saldo'] = $saldo;
		$data['bukubesar'] = $hasil;
		$namauser = $this->session->userdata('username');
		$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/bukubesar',$data);
		$this->load->view('keuangan/keu_footer',$data);
			}
	else{

	}
	}

	public function cekhutang(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$hasil = $this->keuangan_model->gethutang()->result_array();
		$data['pembelian'] = $hasil;
		$namauser = $this->session->userdata('username');
		$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/listhutang',$data);
		$this->load->view('keuangan/keu_footer',$data);
		}
	}

	public function bayar_hutang(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$id_pembelian = $this->uri->segment(3);
	$data['piutang'] = $this->keuangan_model->bayarhutang($id_pembelian)->row();
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/bayar_hutang',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}

	public function simpanbayar_hutang(){
	$idpembelian = $this->input->post('idpembelian');
	$totalblanja = $this->input->post('total_hutang');
	$jumlahbayar = $this->input->post('jumlahbyr');
	$sisa = $this->input->post('sisahutang');
	$tglbeli = $this->input->post('tanggalbyr');
	$jenisbayar = $this->input->post('carabayar');
	$this->form_validation->set_rules('idpembelian', 'id Pembelian', 'required');
    $this->form_validation->set_rules('tanggalbyr', 'tanggal bayar', 'required');
    $this->form_validation->set_rules('carabayar','cara pembayaran','required');
    $this->form_validation->set_rules('jumlahbyr','jumlah bayar','required');

    if( $this->form_validation->run() == FALSE ){
	$data['piutang'] = $this->keuangan_model->bayarhutang($idpembelian)->row();
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/bayar_hutang',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	else{
	$hurang = $this->keuangan_model->getsaldohutang();
	$h = $hurang->row_array();
	$idbyrbeli = $this->keuangan_model->getidbyrpem();
	$selesai = "1";
	$saldokas = $this->keuangan_model->ceksaldokas($jenisbayar);
	$s = $saldokas->row_array();
	$saldo = $s['saldo'];
	$perkas = $saldo - $jumlahbayar;
	$saldohutang = $h['total_saldo'] - $jumlahbayar;
		if($saldo > $totalblanja){
		$keterangan = "Pembayaran Hutang Pembelian";
		if($sisa > 0 ){
			$idjurnal = $this->keuangan_model->getidjurnal();
			$noref = "411";
			$status_beli="Hutang";
			$data=array(
				'id_byr_beli' => $idbyrbeli,
				'id_pembelian' =>$idpembelian,
				'id_kas' => $jenisbayar,
				'jumlah_byr' => $jumlahbayar,
				'tgl_byr_beli' => $tglbeli,
				'keterangan' => $keterangan
			);

			$bukbes = array(
				'no_jurnal' => $idjurnal,
				'id_transaksi' => $idbyrbeli,
				'tanggal' => $tglbeli,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => $jumlahbayar,
				'kredit'=> '0'
			);
			$this->db->insert('buku_besar',$bukbes);
			$this->db->insert('byr_pembelian',$data);
			}

			else if($sisa <=0){
				$status_beli="Lunas";
				$idjurnal = $this->keuangan_model->getidjurnal();
				$noref = "411";
				$data=array(
					'id_byr_beli' => $idbyrbeli,
					'id_pembelian' =>$idpembelian,
					'id_kas' => $jenisbayar,
					'jumlah_byr' => $jumlahbayar,
					'tgl_byr_beli' => $tglbeli,
					'keterangan' => $keterangan
				);

			$bukbes1 = array(
				'no_jurnal' => $idjurnal,
				'id_transaksi' => $idbyrbeli,
				'tanggal' => $tglbeli,
				'no_ref'=> '411',
				'keterangan' => $keterangan,
				'debit' => $jumlahbayar,
				'kredit'=> '0'
			);
			$this->db->insert('byr_pembelian',$data);
			$this->db->insert('buku_besar',$bukbes1);		
			}

		$idjurnal1 = $this->keuangan_model->getidjurnal();
		$bukbes2 = array(
			'no_jurnal' => $idjurnal1,
			'id_transaksi' => $idbyrbeli,
			'tanggal' => $tglbeli,
			'no_ref'=> '111',
			'keterangan' => $keterangan,
			'debit' => '0',
			'kredit'=> $jumlahbayar
		);
		$this->db->insert('buku_besar',$bukbes2);
		$this->db->query("update kas set saldo='$perkas' where
			id_kas='$jenisbayar' ");
		$this->db->query("update akun set total_saldo='$saldohutang' where no_ref='411' ");
		$update= array(
			'sisa'=> $sisa,
			'status_beli' => $status_beli,
			'selesai' => $selesai
		);
		$this->db->where('id_pembelian',$idpembelian);
		$this->db->update('pembelian',$update);
		redirect('keuangan/transaksilainselesai/');
		}
	else {
		echo 'Saldo Tidak Cukup';
		}
	}
	}

	public function cekpiutang(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$piutang = $this->keuangan_model->getpiutang()->result_array();
		$data['penjualan'] = $piutang;
		$namauser = $this->session->userdata('username');
		$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/list_hutang',$data);
		$this->load->view('keuangan/keu_footer',$data);
			}
		}

	public function bayar_piutang(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$id_nota = urldecode($this->uri->segment(3));
	$data['piutang'] = $this->keuangan_model->bayarpiutang($id_nota)->row();
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/bayar_piutang',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}

	public function simpanbayar_piutang(){
	$idpembelian = $this->input->post('id_nota');
	$totalblanja = $this->input->post('total_piutang');
	$jumlahbayar = $this->input->post('jumlahbyr');
	$sisa = $this->input->post('sisapiutang');
	$tglbeli = $this->input->post('tanggalbyr');
	$jenisbayar = $this->input->post('carabayar');

	$this->form_validation->set_rules('id_nota', 'id nota Pembelian', 'required');
    $this->form_validation->set_rules('tanggalbyr', 'tanggal bayar', 'required');
    $this->form_validation->set_rules('carabayar','cara pembayaran','required');
    $this->form_validation->set_rules('jumlahbyr','jumlah bayar','required');

    if( $this->form_validation->run() == FALSE ){
    $id_nota = $this->input->post('id_nota');
	$data['piutang'] = $this->keuangan_model->bayarpiutang($id_nota)->row();
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/bayar_piutang',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	else{
	$piutang = $this->keuangan_model->getsaldopiutang();
	$p = $piutang->row_array();
	$idbyrbeli = $this->keuangan_model->getidbyr();
	$selesai = "1";
	$saldokas = $this->keuangan_model->ceksaldokas($jenisbayar);
	$s = $saldokas->row_array();
	$saldo = $s['saldo'];
	$id_kas = $s['id_kas'];
	$perkas = $saldo + $jumlahbayar;
	$saldopiutang = $p['total_saldo'] - $jumlahbayar;

		if($saldo > $totalblanja){
		$keterangan = "Pembayaran Piutang Penjualan";
		if($sisa > 0 ){
			$idjurnal = $this->keuangan_model->getidjurnal();
			$noref = "114";
			$status_beli="Hutang";
			$data=array(
					'id_pembayaran' => $idbyrbeli,
					'tgl_byr' =>$tglbeli,
					'jml_byr' => $jumlahbayar,
					'keterangan' => $keterangan,
					'id_nota' => $idpembelian,
					'id_kas' => $id_kas
				);

			$bukbes = array(
				'no_jurnal' => $idjurnal,
				'id_transaksi' => $idbyrbeli,
				'tanggal' => $tglbeli,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $jumlahbayar
			);
			$this->db->insert('buku_besar',$bukbes);
			$this->db->insert('byr_penjualan',$data);
			}

			else if($sisa <=0){
				$status_beli="Lunas";
				$idjurnal = $this->keuangan_model->getidjurnal();
				$noref = "114";
				$data=array(
					'id_pembayaran' => $idbyrbeli,
					'tgl_byr' =>$tglbeli,
					'jml_byr' => $jumlahbayar,
					'keterangan' => $keterangan,
					'id_nota' => $idpembelian,
					'id_kas' => $id_kas
				);

			$bukbes1 = array(
				'no_jurnal' => $idjurnal,
				'id_transaksi' => $idbyrbeli,
				'tanggal' => $tglbeli,
				'no_ref'=> '114',
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $jumlahbayar
			);
			$this->db->insert('byr_penjualan',$data);
			$this->db->insert('buku_besar',$bukbes1);		
			}

		$idjurnal1 = $this->keuangan_model->getidjurnal();
		$bukbes2 = array(
			'no_jurnal' => $idjurnal1,
			'id_transaksi' => $idbyrbeli,
			'tanggal' => $tglbeli,
			'no_ref'=> '111',
			'keterangan' => $keterangan,
			'debit' => $jumlahbayar,
			'kredit'=> '0'
		);
		$this->db->insert('buku_besar',$bukbes2);
		$this->db->query("update kas set saldo='$perkas' where
			id_kas='$jenisbayar' ");
		$this->db->query("update akun set total_saldo='$saldopiutang' where no_ref='114' ");
		$update= array(
			'sisa'=> $sisa,
			'status_byr' => $status_beli,
			'selesai' => $selesai
		);
		$this->db->where('id_nota',$idpembelian);
		$this->db->update('penjualan',$update);
		redirect('keuangan/transaksilainselesai/');
		}
	else {
		echo 'Saldo Tidak Cukup';
		}
	}
	}

	public function transaksilain(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$idtransaksi = $this->keuangan_model->getidtranslain();
	$carabayar = $this->keuangan_model->carabayar()->result();
	$jenistransaksi = $this->keuangan_model->getjenistran()->result();
	$data['trans'] = $jenistransaksi;
	$data['kas'] = $carabayar;
	$data['idtran'] = $idtransaksi;
	$namauser = $this->session->userdata('username');
	$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/transaksilain',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
}

	public function tambahtransaksilain(){
		$id_trans_lain = $this->input->post('id_transaksi');
		$jenistransaksi = $this->input->post('jenistransaksi');
		$tanggal_trans = $this->input->post('tanggal_trans');
		$total_trans = $this->input->post('total_trans');
		$jenisbayar = $this->input->post('jenisbayar');
		$keterangan = $this->input->post('Keterangan');
		$bukti = $this->input->post('bukti');
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'required');
    $this->form_validation->set_rules('jenistransaksi', 'Jenis Transaksi', 'required');
    $this->form_validation->set_rules('tanggal_trans','tanggal transaksi','required');
    $this->form_validation->set_rules('total_trans','Total transaksi','required');
	$this->form_validation->set_rules('jenisbayar','cara pembayaran','required');
    if( $this->form_validation->run() == FALSE ){
    $data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();	
    $idtransaksi = $this->keuangan_model->getidtranslain();
	$carabayar = $this->keuangan_model->carabayar()->result();
	$jenistransaksi = $this->keuangan_model->getjenistran()->result();
	$data['trans'] = $jenistransaksi;
	$data['kas'] = $carabayar;
	$data['idtran'] = $idtransaksi;
	$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/transaksilain',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	else{
		$saldokas = $this->keuangan_model->ceksaldokas($jenisbayar);
		$s = $saldokas->row_array();
		$saldo = $s['saldo'];
		if ($jenistransaksi == 'TRANS01'){
			$iddettransaksi = $this->keuangan_model->getiddettranslain();
			$id_jurnal = $this->keuangan_model->getidjurnal();
			$noref = "112";
			$norefp = "211";
			$data = array(
				'id_trans_lain' => $id_trans_lain, 
				'jenis_transaksi' => $jenistransaksi,
				'total_transaksi' => $total_trans
				);

			$data2 = array(
				'id_det_tran_lain' => $iddettransaksi, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $norefp,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'NUlL'
				);

			$bukbes1 = array(
				'no_jurnal' => $id_jurnal,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $norefp,
				'keterangan' => $keterangan,
				'debit' => $total_trans,
				'kredit'=> '0'
						); 
			$this->db->insert('transaksi_lain',$data);
			$this->db->insert('det_tran_lain', $data2);
			$this->db->insert('buku_besar', $bukbes1);

			if ($jenisbayar == 'Kas01'){
			$iddettransaksi1 = $this->keuangan_model->getiddettranslain(); 
			$id_jurnal1 = $this->keuangan_model->getidjurnal();
			$data3 = array(
				'id_det_tran_lain' => $iddettransaksi1, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $noref,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'Null'
				);
			$bukbes2 = array(
				'no_jurnal' => $id_jurnal1,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $total_trans
						); 

			$total_saldo = $saldo - $total_trans;
			$this->db->insert('det_tran_lain', $data3);
			$this->db->insert('buku_besar', $bukbes2);
			$this->db->query("UPDATE kas set saldo ='$total_saldo' where id_kas='Kas01' ");
			}
			else if ($jenisbayar == 'Kas02'){
			$id_jurnal1 = $id_jurnal;
			$iddettransaksi1 = $this->keuangan_model->getiddettranslain(); 
			$id_jurnal1 = $this->keuangan_model->getidjurnal();
			$data3 = array(
				'id_det_tran_lain' => $iddettransaksi1, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $noref,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'Null'
				);

			$bukbes2= array(
				'no_jurnal' => $id_jurnal1,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $total_trans
						); 
			$total_saldo = $saldo - $total_trans;
			$this->db->insert('det_tran_lain', $data3);
			$this->db->insert('buku_besar', $bukbes2);
			$this->db->query("UPDATE kas set saldo ='$total_saldo' where id_kas='Kas02 ");
			}
		}
		else if($jenistransaksi == 'TRANS02'){
		$iddettransaksi = $this->keuangan_model->getiddettranslain();
			$id_jurnal = $this->keuangan_model->getidjurnal();
			$noref = "112";
			$norefp = "611";
			$data = array(
				'id_trans_lain' => $id_trans_lain, 
				'jenis_transaksi' => $jenistransaksi,
				'total_transaksi' => $total_trans
				);

			$data2 = array(
				'id_det_tran_lain' => $iddettransaksi, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $norefp,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'NUlL'
				);

			$bukbes1 = array(
				'no_jurnal' => $id_jurnal,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $norefp,
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $total_trans
						); 
			$this->db->insert('transaksi_lain',$data);
			$this->db->insert('det_tran_lain', $data2);
			$this->db->insert('buku_besar', $bukbes1);

			if ($jenisbayar == 'Kas01'){
			$iddettransaksi1 = $this->keuangan_model->getiddettranslain();
			$id_jurnal1 = $this->keuangan_model->getidjurnal();
			$data3 = array(
				'id_det_tran_lain' => $iddettransaksi1, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $noref,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'Null'
				);

			$bukbes2 = array(
				'no_jurnal' => $id_jurnal1,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => $total_trans,
				'kredit'=> '0'
						); 

			$total_saldo = $saldo + $total_trans;
			$this->db->insert('det_tran_lain', $data3);
			$this->db->insert('buku_besar', $bukbes2);
			$this->db->query("UPDATE kas set saldo ='$total_saldo' where id_kas='Kas01' ");
			}
			else if ($jenisbayar == 'Kas02'){
			$id_jurnal1 = $id_jurnal;
			$iddettransaksi1 = $this->keuangan_model->getiddettranslain(); 
			$id_jurnal1 = $this->keuangan_model->getidjurnal();
			$data3 = array(
				'id_det_tran_lain' => $iddettransaksi1, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $noref,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'Null'
				);

			$bukbes2= array(
				'no_jurnal' => $id_jurnal1,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => $total_trans,
				'kredit'=> '0'
						); 

			$total_saldo = $saldo + $total_trans;
			$this->db->insert('det_tran_lain', $data3);
			$this->db->insert('buku_besar', $bukbes2);
			$this->db->query("UPDATE kas set saldo ='$total_saldo' where id_kas='Kas02 ");
			}
		}
		else if ($jenistransaksi == 'TRANS04'){
		$iddettransaksi = $this->keuangan_model->getiddettranslain();
			$id_jurnal = $this->keuangan_model->getidjurnal();
			$noref = "112";
			$norefp = "311";
			$data = array(
				'id_trans_lain' => $id_trans_lain, 
				'jenis_transaksi' => $jenistransaksi,
				'total_transaksi' => $total_trans
				);

			$data2 = array(
				'id_det_tran_lain' => $iddettransaksi, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $norefp,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'NUlL'
				);

			$bukbes1 = array(
				'no_jurnal' => $id_jurnal,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $norefp,
				'keterangan' => $keterangan,
				'debit' => $total_trans,
				'kredit'=> '0'
						); 
			$this->db->insert('transaksi_lain',$data);
			$this->db->insert('det_tran_lain', $data2);
			$this->db->insert('buku_besar', $bukbes1);

			if ($jenisbayar == 'Kas01'){
			$iddettransaksi1 = $this->keuangan_model->getiddettranslain(); 
			$id_jurnal1 = $this->keuangan_model->getidjurnal();
			$data3 = array(
				'id_det_tran_lain' => $iddettransaksi1, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $noref,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'Null'
				);
			$bukbes2 = array(
				'no_jurnal' => $id_jurnal1,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $total_trans
						); 

			$total_saldo = $saldo - $total_trans;
			$this->db->insert('det_tran_lain', $data3);
			$this->db->insert('buku_besar', $bukbes2);
			$this->db->query("UPDATE kas set saldo ='$total_saldo' where id_kas='Kas01' ");
			}
			else if ($jenisbayar == 'Kas02'){
			$id_jurnal1 = $id_jurnal;
			$iddettransaksi1 = $this->keuangan_model->getiddettranslain(); 
			$id_jurnal1 = $this->keuangan_model->getidjurnal();
			$data3 = array(
				'id_det_tran_lain' => $iddettransaksi1, 
				'id_tran_lain' => $id_trans_lain,
				'no_ref' => $noref,
				'tanggal_transaksi' => $tanggal_trans,
				'jumlah' => $total_trans,
				'keterangan' => $keterangan,
				'bukti' => 'Null'
				);

			$bukbes2= array(
				'no_jurnal' => $id_jurnal1,
				'id_transaksi' => $id_trans_lain,
				'tanggal' => $tanggal_trans,
				'no_ref'=> $noref,
				'keterangan' => $keterangan,
				'debit' => '0',
				'kredit'=> $total_trans
						); 
			$total_saldo = $saldo - $total_trans;
			$this->db->insert('det_tran_lain', $data3);
			$this->db->insert('buku_besar', $bukbes2);
			$this->db->query("UPDATE kas set saldo ='$total_saldo' where id_kas='Kas02 ");
			}
		}
		else {
			echo "Jeniis Transaksi Salah";
		}
			redirect('keuangan/transaksilainselesai/');
		}
	}

	public function transaksilainselesai(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		

		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/transaksi_selesai',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}

	public function laporan(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		
		$namauser = $this->session->userdata('username');
		$hasil = $this->keuangan_model->tahunlaporan()->result_array();
		$data['tahun'] = $hasil;
		$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/laporan',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	}		

    public function laporanbulan(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		
		$namauser = $this->session->userdata('username');
		$tahun = $this->input->post('tahun');
		$hasil = $this->keuangan_model->bulanlaporan($tahun)->result_array();
		$data['bulan'] = $hasil;
		$data['tahun'] = $tahun;
		$status = $this->session->userdata('status');
	if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/laporanbulan',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	}		 

	public function buat_laporan(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$this->form_validation->set_rules('bulan', 'id laporan', 'required');
    $this->form_validation->set_rules('tahun', 'nama laporan', 'required');
    if( $this->form_validation->run() == FALSE ){
    	$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/laporan',$data);
		$this->load->view('keuangan/keu_footer',$data);
    }
    else{
	$data['bulan'] = $bulan;
	$data['tahun'] = $tahun;
	$data['akun'] = $this->keuangan_model->akun()->result_array();
	$data['uang'] = $this->keuangan_model->Uang($bulan,$tahun)->result_array();
	$data['barang'] = $this->keuangan_model->Bardag($bulan,$tahun)->result_array();
	$data['prif'] = $this->keuangan_model->prif($bulan,$tahun)->result_array();
	$data['piutang'] = $this->keuangan_model->Piutang($bulan,$tahun)->result_array();
	$data['hutang'] = $this->keuangan_model->Hutang($bulan,$tahun)->result_array();
	$data['biaya'] = $this->keuangan_model->Biaya($bulan,$tahun)->result_array();
	$data['modal'] = $this->keuangan_model->Modal($bulan,$tahun)->result_array();

		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/tampillaporan',$data);
	}
	}

	public function simpanlaporan(){
	$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
	$idlaporan = $this->input->post('idlaporan');
	$namalaporan = $this->input->post('namalaporan');
	$awal = $this->input->post('awal');
	$akhir = $this->input->post('akhir');
	$uang = $this->input->post('uang');
	$barangdagang = $this->input->post('barangdagang');
	$hutang = $this->input->post('hutang');
	$piutang = $this->input->post('piutang');
	$biaya = $this->input->post('biaya');
	$modal = $this->input->post('modal');
	$modal = $this->input->post('modal');
	$total = $this->input->post('total');

	$buat_laporan= array(
		'id_laporan' =>$idlaporan,
		'nama_laporan' =>$namalaporan,
		'periode_awal' =>$awal,
		'periode_akhir' =>$akhir,
		'total_Uang' =>$uang,
		'total_barangdagang' =>$barangdagang,
		'total_Piutang' =>$piutang,
		'total_biaya' =>$biaya,
		'total_Hutang' =>$hutang,
		'total_modal' =>$modal, 
		'total_saldo' =>$total
	);
		$this->db->insert('laporan', $buat_laporan);

		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('keuangan/transaksi_selesai',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}

	function get_autocomplete(){
		if (isset($_GET['term'])) {
			$result = $this->keuangan_model->cari_nama($_GET['term']);
			if(count($result) > 0) {
				foreach ($result as $row) {
					$arr_result[] = array(
						'label' =>$row->nama_bar, 
						'key' =>$row->id_bar, 
						'pros' =>$row->harga_beli);
				}
				echo json_encode($arr_result);
			}
		}
	}
		
}

