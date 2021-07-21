<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "loginadmin"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
			//echo 'selamat datang '.$data['user']['name'];
			//$this->load->view('admin/overview', $data2);
		}
		require APPPATH . 'libraries/phpmailer_master/src/Exception.php';
        require APPPATH . 'libraries/phpmailer_master/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer_master/src/SMTP.php';
    
	}
 
	function index(){
		$data['ruang'] = $this->m_hotel->ruangkosong()->result();
		$this->load->view('admin/overview.php', $data);
	}

	
	//user grup mulai
	function user_grup(){
		$data['user_grup'] = $this->m_hotel->get_data('user_grup')->result();
		$this->load->view('admin/user_grup.php', $data);
	}

	function user_grup_edit($id_user_grup){
		$where = array('id_user_grup' => $id_user_grup);
		// mengambil data dari database sesuai id
		$data['user_grup'] = $this->m_hotel->edit_data($where,'user_grup')->result();
		$this->load->view('admin/user_grup_edit.php', $data);
	}

	function user_grup_edit_aksi(){
		$id_user_grup = $this->input->post('id_user_grup');
		$nama_user_grup = $this->input->post('nama_user_grup');

		$where = array(
			'id_user_grup' => $id_user_grup
		);

		$data = array(
			'nama_user_grup' => $nama_user_grup
		);

		$this->m_hotel->update_data($where,$data,'user_grup');
		redirect(base_url().'admin/user_grup');
	}

	function user_grup_delete($id_user_grup){
		$where = array('id_user_grup' => $id_user_grup);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'user_grup');
		redirect(base_url().'admin/	user_grup');
	}
	//user group selesai


	//user mulai
	function user(){
		$data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup
		join opd c
		on a.id_opd=c.id_opd')->result();
		$this->load->view('admin/user.php', $data);
	}

	function user_tambah(){
		$data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup
		join opd c
		on a.id_opd=c.id_opd')->result();
		$data['user_grup'] = $this->m_hotel->get_data('user_grup')->result();
		$data['opd'] = $this->m_hotel->get_data('opd')->result();
		$this->load->view('admin/user_tambah.php' ,$data);
	}

	function user_tambah_aksi(){
		$id_user_grup = $this->input->post('id_user_grup');
		$id_opd = $this->input->post('id_opd');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$jk = $this->input->post('jk');
		$username= $this->input->post('username');
		$password = $this->input->post('password');
		$date_created = time()+ (60 * 60 * 7);
		$data = array(
			'id_user_grup' 	=> $id_user_grup,
			'id_opd' 	=> $id_opd,
			'nama' 		=> $nama,
			'nip' 	=> $nip,
			'jk' 	=> $jk,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'date_created' => $date_created
			
		);
		$sql = $this->db->query("SELECT username FROM user where username='$username'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Nama Akun Sudah Digunakan!');history.go(-1);</script>";
		}else{
		$this->m_hotel->insert_data($data,'user');
		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/user');
		}
	}

	function user_edit($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$data['user'] = $this->db->query("SELECT user_grup.id_user_grup, user_grup.nama_user_grup, opd.id_opd, opd.nama_opd,
		user.id_user, user.nama, user.nip, user.jk, user.username, user.password, user.date_created, user.id_user_grup, user.id_opd 
		FROM user, user_grup, opd  
		where user.id_user_grup=user_grup.id_user_grup and user.id_opd=opd.id_opd 
		and user.id_user=$id_user")->result();
	
		$data['user_grup'] = $this->m_hotel->get_data('user_grup')->result();
		$data['opd'] = $this->m_hotel->get_data('opd')->result();
	
		$this->load->view('admin/user_edit.php', $data);
	}

	function user_edit_aksi(){
		$id_user = $this->input->post('id_user');
		$id_user_grup = $this->input->post('id_user_grup');
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
			'id_user_grup' => $id_user_grup,
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
		redirect(base_url().'admin/user');
		//}
	}

	function user_delete($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'user');
		redirect(base_url().'admin/user');
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
	
		$this->load->view('admin/user_profil', $data);
	}
	//end user

	//peminjaman
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
		$this->load->view('admin/reservasi', $data);
	}

	public function sinkronisasi(){
		if($sinkron =  $this->db->get_where('peminjaman', ['surat' => ''], ['status_pinjam' => 0])->result_array())
		{
		//var_dump($cek); die;
			$this->db->query("DELETE FROM peminjaman WHERE DATEDIFF(CURRENT_DATE(), tgl_pinjam) > 1 and status_pinjam = 0 and surat = '' "); 
			$this->session->set_flashdata('sinkrontakrubah','OK');
			redirect("admin/new_reservasi");
		}else {
			$this->session->set_flashdata('sinkron','OK');
			redirect("admin/new_reservasi");
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
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			$data['nama_opd'] = $value['nama_opd'];
			$data['id_sesi'] = $value['id_sesi'];
            $data['waktu_sesi'] = $value['waktu_sesi'];
		}
		//$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
		$this->load->view('admin/reservasi_detail',$data);
}
	function filter()
		{   
			$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :            
				$peminjaman = $this->m_hotel->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel           
				$url_cetak = 'cetak';            
				$label = 'Semua Data Peminjaman Ruang';        
			}else{ // Jika terisi            
				$peminjaman = $this->m_hotel->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel            
				$url_cetak = 'cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;            
				$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy            
				$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy           
				$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;        
			}        
			$data['peminjaman'] = $peminjaman;        
			$data['url_cetak'] = base_url('admin/'.$url_cetak);        
			$data['label'] = $label;        
			$this->load->view('admin/cari_peminjaman', $data);
		}

		function cetak()
		{
			$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :            
				$peminjamaman = $this->m_hotel->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel            
				$label = 'Semua Data Peminjaman Ruang';       
			 }else{ // Jika terisi            
				$peminjamaman = $this->m_hotel->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel            
				$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy           
				 $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy            
				 $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;        
				}        
				
				$data['label'] = $label;        
				$data['peminjaman'] = $peminjamaman;  
				ob_start();
				$this->load->view('admin/laporan_print', $data);    
				$html = ob_get_contents();    
				ob_end_clean();  
				$this->load->view('admin/laporan_print', $data);    
		}

	function new_reservasi_in($id){
		$query = $this->m_hotel->ReservasiId($id);
		foreach ($query->result_array() as $value) {
			$data['id_peminjaman'] 			= $value['id_peminjaman'];
			$data['tgl_pinjam'] 			= $value['tgl_pinjam'];
			$data['tgl_selesai'] 			= $value['tgl_selesai'];
			$data['nama_kegiatan']	 		= $value['nama_kegiatan'];
			$data['no_hp_peminjam']	 		= $value['no_hp_peminjam'];
			$data['email']	 				= $value['email'];
			$data['surat']	 				= $value['surat'];
			$data['status_pinjam']	 				= $value['status_pinjam'];
			$data['status_baca']	 				= $value['status_baca'];
			
			$data['id_ruang'] 				= $value['id_ruang'];
			$data['nama_ruang'] 				= $value['nama_ruang'];
			$data['status_ruang'] 			= $value['status_ruang'];
			$data['tanggal_dibuat'] 			= $value['tanggal_dibuat'];
		
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			$data['nama_opd'] = $value['nama_opd'];
            $data['id_sesi'] = $value['id_sesi'];
		    $data['waktu_sesi'] = $value['waktu_sesi'];
		}   
		
			$mail = new PHPMailer(true);                            // Passing `true` enables exceptions
			//Server settings
			$mail->SMTPDebug = 0;                                     // Enable verbose debug output
			$mail->isSMTP();                                          // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                          // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                                   // Enable SMTP authentication
			$mail->Username = 'candra.angujiwati@gmail.com';          // SMTP username
			$mail->Password = '@candra123';                         // SMTP password
			$mail->SMTPSecure = 'tls';                                // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                        // TCP port to connect to
		
			//Recipients
			$mail->setFrom('candra.angujiwati@gmail.com', 'Admin Sistem Peminjaman');
			$mail->addAddress($data['email'], $data['nama']); // Add a recipient
		
			$mailContent = "
				<p>
					Halo! Kami dari admin SiPem ingin menginformasikan bahwa peminjaman dengan ID Pinjam". $data['id_peminjaman']	." telah disetujui oleh admin.
					<br/>Salam, <b>Team SiPem</b>
				</p>";
		
			//Content
			$mail->isHTML(true);                                    // Set email format to HTML
			$mail->Subject = 'Persetujuan pemesanan ruang';
			$mail->Body    = $mailContent;
			$mail->AltBody = $mailContent;
		
			$mail->send();
			// Email kekirim
		
			//update status pinjam dan ruang dll
			$up = [
				'judul_notif' => 'Pengajuan Disetujui',
				'pesan_notif' => 'Pengajuan oleh " ' . $data['nama'] . ' " Ruang :  " ' . $data['nama_ruang'] . ' " dan Sesi : ' . $data['waktu_sesi'] . ' " disetujui Admin sistem pada ' . gmdate('D, d-M-Y H:i', $data['tanggal_dibuat']) . '.',
				'status_pinjam' => 1,
				'status_baca' => 1
			];
			$this->db->update('peminjaman',$up,['id_peminjaman' => $id]);
			//update status ruang
			$query2 = $this->m_hotel->ReservasiId($id);
			foreach ($query2->result_array() as $value2) {
				$id_ruang['id_ruang'] = $value2['id_ruang'];
			}
			$ru=[
				'status_ruang' => 1
			];
			$this->db->update('ruang',$ru,$id_ruang);
    
			if (!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} 
			else {
			$this->session->set_flashdata('in','OK');
			redirect("admin/new_reservasi");
			}
			
		}

	function new_reservasi_out($id){
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
                $data['id_sesi'] = $value['id_sesi'];
				$data['waktu_sesi'] = $value['waktu_sesi'];
				$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			$data['id_opd'] = $value['id_opd'];
			$data['nama_opd'] = $value['nama_opd'];
		
			}
			$data['status_pinjam']	= $this->uri->segment(4);
			$data['tgl_selesai'] = date('Y-m-d');
			$this->load->view('admin/reservasi_out',$data);
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

			//Insert into pinjam ruang
			$in['id_peminjaman'] = $this->input->post("id_peminjaman");
			$in['keterangan'] 	= $this->input->post("keterangan");
			$this->db->insert("pinjam_ruang",$in);
		
			$this->session->set_flashdata('out','OK');
			redirect("admin/new_reservasi");
		}
	
	function reservasi_delete($id_peminjaman){
		//$data['notif_barang']=$this->db->from('pinjam_barang')->join('user', 'user.id_user=pinjam_barang.id_user')->order_by('id_pinjam_barang', 'DESC')->get()->result_array();

		$peminjaman= $this->db->from('peminjaman')->join('ruang','ruang.id_ruang=peminjaman.id_ruang')->join('sesi','sesi.id_sesi=ruang.id_sesi')->join('user','user.id_user=peminjaman.id_user')->where(['id_peminjaman' => $id_peminjaman])->get()->row_array();
		
		//$peminjaman = $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row_array();
		$notif = [
			'judul' => 'Pengajuan Ditolak',
			'pesan' => 'Pengajuan dengan ID Pinjam : "' . $peminjaman['id_peminjaman'] . '" Peminjam : "' . $peminjaman['nama'] . '" dengan Ruang : "' . $peminjaman['nama_ruang'] . '" Sesi : "' . $peminjaman['waktu_sesi'] . '" dihapus pada ' . gmdate('D, d-M-Y H:i', time()+ (60 * 60 * 7)) . '. Dikarenakan tidak memenuhi syarat untuk peminjaman ruang.' ,
			'is_read' => 0
		];
		$where= array('id_peminjaman' => $id_peminjaman);
		$notifbatal = [
			'judul_notif' => 'Ditolak',
			'status_pinjam' => '3',
			'pesan_notif' => 'Peminjaman Ditolak dikarenakan tidak memenuhi syarat untuk peminjaman barang.',
			'status_baca' => '1'
		];			
		$this->m_hotel->update_data($where,$notifbatal,'peminjaman');
		//$this->db->delete('peminjaman', ['id_peminjaman' => $id_peminjaman]);
		$this->db->insert('notif', $notif);
		$this->session->set_flashdata('hapus','OK');
		
		redirect("admin/new_reservasi");
	}

	//SESI
	function sesi(){

		$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
		$this->load->view('admin/sesi', $data);
	}

	function sesi_tambah(){
		$this->load->view('admin/sesi_tambah.php');
	}

	function sesi_tambah_aksi(){
		//$status_sesi = $this->input->post('status_sesi');
		$waktu_sesi = implode(" - ", $this->input->post('waktu_sesi'));// Converted array into comma separated value using implode
		
			$data = array(
				'waktu_sesi' => $waktu_sesi
			);
			$sql = $this->db->query("SELECT waktu_sesi FROM sesi where waktu_sesi='$waktu_sesi'");
			$cek = $sql->num_rows();
			if ($cek > 0) {
				echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
			}else{
				$this->m_hotel->insert_data($data,'sesi');
				redirect('admin/sesi');
			}
	}

	function sesi_edit($id_sesi){
		$where = array('id_sesi' => $id_sesi);
		// mengambil data dari database sesuai id
		$data['sesi'] = $this->m_hotel->edit_data($where,'sesi')->result();
		$this->load->view('admin/sesi_edit.php', $data);
	}

	function sesi_edit_aksi()
	{
		$id_sesi = $this->input->post('id_sesi');
		$waktu_sesi = implode(" - ", $this->input->post('waktu_sesi'));// Converted array into comma separated value using implode
		
		//$waktu_sesi = $this->input->post('waktu_sesi');

		$where = array(
			'id_sesi' => $id_sesi
		);

		$data = array(
			'waktu_sesi' => $waktu_sesi
		);
		/*$sql = $this->db->query("SELECT waktu_sesi FROM sesi where waktu_sesi='$waktu_sesi'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{*/
		$this->m_hotel->update_data($where,$data,'sesi');
		redirect(base_url().'admin/sesi');
		//}
	}

	function sesi_delete($id_sesi){
		$where = array('id_sesi' => $id_sesi);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'sesi');
		redirect(base_url().'admin/sesi');
    }


	//OPD
	function opd(){

		$data['opd'] = $this->m_hotel->get_data('opd')->result();
		$this->load->view('admin/opd.php', $data);
	}

	function opd_tambah(){
		$this->load->view('admin/opd_tambah.php');
	}

	function opd_tambah_aksi(){
		$nama_opd = $this->input->post('nama_opd');

		$data = array(
			'nama_opd' => $nama_opd
		);
		$sql = $this->db->query("SELECT nama_opd FROM opd where nama_opd='$nama_opd'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{
			$this->m_hotel->insert_data($data,'opd');
			redirect('admin/opd');
		}
	}

	function opd_edit($id_opd){
		$where = array('id_opd' => $id_opd);
		// mengambil data dari database sesuai id
		$data['opd'] = $this->m_hotel->edit_data($where,'opd')->result();
		$this->load->view('admin/opd_edit.php', $data);
	}

	function opd_edit_aksi(){
		$id_opd = $this->input->post('id_opd');
		$nama_opd = $this->input->post('nama_opd');

		$where = array(
			'id_opd' => $id_opd
		);

		$data = array(
			'nama_opd' => $nama_opd
		);

		$this->m_hotel->update_data($where,$data,'opd');
		redirect(base_url().'admin/opd');
	}

	function opd_delete($id_opd){
		$where = array('id_opd' => $id_opd);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'opd');
		redirect(base_url().'admin/opd');
	}

