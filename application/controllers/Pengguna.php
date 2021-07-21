<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
class Pengguna extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "loginpengguna"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
		require APPPATH . 'libraries/phpmailer_master/src/Exception.php';
        require APPPATH . 'libraries/phpmailer_master/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer_master/src/SMTP.php';
    }
 
	function index(){
		$data['ruang'] = $this->m_hotel->ruangkosong()->result();
		/*$where = array('id_peminjaman' => $id_peminjaman);
		$data['peminjaman'] = $this->db->query("SELECT a.*,b.* 
		from peminjaman a
		join user b
		on a.id_user=b.id_user 
		where a.id_peminjaman='$id_peminjaman'
		")->result();*/
		$this->load->view('pengguna/overview.php', $data);
	}

	//mulai user
	function user(){
		$data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup
		join opd c
		on a.id_opd=c.id_opd')->result();
		$this->load->view('pengguna/user.php', $data);
	}

	function user_profil($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->db->query("SELECT user_grup.id_user_grup, user_grup.nama_user_grup, opd.id_opd, opd.nama_opd,
		user.id_user, user.nama, user.nip, user.jk, user.username, user.password, user.date_created, user.id_user_grup, user.id_opd 
		FROM user, user_grup, opd  
		where user.id_user_grup=user_grup.id_user_grup and user.id_opd=opd.id_opd 
		and user.id_user=$id_user")->result();

		$data['user_grup'] = $this->m_hotel->get_data('user_grup')->result();
		$data['opd'] = $this->m_hotel->get_data('opd')->result();
	
		$this->load->view('pengguna/user_profil', $data);
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
		$this->load->view('pengguna/user_edit.php', $data);
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
		$this->m_hotel->update_data($where,$data,'user');
		redirect(base_url().'pengguna/user');
		//}
	}
	

//PEMINJAMAN
function new_reservasi(){
	$data['peminjaman'] = $this->db->query("SELECT a.*,b.*,c.*,d.*
	from peminjaman a 
	 join ruang b 
	on a.id_ruang=b.id_ruang
	join sesi c
	on b.id_sesi=c.id_sesi
	join user d
	on a.id_user=d.id_user
	order by a.id_peminjaman desc")->result();
	//var_dump($data);die;
	$this->load->view('pengguna/reservasi', $data);
}
	public function sinkronisasi(){
		if($sinkron =  $this->db->get_where('peminjaman', ['surat' => ''], ['status_pinjam' => 0])->result_array())
		{
		//var_dump($cek); die;
			$this->db->query("DELETE FROM peminjaman WHERE DATEDIFF(CURRENT_DATE(), tgl_pinjam) >= 1 and status_pinjam = 0 and surat = '' "); 
			$this->session->set_flashdata('sinkrontakrubah','OK');
			redirect("pengguna/new_reservasi");
		}else {
			$this->session->set_flashdata('sinkron','OK');
			redirect("pengguna/new_reservasi");
		}
	}

	function new_reservasi_detail(){
		$id		= $this->uri->segment(3);
		$query	=  $this->m_hotel->ReservasiId($id);
		foreach ($query->result_array() as $value) {
			$data['id_peminjaman'] 			= $value['id_peminjaman'];
			$data['tgl_pinjam'] 			= $value['tgl_pinjam'];
			$data['tgl_selesai'] 			= $value['tgl_selesai'];
			$data['nama_kegiatan']	 		= $value['nama_kegiatan'];
			$data['no_hp_peminjam']	 		= $value['no_hp_peminjam'];
			$data['email']	 				= $value['email'];
			$data['surat']	 				= $value['surat'];
			$data['id_ruang'] 				= $value['id_ruang'];
			$data['nama_ruang'] 			= $value['nama_ruang'];
			$data['status_ruang'] 			= $value['status_ruang'];
			$data['id_sesi'] 			= $value['id_sesi'];
			$data['waktu_sesi'] 			= $value['waktu_sesi'];
		
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			$data['nama_opd'] = $value['nama_opd'];
		}
		//$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
		$this->load->view('pengguna/reservasi_detail',$data);
}

function new_reservasi_out($id){
		$id		= $this->uri->segment(3);
		$query	=  $this->m_hotel->ReservasiId($id);
			foreach ($query->result_array() as $value) {
                $data['id_peminjaman'] 			= $value['id_peminjaman'];
				$data['tgl_pinjam'] 			= $value['tgl_pinjam'];
				$data['tgl_selesai'] 			= $value['tgl_selesai'];
				$data['nama_kegiatan']	 		= $value['nama_kegiatan'];
				$data['no_hp_peminjam']	 		= $value['no_hp_peminjam'];
				$data['email']	 				= $value['email'];
				$data['surat']	 				= $value['surat'];
				$data['id_ruang'] 				= $value['id_ruang'];
				$data['nama_ruang'] 			= $value['nama_ruang'];
				$data['status_ruang'] 			= $value['status_ruang'];
				$data['id_sesi'] 			= $value['id_sesi'];
				$data['waktu_sesi'] 		= $value['waktu_sesi'];
		        $data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			$data['nama_opd'] = $value['nama_opd'];
			}
			$data['status_pinjam']	= $this->uri->segment(4);
			$data['tgl_selesai'] = date('Y-m-d');
		
			$this->load->view('pengguna/reservasi_out',$data);
	}

	function new_reservasi_out_simpan(){
			$id['id_peminjaman'] 		= $this->input->post("id_peminjaman");
			$up['status_pinjam'] 	= $this->input->post("status_pinjam");
			$up['tgl_selesai'] 	= date('Y-m-d');
		
			$this->db->update("peminjaman",$up,$id);

			//Update Status Ruang
			$id_ruang['id_ruang'] 	= $this->input->post("id_ruang");
			$up2['status_ruang'] 	= 0;
			$this->db->update("ruang",$up2,$id_ruang);

			//Insert into pinjam_ruang
			$in['id_peminjaman'] 		= $this->input->post("id_peminjaman");
			$in['keterangan'] 	= $this->input->post("keterangan");
			$this->db->insert("pinjam_ruang",$in);
						
			$this->session->set_flashdata('out','OK');
			redirect("pengguna/new_reservasi");
	}

	function new_reservasi_perpanjang(){
			$id		= $this->uri->segment(3);
			$query	=  $this->m_hotel->ReservasiId($id);
			foreach ($query->result_array() as $value) {
				$data['id_peminjaman'] 			= $value['id_peminjaman'];
				$data['tgl_pinjam']				= $value['tgl_pinjam'];
				$data['tgl_selesai'] 			= $value['tgl_selesai'];
				$data['nama_kegiatan']	 		= $value['nama_kegiatan'];
				$data['no_hp_peminjam'] 		= $value['no_hp_peminjam'];
				$data['email']	 				= $value['email'];
				$data['surat']	 				= $value['surat'];
				$data['id_ruang'] 				= $value['id_ruang'];
				$data['nama_ruang'] 			= $value['nama_ruang'];
				$data['status_ruang'] 			= $value['status_ruang'];
				$data['id_sesi'] 			= $value['id_sesi'];
			$data['waktu_sesi'] 			= $value['waktu_sesi'];
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			$data['nama_opd'] = $value['nama_opd'];
			
			$data['ruang'] = $this->m_hotel->ruangkosong()->result();
	
			}
			$this->load->view('pengguna/reservasi_perpanjang',$data);
	}

	function new_reservasi_perpanjang_simpan(){
		$id_peminjaman=$this->input->post("id_peminjaman");
		$tgl_selesai=$this->input->post('tgl_selesai');
		$tgl_pinjam=$this->input->post('tgl_pinjam');
		$surat=$this->input->post('surat');
		$id_ruang= $this->input->post('id_ruang');// Converted array into comma separated value using implode
		$nama_ruang= $this->input->post('nama_ruang');// Converted array into comma separated value using implode
			//var_dump($id_ruang);
		$tanggal_dibuat=time()+ (60 * 60 * 7);
	$config['upload_path'] = './assets/surat_peminjaman/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '900000';
				$this->load->library('upload', $config);
				$this->upload->do_upload('surat');
				$image=$this->upload->data();

				$where = array(
					'id_peminjaman' => $id_peminjaman
				);

				$in = array(
						'surat' => $image['file_name'],
						'tgl_pinjam' => $tgl_pinjam,
						'tgl_selesai' => $tgl_selesai,
						'tanggal_dibuat' => $tanggal_dibuat,
						'id_ruang' => $id_ruang,
					);
				//
			
	/* 
				1 = sudah dibaca
				0 = belum dibaca*/
			//$peminjaman= $this->db->from('peminjaman')->join('ruang','ruang.id_ruang=peminjaman.id_ruang')->join('sesi','sesi.id_sesi=ruang.id_sesi')->join('user','user.id_user=peminjaman.id_user')->where(['id_peminjaman' => $id_peminjaman])->get()->result_array();
			$ntf=$this->db->query("SELECT a.*,b.*,c.*,d.*
			from ruang a
			join sesi b
			on a.id_sesi=b.id_sesi
			join peminjaman c
			join user d
			on c.id_user=d.id_user
			where a.id_ruang='$id_ruang'")->row_array();
			//var_dump($ntf['nama_ruang']);

		
			$notif = [
					'judul' => 'Pengajuan Diperpanjang',
					'pesan' => 'Pengajuan Perpanjangan dengan ID Pinjam : "' . $id_peminjaman . '" Nama Peminjam : "' . $ntf['nama'] . '" Diperpanjang menjadi ID Ruang : "' . $id_ruang . '" -  "' . $ntf['nama_ruang'] . '" & Sesi : "' . $ntf['waktu_sesi'] . '" diganti pada ' . gmdate('D, d-M-Y H:i', $tanggal_dibuat) . '.',
					'is_read' => 0
				];
				$id_ruang3['id_ruang'] 	= $this->input->post("id_ruang");
				$up2=['status_ruang' 	=> 1];

				$query2= $this->db->from('peminjaman')->join('ruang','ruang.id_ruang=peminjaman.id_ruang')->join('sesi','sesi.id_sesi=ruang.id_sesi')->join('user','user.id_user=peminjaman.id_user')->where(['id_peminjaman' => $id_peminjaman])->get();
				foreach ($query2->result_array() as $value2) {
					$id_ruang2['id_ruang'] = $value2['id_ruang'];
				}
				//var_dump($id_ruang2['id_ruang']);
				$ru=['status_ruang' => 0];
			$this->m_hotel->update_data($where, $in,'peminjaman');
			$this->m_hotel->insert_data($notif,'notif');

				//$query2 = $this->m_hotel->ReservasiId($id_peminjaman);
							//var_dump($up2);
				$this->db->update("ruang",$up2,$id_ruang3);

				
				//var_dump($query2);
				$this->db->update('ruang',$ru,$id_ruang2);
			$this->session->set_flashdata('perpanjang','OK');
			redirect("pengguna/new_reservasi");
				
	}

	function reservasi_delete($id_peminjaman){
		$peminjaman= $this->db->from('peminjaman')->join('ruang','ruang.id_ruang=peminjaman.id_ruang')->join('sesi','sesi.id_sesi=ruang.id_sesi')->join('user','user.id_user=peminjaman.id_user')->where(['id_peminjaman' => $id_peminjaman])->get()->row_array();
		
		//$peminjaman = $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row_array();
		$notif = [
			'judul' => 'Data Pengajuan Dihapus',
			'pesan' => 'Pengajuan dengan ID Pinjam : "' . $peminjaman['id_peminjaman'] . '" - "' . $peminjaman['nama'] . '" dengan Ruang : "' . $peminjaman['nama_ruang'] . '" Sesi : "' . $peminjaman['waktu_sesi'] . '" dihapus pada ' . gmdate('D, d-M-Y H:i', time()+ (60 * 60 * 7)) . '.',
			'is_read' => 0
		];				
		$this->db->delete('peminjaman', ['id_peminjaman' => $id_peminjaman]);
		$this->db->insert('notif', $notif);
		$this->session->set_flashdata('hapus','OK');
	
		
		redirect("pengguna/new_reservasi");
	}

	function new_reservasi_tambah(){
		$data['ruang'] = $this->m_hotel->ruangkosong()->result();
		$data['user'] =  $this->db->query('SELECT a.*, b.*
		from user a 
		join opd b
		on a.id_opd=b.id_opd')->result();
	
		$this->load->view('pengguna/new_reservasi_tambah',$data);
	}

	function new_reservasi_simpan(){
		$this->form_validation->set_rules('tgl_pinjam','Tanggal Pesan','required');
			$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai','required');
			$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');
			$this->form_validation->set_rules('no_hp_peminjam','No HP Peminjam','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('surat','Surat');
          	$this->form_validation->set_rules('id_ruang','Ruang','required');
			$this->form_validation->set_rules('id_user','User','required');
			
			if ($this->form_validation->run()==FALSE) {
				$data['ruang']	= $this->m_hotel->ruangkosong();
				$data['user'] =  $this->db->query('SELECT a.*, b.*
		from user a 
		join opd b
		on a.id_opd=b.id_opd')->result();
	
				$this->load->view('pengguna/new_reservasi_tambah',$data);
			}
			else {
				$tgl_pinjam 		= $this->input->post('tgl_pinjam');
                $tgl_selesai	= $this->input->post('tgl_selesai');
                $nama_kegiatan	= $this->input->post('nama_kegiatan');
                $no_hp_peminjam 	= $this->input->post('no_hp_peminjam');
                $email 			= $this->input->post('email');
                $surat			= $this->input->post('surat');

				$id_ruang		= $this->input->post('id_ruang');
		
				$id_user		= $this->input->post('id_user');
				//$id_peminjaman		= $this->input->post('id_peminjaman');
				//var_dump($id_peminjaman);
			
				$tanggal_dibuat = time()+ (60 * 60 * 7);

				
				$config['upload_path'] = './assets/surat_peminjaman/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '900000';
				$config['max_width'] = '90000';
				$config['max_height'] = '90000';
				//$config['file_name'] = 'Surat'.'Pinjam'.time();
				$this->load->library('upload', $config);
				$this->upload->do_upload('surat');
				$image=$this->upload->data();
				$in = array(
						'surat' => $image['file_name'],
						'tgl_pinjam' => $tgl_pinjam,
						'tgl_selesai' => $tgl_selesai,
						'nama_kegiatan' => $nama_kegiatan,
						'no_hp_peminjam' => $no_hp_peminjam,
						'email' => $email,
						'id_ruang' => $id_ruang,
						'id_user' => $id_user,
						'tanggal_dibuat' => $tanggal_dibuat,
						'judul_notif' => 'Sedang Proses'
					);
				
				/* 
				1 = sudah dibaca
				0 = belum dibaca
				*/
		$this->m_hotel->insert_data($in,'peminjaman');
		//$peminjaman= $this->db->from('peminjaman')->join('ruang','ruang.id_ruang=peminjaman.id_ruang')->join('sesi','sesi.id_sesi=ruang.id_sesi')->join('user','user.id_user=peminjaman.id_user')->where(['id_ruang'=>$id_ruang])->get()->result_array();
		
		$ntf=$this->db->query("SELECT a.*,b.*,c.*,d.*
		from peminjaman c 
		join ruang a
		join sesi b
		on a.id_sesi=b.id_sesi
		join user d
		on c.id_user=d.id_user
		where a.id_ruang='$id_ruang'")->result_array();
foreach($ntf as $p)
		{
			$data['id_peminjaman']=$p['id_peminjaman'];
			$data['nama']=$p['nama'];
			$data['waktu_sesi']=$p['waktu_sesi'];
			$data['nama_ruang']=$p['nama_ruang'];
		}
		//var_dump($data['nama']);
		//var_dump($data['nama_ruang']);
		//var_dump($data['waktu_sesi']);
//var_dump($id_user);
		$notif = [
			'judul' => 'Pengajuan Ditambahkan',
			'pesan' => 'Pengajuan oleh ID pinjam  : "' . $data['id_peminjaman'] . '" - "' . $data['nama'] . '" dengan Ruang : "' . $data['nama_ruang'] . '" dan Sesi : "' . $data['waktu_sesi'] . '" ditambahkan pada ' . gmdate('D, d-M-Y H:i', $tanggal_dibuat) . '.',
			'is_read' => 0
		];
						$this->m_hotel->insert_data($notif,'notif');	
						
				$this->session->set_flashdata('berhasil','OK');
				redirect("pengguna/new_reservasi");
			}	
	}


	//end peminjaman

	//mulai surat
	function file(){
		$this->load->helper('download');
		$name = $this->uri->segment(3);
		$data = file_get_contents("./assets/surat_peminjaman/".$name);
		force_download($name, $data);
	}

//notif
public function notif(){
	$data['notif']=$this->db->from('peminjaman')->join('user', 'user.id_user=peminjaman.id_user')->order_by('id_peminjaman', 'DESC')->get()->result_array();
	$this->load->view('pengguna/notif', $data);
	}
public function tandaisudahdibaca($id)
{
	$data = [
		'status_baca' => 2
	];
	$this->db->update('peminjaman', $data, ['id_peminjaman'=>$id]);
	$this->session->set_flashdata('tandai','OK');
	return redirect(base_url('pengguna/notif'));
}/*
public function tandaisudahdibacasemua()
{
	$notif = $this->db->get_where('peminjaman', ['status_baca' => 0])->result_array();
	for($i=0; $i<count($notif); $i++) 
	{
		$data = [
			'judul_notif' => '-',
			'pesan_notif' => '-',
			'status_baca' => 2
		];
		$this->db->update('peminjaman', $data, ['id_peminjaman'=>$notif[$i]['id_peminjaman']]);
	}	
	$this->session->set_flashdata('tandai','OK');
	return redirect(base_url('pengguna/notif'));
}*/
/*public function hapussemuanotif()
{
	$notif = $this->db->get_where('peminjaman', ['status_baca' => 2])->result_array();
	
	//$this->db->empty_table('notif');
	$this->session->set_flashdata('hapusnotif','OK');
	return redirect(base_url('pengguna/notif'));
}*/
}