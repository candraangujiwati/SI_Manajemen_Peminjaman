<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome_barang extends CI_Controller {
	public function index()
	{
		$data['barang'] 	= $this->m_tamu->barangall();
		$data['barangchart'] = $this->m_tamu->barangchart()->result();
		
		$this->load->view('welcome_barang',$data);
	}

	public function cari(){
		$id = $this->input->post('id_barang');
		$data['barang'] = $this->m_tamu->barangcari($id);
		$this->load->view('welcome_barang', $data);
	}
	public function barangdetail()
	{
		$id = $this->uri->segment(3);
		$data['barang'] 			= $this->m_tamu->BarangDetail($id);
		$data['jenis_barang'] 	= $this->m_hotel->get_data('jenis_barang');
	
		$this->load->view('barang_detail', $data);
	}


	


	}