<?php
class Pelanggan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelanggan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'pelanggan';
		$data['data'] 	= $this->model_pelanggan->get_all();
		$this->load->view('pelanggan/index',$data);
	}

	function add()
	{
		$data['page']		= 'pelanggan';
		$this->load->view('pelanggan/add',$data);
	}

	function actionadd()
	{
			$data = array(
					'nama_pelanggan'         => $this->input->post('nama_pelanggan'),
					'alamat_pelanggan'    	 => $this->input->post('alamat_pelanggan'),
					'nik_pelanggan'    	 => $this->input->post('nik_pelanggan'),
					'pekerjaan_pelanggan'    => $this->input->post('pekerjaan_pelanggan'),
					'status_pelanggan'       => $this->input->post('status_pelanggan')
			);

			$this->model_pelanggan->add($data);
			redirect('pelanggan');
	}

	function edit($id)
	{
		$data['page']		= 'pelanggan';
		$data['data']		= $this->model_pelanggan->get_all('id_pelanggan', $id);
		$this->load->view('pelanggan/edit',$data);
	}

	function actionedit()
	{
		$data = array(
				'nama_pelanggan'         => $this->input->post('nama_pelanggan'),
				'nik_pelanggan'    	 => $this->input->post('nik_pelanggan'),
				'alamat_pelanggan'    	 => $this->input->post('alamat_pelanggan'),
				'pekerjaan_pelanggan'    => $this->input->post('pekerjaan_pelanggan'),
				'status_pelanggan'       => $this->input->post('status_pelanggan')
		);

		$this->model_pelanggan->update($this->input->post('id'),$data);
		redirect('pelanggan');
	}

	function actiondelete($id)
	{
			$this->model_pelanggan->delete($id);
			redirect('pelanggan');
	}

}
