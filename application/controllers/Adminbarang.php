<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Adminbarang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "loginadminbarang"){
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
		$data['barang'] = $this->m_barang->barangkosong()->result();
		$data['pinjam_barang'] = $this->db->query("SELECT a.*,b.* 
		from pinjam_barang a 
	 	join barang b 
		on a.id_barang=b.id_barang
		where a.status_pinjam_barang='0' 
		order by a.status_pinjam_barang desc")->result();
		//$data['sesi'] = $this->m_hotel->get_data('sesi')->result();
		$this->load->view('admin_barang/overview.php',$data
        );
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
	//query = $this->db->from($this->tbl_name)->where($where)->order_by('birth_date', 'ASC')->get();
	$data['notif_barang']=$this->db->from('notif_barang')->order_by('id', 'DESC')->get()->result_array();
	
	//$data['notif']=$this->db->get('notif')->ordey_by(['judul'], 'ASC')->result_array();
	$this->load->view('admin_barang/notif_barang', $data);
	}
function tandaisudahdibaca($id)
{
	$data = [
		'is_read' => 1
	];
	$this->db->update('notif_barang', $data, ['id'=>$id]);
	$this->session->set_flashdata('tandai','OK');
	return redirect(base_url('adminbarang/notif_barang'));
}

function tandaisudahdibacasemua()
{
	$notif_barang = $this->db->get_where('notif_barang', ['is_read' => 0])->result_array();
	for($i=0; $i<count($notif_barang); $i++) 
	{
		$data = [
			'is_read' => 1
		];
		$this->db->update('notif_barang', $data, ['id'=>$notif_barang[$i]['id']]);
	}	
	$this->session->set_flashdata('tandai','OK');
	return redirect(base_url('adminbarang/notif_barang'));
}
function hapussemuanotif()
{
	$this->db->empty_table('notif_barang');
	$this->session->set_flashdata('hapusnotif','OK');
	return redirect(base_url('adminbarang/notif_barang'));
}

	
	//JENIS BARANG
	function jenis_barang()
	{
		$data['jenis_barang'] = $this->m_barang->get_data('jenis_barang')->result();
		$this->load->view('admin_barang/jenis_barang.php', $data);
	}

	function jenis_barang_tambah(){
		$this->load->view('admin_barang/jenis_barang_tambah.php');
	}

	function jenis_barang_tambah_aksi(){
		$jenis_barang = $this->input->post('jenis_barang');

		$data = array(
			'jenis_barang' => $jenis_barang
		);
		$sql = $this->db->query("SELECT jenis_barang FROM jenis_barang where jenis_barang='$jenis_barang'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{
			$this->m_barang->insert_data($data,'jenis_barang');
			redirect('adminbarang/jenis_barang');
		}
	}

	function jenis_barang_edit($id_jenis_barang){
		$where = array('id_jenis_barang' => $id_jenis_barang);
		// mengambil data dari database sesuai id
		$data['jenis_barang'] = $this->m_barang->edit_data($where,'jenis_barang')->result();
		$this->load->view('admin_barang/jenis_barang_edit.php', $data);
	}

	function jenis_barang_edit_aksi()
	{
		$id_jenis_barang = $this->input->post('id_jenis_barang');
		$jenis_barang = $this->input->post('jenis_barang');

		$where = array(
			'id_jenis_barang' => $id_jenis_barang
		);

		$data = array(
			'jenis_barang' => $jenis_barang
		);
		$sql = $this->db->query("SELECT jenis_barang FROM jenis_barang where jenis_barang='$jenis_barang'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{
			$this->m_barang->update_data($where,$data,'jenis_barang');
		redirect(base_url().'adminbarang/jenis_barang');
		}
		
	}

	function jenis_barang_delete($id_jenis_barang){
		$where = array('id_jenis_barang' => $id_jenis_barang);
		// mengambil data dari database sesuai id
		$this->m_barang->delete_data($where,'jenis_barang');
		redirect(base_url().'adminbarang/jenis_barang');
	}

	//OPD
	function opd(){
		$data['opd'] = $this->m_barang->get_data('opd')->result();
		$this->load->view('admin_barang/opd.php', $data);
	}

	function opd_tambah(){
		$this->load->view('admin_barang/opd_tambah.php');
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
			$this->m_barang->insert_data($data,'opd');
			redirect('adminbarang/opd');
		}
	}

	function opd_edit($id_opd){
		$where = array('id_opd' => $id_opd);
		// mengambil data dari database sesuai id
		$data['opd'] = $this->m_barang->edit_data($where,'opd')->result();
		$this->load->view('admin_barang/opd_edit.php', $data);
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
		$sql = $this->db->query("SELECT nama_opd FROM opd where nama_opd='$nama_opd'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{
			$this->m_barang->update_data($where,$data,'opd');
			redirect(base_url().'adminbarang/opd');
		}
	}

	function opd_delete($id_opd){
		$where = array('id_opd' => $id_opd);
		// mengambil data dari database sesuai id
		$this->m_barang->delete_data($where,'opd');
		redirect(base_url().'adminbarang/opd');
	}

