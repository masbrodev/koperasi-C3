<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pasien');
		$this->load->model('model_room');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'dashboard';
		$data['pasien'] 		 = $this->model_pasien->get_all();
		$data['rawat_jalan'] = $this->model_pasien->rawat('rawat','jalan');
		$data['rawat_inap']  = $this->model_pasien->rawat('rawat','inap');
		$data['room']        = $this->model_room->available();
		$this->load->view('dashboard/index',$data);
	}

}
