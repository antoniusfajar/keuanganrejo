<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keuangan_model extends CI_Model {

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

public function getidtranslain(){
	$sql = "select MAX(MID(id_trans_lain,4,3)) as trans_lain from transaksi_lain";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->trans_lain) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_trans_lain = "TRS".$no;
	return $id_trans_lain;
}

public function getiddettranslain(){
	$sql = "select MAX(MID(id_det_tran_lain,4,3)) as det_tran_lain from det_tran_lain";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->det_tran_lain) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_det_tran_lain = "DBL".$no;
	return $id_det_tran_lain;
}

public function getiddetpembelian(){
	$sql = "select MAX(MID(id_det_beli,4,3)) as id_det_beli from detail_beli";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_det_beli) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_det_beli = "DTL".$no;
	return $id_det_beli;
}

public function getidpembelian(){
	$sql = "select MAX(MID(id_pembelian,4,3)) as id_pembelian from pembelian";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_pembelian) + 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$idpembelian = "PEM".$no;
	return $idpembelian;
}
public function getDatapembelian($id_pembelian) {
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->where('selesai', '0');
		return $this->db->get('pembelian');
	}
public function getlistpembelian($id_pembelian){
	return $this->db->query(" select detail_beli.id_det_beli,detail_beli.jumlah_beli,detail_beli.sub_total_beli,detail_beli.id_bar,barang_dagang.nama_bar,kategori.satuan,detail_beli.id_pembelian, barang_dagang.harga_beli from detail_beli join barang_dagang on barang_dagang.id_bar = detail_beli.id_bar join kategori on kategori.id_kat = barang_dagang.id_kat WHERE id_pembelian='$id_pembelian' ORDER BY id_det_beli");
}

public function getidbyrpem(){
	$sql = "select max(MID(id_byr_beli,5,3)) as id_byr_beli from byr_pembelian";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_byr_beli)+ 1 ;
		$no = sprintf("%'.03d", $n);
	}
	else {
		$no = "001";
	}
	$id_byr_beli = 'BYRH'.$no;
	return $id_byr_beli;
	}

public function getibyrpen(){
	$sql = "select max(MID(id_byrpen_modal,4,3)) as no_jurnal from byr_penarikan_modal";

	$query = $this->db->query($sql);
	if($query->num_rows() > 0){
		$row = $query->row();
		$n = ((int)$row->id_byrpen_modal) + 1 ;
		$no = sprintf("%'.06d", $n);
	}
	else {
		$no = "001";
	}
	$id_byrpen_modal = "BYRP".$no;
	return $id_byrpen_modal;
	}

public function getbarang($id_barang) {
		$this->db->where('id_bar', $id_barang);
		return $this->db->get('barang_dagang');
	}

public function ceksaldokas($jenisbayar){
		$this->db->where('id_kas', $jenisbayar);
		return $this->db->get('kas');
}

public function cek_sudah_ada($id_bar, $id_pembelian) {
		return $this->db->query("SELECT * FROM detail_beli WHERE id_bar='$id_bar' AND id_pembelian='$id_pembelian'");
	}


public function getjenistran(){
	return $this->db->query('SELECT * from jenis_trans');
}

public function cari_nama($namabar) {
		$this->db->like('nama_bar', $namabar, 'both');
		$this->db->order_by('id_bar', 'ASC');
		$this->db->limit(6);
		return $this->db->get('barang_dagang')->result();
	}

public function getpiutang(){
	return $this->db->query('SELECT * from penjualan where status_byr ="Hutang" ' );
}

public function gethutang(){
	return $this->db->query('SELECT * from pembelian where status_beli ="Hutang" ' );
}
public function getbukbes(){
	return $this->db->query('SELECT * from buku_besar ORDER BY no_jurnal DESC');
}
public function carabayar(){
	return $this->db->query('SELECT * from kas');
}
public function akun(){
	return $this->db->query('SELECT * from akun');
}

public function tahunlaporan(){
	return $this->db->query('SELECT max(mid(tanggal,1,4)) as tahun from buku_besar group by year(tanggal)'); 
}
public function bulanlaporan($tahun){
	return $this->db->query("SELECT month(tanggal) as bulan from buku_besar where year(tanggal)='$tahun' group by month(tanggal)"); 
}

public function getsaldohutang(){
		$this->db->where('no_ref', '411');
		return $this->db->get('akun');
	}

public function getsaldopiutang(){
		$this->db->where('no_ref', '114');
		return $this->db->get('akun');
	}


public function bayarhutang($id_pembelian){
	$this->db->select('*');
	$this->db->from('pembelian');
	$this->db->where('id_pembelian', $id_pembelian);

	return $this->db->get();
}
public function bayarpiutang($id_nota){
	$this->db->select('*');
	$this->db->from('penjualan');
	$this->db->where('id_nota', $id_nota);

	return $this->db->get();
}
public function updatepiutang($saldopiutang){
	$this->db->set('total_saldo',$saldopiutang);
	$this->db->where('no_ref','114');
	$this->db->update('akun');
}

public function Uang($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='111' AND month(tanggal)='$bulan' and year(tanggal)='$tahun' ");
}
public function Bardag($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='112' AND month(tanggal)='$bulan' and year(tanggal)='$tahun' ");
}
public function Hutang($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='411' AND month(tanggal)='$bulan' and year(tanggal)='$tahun'  ");
}
public function Piutang($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='114' AND month(tanggal)='$bulan' and year(tanggal)='$tahun'  ");
}
public function Biaya($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='311' AND month(tanggal)='$bulan' and year(tanggal)='$tahun'  ");
}
public function Modal($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='611' AND month(tanggal)='$bulan' and year(tanggal)='$tahun'  ");
}
public function prif($bulan,$tahun){
	return $this->db->query("SELECT no_ref, sum(debit) as debit, sum(kredit) as kredit from buku_besar where no_ref='211' AND month(tanggal)='$bulan' and year(tanggal)='$tahun'  ");
}
}



