<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class M_hotel extends CI_Model{
	function gender_enums(){
		$query = "SHOW COLUMNS FROM sesi LIKE 'status_pinjam'";
		 $row = $this->db->query("SHOW COLUMNS FROM sesi LIKE 'status_sesi'")->row()->Type;  
		 $regex = "/'(.*?)'/";
				preg_match_all( $regex , $row, $enum_array );
				$enum_fields = $enum_array[1];
				foreach ($enum_fields as $key=>$value)
				{
					$enums[$value] = $value; 
				}
				return $enums;
		}

	function get_detail($id){
		$this->db->select('*');
    $this->db->from('user');
    $this->db->where('user.id_user',$id);
    $query = $this->db->get();
	 return $query;
	}

	function view_all(){    
		$query = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* 
		from peminjaman a 
	 	LEFT join ruang b 
		on a.id_ruang=b.id_ruang
		join sesi c
		on b.id_sesi=c.id_sesi
		join user d
		on a.id_user=d.id_user
		join opd e
		on d.id_opd=e.id_opd
		where status_pinjam=2 
		" );
		 return $query->result();
	}    
	function view_by_date($tgl_awal, $tgl_akhir){ 
		$query = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* 
		from peminjaman a 
	 	LEFT join ruang b 
		on a.id_ruang=b.id_ruang
		join sesi c
		on b.id_sesi=c.id_sesi
		join user d
		on a.id_user=d.id_user
		join opd e
		on d.id_opd=e.id_opd
		where status_pinjam=2 and tgl_pinjam BETWEEN '$tgl_awal' and '$tgl_akhir' 
		ORDER BY tgl_pinjam ASC" );
		 return $query->result();
}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
 	}
	

	public function tampil_data($id){
		return $this->db->query("SELECT a.*,b.*
		from peminjaman a
		join user b
		on a.id_user=b.id_user
		where id_peminjaman='$id'");
	}

 	function get_data($table){
 		return $this->db->get($table);
 	}

	 function get_satu_data($where,$table){
		return $this->db->get_where($table,$where);
	}

 	function insert_data($data,$table){
 		$this->db->insert($table,$data);
 	}

 	function update_data($where,$data,$table){
 		$this->db->where($where);
 		$this->db->update($table,$data);
 	}

 	function delete_data($where,$table){
 		$this->db->where($where);
 		$this->db->delete($table);
 	}

	function Ruang() {
		return $this->db->query("SELECT a.*,b.*,c.*
			from ruang a 
            join opd b 
            on a.id.opd=b.id_opd
			join ruang_gambar c 
            on a.id_ruang_gambar=c.id_ruang_gambar
			group by c.id_ruang
			order by a.id_ruang desc
			limit 0,15");
	}

	function Sesi() {
		return $this->db->query("SELECT * from sesi 
        order by id_sesi desc");
	}

	function ambilsesi()
	{
		$this->db->select('*');
		$this->db->from('sesi');
		$this->db->join('peminjaman', 'peminjaman.id_sesi= sesi.id_sesi');
		$this->db->where('sesi.id_sesi');
		$query = $this->db->get();
		return $query;
	}

	function User() {
		return $this->db->query("SELECT * from user 
        order by id_user");
	}


	function User_grup () {
		return $this->db->query("SELECT * from user_grup 
        order by id_user_grup");
	}

    function Opd() {
		return $this->db->query("SELECT * from opd 
        order by id_opd");
	}

	function RuangId($id_ruang) {
	 	return $this->db->query("SELECT a.*,b.*
         from ruang a 
        join opd b
         on a.id_opd=b.id_opd
         where a.id_ruang='$id_ruang'");
	 }
	
	function PeminjamanId($id_peminjaman) {
		return $this->db->query("SELECT a.*,b.*,d.*
		from peminjaman a 
		join ruang b 
		on a.id_ruang=b.id_ruang
		
		join user d
		on a.id_user=d.id_user
		where a.id_peminjaman='$id_peminjaman'");
	}
   
	 function RuangAll () {
			return $this->db->query("SELECT a.*
			from ruang a 
			group by c.id_ruang
			order by a.id_ruang desc");
	}
	function sesikosong() {
		return $this->db->query("SELECT *
        from sesi
        where status_sesi=0 
        order by sesi.id_sesi desc");
	}

	/*function ruangkosong() {
		return $this->db->query("SELECT a.*,d.* from ruang a join peminjaman c join sesi d where c.id_sesi=d.id_sesi ");
	}*/
	function ruangkosong() {
		return $this->db->query("SELECT a.*,d.* 
		from ruang a 
		join sesi d 
		on a.id_sesi=d.id_sesi 
		where a.status_ruang='0'  ");
	}




	function ruangkosongcard() {
		return $this->db->query("SELECT status_ruang
        from ruang
        where status_ruang = 0 
       ");
	}

	function ruangisi() {
		return $this->db->query("SELECT * 
        from ruang 
        where status_ruang=1");
}

	function pinjamisi() {
		return $this->db->query("SELECT * 
        from peminjaman 
        where status_pinjam=0");

	}

	function statuspinjam() {
		return $this->db->query("SELECT * 
        from peminjaman 
        where status_pinjam=1");
}

	function ReservasiId($id) {
	 	return $this->db->query("SELECT a.*,b.*,c.*,d.*,f.*
         from peminjaman a 
	 	join ruang b 
         on a.id_ruang=b.id_ruang
		join sesi c
		on b.id_sesi=c.id_sesi
		 join user d
         on a.id_user=d.id_user
		join opd f
        on d.id_opd=f.id_opd
         where id_peminjaman='$id'");
	 }
	 function perpanjangan($id_peminjaman) {
		return $this->db->query("SELECT a.*,b.*,c.*,d.*,f.*
		from peminjaman a 
		join ruang b 
		on a.id_ruang=b.id_ruang
	   join sesi c
	   on b.id_sesi=c.id_sesi
		join user d
		on a.id_user=d.id_user
	   join opd f
	   on d.id_opd=f.id_opd
		where id_peminjaman='$id_peminjaman'");
	}

//calender

function fetch_all_event(){
	return $this->db->query("SELECT a.*,b.*,c.* from
	ruang a
	join sesi c
	on a.id_sesi=c.id_sesi
	join peminjaman b
	on a.id_ruang = b.id_ruang
	
	");
	/*$this->db->select('*');
    $this->db->from('ruang');
    $this->db->join('peminjaman', 'peminjaman.id_ruang= ruang.id_ruang');
    //$this->db->where('ruang.id_ruang',$id);
    $query = $this->db->get();
    return $query;*/
	//return $this->db->query("SELECT * from peminjaman join ruang on peminjaman.id_ruang=ruang.id_ruang where ruang=id_ruang");
		
}

function fetch_ruang()
 	{
  		$this->db->order_by("id_ruang", "ASC");
  		$query = $this->db->get("ruang");
  		return $query->result();
 	}

function fetch_by_ruang($id){
	 $this->db->select('*');
	 $this->db->from('ruang');
	 $this->db->join('peminjaman', 'peminjaman.id_ruang= ruang.id_ruang');
	 $this->db->where('ruang.id_ruang',$id);
	 $query = $this->db->get();
	 return $query;
}

	function ruangsemua(){
		return $this->db->query("SELECT * from ruang  
order by ruang.id_ruang desc");
	}
 }