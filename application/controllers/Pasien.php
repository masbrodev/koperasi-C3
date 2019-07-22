<?php
class Pasien extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pasien');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'pasien';
		$data['data'] 	= $this->model_pasien->get_all();
		$this->load->view('pasien/index',$data);
	}

}
