<?php
class Jalan extends CI_Controller
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
		$data['data'] 	= $this->model_pasien->rawat('rawat', 'jalan');
		$this->load->view('rawat/index',$data);
	}

	function add()
	{
		$data['page']		= 'inap';
		$data['room'] 	= $this->model_room->available();
		$this->load->view('rawat/add',$data);
	}

	function actionadd()
	{
			$data = array(
					'nama_pasien'         	=> $this->input->post('nama_pasien'),
					'alamat_pasien'      		=> $this->input->post('alamat_pasien'),
					'umur_pasien'         	=> $this->input->post('umur_pasien'),
					'id_ktp_pasien'    			=> $this->input->post('id_ktp_pasien'),
					'sakit_pasien'         	=> $this->input->post('sakit_pasien'),
					'rawat'      						=> 'jalan',
					'tujuan'         				=> $this->input->post('tujuan'),
					'tgl_masuk'    					=> date('Y-m-d H:i:s'),
					'tgl_keluar'						=> date('Y-m-d H:i:s')
			);

			$this->model_pasien->add($data);
			redirect('jalan');
	}

	function edit($id)
	{
		$data['page']		= 'inap';
		$data['data']		= $this->model_pasien->get_all('id_pasien',$id);
		$data['room'] 	= $this->model_room->get_all();
		$this->load->view('rawat/edit',$data);
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
		);

		$this->model_pasien->update($this->input->post('id'),$data);
		redirect('jalan');
	}

	function actiondelete($id)
	{
			$this->model_pasien->delete($id);
			redirect('jalan');
	}

}
