<?php 
 
class Regis_barang extends CI_Controller{
 
	function __construct(){
        parent::__construct();
	
	}
 
	public function index(){

        $data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
        on a.id_user_grup=b.id_user_grup
        join opd c
        on a.id_opd=c.id_opd')->result();
		$data['user_grup'] = $this->m_barang->get_data('user_grup')->result();
        $data['opd'] = $this->m_barang->get_data('opd')->result();
        $data2['title'] = 'Regitrasi Barang';
        $this->load->view('templatelogin_barang/header', $data2);
        $this->load->view('regis_barang', $data);
        $this->load->view('templatelogin_barang/footer');
    }
    public function aksi_regis(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[user.nama]', ['is_unique' => 'Nama Sudah Terdaftar']);
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[user.nip]', ['is_unique' => 'Nip Sudah Terdaftar']);
        $this->form_validation->set_rules('jk', 'Jk', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username Sudah Terdaftar']);
        $this->form_validation->set_rules('password', 'Passsword', 'required|trim|min_length[3]', ['min_length'=>'Password Terlalu Pendek']);
        $this->form_validation->set_rules('password2', 'Passsword2', 'required|trim|matches[password]');
        $this->form_validation->set_rules('id_user_grup', 'id_user_grup', 'required|trim');
        $this->form_validation->set_rules('id_opd', 'id_opd', 'required|trim');
       
        if ($this->form_validation->run()==FALSE) 
        {
            $data['title'] = 'Regitrasi Barang';
            $this->load->view('templatelogin_barang/header', $data);
            $this->load->view('regis_barang');
            $this->load->view('templatelogin_barang/footer');
          
        } else {
            $data = [
                'nama' =>$this->input->post('nama'),
                'nip' =>$this->input->post('nip'),
                'jk' =>$this->input->post('jk'),
                'username' =>htmlspecialchars($this->input->post('username',true)),
                'password' => md5($this->input->post('password')),
                'date_created' => time(),
                'id_user_grup' =>$this->input->post('id_user_grup'),
                'id_opd' =>$this->input->post('id_opd')
            ];
            
            $this->db->insert('user', $data);
            echo "<script>alert('Berhasil Daftar Akun. Silahkan Login!');history.go(-1);</script>";
            redirect(base_url().'login_barang');

    }
}
    }
