<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class M_tamu extends CI_Model{

	function insert_data($data,$table){
 		$this->db->insert($table,$data);
 	}
	
	 function Ruang() {
		return $this->db->query("select a.*
			from ruang a 
            
			group by c.id_ruang
			order by a.id_ruang desc
			limit 0,15");
	}

	function ruangaja(){
		return $this->db->query("SELECT DISTINCT nama_ruang FROM ruang");
	}
	

	function ruangallsesidanopd ($id,$id2){
		return $this->db->query("SELECT a.*,b.*,c.*,d.*
		from ruang a 
		join sesi b 
		on a.id_sesi=b.id_sesi
		join opd c 
		on a.id_opd=c.id_opd
		join ruang_gambar d 
		on a.id_ruang=d.id_ruang 
		where b.id_sesi='$id' and c.id_opd='$id2'
		group by d.id_ruang
		order by a.id_ruang desc");
}
		function ruangkosong() {
			return $this->db->query("SELECT a.*, b.* 
			from ruang a
			
			where status_ruang=0 
			order by a.id_ruang desc");
		}
	

	function ruangsemua(){
		return $this->db->query("SELECT a.*,d.*
		FROM ruang a
		join sesi d
		on a.id_sesi=d.id_sesi
		
		order by a.id_ruang
		");
	}
	//SELECT a.*,b.waktu_sesi FROM ruang a join sesi b where a.id_ruang='44'and b.id_sesi='11' order by a.id_ruang DESC 
	function cariruang($id){
		return $this->db->query("SELECT DISTINCT a.*, b.waktu_sesi
		FROM ruang a
		join sesi b
		on a.id_sesi=b.id_sesi
		where a.nama_ruang='$id'
	
		");}

	function barangall(){
		return $this->db->query("SELECT a.*,b.*
		FROM barang a
		join jenis_barang b
		on a.id_jenis_barang=b.id_jenis_barang
		GROUP BY a.id_barang
		ORDER BY a.id_barang");
	}
	function barangchart(){
		return $this->db->query("SELECT b.nama_barang,a.jumlah_pinjam FROM pinjam_barang a join barang b on a.id_barang=b.id_barang where 
		a.status_pinjam_barang='1'
		");
	}
	function barangcari($id){
		return $this->db->query("SELECT a.*,b.*
		FROM barang a
		join jenis_barang b
		on a.id_jenis_barang=b.id_jenis_barang
		where a.id_barang='$id'
		GROUP BY a.id_barang
		ORDER BY a.id_barang");
	}

	function pinjamall(){
		return $this->db->query("SELECT a.*,b.*,c.*
		FROM peminjaman a
		join ruang b
		on a.id_ruang=b.id_ruang
		join sesi c
		on a.id_sesi=c.id_sesi
		ORDER BY a.id_ruang");
	}

	
	
/*
		return $this->db->query("SELECT a.*,b.*
		from ruang a 
		join opd b 
		on a.id_opd=b.id_opd
		where a.id_ruang='$id'
		group by a.id_ruang
		order by a.id_ruang desc");*/

	function Ruangan()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('sesi', 'peminjaman.id_sesi=sesi.id_sesi');
		$this->db->join('ruang', 'peminjaman.id_ruang= ruang.id_ruang');
		$this->db->order_by('peminjaman.id_peminjaman');
		$query = $this->db->get();
		return $query;
	}

 	
 	function KamarKelasKamar($id) {
		return $this->db->query("select a.*,b.*,c.*
			from kamar a join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar
			join kamar_gambar c on a.id_kamar=c.id_kamar where b.id_kelas_kamar='$id'
			group by c.id_kamar
			order by a.id_kamar desc");

	}

	
	function ReservasiId($id) {
		return $this->db->query("SELECT a.*,b.*
		from peminjaman a
		join ruang b on a.id_ruang=b.id_ruang
		
	
		where a.id_peminjaman='$id'");
	}

function PinjamDetail($id)
{
	return $this->db->query("SELECT a.*,b.*,c.*,d.*,e.*
	from ruang a
	join peminjaman b
	on a.id_ruang=b.id_ruang
	join user c 
	on b.id_user=c.id_user
	join sesi d
	on a.id_sesi=d.id_sesi
	join opd e
	on c.id_opd=e.id_opd
	where a.id_ruang='$id'");
	/*
	$this->db->select('*');
    $this->db->from('ruang');
    $this->db->join('peminjaman', 'peminjaman.id_ruang= ruang.id_ruang');
    $this->db->join('user', 'user.id_user=peminjaman.id_user');
	$this->db->where('ruang.id_ruang',$id);
    $query = $this->db->get();
    return $query;*/
}

function coba()
{
	$this->db->select('*');
    $this->db->from('ruang');
    $this->db->join('peminjaman', 'peminjaman.id_ruang= ruang.id_ruang');
    $this->db->where('ruang.id_ruang');
    $query = $this->db->get();
    return $query;
}

	function PeminjamanId($id_peminjaman) {
		return $this->db->query("SELECT a.*,b.*
		from peminjaman a 
		join ruang b 
		on a.id_ruang=b.id_ruang 
		
		where a.id_peminjaman='$id_peminjaman'");
	}
   
	function RuangDetail($id) {
		return $this->db->query("SELECT a.*,b.*
		from ruang a
		join sesi b
		on a.id_sesi=b.id_sesi
		where a.id_ruang='$id' ");
	}
	function BarangDetail($id) {
		return $this->db->query("SELECT a.*,c.* 
		from barang a
		join jenis_barang c on a.id_jenis_barang=c.id_jenis_barang
		where a.id_barang='$id' ");
	}

	function RuangGambarId($id) {
		return $this->db->query("select * from ruang_gambar where id_ruang='$id'");
	}
	//Akhir Kamar

	//Awal Sesi dan opd
	function Sesi() {
		return $this->db->query("select * from sesi 
        order by id_sesi");
	}

    function Opd() {
		return $this->db->query("select * from opd 
        order by id_opd");
	}

	//Akhir sesi dan opd
	
	//Awal Galeri
	// function GaleriKategori() {
	// 	return $this->db->query("select a.*,b.*
	// 		from tbl_kategori_galeri a join tbl_galeri b on a.id_kategori_galeri=b.kategori_galeri_id
	// 		group by a.id_kategori_galeri
	// 		order by a.id_kategori_galeri asc
	// 		");
	// }

	// function GaleriDetail($id) {
	// 	return $this->db->query("select a.*,b.* from tbl_galeri a
	// 	join tbl_kategori_galeri b on a.kategori_galeri_id=b.id_kategori_galeri
	// 	where a.kategori_galeri_id='$id' ");
	// }
	//Akhir galeri
 }