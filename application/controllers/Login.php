<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}
 
	function index(){
		$data2['title'] = 'Login';
        $this->load->view('templatelogin/header', $data2);
        $this->load->view('templatelogin/footer');
		$this->load->view('v_login');
	}
 

	public function aksi_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run() != FALSE) {
			$where = array('username' => $username, 'password' => md5($password), 'id_user_grup' => 1 );
			$data = $this->m_hotel->edit_data($where, 'user');
			$d = $this->m_hotel->edit_data($where, 'user')->row();
			$cek = $data->num_rows();

			if($cek > 0) {
				$session = array('id_user_grup' => $d->id_user_grup, 'nama' => $d->nama, 'nip' => $d->nip, 'jk' => $d->jk, 'id_opd' => $d->id_opd, 'date_created' => $d->date_created, 'status' => 'loginadmin');
				$this->session->set_userdata($session);
				redirect(base_url().'Admin');
			}else {
				$where = array('username' => $username, 'password' => md5($password), 'id_user_grup' => 2 );
				$data = $this->m_hotel->edit_data($where, 'user');
				$d = $this->m_hotel->edit_data($where, 'user')->row();
				$cek = $data->num_rows();


				if($cek > 0) {
					$session = array('id_user_grup' => $d->id_user_grup, 'nama' => $d->nama, 'nip' => $d->nip, 'jk' => $d->jk, 'id_opd' => $d->id_opd, 'date_created' => $d->date_created,  'status' => 'loginpengguna');
					$this->session->set_userdata($session);
					redirect(base_url().'Pengguna');
				}else{
				$this->session->set_flashdata('Alert', 'Sukses');
				redirect(base_url('login'));
				}
			}
		}
		else {
		
				$this->session->set_flashdata('Alert', 'Anda Belum mengisi Username atau Password');
				redirect(base_url('login'));
			}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('v_login'));
	
	}
}