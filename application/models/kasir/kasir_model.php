	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model {

public function getidnota(){
	$sql = "select MAX(MID(id_nota,4,3)) as id_nota from penjualan";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_nota) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_nota = "NOT".$no;
	return $id_nota;
}

public function getidbyr(){
	$sql = "select MAX(MID(id_pembayaran,4,3)) as id_pembayaran from byr_penjualan";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_pembayaran) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_byr = "PEM".$no;
	return $id_byr;
}

public function getidjurnal(){
	$sql = "select max(no_jurnal) as no_jurnal from buku_besar";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->no_jurnal) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_jurnal = $no;
	return $id_jurnal;
	}

public function gettotalbarang(){
	$sql ="select sum(stock * harga_jual) as total_barang from barang_dagang";
	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$saldo_barang = ((int)$row->total_barang) ;
	}
	else {
		$saldo_barang = "0";
	}
	return $saldo_barang;
}

public function getiddetail(){
	$sql = "select MAX(MID(id_detail,4,3)) as id_detail from detail_jual";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_detail) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_detail = "DET".$no;
	return $id_detail;
	}

public function get_detail_produk($id_bar) {
		$hsl = $this->db->query("SELECT barang_dagang.stock, barang_dagang.nama_bar, barang_dagang.harga_beli, barang_dagang.harga_jual, kategori.satuan , kategori.nama_kat FROM barang_dagang LEFT JOIN kategori ON barang_dagang.id_kat = kategori.id_kat WHERE tabel_barang.id_bar='$id_bar'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'nama_bar' => $data->nama_bar,
					'stock' => $data->stock,
					'harga_jual' => $data->harga_jual,
					'kategori' => $data->nama_kat,
					'harga_beli' => $data->harga_beli,
					'satuan' => $data->satuan,
				);
			}
		}
		return $hasil;
	}

	public function get_list_jual($id_nota) {
		return $this->db->select('detail_jual.*')
			->where('detail_jual.id_nota', $id_nota)
			->get('detail_jual')
			->result();
	}

	public function detail_faktur($id_nota) {
		return $this->db->select('penjualan.*')
			->where('penjualan.id_nota', $id_nota)
			->where('penjualan.selesai', '1')
			->get('penjualan')
			->row();
	}

	public function getProdukRetur($id_nota, $id_bar) {
		return $this->db->select('detail_jual.*')
			->where('detail_jual.id_nota', $id_nota)
			->where('tabel_rinci_penjualan.kd_barang', $id_barang)
			->get('detail_jual');
	}

	public function dataTransaksiHariIni($tgl) {
		return $this->db->select('penjualan.*')
			->where('penjualan.tanggal', $tgl)
			->where('penjualan.selesai', '1')
			->order_by('id_nota')
			->get('penjualan');
	}

	public function reprintStruk($id_nota) {
		$this->db->where('id_nota', $id_nota);
		return $this->db->get('penjualan');
	}

	public function getProdukDijual($id_nota) {
		$this->db->where('id_nota', $id_nota);
		return $this->db->get('detail_jual');
	}

	public function getRekapHarian($tgl_sort) {
		$this->db->where('selesai', '1');
		$this->db->where('tgl_penjualan', $tgl_sort);
		return $this->db->get('penjualan');
	}
	
	public function getDataPenjualan($id_nota, $username) {
		$this->db->where('id_nota', $id_nota);
		$this->db->where('nama_kasir', $username);
		$this->db->where('selesai', '0');
		return $this->db->get('penjualan');
	}

	public function getbarang($id_bar) {
		$this->db->where('id_bar', $id_bar);
		return $this->db->get('barang_dagang');
	}
	public function getkas($cr_byr) {
		$this->db->where('id_kas', $cr_byr);
		return $this->db->get('kas');
	}
	public function getpiutang() {
		$this->db->where('no_ref', '114');
		return $this->db->get('akun');
	}

	public function getsaldouang(){
		return $this->db->query("SELECT * FROM akun WHERE no_ref='111' ");
	}
	 public function coba(){
       $this->db->select('
      barang_dagang.*, kategori.id_kat AS id_kat, kategori.nama_kat, kategori.satuan
    ');
    $this->db->join('kategori', 'barang_dagang.id_kat = kategori.id_kat');
    $this->db->from('barang_dagang');
    $query = $this->db->get();
    return $query->result();
   }

	public function cek_sudah_ada($id_bar, $id_nota) {
		return $this->db->query("SELECT * FROM detail_jual WHERE id_bar='$id_bar' AND id_nota='$id_nota'");
	}

	public function cek_jumlah_stok($id_bar) {
		return $this->db->query("SELECT stock from barang_dagang where id_bar='$id_bar'");
	}


	public function getListPenjualan($id_nota) {
		return $this->db->query(" select detail_jual.id_detail,detail_jual.jml_beli,detail_jual.sub_total,detail_jual.id_bar,barang_dagang.nama_bar,kategori.satuan,detail_jual.id_nota , barang_dagang.harga_jual from detail_jual join barang_dagang on barang_dagang.id_bar = detail_jual.id_bar join kategori on kategori.id_kat = barang_dagang.id_kat WHERE id_nota='$id_nota' ORDER BY id_detail");
	}

	public function getbayarjual(){

	}
	public function getTotalBelanja($id_nota) {
		return $this->db->query("SELECT SUM(sub_total) AS tot_bel FROM detail_jual WHERE id_nota='$id_nota'");
	}

	public function cari_nama($nama_bar) {
		$this->db->like('nama_bar', $nama_bar,'both');
		$this->db->order_by('id_bar', 'ASC');
		$this->db->limit(6);
		return $this->db->get('barang_dagang')->result();
	}
	
	public function cari_barang($nama_bar) {
		return $this->db->query("SELECT * FROM barang_dagang WHERE nama_bar like '% '$nama_bar'  %' ");
	}

	public function getPenjualanSelesai($id_nota, $id_user) {
		$this->db->where('id_nota', $id_nota);
		$this->db->where('nama_kasir', $id_user);
		return $this->db->get('penjualan');
	}

    
}