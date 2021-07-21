<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Penggunabarang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "loginpenggunabarang"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
		require APPPATH . 'libraries/phpmailer_master/src/Exception.php';
        require APPPATH . 'libraries/phpmailer_master/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer_master/src/SMTP.php';
    
	}
 
	function index(){
		$data['barang'] = $this->m_barang->barangkosong()->result();
		$data['pinjam_barang'] = $this->db->query("SELECT a.*,b.* 
		from pinjam_barang a 
	 	join barang b 
		on a.id_barang=b.id_barang
		where a.status_pinjam_barang='0' 
		order by a.status_pinjam_barang desc")->result();
	    $this->load->view('pengguna_barang/overview.php', $data);
    }
	//mulai surat
	function file(){
	$this->load->helper('download');
	$name = $this->uri->segment(3);
	$data = file_get_contents("./assets/surat_pinjam_barang/".$name);
	force_download($name, $data);
	}

//notif
function notif_barang(){
	$data['notif_barang']=$this->db->from('pinjam_barang')->join('user', 'user.id_user=pinjam_barang.id_user')->order_by('status_pinjam_barang', 'DESC')->get()->result_array();
	$this->load->view('pengguna_barang/notif_barang', $data);
	}
function tandaisudahdibaca($id)
{
	$data = [
		'status_baca_notif_barang' => 2
	];
	$this->db->update('pinjam_barang', $data, ['id_pinjam_barang'=>$id]);
	$this->session->set_flashdata('tandai','OK');
	return redirect(base_url('penggunabarang/notif_barang'));
}

//scan qr 
function cekbarang(){
		
	$this->load->view('pengguna_barang/cek_qr_code.php');
}

function hasilqr() {
	$result_code = $this->input->post('kode_barang');
	$cek_id = $this->m_barang->cekqr($result_code);
	if(!$cek_id){
		echo "<script>alert('Data Tidak');history.go(-1);</script>";
	}
	else {
		$where = $this->m_barang->adaqr($result_code);
	$data['barang'] = $this->db->query("SELECT a.*,b.*
	FROM barang a
	JOIN jenis_barang b
	ON a.id_jenis_barang=b.id_jenis_barang where
	kode_barang = '$where'")->result();
	$data['jenis_barang'] = $this->m_barang->get_data('jenis_barang')->result();
	$this->load->view('pengguna_barang/barang_profil', $data);
	}
}
	//user mulai
	function user(){
		$data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup
		join opd c
		on a.id_opd=c.id_opd')->result();
		$this->load->view('pengguna_barang/user_barang.php', $data);
	}
	function user_edit($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$data['user'] = $this->db->query("SELECT user_grup.id_user_grup, user_grup.nama_user_grup, opd.id_opd, opd.nama_opd,
		user.id_user, user.nama, user.nip, user.jk, user.username, user.password, user.date_created, user.id_user_grup, user.id_opd 
		FROM user, user_grup, opd  
		where user.id_user_grup=user_grup.id_user_grup and user.id_opd=opd.id_opd 
		and user.id_user=$id_user")->result();

		//$data['user'] = $this->m_hotel->edit_data($where,'user')->result();
		$data['user_grup'] = $this->m_hotel->get_data('user_grup')->result();
		$data['opd'] = $this->m_hotel->get_data('opd')->result();
		$this->load->view('pengguna_barang/user_barang_edit.php', $data);
	}

	function user_edit_aksi(){
		$id_user = $this->input->post('id_user');
		//$id_user_grup = $this->input->post('id_user_grup');
		$id_opd = $this->input->post('id_opd');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$jk = $this->input->post('jk');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$date_created = time()+ (60 * 60 * 7);
		$where = array(
			'id_user' => $id_user
		);
		$data = array(
			//'id_user_grup' => $id_user_grup,
			'id_opd' => $id_opd,
			'nama' => $nama,
			'nip' => $nip,
			'jk' => $jk,
			'username' => $username,
			'password' => md5($password),
			'date_created' => $date_created
		);
		/*$sql = $this->db->query("SELECT username FROM user where username='$username'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Nama Akun Sudah Digunakan!');history.go(-1);</script>";
		}else{*/
		$this->m_barang->update_data($where,$data,'user');
		redirect(base_url().'penggunabarang/user');
		//}
	}

	function user_delete($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$this->m_barang->delete_data($where,'user');
		redirect(base_url().'penggunabarang/user');
	}

	function user_profil($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->db->query("SELECT user_grup.id_user_grup, user_grup.nama_user_grup, opd.id_opd, opd.nama_opd,
		user.id_user, user.nama, user.nip, user.jk, user.username, user.password, user.date_created, user.id_user_grup, user.id_opd 
		FROM user, user_grup, opd  
		where user.id_user_grup=user_grup.id_user_grup and user.id_opd=opd.id_opd 
		and user.id_user=$id_user")->result();

		$data['user_grup'] = $this->m_barang->get_data('user_grup')->result();
		$data['opd'] = $this->m_barang->get_data('opd')->result();
	
		$this->load->view('pengguna_barang/user_barang_profil', $data);
	}

	//peminjaman
	function new_pinjam_barang(){
		$data['pinjam_barang'] = $this->db->query("SELECT a.*,b.*,c.*
		from pinjam_barang a 
	 	join barang b 
		on a.id_barang=b.id_barang
		join user c
		on a.id_user=c.id_user
		order by a.id_pinjam_barang desc")->result();
		//var_dump($data);die;
		$data['opd'] = $this->m_barang->user_barang()->result();
		$this->load->view('pengguna_barang/pinjam_barang', $data);
	}
	function new_pinjam_barang_tambah(){
		$data['barang'] = $this->m_barang->barangkosong()->result();
		$data['user'] =  $this->db->query('SELECT a.*, b.*
		from user a 
		join opd b
		on a.id_opd=b.id_opd')->result();
		$this->load->view('pengguna_barang/new_pinjam_barang_tambah',$data);
	}
	public function sinkronisasi(){
		if($sinkron =  $this->db->get_where('pinjam_barang', ['surat_pinjam_barang' => ''], ['status_pinjam_barang' => 0])->result_array())
		{
		//var_dump($cek); die;
			$this->db->query("DELETE FROM pinjam_barang WHERE DATEDIFF(CURRENT_DATE(), tgl_pinjam_barang) > 1 and status_pinjam_barang = 0 and surat_pinjam_barang = '' "); 
			$this->session->set_flashdata('sinkrontakrubah','OK');
			redirect("penggunabarang/new_pinjam_barang");
		} else {
			$this->session->set_flashdata('sinkron','OK');
			redirect("penggunabarang/new_pinjam_barang");
		}	
	}
   

	function new_pinjam_barang_simpan(){
		$this->form_validation->set_rules('tgl_pinjam_barang','Tanggal Pinjam Barang','required');
		$this->form_validation->set_rules('tgl_kembali_barang','Tanggal Kembali Barang','required');
		//$this->form_validation->set_rules('nama1','Nama1','required');
		$this->form_validation->set_rules('no_hp_peminjam_barang','No HP Peminjam Barang','required');
		$this->form_validation->set_rules('email_peminjam_barang','Email Peminjam Barang','required');
		$this->form_validation->set_rules('surat_pinjam_barang','Surat Pinjam Barang');
		$this->form_validation->set_rules('jumlah_pinjam','Jumlah pInjam','required');
		$this->form_validation->set_rules('keperluan','Keperluan','required');
		
		$this->form_validation->set_rules('id_barang','Barang','required');
		$this->form_validation->set_rules('id_user','User Barang', 'required');
		
		//$this->form_validation->set_rules('tanggal_dibuat','tanggal_dibuat', 'required');
		
			if ($this->form_validation->run()==FALSE) {
				$data['barang']	= $this->m_barang->barangkosong();
				$data['user'] =  $this->m_hotel->get_data('user')->result();
				//$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
				//$data['user'] = $this->m_hotel->get_data('user')->result();
	
				//$data['user'] =  $this->m_hotel->tampil_data($this->session->userdata('id_user'));
		
				$this->load->view('pengguna_barang/new_pinjam_barang_tambah',$data);
				
			}
			else 
			{
				$tgl_pinjam_barang 	= $this->input->post('tgl_pinjam_barang');
                $tgl_kembali_barang	= $this->input->post('tgl_kembali_barang');
                //$nama1	= $this->input->post('nama1');
                $no_hp_peminjam_barang = $this->input->post('no_hp_peminjam_barang');
                $email_peminjam_barang 			= $this->input->post('email_peminjam_barang');
                $surat_pinjam_barang			= $this->input->post('surat_pinjam_barang');
                $jumlah_pinjam			= $this->input->post('jumlah_pinjam');
                $keperluan			= $this->input->post('keperluan');

				$id_barang		= $this->input->post('id_barang');
				//$sesion =$this->session->userdata('name');
				$id_user		=  $this->input->post('id_user');
				
				//$this->session->userdata('name');
				//$this->m_hotel->tampil_data($this->session->userdata('id_user'));
				
				$tanggal_buat_pinjam_barang = time()+ (60 * 60 * 7);

				$config['upload_path'] = './assets/surat_pinjam_barang/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '900000';
				$this->load->library('upload', $config);
				$this->upload->do_upload('surat_pinjam_barang');
				$image=$this->upload->data();
				$in = array(
						'surat_pinjam_barang' => $image['file_name'],
						'tgl_pinjam_barang ' => $tgl_pinjam_barang ,
						'tgl_kembali_barang' => $tgl_kembali_barang,
						//'nama1' => $nama1,
						'no_hp_peminjam_barang' => $no_hp_peminjam_barang,
						'email_peminjam_barang' => $email_peminjam_barang,
						'jumlah_pinjam' => $jumlah_pinjam,
						'keperluan' => $keperluan,
						'id_barang' => $id_barang,
						'id_user' => $id_user,
						'tanggal_buat_pinjam_barang' => $tanggal_buat_pinjam_barang,
						'judul_notif_barang' => 'Sedang Proses'
					);
				$sql = $this->db->query("SELECT * FROM barang where id_barang='$id_barang'");
				$cek = $sql->row_array();
			
				//var_dump($cek);
				if($cek['jumlah'] < $jumlah_pinjam)
				{ 
					echo "<script>alert('Jumlah Pinjam Melebihi Stok');history.go(-1);</script>";
				}
				else {

					$ntf=$this->db->query("SELECT a.*,b.*,c.*,d.*
					from pinjam_barang c 
					join barang a
					join jenis_barang b
					on a.id_jenis_barang=b.id_jenis_barang
					join user d
					on c.id_user=d.id_user
					where a.id_barang='$id_barang'")->result_array();
					foreach($ntf as $p)
					{
						$data['id_pinjam_barang']=$p['id_pinjam_barang'];
						$data['nama']=$p['nama'];
						$data['nama_barang']=$p['nama_barang'];
						$data['merk']=$p['merk'];
					}
					//var_dump($ntf);
					//var_dump($data['nama']);
				/* 
				1 = sudah dibaca
				0 = belum dibaca
				*/
				$notif_barang = [
					'judul' => 'Pengajuan Pinjam Barang Ditambahkan',
					'pesan' => 'Pengajuan oleh peminjam ber-ID User : "' . $data['id_pinjam_barang'] . '" - "' . $data['nama'] . '" dengan Nama Barang : "' . $data['nama_barang'] . '" - "' . $data['merk'] . '" ditambahkan pada ' . gmdate('D, d-M-Y H:i', $tanggal_buat_pinjam_barang) . '.',
					'is_read' => 0
				];
				
		
				$this->m_barang->insert_data($in,'pinjam_barang');	
				$this->m_barang->insert_data($notif_barang,'notif_barang');	
						
						$this->session->set_flashdata('berhasil','OK');
						redirect("penggunabarang/new_pinjam_barang");	
			}
			}
	}
		
	function new_pinjam_barang_detail(){
			$id		= $this->uri->segment(3);
			$query	=  $this->m_barang->Pinjam_barangId($id);
			foreach ($query->result_array() as $value) {
				$data['id_pinjam_barang'] = $value['id_pinjam_barang'];
				$data['tgl_pinjam_barang'] = $value['tgl_pinjam_barang'];
				$data['tgl_kembali_barang'] = $value['tgl_kembali_barang'];
				$data['no_hp_peminjam_barang'] = $value['no_hp_peminjam_barang'];
				$data['email_peminjam_barang'] = $value['email_peminjam_barang'];
				$data['surat_pinjam_barang'] = $value['surat_pinjam_barang'];
				$data['jumlah_pinjam'] = $value['jumlah_pinjam'];
				$data['keperluan'] = $value['keperluan'];
				$data['tanggal_buat_pinjam_barang'] = $value['tanggal_buat_pinjam_barang'];
			
				$data['id_barang'] = $value['id_barang'];
				$data['nama_barang'] = $value['nama_barang'];
				//$data['status_barang'] = $value['status_barang'];
				
				$data['id_user'] = $value['id_user'];
				$data['nama'] = $value['nama'];
				$data['nip'] = $value['nip'];
				$data['id_opd'] = $value['id_opd'];
				$data['nama_opd'] = $value['nama_opd'];
			}
			//$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
			$this->load->view('pengguna_barang/pinjam_barang_detail',$data);
	}

	function new_pinjam_barang_out($id){
		$id		= $this->uri->segment(3);
		$query	=  $this->m_barang->Pinjam_barangId($id);
		foreach ($query->result_array() as $value) {
			$data['id_pinjam_barang'] = $value['id_pinjam_barang'];
			$data['tgl_pinjam_barang'] = $value['tgl_pinjam_barang'];
			$data['tgl_kembali_barang'] = $value['tgl_kembali_barang'];
			//$data['nama1'] = $value['nama1'];
			$data['no_hp_peminjam_barang'] = $value['no_hp_peminjam_barang'];
			$data['email_peminjam_barang'] = $value['email_peminjam_barang'];
			$data['surat_pinjam_barang'] = $value['surat_pinjam_barang'];
			$data['jumlah_pinjam'] = $value['jumlah_pinjam'];
			$data['keperluan'] = $value['keperluan'];
			$data['judul_notif_barang'] = $value['judul_notif_barang'];
			
			$data['id_barang'] = $value['id_barang'];
			$data['nama_barang'] = $value['nama_barang'];
			$data['jumlah'] = $value['jumlah'];
			$data['status_pinjam_barang'] = $value['status_pinjam_barang'];
			$data['tanggal_buat_pinjam_barang'] = $value['tanggal_buat_pinjam_barang'];
			
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			//$data['nama_opd'] = $value['nama_opd'];
		}
		$data['status_pinjam_barang']	= $this->uri->segment(4);
		$data['tgl_kembali_barang'] = date('Y-m-d');
		
		$data['jumlah'] = $value['jumlah'];
		$data['jumlah_pinjam'] = $value['jumlah_pinjam'];
		//$data['judul_notif_barang'] = $value['judul_notif_barang'];
		
		$this->load->view('pengguna_barang/pinjam_barang_out',$data);
}

function new_pinjam_barang_out_simpan(){
		$id['id_pinjam_barang'] 		= $this->input->post("id_pinjam_barang");
		//$di['tgl_kembali_barang'] = $this->input->post("tgl_kembali_barang");
		$up['status_pinjam_barang'] 	= $this->input->post("status_pinjam_barang");
		$up['tgl_kembali_barang'] 	= date('Y-m-d');
		//$up['judul_notif_barang'] 	= $this->input->post("judul_notif_barang");
		
	/*	if($di['tgl_kembali_barang']->diff($up['tgl_kembali_barang'])){
		$up = [
			'judul_notif_barang' => 'Pengembalian Sudah Lewat "' . date('d') . '" hari. "'
			];
		}*/
		$this->db->update("pinjam_barang",$up,$id);

		//Update Jumlah Barang
		$id_barang['id_barang'] = $this->input->post("id_barang");
		$id['jumlah'] = $this->input->post("jumlah");
		$id['jumlah_pinjam'] = $this->input->post("jumlah_pinjam");
		$up2=[
			'jumlah' => $id['jumlah']+$id['jumlah_pinjam']
		];
		//print_r($up2);exit;
		$this->db->update('barang',$up2,$id_barang);

		//Insert into pinjam ruang
		$in['id_pinjam_barang'] = $this->input->post("id_pinjam_barang");
		$in['kondisi_barang'] 	= $this->input->post("kondisi_barang");
		$this->db->insert("kembali_barang",$in);
		$this->session->set_flashdata('out','OK');
		redirect("penggunabarang/new_pinjam_barang");
}
	function pinjam_barang_delete($id_pinjam_barang){
		$pinjam_barang = $this->db->get_where('pinjam_barang', ['id_pinjam_barang' => $id_pinjam_barang])->row_array();
		$notif_barang = [
			'judul' => 'Data Pengajuan Dihapus',
			'pesan' => 'Pengajuan dengan ID Pinjam : "' . $pinjam_barang['id_pinjam_barang'] . '" oleh ID User : "' . $pinjam_barang['id_user'] . '" ID Barang : "' . $pinjam_barang['id_barang'] . '" dihapus pada ' . gmdate('D, d-M-Y H:i', time()+ (60 * 60 * 7)) . ' Dikarenakan tidak memenuhi syarat peminjaman barang.' ,
			'is_read' => 0
		];				
		$this->db->delete('pinjam_barang', ['id_pinjam_barang' => $id_pinjam_barang]);
		$this->db->insert('notif_barang', $notif_barang);
		$this->session->set_flashdata('hapus','OK');
		
		redirect("penggunabarang/new_pinjam_barang");
	}

	
	
	function new_pinjam_barang_perpanjang(){
		$id		= $this->uri->segment(3);
		$query	=  $this->m_barang->Pinjam_barangId($id);
		foreach ($query->result_array() as $value) {
			$data['id_pinjam_barang'] = $value['id_pinjam_barang'];
			$data['tgl_pinjam_barang'] = $value['tgl_pinjam_barang'];
			$data['tgl_kembali_barang'] = $value['tgl_kembali_barang'];
			//$data['nama1'] = $value['nama1'];
			$data['no_hp_peminjam_barang'] = $value['no_hp_peminjam_barang'];
			$data['email_peminjam_barang'] = $value['email_peminjam_barang'];
			$data['surat_pinjam_barang'] = $value['surat_pinjam_barang'];
			$data['jumlah_pinjam'] = $value['jumlah_pinjam'];
			$data['keperluan'] = $value['keperluan'];
			$data['tanggal_buat_pinjam_barang'] = $value['tanggal_buat_pinjam_barang'];
		
			$data['id_barang'] = $value['id_barang'];
			$data['nama_barang'] = $value['nama_barang'];
			//$data['status_barang'] = $value['status_barang'];
			
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			//$data['nama_opd'] = $value['nama_opd'];
		}
		//$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
		$this->load->view('pengguna_barang/pinjam_barang_perpanjang',$data);
}

function new_pinjam_barang_perpanjang_simpan(){
	$id_pinjam_barang=$this->input->post("id_pinjam_barang");
	$tgl_pinjam_barang 	= $this->input->post('tgl_pinjam_barang');
	$tgl_kembali_barang	= $this->input->post('tgl_kembali_barang');
	$surat_pinjam_barang			= $this->input->post('surat_pinjam_barang');
	//$jumlah_pinjam			= $this->input->post('jumlah_pinjam');
	//$keperluan			= $this->input->post('keperluan');
	$id_barang		= $this->input->post('id_barang');
	$tanggal_buat_pinjam_barang = time()+ (60 * 60 * 7);		

	$config['upload_path'] = './assets/surat_peminjaman_barang/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '900000';
			$this->load->library('upload', $config);
			$this->upload->do_upload('surat_pinjam_barang');
			$image=$this->upload->data();

			$where = array(
				'id_pinjam_barang' => $id_pinjam_barang
			);

			$in = array(
					'surat_pinjam_barang' => $image['file_name'],
					'tgl_pinjam_barang' => $tgl_pinjam_barang,
					'tgl_kembali_barang' => $tgl_kembali_barang,
					'tanggal_buat_pinjam_barang' => $tanggal_buat_pinjam_barang,
					'id_barang' => $id_barang
				);
			/* 
			1 = sudah dibaca
			0 = belum dibaca
			*/
			$ntf=$this->db->query("SELECT a.*,b.*,c.*,d.* 
			from barang a 
			join jenis_barang b 
			on a.id_jenis_barang=b.id_jenis_barang 
			join peminjaman c 
			join user d 
			on c.id_user=d.id_user 
			where a.id_barang='$id_barang' ")->row_array();
			
			$notif_barang = [
				'judul' => 'Pengajuan Pinjam Barang Diperpanjang',
				'pesan' => 'Pengajuan Perpanjangan Pinjam Barang dengan ID Pinjam : "' . $id_pinjam_barang . '" Nama Peminjam: "' . $ntf['nama'] . '" Barang dipinjam : "' . $ntf['nama_barang'] . '" - "' . $ntf['merk'] . '" menjadi sampai tanggal : "' . $tgl_kembali_barang . '" diganti pada ' . gmdate('D, d-M-Y H:i', $tanggal_buat_pinjam_barang) . '.',
				'is_read' => 0
			];
	
			$this->m_barang->update_data($where, $in,'pinjam_barang');
			$this->m_barang->insert_data($notif_barang,'notif_barang');	
					$this->session->set_flashdata('perpanjang','OK');
					redirect("penggunabarang/new_pinjam_barang");
		}
	
}
?>