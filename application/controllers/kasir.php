<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends CI_Controller {

function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('kasir/kasir_model');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$databar['barang'] = $this->db->get_where('penjualan')->result_array();
		$namauser = $this->session->userdata('username');
		$status = $this->session->userdata('status');

		$cek = $this->db->query("SELECT * FROM penjualan WHERE nama_kasir='$namauser'");
		$c = $cek->row_array();
		$user = $c['nama_kasir'];
	if ($status == 'kasir'){
		$this->load->view('kasir/kasir_header',$data);
		$this->load->view('kasir/kasir_sidebar',$data);
		$this->load->view('kasir/kasir_topbar',$data);
		$this->load->view('kasir/h_kasir',$databar);
	}
	else
	{
		$this->load->view('kasir/error_404');
	}
	}
	public function get_detail_produk() {
		$id_bar = $this->input->post('id_bar');
		$data = $this->kasir_model->get_detail_produk($id_bar);
		echo json_encode($data);
	}

	public function barangdagang(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$databar['barang'] = $this->db->get_where('barang_dagang')->result_array();

		$this->load->view('kasir/kasir_header',$data);
		$this->load->view('kasir/kasir_sidebar',$data);
		$this->load->view('kasir/kasir_topbar',$data);
		$this->load->view('kasir/databarang',$databar);
	}

	public function detailpenjualan(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$databar['barang'] = $this->db->query("SELECT * FROM penjualan WHERE selesai='1' ")->result_array();
		$namauser = $this->session->userdata('username');

		$cek = $this->db->query("SELECT * FROM penjualan WHERE nama_kasir='$namauser'");
		$c = $cek->row_array();
		$user = $c['nama_kasir'];
		if ($user == $namauser){
		$this->load->view('kasir/kasir_header',$data);
		$this->load->view('kasir/kasir_sidebar',$data);
		$this->load->view('kasir/kasir_topbar',$data);
		$this->load->view('kasir/list_jual',$databar);
	}
	else
	{
		$this->load->view('error404');
	}
	}

	public function nomor_faktur() {
		$ymd = date('dmy');
		$tgl_now = date('d-m-Y');
		$waktu = date('H:i:s');
		$kodeawal = "NOT";
		$id_user = $this->session->userdata('username');
		$max = $this->db->query("SELECT MAX(RIGHT(id_nota,3)) AS last FROM penjualan ");
		$x = $max->row_array();
		$last = $x['last'];
		$cek = $this->db->query("SELECT * FROM penjualan WHERE substr(id_nota,-3)='$last'");
		$i = $cek->row_array();
		$user = $i['nama_kasir'];
		$selesai = $i['selesai'];
		if ($user == $id_user && $selesai == '0') {
			$id_nota = $kodeawal . $last;
		} else {
			$id_nota = $this->kasir_model->getidnota();
			$nama_pem = "";
			$data = array(
				'id_nota' => $id_nota,
				'grand_total' => '0',
				'nama_kasir' => $id_user,
				'nama_pembeli' => $nama_pem,
				'sisa' => ' ',
				'status_byr' => ' ',
				'selesai' => '0'
			);
			$this->db->insert('penjualan', $data);
		}
		redirect('kasir/mesin_kasir/' . $id_nota, 'refresh');
	}

	public function id_nota_baru() {
		$ymd = date('dmy');
		$tgl_now = date('d-m-Y');
		$waktu = date('H:i:s');
		$id_user = $this->session->userdata('username');
		$nofaktur = $this->kasir_model->getidnota();
		$data = array(
			'id_nota' => $nofaktur,
			'grand_total' => '0',
			'nama_kasir' => $id_user,
			'nama_pem' => ' ',
			'selesai' => '0',
		);
		$this->db->insert('penjualan', $data);
		redirect('kasir/mesin_kasir/' . $nofaktur, 'refresh');
	}

	public function mesin_kasir() {
		$data1['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$id_nota = $this->uri->segment(3);
		$username = $this->session->userdata('username');
		$data_faktur = $this->kasir_model->getDataPenjualan($id_nota, $username)->row();
		$list_barang = $this->kasir_model->getListPenjualan($id_nota);
		if ($data_faktur) {
			$data['tgl'] = date('Y-m-d');
			$data['nota'] = $data_faktur;
			$data['list'] = $list_barang;
			$data['tot_item'] = 0;
			$data['tot_belanja'] = 0;
			$data['belanja'] = $this->kasir_model->getTotalBelanja($id_nota)->row();	
		$this->load->view('kasir/kasir_header',$data1);
		$this->load->view('kasir/kasir_sidebar',$data1);
		$this->load->view('kasir/kasir_topbar',$data1);
		$this->load->view('kasir/penjualan',$data);
		} 
		else {
			$this->load->view('error404');
		}
	}

	function get_autocomplete(){
		if (isset($_GET['term'])) {
			$result = $this->kasir_model->cari_nama($_GET['term']);
			if(count($result) > 0) {
				foreach ($result as $row) {
					$arr_result[] = array(
						'label' =>$row->nama_bar, 
						'key' =>$row->id_bar);
				}
				echo json_encode($arr_result);
			}
		}
	}


	public function cekbarang() {
		$id_nota = urldecode($this->uri->segment(3));
		$id_bar = urldecode($this->uri->segment(4));
		$barang = $this->kasir_model->getbarang($id_bar);
		$cek_detail_jual = $this->kasir_model->cek_sudah_ada($id_bar, $id_nota);
		$cek_stok = $this->kasir_model->cek_jumlah_stok($id_bar);
		$x = $barang->row_array();
		$noref = $x['no_ref'];
		$harga_jual = $x['harga_jual'];
		$jumlah = "1";
		$subtotal = ($harga_jual * $jumlah);
		$uri = base_url('index.php/kasir/mesin_kasir/') . $id_nota;

		if ($barang->num_rows() > 0) {
			$b = $cek_stok->row_array();
			$stok_sekarang = $b['stock'];
				if ($cek_detail_jual->num_rows() > 0) {
					$s = $cek_detail_jual->row_array();
					$jum_beli = $s['jml_beli'];
					$jum_beli_sekarang = $jumlah + $jum_beli;
					$subtot_sekarang = ($harga_jual * $jum_beli_sekarang);
						if ($jum_beli_sekarang > $stok_sekarang) {
							echo $this->session->set_flashdata('error', 'Stok bahan tidak cukup');
							header("Location: " . $uri, TRUE, $http_response_code);
						} 
						else{
						$this->db->query("UPDATE detail_jual SET jml_beli='$jum_beli_sekarang', sub_total='$subtot_sekarang' WHERE id_bar='$id_bar' AND id_nota='$id_nota' ");
						header("Location: " . $uri, TRUE, $http_response_code);
						}
				} 
				else {
					if ($stok_sekarang < $jumlah) {
					echo $this->session->set_flashdata('error', 'Stok bahan tidak cukup');
					header("Location: " . $uri, TRUE, $http_response_code);
					} 
					else {
						if ($subtotal < 0) {
						echo $this->session->set_flashdata('error', 'Error');
						header("Location: " . $uri, TRUE, $http_response_code);
						} 
						else {
						$id_bukbes = $this->kasir_model->getidjurnal();
						$keterangan = 'Penjualan ' .$id_nota.' '. $x['nama_bar'] . ' dengan jumlah ' . $jumlah; 
						$id_detail = $this->kasir_model->getiddetail();
						$date = date('Y-m-d');
						$input = array(
							'id_detail' => $id_detail,
							'jml_beli' => $jumlah,
							'sub_total' => $subtotal,
							'tanggal_jual'=> $date,
							'ket_jual'=> $keterangan,
							'id_bar' => $x['id_bar'],
							'id_nota' => $id_nota,
						); 

						$bukbes = array(
							'no_jurnal' => $id_bukbes,
							'id_transaksi' => $id_detail,
							'tanggal' => $date,
							'no_ref'=> $noref,
							'keterangan' => $keterangan,
							'debit' => '0',
							'kredit'=> $subtotal
						);
						$this->db->insert('detail_jual', $input);
						$this->db->insert('buku_besar', $bukbes);
						$uril = base_url('index.php/kasir/mesin_kasir/') . $id_nota;
						header("Location: " . $uril , TRUE, $http_response_code);
						}
					}
				}
	} 
	else {
			echo $this->session->set_flashdata('error', 'Barang tidak ada');
			header("Location: " . $uri, TRUE, $http_response_code);
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

	public function edit_jumlah_beli() {
		$id_bar = $this->input->post('id_bar_h');
		$id_nota = $this->input->post('id_nota_h');
		$jumlah = $this->input->post('jml');
		$id_detail = $this->input->post('id_det_h');
		$uri = base_url('index.php/kasir/mesin_kasir/') . $id_nota;
		$cek_stok = $this->kasir_model->cek_jumlah_stok($id_bar);
		$cek_harga = $this->kasir_model->getbarang($id_bar);
		$rinci = $this->kasir_model->cek_sudah_ada($id_bar, $id_nota);
		$date = date('Y-m-d');
		$i = $cek_stok->row_array();
		$x = $cek_harga->row_array();
		$noref = $x['no_ref'];
		$stok_sekarang = $i['stock'];
		$subtot_sekarang = ($x['harga_jual'] * $jumlah);
		if ($jumlah > $stok_sekarang) {
			echo $this->session->set_flashdata('error', 'Stok tidak cukup');
			header("Location: " . $uri, TRUE, $http_response_code);
		} else {
			$keterangan = 'Penjualan ' .$id_nota.' '. $x['nama_bar'] . ' dengan jumlah ' . $jumlah; 
			$this->db->query("UPDATE detail_jual SET jml_beli ='$jumlah', sub_total='$subtot_sekarang' ,ket_jual ='$keterangan' WHERE id_bar='$id_bar' AND id_nota='$id_nota'");
			$this->db->query("UPDATE buku_besar SET keterangan='$keterangan', kredit='$subtot_sekarang' where id_transaksi='$id_detail'");
				header("Location: " . $uri, TRUE, $http_response_code);
		}
	}

	public function hapus_faktur() {
		$nofaktur = urldecode($this->uri->segment(3));
		$this->db->query("DELETE FROM detail_jual WHERE id_nota='$id_nota'");
		$this->db->query("DELETE FROM penjualan WHERE id_nota='$id_nota'");
		echo $this->session->set_flashdata('msg', 'Faktur berhasil ' . $id_nota . ' dihapus');
		redirect('kasir/penjualan_pending/', 'refresh');
	}

	public function print_nota() {
		$tgl = date('Y-m-d');
		$waktu = date('H:i:s');
		$id_user = $this->session->userdata('username');
		$id_nota = $this->input->post('id_nota_p');
		$jumlah_bayar = $this->input->post('jml_bayarp');
		$grand_total = $this->input->post('total_belanjak');
		$kembali = $this->input->post('kembalik');
		$notlf = $this->input->post('no_tlf');
		$alamat = $this->input->post('alamat');
		$sisa = $this->input->post('sisak');
		$cr_byar = 'Kas01';
		$nama_pembeli = $this->input->post('nama_pembeli');
		$selesai = 1;
		$cek_piutang = $this->kasir_model->getpiutang();
		$cek_carabayar = $this->kasir_model->getkas($cr_byar);
		$x = $cek_carabayar->row_array();
		$y = $cek_piutang->row_array();
		$saldo_barang = $this->kasir_model->gettotalbarang();
		$no_ref = $x['no_ref'];
		$no_refp = $y['no_ref'];
		$saldouang = $this->kasir_model->getsaldouang();
		$z = $saldouang->row_array();
		$saldouangh = $z['total_saldo'] + $jumlah_bayar;
		$per_saldokas= $x['saldo']  + $jumlah_bayar;
		$per_piutang = $y['total_saldo'] + $sisa;
		$uri = base_url('kasir/mesin_kasir/') . $id_nota;
		$this->db->trans_start();
		$data_nota = $this->kasir_model->getPenjualanSelesai($id_nota, $id_user)->row();
		$list_produk = $this->kasir_model->getListPenjualan($id_nota)->result();
		if ($data_nota && $list_produk) {
			$jumlah_bayar1 = $jumlah_bayar - $kembali;
			$keterangan = 'Pembayaran penjualan '.$id_nota.' dengan jumlah ' . $jumlah_bayar1;
			if ($sisa <= 0){
			$status = "Lunas";	
			$id_byr = $this->kasir_model->getidbyr();	
			$bayar_jual = array(
				'id_pembayaran' => $id_byr,
				'tgl_byr' => $tgl,
				'jml_byr' => $jumlah_bayar1,
				'keterangan' => $keterangan,
				'id_nota' => $id_nota,
				'id_kas' =>  $cr_byar 
			);
			$this->db->insert('byr_penjualan',$bayar_jual);	
			}
			else if($sisa > 0){
			$status = "Hutang";
			$id_byr = $this->kasir_model->getidbyr();
			$keterangan1 = 	'Piutang Penjualan dengan jumlah ' . $sisa ;
			$bayar_jual = array(
				'id_pembayaran' => $id_byr,
				'tgl_byr' => $tgl,
				'jml_byr' => $jumlah_bayar,
				'keterangan' => $keterangan,
				'id_nota' => $id_nota,
				'id_kas' =>  $cr_byar 
			);
			$id_jurnal1 = $this->kasir_model->getidjurnal();
			$bukbes1 = array(
			'no_jurnal' => $id_jurnal1,
			'id_transaksi' => $id_nota,
			'tanggal' => $tgl,
			'no_ref'=> $no_refp,
			'keterangan' => $keterangan1,
			'debit' => $sisa,
			'kredit'=> '0'
						);
			$this->db->insert('buku_besar', $bukbes1);
			$this->db->insert('byr_penjualan',$bayar_jual);
			$this->db->query("Update akun set total_saldo='$per_piutang' where no_ref='$no_refp' ");
			}
			else {
				echo $this->session->set_flashdata('error', 'Nilai Saldo Salah');
				header("Location: " . $uri, TRUE, $http_response_code);
			}
			$id_jurnal = $this->kasir_model->getidjurnal();
			$bukbes = array(
			'no_jurnal' => $id_jurnal,
			'id_transaksi' => $id_byr,
			'tanggal' => $tgl,
			'no_ref'=> $no_ref,
			'keterangan' => $keterangan,
			'debit' => $jumlah_bayar1,
			'kredit'=> '0'
						);
			$this->db->insert('buku_besar', $bukbes);
			$this->db->query("Update akun set total_saldo ='$saldo_barang' where no_ref='112' ");
			$this->db->query("Update kas set saldo='$per_saldokas' where id_kas='$cr_byar' ");
			$this->db->query("Update akun set total_saldo ='$saldouangh' where no_ref='111' ");
			$update = array(
				'grand_total' => $grand_total,
				'nama_pembeli' => $nama_pembeli,
				'no_telf' => $notlf,
				'alamat' => $alamat,
				'status_byr' => $status,
				'sisa' => $sisa,
				'selesai' => $selesai
			);
			$this->db->where('nama_kasir', $id_user);
			$this->db->where('id_nota', $id_nota);
			$this->db->update('penjualan', $update);
			$this->db->trans_complete();
			$data_cetak['nota'] = $data_nota;
			$data_cetak['napem'] = $nama_pembeli;
			$data_cetak['naka']= $id_user;
			$data_cetak['tgl'] = $tgl;
			$data_cetak['sisa'] = $sisa;
			$data_cetak['status'] = $status;
			$data_cetak['waktu'] = $waktu;
			$data_cetak['bayar'] = $jumlah_bayar;
			$data_cetak['kembali'] = $kembali;
			$data_cetak['produk'] = $list_produk;
			$data_cetak['total_item'] = 0;
			$data_cetak['subtotal'] = 0;
			$this->load->view('kasir/struk_transaksi', $data_cetak);
		} else {
			echo "Error retrieving information from server. <br><br>Halaman ini tidak bisa dimuat ulang, silahkan tutup halaman ini.";
		}
	}

	public function transaksi_selesai() {
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();		

		$this->load->view('kasir/kasir_header',$data);
		$this->load->view('kasir/kasir_sidebar',$data);
		$this->load->view('kasir/kasir_topbar',$data);
		$this->load->view('kasir/transaksi_selesai',$data);
	}
}