//BARANG
	function barang(){
		$data['barang'] = $this->db->query("SELECT a.*,b.*
		FROM barang a
		JOIN jenis_barang b
		ON a.id_jenis_barang=b.id_jenis_barang")->result();
		$this->load->view('admin_barang/barang.php',$data);
	}
	/*function cekbarang(){
		
		$this->load->view('admin_barang/cek_qr_code.php');
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
		$this->load->view('admin_barang/barang_profil', $data);
		}
	}*/
	/*function barang_profil(){
		$where = $this->m_barang->adaqr($result_code);
		$data['barang'] = $this->db->query("SELECT a.*,b.*
		FROM barang a
		JOIN jenis_barang b
		ON a.id_jenis_barang=b.id_jenis_barang")->row_array();
		$data['jenis_barang'] = $this->m_barang->get_data('jenis_barang')->result();
		$this->load->view('admin_barang/barang_profil', $data);
	}*/

	function barang_delete($id_barang){
		$where = array('id_barang' => $id_barang);
		// mengambil data dari database sesuai id
		$this->m_barang->delete_data($where,'barang');
		redirect(base_url().'adminbarang/barang');
	}

	function barang_tambah(){
		$data['jenis_barang'] = $this->m_barang->get_data('jenis_barang')->result();
		$this->load->view('admin_barang/barang_tambah.php', $data);
	}

	function barang_tambah_aksi(){
		$id_barang = $this->input->post('id_barang');
		$id_jenis_barang = $this->input->post('id_jenis_barang');
		$kode_barang = $this->m_barang->buat_kode_barang();
		$nama_barang = $this->input->post('nama_barang');
		$merk = $this->input->post('merk');
		$jumlah = $this->input->post('jumlah');
		$content = $this->input->post('keterangan');
		$foto_barang = $this->input->post('foto_barang');
		
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qr_code_barang/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$nama_barang.'.png'; //buat name dari qr code sesuai dengan nim
 
		$codeContents = "Kode barang : ";
		$codeContents .= "$kode_barang";
		$codeContents .= "\n";
		$codeContents .= "Nama barang : ";
		$codeContents .= "$nama_barang";
		$codeContents .= "\n";
		$codeContents .= "Merk barang : ";
		$codeContents .= "$merk";
		$codeContents .= "\n";
		$codeContents .= "Jumlah barang : ";
		$codeContents .= "$jumlah";
		$codeContents .= "\n";
		$codeContents .= "Keterangan : ";
		$codeContents .= "$content";

        $params['data'] = $codeContents;
		 //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$config['upload_path'] = './assets/images_barang/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '9000000';
		$config['max_width'] = '900000';
		$config['max_height'] = '900000';
		$config['file_name'] = 'Barang'.'Dinas'.time();
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto_barang');
		$image=$this->upload->data();

		$data = array(
			'foto_barang' => $image['file_name'],
			'id_jenis_barang' => $id_jenis_barang,
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'merk' => $merk,
			'jumlah' => $jumlah,
			'keterangan' => $content,
			'qr_code'   => $image_name
			
		);
		$sql = $this->db->query("SELECT kode_barang FROM barang where kode_barang='$kode_barang  '");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		}else{
			$this->m_barang->insert_data($data,'barang');
			redirect("adminbarang/barang");
		}
		
		// mengalihkan halaman ke halaman data anggota
		//
	}

	function barang_edit($id_barang){
		$where = array('id_barang' => $id_barang);
		// mengambil data dari database sesuai id
		$data['barang'] = $this->db->query("SELECT jenis_barang.id_jenis_barang, jenis_barang.jenis_barang, 
		barang.id_barang, barang.kode_barang, barang.nama_barang, barang.merk, barang.jumlah, barang.foto_barang, barang.keterangan, barang.id_jenis_barang
		FROM barang, jenis_barang
		where barang.id_jenis_barang=jenis_barang.id_jenis_barang 
		and barang.id_barang=$id_barang ")->result();
		
		$data['jenis_barang'] = $this->m_barang->get_data('jenis_barang')->result();
		
		$this->load->view('admin_barang/barang_edit.php', $data);
	}

	function barang_edit_aksi(){
		$id_barang = $this->input->post('id_barang');
		$id_jenis_barang = $this->input->post('id_jenis_barang');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$merk = $this->input->post('merk');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		$foto_barang = $this->input->post('foto_barang');
		$config['upload_path'] = './assets/images_barang/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '9000000';
		$config['max_width'] = '900000';
		$config['max_height'] = '900000';
		$config['file_name'] = 'Barang'.'Dinas'.time();
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto_barang');
		$image=$this->upload->data();

		$where = array(
			'id_barang' => $id_barang
		);

		$data = array(
			'foto_barang' => $image['file_name'],
			'id_jenis_barang' => $id_jenis_barang,
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'merk' => $merk,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan		
		);
		//$sql = $this->db->query("SELECT nama_barang FROM barang where nama_barang='$nama_barang'");
		//$cek = $sql->num_rows();
		//if ($cek > 0) {
			//echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
		//}else{
			$this->m_barang->update_data($where, $data,'barang');
			redirect(base_url().'adminbarang/barang');
		//}
	}

	function liatqr($id_barang){
		$where = array('id_barang' => $id_barang);
		//var_dump($id_barang);
		$data['barang'] = $this->db->query("SELECT jenis_barang.id_jenis_barang, jenis_barang.jenis_barang, 
		barang.id_barang, barang.kode_barang, barang.nama_barang, barang.merk, barang.jumlah, barang.foto_barang, barang.keterangan, barang.qr_code, barang.id_jenis_barang
		FROM barang, jenis_barang
		where barang.id_jenis_barang=jenis_barang.id_jenis_barang 
		and barang.id_barang=$id_barang ")->result();
		//$data['user_grup'] = $this->m_barang->get_data('user_grup')->result();
		//$data['opd'] = $this->m_barang->get_data('opd')->result();
		$this->load->view('admin_barang/liatqr', $data);
	}
	function cetakqr($id_barang) {
		$this->load->library('pdf');
	$pdf = new FPDF('l','mm','letter');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',20);
		$pdf->SetLeftMargin('17');

		// mencetak string 
		$pdf->Cell(250,20,'Sistem Peminjaman Barang',0,1,'C');
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(250,1,'Data QR Code Barang',0,1,'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,15,'',0,1);
		$pdf->SetFont('Arial','B',16);
		//$pdf->Cell(7,6,'NO',1,0);
		$pdf->Cell(30,10,'Nama Barang : ',0,1);
		
		
		//$pdf->Cell(40,6,'NAMA RUANG',1,1);
		
	
		$where = array('id_barang' => $id_barang);
		//var_dump($id_barang);
		$barang= $this->db->query("SELECT jenis_barang.id_jenis_barang, jenis_barang.jenis_barang, 
		barang.id_barang, barang.kode_barang, barang.nama_barang, barang.merk, barang.jumlah, barang.foto_barang, barang.keterangan, barang.qr_code, barang.id_jenis_barang
		FROM barang, jenis_barang
		where barang.id_jenis_barang=jenis_barang.id_jenis_barang 
		and barang.id_barang=$id_barang ")->result();
	
		foreach ($barang as $row){
			//$pdf->Cell(7,6,$row->id_peminjaman,1,0);
			$pdf->SetFont('Arial','',16);
			$pdf->Cell(20,7,$row->nama_barang,0,1);
			$pdf->SetFont('Arial','B',18);
			$pdf->Cell(40,20,'QR Code : ',0,1);
			$pdf->Image('./assets/qr_code_barang/'.$row->qr_code,30,80,80,80,'png');
			//$pdf->Cell(40,6,$row->nama_kegiatan,1,0); 
			/*$pdf->Cell(40,6,$row->nama_peminjam,1,0);
			$pdf->Cell(40,6,$row->no_hp_peminjam,1,0);
			$pdf->Cell(40,6,$row->nama_ruang,1,1);*/
		}
		$pdf->Output('','Cetak QR Code.pdf');
	}


	//user grup mulai
	function user_grup(){

		$data['user_grup'] = $this->m_barang->get_data('user_grup')->result();
		$this->load->view('admin_barang/user_grup.php', $data);
	}

	function user_grup_edit($id_user_grup){
		$where = array('id_user_grup' => $id_user_grup);
		// mengambil data dari database sesuai id
		$data['user_grup'] = $this->m_barang->edit_data($where,'user_grup')->result();
		$this->load->view('admin_barang/user_grup_edit.php', $data);
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

		$this->m_barang->update_data($where,$data,'user_grup');
		redirect(base_url().'adminbarang/user_grup');
	}

	//user mulai
	function user(){
	$data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup
		join opd c
		on a.id_opd=c.id_opd')->result();
		$this->load->view('admin_barang/user_barang.php', $data);
	}

	function user_tambah(){
		$data['user'] = $this->db->query('SELECT a.*, b.*,c.* 
		from user a 
		join user_grup b 
		on a.id_user_grup=b.id_user_grup
		join opd c
		on a.id_opd=c.id_opd')->result();

		$data['user_grup'] = $this->m_barang->get_data('user_grup')->result();
		$data['opd'] = $this->m_barang->get_data('opd')->result();
		$this->load->view('admin_barang/user_barang_tambah.php',$data);
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
		$this->m_barang->insert_data($data,'user');
		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'adminbarang/user');
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
		$data['user_grup'] = $this->m_barang->get_data('user_grup')->result();
		$data['opd'] = $this->m_barang->get_data('opd')->result();
		$this->load->view('admin_barang/user_barang_edit.php', $data);
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
		$this->m_barang->update_data($where,$data,'user');
		redirect(base_url().'adminbarang/user');
		//}
	}

	function user_delete($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$this->m_barang->delete_data($where,'user');
		redirect(base_url().'adminbarang/user');
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
	
		$this->load->view('admin_barang/user_barang_profil', $data);
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
		$this->load->view('admin_barang/pinjam_barang', $data);
	}
	public function sinkronisasi(){
		if($sinkron =  $this->db->get_where('pinjam_barang', ['surat_pinjam_barang' => ''], ['status_pinjam_barang' => 0])->result_array())
		{
		//var_dump($cek); die;
			$this->db->query("DELETE FROM pinjam_barang WHERE DATEDIFF(CURRENT_DATE(), tgl_pinjam_barang) > 1 and status_pinjam_barang = 0 and surat_pinjam_barang = '' "); 
			$this->session->set_flashdata('sinkrontakrubah','OK');
			redirect("adminbarang/new_pinjam_barang");
		} else {
			$this->session->set_flashdata('sinkron','OK');
			redirect("adminbarang/new_pinjam_barang");
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
			$this->load->view('admin_barang/pinjam_barang_detail',$data);
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
		
		$this->load->view('admin_barang/pinjam_barang_out',$data);
}

function new_pinjam_barang_out_simpan(){
		$id['id_pinjam_barang'] 		= $this->input->post("id_pinjam_barang");
		//$di['tgl_kembali_barang'] = $this->input->post("tgl_kembali_barang");
		$up['status_pinjam_barang'] 	= $this->input->post("status_pinjam_barang");
		$up['tgl_kembali_barang'] 	= date('Y-m-d');
	
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
		redirect("adminbarang/new_pinjam_barang");
}
	function pinjam_barang_delete($id_pinjam_barang){
		//$pinjam_barang = $this->db->get_where('pinjam_barang', ['id_pinjam_barang' => $id_pinjam_barang])->row_array();
		$pinjam_barang= $this->db->from('pinjam_barang')->join('barang','barang.id_barang=pinjam_barang.id_barang')->join('user','user.id_user=pinjam_barang.id_user')->where(['id_pinjam_barang' => $id_pinjam_barang])->get()->row_array();
	
		$notif_barang = [
			'judul' => 'Pengajuan Ditolak',
			'pesan' => 'Pengajuan dengan ID Pinjam : "' . $pinjam_barang['id_pinjam_barang'] . '" Peminjam : "' . $pinjam_barang['nama'] . '" Nama Barang : "' . $pinjam_barang['nama_barang'] . '" - "' . $pinjam_barang['merk'] . '" Jumlah Pinjam : "' . $pinjam_barang['jumlah_pinjam'] . '" dihapus pada ' . gmdate('D, d-M-Y H:i', time()+ (60 * 60 * 7)). '. Dikarenakan tidak memenuhi syarat untuk peminjaman barang.' ,
			'is_read' => 0
		];
		//var_dump($pinjam_barang);	
		$where= array('id_pinjam_barang' => $id_pinjam_barang);
		$notifbatal = [
			'judul_notif_barang' => 'Ditolak',
			'status_pinjam_barang' => '3',
			'pesan_notif_barang' => 'Peminjaman Ditolak dikarenakan tidak memenuhi syarat untuk peminjaman barang.',
			'status_baca_notif_barang' => '1'
		];			
	//var_dump($where);	
		$this->m_hotel->update_data($where,$notifbatal,'pinjam_barang');
		//$this->db->delete('pinjam_barang', ['id_pinjam_barang' => $id_pinjam_barang]);
		$this->db->insert('notif_barang', $notif_barang);
		$this->session->set_flashdata('hapus','OK');
		
		redirect("adminbarang/new_pinjam_barang");
	}

		function filter()
		{   
			$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :            
				$pinjam_barang = $this->m_barang->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel           
				$url_cetak = 'cetak';            
				$label = 'Semua Data Peminjaman Barang';        
			}else{ // Jika terisi            
				$pinjam_barang = $this->m_barang->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel            
				$url_cetak = 'cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;            
				$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy            
				$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy           
				$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;        
			}        
			$data['pinjam_barang'] = $pinjam_barang;        
			$data['url_cetak'] = base_url('adminbarang/'.$url_cetak);        
			$data['label'] = $label;        
			$this->load->view('admin_barang/cari_peminjaman', $data);
		}
		function cetak()
		{
			$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
			if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :            
				$pinjam_barang = $this->m_barang->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel            
				$label = 'Semua Data Peminjaman Barang';       
			 }else{ // Jika terisi            
				$pinjam_barang = $this->m_barang->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel            
				$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy           
				 $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy            
				 $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;        
				}        
				
				$data['label'] = $label;        
				$data['pinjam_barang'] = $pinjam_barang;  
				ob_start();
				$this->load->view('admin_barang/laporan_print', $data);    
				$html = ob_get_contents();    
				ob_end_clean();  
				$this->load->view('admin_barang/laporan_print', $data);    
		}

		function semuafilter(){
			$this->load->view('admin_barang/laporan_barang');
		
		}

	function new_pinjam_barang_in($id){
		$query = $this->m_barang->Pinjam_barangId($id);
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
			$data['status_baca_notif_barang'] = $value['status_baca_notif_barang'];
			
			$data['id_barang'] = $value['id_barang'];
			$data['nama_barang'] = $value['nama_barang'];
			$data['status_pinjam_barang'] = $value['status_pinjam_barang'];
			$data['tanggal_buat_pinjam_barang'] = $value['tanggal_buat_pinjam_barang'];
			
			$data['id_user'] = $value['id_user'];
			$data['nama'] = $value['nama'];
			$data['nip'] = $value['nip'];
			//$data['id_opd'] = $value['id_opd'];
			//$data['nama_opd'] = $value['nama_opd'];
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
			$mail->setFrom('candra.angujiwati@gmail.com', 'Admin Sistem Peminjaman Barang');
			$mail->addAddress($data['email_peminjam_barang'], $data['nama']); // Add a recipient
		
			$mailContent = "
				<p>
					Halo! Kami dari admin SiPem Barang ingin menginformasikan bahwa peminjaman dengan ID ". $data['id_pinjam_barang']	." telah disetujui oleh admin.
					<br/>Salam, <b>Team SiPem</b>
				</p>";
		
			//Content
			$mail->isHTML(true);                                    // Set email format to HTML
			$mail->Subject = 'Persetujuan peminjaman barang';
			$mail->Body    = $mailContent;
			$mail->AltBody = $mailContent;
		
			$mail->send();
			// Email kekirim
		
			//update status pinjam dan ruang dll
			$up = [
				'judul_notif_barang' => 'Pengajuan Disetujui',
				'pesan_notif_barang' => 'Pengajuan oleh " ' . $data['nama'] . ' " NIP : " ' . $data['nip'] . ' " ID Barang :  " ' . $data['nama_barang'] . ' " disetujui Admin sistem pada ' . gmdate('D, d-M-Y H:i', $data['tanggal_buat_pinjam_barang']) . '.',
				'status_pinjam_barang' => 1,
				'status_baca_notif_barang' => 1
			];
		
			//$id_peminjaman		= $this->uri->segment(3);
			//$status_pinjam	= $this->uri->segment(4);
			
			$this->db->update('pinjam_barang',$up,['id_pinjam_barang' => $id]);
			
			$query2 = $this->m_barang->Pinjam_barangId($id);
			foreach ($query2->result_array() as $value2) {
				$id_barang['id_barang'] = $value2['id_barang'];
			}
			$ru=[
				'jumlah' => $value2['jumlah']-$value2['jumlah_pinjam']
			];
			$this->db->update('barang',$ru,$id_barang);
			if (!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} 
			else {
			$this->session->set_flashdata('in','OK');
			redirect("adminbarang/new_pinjam_barang");
		}
}
}
?>