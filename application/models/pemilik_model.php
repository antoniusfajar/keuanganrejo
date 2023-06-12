<?php
class pemilik_model extends CI_Model{
 
public function getlaporan(){
	return $this->db->query('SELECT * from laporan' );
}
 
public function tahunlaporan(){
	return $this->db->query('SELECT max(mid(tanggal,1,4)) as tahun from buku_besar group by year(tanggal)'); 
}
public function bulanlaporan($tahun){
	return $this->db->query("SELECT month(tanggal) as bulan from buku_besar where year(tanggal)='$tahun' group by month(tanggal)"); 
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
public function akun(){
	return $this->db->query('SELECT * from akun');
}

public function gethutang(){
	return $this->db->query('SELECT * from pembelian where status_beli ="Hutang" ' );
}
public function penjualan($tanggal){
	return $this->db->query("SELECT * from byr_penjualan where tgl_byr='$tanggal' ");
}

}