<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
    }
	public function index()
	{
		//$data['ruang'] 	= $this->m_tamu->ruangall();
		//$data['opd'] 	= $this->m_hotel->get_data('opd');
		//$data['sesi'] 	= $this->m_hotel->get_data('sesi');
		//$data['event'] 	= $this->m_hotel->get_data('calendar');
		$data_calendar	= $this->m_hotel->get_list_cal("calendar");
		$calendar = array();
		foreach ($data_calendar as $key => $val) 
		{
			$calendar[] = array(
				'id' 	=> intval($val->id), 
				'title' => $val->title, 
				'description' => trim($val->description), 
				'start' => date_format(date_create($val->start_date) ,"Y-m-d H:i:s"),
				'end' 	=> date_format(date_create($val->end_date) ,"Y-m-d H:i:s"),
				'color' => $val->color,
			);
		}
		$data = array();
		$data['get_data'] = json_encode($calendar);
		//$this->load->view('calendar', $data);
		$this->load->view('calendar', $data);
	}

	public function save()
	{
		$response = array();
		$this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$param = $this->input->post();
			$calendar_id = $param['calendar_id'];
			unset($param['calendar_id']);

			if($calendar_id == 0)
			{
				$param['create_at']   	= date('Y-m-d H:i:s');
				$insert = $this->m_hotel->insert_cal("calendar", $param);

				if ($insert > 0) 
				{
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id']		= $insert;
				}
				else
				{
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}
			}
			else
			{	
				$where 		= [ 'id'  => $calendar_id];
				$param['modified_at']   	= date('Y-m-d H:i:s');
				$update = $this->m_hotel->update_cal('calendar', $param, $where);

				if ($update > 0) 
				{
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id']		= $calendar_id;
				}
				else
				{
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}

			}
		}
		else
		{
			$response['status'] = FALSE;
			$response['notif']	= validation_errors();
		}

		echo json_encode($response);
	}

	public function delete()
	{
		$response 		= array();
		$calendar_id 	= $this->input->post('id');
		if(!empty($calendar_id))
		{
			$where = ['id' => $calendar_id];
			$delete = $this->m_hotel->delete_cal('calendar', $where);

			if ($delete > 0) 
			{
				$response['status'] = TRUE;
				$response['notif']	= 'Success delete calendar';
			}
			else
			{
				$response['status'] = FALSE;
				$response['notif']	= 'Server wrong, please save again';
			}
		}
		else
		{
			$response['status'] = FALSE;
			$response['notif']	= 'Data not found';
		}

		echo json_encode($response);
	}

	/*public function load_data() {
		//$data['ruang'] 			= $this->m_tamu->RuangDetail($id);
		$id = $this->uri->segment(3);
		$events['peminjaman'] = $this->m_tamu->PinjamDetail($id);
	
		$events['event'] = $this->m_tamu->get_event_list($id);
		if($events !== NULL) {
			echo json_encode(array('success' => 1, 'result' => $events));
		} else {
			echo json_encode(array('success' => 0, 'error' => 'Event not found'));
		}
		$this->load->view('welcome_message', $events);
	}*/

	public function cari(){
		//$id = $this->input->post('id_sesi');
		//$id = $this->input->post('id_opd');
		
  		//$data['ruang'] = $this->m_tamu->ruangallopd($id);
		//$data['opd'] = $this->m_hotel->get_data('opd');
		//$data['sesi'] = $this->m_hotel->get_data('sesi');
  		//$this->load->view('welcome_message', $data);

	}

	public function ruangdetail()
	{
		/*$id = $this->uri->segment(3);
		//$id2 = $this->input->post('id_peminjaman');
		$data['ruang'] 			= $this->m_tamu->RuangDetail($id);
		$data['peminjaman'] 			= $this->m_tamu->PinjamDetail($id);
		
		$data['ruang_gambar'] 	= $this->m_tamu->RuangGambarId($id);
		//$data['sesi'] 	= $this->m_hotel->get_data('sesi');
		$data['opd'] 	= $this->m_hotel->get_data('opd');
		
		$this->load->view('ruang_detail', $data);*/
	}
}