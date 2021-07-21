<?php 
 
class Login_barang extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		
	}
 
	function index(){
		$data2['title'] = 'Login Barang';
        $this->load->view('templatelogin_barang/header', $data2);
        $this->load->view('templatelogin_barang/footer');
		$this->load->view('login_barang');
	}
 

	public function aksi_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run() != FALSE) {
			$where = array('username' => $username, 'password' => md5($password), 'id_user_grup' => 1 );
			$data = $this->m_barang->edit_data($where, 'user');
			$d = $this->m_barang->edit_data($where, 'user')->row();
			$cek = $data->num_rows();

			if($cek > 0) {
				$session = array('id_user_grup' => $d->id_user_grup, 'nama' => $d->nama, 'nip' => $d->nip, 'jk' => $d->jk, 'id_opd' => $d->id_opd, 'date_created' => $d->date_created, 'status' => 'loginadminbarang');
				$this->session->set_userdata($session);
				redirect(base_url().'Adminbarang');
			}else {
				$where = array('username' => $username, 'password' => md5($password), 'id_user_grup' => 2 );
				$data = $this->m_barang->edit_data($where, 'user');
				$d = $this->m_barang->edit_data($where, 'user')->row();
				$cek = $data->num_rows();


				if($cek > 0) {
					$session = array('id_user_grup' => $d->id_user_grup, 'nama' => $d->nama, 'nip' => $d->nip, 'jk' => $d->jk, 'id_opd' => $d->id_opd, 'date_created' => $d->date_created,  'status' => 'loginpenggunabarang');
					$this->session->set_userdata($session);
					redirect(base_url().'Penggunabarang');
				}else{
				$this->session->set_flashdata('Alert', 'Sukses');
				redirect(base_url('login_barang'));
				}
			}
		}
		else {
		
				$this->session->set_flashdata('Alert', 'Anda Belum mengisi Username atau Password');
				redirect(base_url('login_barang'));
			}
	}

        function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login_barang'));
	
	}
}