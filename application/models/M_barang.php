<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class M_barang extends CI_Model{
	function cekqr($kode_barang){
		$query_str = "SELECT * FROM barang WHERE kode_barang= ? ";
        $result = $this->db->query($query_str, array($kode_barang));
          if ($result->num_rows()==1){
              return $result->row(0)->kode_barang;
            }
            else{
              return false;
            }
    }
	function useredit($id_user){
		return $this->db->query("SELECT user_grup.id_user_grup, user_grup.nama_user_grup, opd.id_opd, opd.nama_opd,
		user.id_user, user.nama, user.nip, user.jk, user.username, user.password, user.date_created, user.id_user_grup, user.id_opd 
		FROM user, user_grup, opd  
		where user.id_user_grup=user_grup.id_user_grup and user.id_opd=opd.id_opd 
		and user.id_user=$id_user");
	}

	function adaqr($kode_barang){
        $query_str = "SELECT * FROM barang WHERE kode_barang= ?";
        $result = $this->db->query($query_str,array($kode_barang));
          if ($result->num_rows()==1) {
          $this->db->where('kode_barang',$kode_barang);
          $this->db->get('barang');
          return $result->row(0)->kode_barang;
            }
          else{
            return false;
          }
      }

    function view_all(){    
		$query = $this->db->query("SELECT a.*,b.*,c.*,d.* 
		 from pinjam_barang a 
	 	join barang b 
         on a.id_barang=b.id_barang
		 join user c
         on a.id_user=c.id_user
		 join opd d
		 on c.id_opd=d.id_opd
		 where status_pinjam_barang=2" );
		 return $query->result();
	}    
	function view_by_date($tgl_awal, $tgl_akhir){ 
		$query = $this->db->query("SELECT a.*,b.*,c.*,d.* 
		from pinjam_barang a 
		join barang b 
		on a.id_barang=b.id_barang
		join user c
		on a.id_user=c.id_user
		join opd d
		on c.id_opd=d.id_opd
		where status_pinjam_barang=2 and 
		tgl_pinjam_barang BETWEEN '$tgl_awal' and '$tgl_akhir' 
		ORDER BY tgl_pinjam_barang ASC");
		return $query->result();
}

	function buat_kode_barang()   {    
		$this->db->select('RIGHT(barang.id_barang,4) as kode', FALSE);
		$this->db->order_by('id_barang','DESC');    
		$this->db->limit(1);     
		$query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){       
		 //jika kode ternyata sudah ada.      
		 $data = $query->row();      
		 $kode = intval($data->kode) + 1;     
		}
		else{       
		 //jika kode belum ada      
		 $kode = 1;     
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
		$kodejadi = "BRG".$kodemax;     
		return $kodejadi;  
	   }

	function get_detail($id){
		/*$query=$this->db->query("SELECT a.*,b.*
		FROM user a 
		join user_grup b
		where a.id_user_grup=b.id_user_grup 
		and a.id_user='$id'")->result();
		return $query;*/
		$this->db->select('*');
    $this->db->from('user');
    //$this->db->join('user_grup', 'user.id_user=user_grup.id_user');
    $this->db->where('user.id_user',$id);
    $query = $this->db->get();
	 return $query;
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
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

	
	function barangkosong() {
		return $this->db->query("SELECT a.*, b.* 
        from barang a
        join jenis_barang b 
        on a.id_jenis_barang=b.id_jenis_barang
        where jumlah > 0 
        order by a.id_barang desc");
	}

	function barangkosongcard() {
		return $this->db->query("SELECT jumlah 
        from barang 
        where jumlah > 0 
       ");
	}
	function nungguacc() {
		return $this->db->query("SELECT status_pinjam_barang 
        from pinjam_barang 
        where status_pinjam_barang=0 
       ");
	}

	function Pinjam_barangId($id) {
	 	return $this->db->query("SELECT a.*,b.*,c.*,d.*
         from pinjam_barang a 
	 	join barang b 
         on a.id_barang=b.id_barang
		 join user c
         on a.id_user=c.id_user
		 join opd d
		 on c.id_opd=d.id_opd
         where id_pinjam_barang='$id'");
	 }

	 function user_barang(){
		return $this->db->query("SELECT a.*,b.* 
		from user a
		join opd b
		on a.id_opd=b.id_opd");
	}
	
	function fetch_data_user($data1)
	{
	 $this->db->like('nama', $data1);
	 $query=$this->db->get('user');
	 return $query->result();
	}
	
 }