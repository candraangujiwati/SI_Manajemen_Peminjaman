<?php 
 
class M_login extends CI_Model{	

	function Ceklogin($username,$password){		
		$ceklogin = $this->db->query("select a.*,b.* from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup 
		where a.username='$username' and a.password='$password' ");

		if (count($ceklogin->result())>0) {

			foreach ($ceklogin->result() as $value) {
				
				$sess_data['id_user']  			= $value->id_user;
				$sess_data['nama']  		= $value->nama;
				$sess_data['username']  	= $value->username;
				$sess_data['password']  	= $value->password;
				$sess_data['id_user_grup']  	= $value->id_user_grup;
				$sess_data['nama_user_grup']  	= $value->nama_user_grup;
				

				$this->session->set_userdata($sess_data);

			}
			redirect('Admin');
		}
		else {
			$this->session->set_flashdata("error","Username atau Password Anda Salah!");
			redirect('Login');
		}
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
 	}	
}