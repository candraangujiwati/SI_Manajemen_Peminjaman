<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome_awal extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome');
	}

	public function regis_semua(){
		$data2['title'] = 'Registrasi Akun';
        //$this->load->view('templatesemua/header', $data2);
        //$this->load->view('templatesemua/footer');
		$this->load->view('regis_semua',$data2);
	}
}