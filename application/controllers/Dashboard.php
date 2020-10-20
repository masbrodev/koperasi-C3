<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		$this->load->model('model_pinjaman');
		$this->load->model('model_pelanggan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']			= 'dashboard';
		$data['barang'] 	= count($this->model_barang->get_all());
		$data['pinjaman']	= count($this->model_pinjaman->get_all());
		$data['user']			= count($this->model_pelanggan->get_all());
		$this->load->view('dashboard/index',$data);
	}

	public function cetak()
	{
		$tahun 		= $this->input->post('tahun');
		$bulan		= $this->input->post('bulan');
		if (!empty($bulan)) {
			$tanggal 	= $tahun.'-'.$bulan;
		}else{
			$tanggal 	= $tahun;
		}
		$data['data']			= $this->model_pinjaman->cetak_laporan($tanggal);
		header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_pinjaman_".$tanggal.".xlsx");
    $this->load->view('dashboard/dipinjam', $data);
	}

}