//RUANG
	function ruang(){
		$data['ruang'] = $this->db->query("SELECT a.*,b.*
		FROM ruang a
        join sesi b
        on a.id_sesi=b.id_sesi
	")->result();
		$this->load->view('admin/ruang', $data);
	}

	function ruang_delete($id_ruang){
		$where = array('id_ruang' => $id_ruang);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'ruang');
		redirect(base_url().'admin/ruang');
	}

	function ruang_tambah(){
		$data['sesi'] = $this->m_hotel->get_data('sesi')->result_array();
	    $this->load->view('admin/ruang_tambah.php', $data);
	}

	function ruang_tambah_aksi(){
		$nama_ruang = $this->input->post('nama_ruang');
		$kapasitas = $this->input->post('kapasitas');
		$content = $this->input->post('fasilitas_ruang');
		$area = $this->input->post('area');
		$gambar = $this->input->post('gambar');
        $a = $this->input->post('sesi');
        $jml = count($a);
    
       $config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '9000000';
		$config['max_width'] = '900000';
		$config['max_height'] = '900000';
		$config['file_name'] = 'Ruang'.'Dinas'.time();
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');
		$image=$this->upload->data();

        for($i=0; $i<$jml; $i++) {
		$data = array(
			'gambar' => $image['file_name'],
			'nama_ruang' => $nama_ruang,
			'kapasitas' => $kapasitas,
			'fasilitas_ruang' => $content,
			'area' => $area,
            'id_sesi' => $a[$i]
		);
        //var_dump($data);}
       // } 
    
		/*$sql = $this->db->query("SELECT nama_ruang FROM ruang join sesi where nama_ruang='$nama_ruang'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{*/
			$this->db->insert('ruang',$data);
        //}
    }
    redirect("admin/ruang");
        
        //redirect("admin/ruang");
            /*$sesi = $this->input->post('sesi');
            //mendapatkan id product
            $id_ruang = $this->db->insert_id();
            foreach($sesi as $row){
                $data = array(
                      'id_ruang' => $id_ruang,
                      'id_sesi' => $row
                    );
                $this->db->insert('ruang',$data);
            }*/
			
            /*$id_sesi = $this->input->post('id_sesi');
            $id_ruang = $this->db->insert_id();
            foreach($id_sesi as $row){
                $data = array(
                      'id_ruang' => $id_ruang,
                      'id_sesi' => $row
                    );
                $this->db->insert('ruang',$data);*/
                
              
	}

	function ruang_edit($id_ruang){
		$where = array('id_ruang' => $id_ruang);
		// mengambil data dari database sesuai id
		$data['ruang'] = $this->db->query("SELECT sesi.id_sesi, sesi.waktu_sesi, 
		ruang.id_ruang, ruang.nama_ruang, ruang.kapasitas, ruang.fasilitas_ruang, ruang.area, ruang.gambar, ruang.status_ruang, ruang.id_sesi
		FROM ruang, sesi
		where ruang.id_sesi=sesi.id_sesi 
		and ruang.id_ruang=$id_ruang ")->result();
		
		$data['sesi'] = $this->m_hotel->get_data('sesi')->result_array();
		
		$this->load->view('admin/ruang_edit.php', $data);
	}

	function ruang_edit_aksi(){
        $id_sesi = $this->input->post('id_sesi');
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruang = $this->input->post('nama_ruang');
		$kapasitas = $this->input->post('kapasitas');
		$fasilitas_ruang = $this->input->post('fasilitas_ruang');
		$area = $this->input->post('area');
		$gambar = $this->input->post('gambar');
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '9000000';
		$config['max_width'] = '900000';
		$config['max_height'] = '900000';
		$config['file_name'] = 'Ruang'.'Dinas'.time();
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');
		$image=$this->upload->data();

		$where = array(
			'id_ruang' => $id_ruang
		);

		$data = array(
			'gambar' => $image['file_name'],
			'nama_ruang' => $nama_ruang,
			'kapasitas' => $kapasitas,
			'fasilitas_ruang' => $fasilitas_ruang,
			'area' => $area,
            'id_sesi' => $id_sesi		
		);
		/*$sql = $this->db->query("SELECT nama_ruang FROM ruang where nama_ruang='$nama_ruang'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{*/
			$this->m_hotel->update_data($where, $data,'ruang');
			redirect(base_url().'admin/ruang');
		//}
	}


//mulai surat
function file(){
	$this->load->helper('download');
	$name = $this->uri->segment(3);
	$data = file_get_contents("./assets/surat_peminjaman/".$name);
	force_download($name, $data);
}

//notif
	public function notif(){
		//query = $this->db->from($this->tbl_name)->where($where)->order_by('birth_date', 'ASC')->get();
		$data['notif']=$this->db->from('notif')->order_by('id', 'DESC')->get()->result_array();
		
		//$data['notif']=$this->db->get('notif')->ordey_by(['judul'], 'ASC')->result_array();
		$this->load->view('admin/notif', $data);
		}
	public function tandaisudahdibaca($id)
	{
		$data = [
			'is_read' => 1
		];
		$this->db->update('notif', $data, ['id'=>$id]);
		$this->session->set_flashdata('tandai','OK');
		return redirect(base_url('admin/notif'));
	}
	public function tandaisudahdibacasemua()
	{
		$notif = $this->db->get_where('notif', ['is_read' => 0])->result_array();
		for($i=0; $i<count($notif); $i++) 
		{
			$data = [
				'is_read' => 1
			];
			$this->db->update('notif', $data, ['id'=>$notif[$i]['id']]);
		}	
		$this->session->set_flashdata('tandai','OK');
		return redirect(base_url('admin/notif'));
	}
	public function hapussemuanotif()
	{
		$this->db->empty_table('notif');
		$this->session->set_flashdata('hapusnotif','OK');
		return redirect(base_url('admin/notif'));
	}
}
?>