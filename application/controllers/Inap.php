<?php
class Inap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_room');
		$this->load->model('model_pasien');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'inap';
		$data['data'] 	= $this->model_pasien->rawat('rawat', 'inap');
		$this->load->view('inap/index',$data);
	}

	function add()
	{
		$data['page']		= 'inap';
		$data['room'] 	= $this->model_room->available();
		$this->load->view('inap/add',$data);
	}

	function actionadd()
	{
			$data = array(
					'nama_pasien'         	=> $this->input->post('nama_pasien'),
					'alamat_pasien'      		=> $this->input->post('alamat_pasien'),
					'umur_pasien'         	=> $this->input->post('umur_pasien'),
					'id_ktp_pasien'    			=> $this->input->post('id_ktp_pasien'),
					'sakit_pasien'         	=> $this->input->post('sakit_pasien'),
					'rawat'      						=> 'inap',
					'tujuan'         				=> $this->input->post('tujuan'),
					'tgl_masuk'    					=> date('Y-m-d H:i:s')
			);

			$this->model_pasien->add($data);

			$dataruangan = array(
				'pasien_id'						=> $this->db->insert_id(),
				'status'							=> '1'
			);
			$this->model_room->update($this->input->post('tujuan'),$dataruangan);
			redirect('inap');
	}

	function edit($id)
	{
		$data['page']		= 'inap';
		$data['data']		= $this->model_pasien->get_all('id_pasien',$id);
		$data['room'] 	= $this->model_room->get_all();
		$this->load->view('inap/edit',$data);
	}

	function actionedit()
	{
		$data = array(
				'nama_pasien'         	=> $this->input->post('nama_pasien'),
				'alamat_pasien'      		=> $this->input->post('alamat_pasien'),
				'umur_pasien'         	=> $this->input->post('umur_pasien'),
				'id_ktp_pasien'    			=> $this->input->post('id_ktp_pasien'),
				'sakit_pasien'         	=> $this->input->post('sakit_pasien'),
				'tujuan'         				=> $this->input->post('tujuan'),
				'tgl_keluar'    				=> $this->input->post('tgl_keluar')
		);

		$this->model_pasien->update($this->input->post('id'),$data);
		if($this->input->post('tujuan') != $this->input->post('roomasli')){
			$dataruangan = array(
				'pasien_id'						=> '0',
				'status'							=> '0'
			);
			$this->model_room->update($this->input->post('roomasli'),$dataruangan);
			$ruanganbaru = array(
				'pasien_id'						=> $this->input->post('tujuan'),
				'status'							=> '1'
			);
			$this->model_room->update($this->input->post('tujuan'),$ruanganbaru);
		}
		redirect('inap');
	}

	function actiondelete($id,$room)
	{
			$this->model_pasien->delete($id);
			$data = array(
				'pasien_id'						=> '0',
				'status'							=> '0'
			);
			$this->model_room->update($room,$data);
			redirect('inap');
	}

}
