<?php 
function email_registrasi($penerima, $nama = '')
	{
		// Konfigurasi email

		$this->load->library('email');

		// Email dan nama pengirim
		$this->email->from('ipercikan@gmail.com', 'Percikan Iman');

		// Email penerima
		$this->email->to($penerima); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
		// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Donasi Percikan Iman | Registrasi');

		// Isi email
		$this->email->message('
	    		<center>
		    		<h1>Pendaftaran Akun Baru</h1>
		    		Dengan Hormat, <b>' . ucwords($nama) . '</b>
		    		<br>
			    	Terimakasih Anda Telah Mendaftar di Platform Ziswaf.id Percikan Iman. <br><br>
			 		<br>
			    	<br>
			    	<hr>
			    	<div class="footer-logo" align="center">
				        <img height="45px" src="' . base_url() . 'assets/images/comp/logo.png">
				        <br>
				        ' . $pengelola['nama_pengelola'] . ' | ' . $pengelola['alamat'] . ' | ' . $pengelola['telepon'] . '
				        <br>
				    </div>	
		    	</center>
	    ');

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			// echo 'Sukses! email berhasil dikirim.';
			return true;
		} else {
			// echo 'Error! email tidak dapat dikirim.';
			return false;
		}
	}

 function registrasi()
	{
		// has_logged_in();
		$this->form_validation->set_rules('nama_donatur', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'No HP', 'required|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[donatur.email]', ([
			'is_unique' => 'Email sudah digunakan!',
		]));
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[userlogin.username]', ([
			'is_unique' => 'Username sudah digunakan!',
		]));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ([
			'matches' => 'Password tidak sama!',
			'min_lenght' => 'Password terlalu pendek! (minimal 8 karakter)',
		]));
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$meta['judul'] = "Registrasi | " . baca_konfig('meta-title');

			$meta['judulhalaman'] = "Registrasi Akun Donatur";

			$meta['homepage'] = FALSE;

			$this->load->view('html/headerfull', $meta);

			$this->load->view('html/page/registrasiview');

			$this->load->view('html/footer');
		} else {
			$user = [
				'nama' => htmlspecialchars($this->input->post('nama_donatur')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => md5($this->input->post('password1')),
				'akses' => 'member',
				'photo' => 'default.png',
				'status' => 'aktif',
				'terakhir_login' => date("Y-m-d h:i:s"),
				'manajemen_id' => 0,
			];

			$this->db->insert('userlogin', $user);
			$user_id = $this->db->insert_id();

			$donatur = [
				'nama_donatur' => htmlspecialchars($this->input->post('nama_donatur')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'hp' => htmlspecialchars($this->input->post('hp')),
				'email' => htmlspecialchars($this->input->post('email')),
				'kota' => htmlspecialchars($this->input->post('kota')),
				'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
				'tipe' => 'donatur',
				'user_id' => $user_id,
				'manajemen_id' => 0,
			];

			$this->db->insert('donatur', $donatur);

			$this->email_registrasi($this->input->post('email'), $this->input->post('nama_donatur'));

			$this->session->set_flashdata('info', 'Registrasi Akun Berhasil! Silahkan Login.');
			redirect(base_url('member_login'));
		}
	}
    ?>