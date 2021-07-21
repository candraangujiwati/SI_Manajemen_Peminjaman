<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index()
	{
		$data['ruang2'] = $this->m_tamu->ruangaja();
		$data['ruang3'] = $this->m_tamu->ruangsemua();
	
		$this->load->view('welcome_message',$data);
	}
public function cari(){
	$id = $this->input->post('nama_ruang');
	//var_dump($id);
	$data['ruang3'] = $this->m_tamu->cariruang($id);
	$data['ruang2'] = $this->m_tamu->ruangaja();
	$this->load->view('welcome_message', $data);
}
	
	public function ruangdetail()
	{
		$id = $this->uri->segment(3);
		$data['ruang'] 			= $this->m_tamu->RuangDetail($id);
		$data['peminjaman'] 	= $this->m_tamu->PinjamDetail($id);
		
		//$data['ruang_gambar'] 	= $this->m_tamu->RuangGambarId($id);
		//$data['sesi'] 	= $this->m_hotel->get_data('sesi');
		$data['opd'] 	= $this->m_hotel->get_data('opd');
		$data['user'] 	= $this->m_hotel->get_data('user');
		//redirect('ruang_detail');
		$this->load->view('ruang_detail', $data);
	}


	public function load()
	{
		$event_data = $this->m_hotel->fetch_all_event();
		foreach($event_data->result_array() as $row)
		{
			if($row['status_pinjam']==1)
			{
				$data[] = array(
				'backgroundColor' => 'rgb(152, 251, 152)',
				'borderColor' => 'rgb(0, 128, 0)',
				
				'title'	=>	"Sesi ke-".$row['id_sesi']. "; R." .$row['nama_ruang'], 
				'start'	=>	$row['tgl_pinjam'],
				'end'	=>	$row['tgl_selesai'],
				);
			}if($row['status_pinjam']==0)
				{
				$data[] = array(
				'backgroundColor' => 'rgb(176,224,230)',
				'borderColor' => 'rgb(0,0,255 )',
				
				'title'	=>	"Sesi ke-".$row['id_sesi']. "; R." .$row['nama_ruang'], 
				'start'	=>	$row['tgl_pinjam'],
				'end'	=>	$row['tgl_selesai'],
				);
				}
			else
			{ }
		}
		echo json_encode($data); 
	}
}