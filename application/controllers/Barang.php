<?php
class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'barang';
		$data['data'] 	= $this->model_barang->get_all();
		$this->load->view('barang/index',$data);
	}

	function add()
	{
		$data['page']		= 'barang';
		$this->load->view('barang/add',$data);
	}

	function actionadd()
	{
			$angka 				= ltrim($this->input->post('harga_barang'),"Rp. ");
			$angka1				= ltrim($this->input->post('sewa_barang'),"Rp. ");
			$harga_barang	= str_replace(".", "", $angka);
			$sewa_barang  = str_replace(".", "", $angka1);
			$data = array(
					'nama_barang'         	=> $this->input->post('nama_barang'),
					'nominal_barang'        => $harga_barang,
          			'sewa_barang'         	=> $sewa_barang,
					'stock_barang'			=> $this->input->post('stock_barang')
			);

			$this->model_barang->add($data);
			redirect('barang');
	}

	function edit($id)
	{
		$data['page']		= 'barang';
		$data['data']		= $this->model_barang->get_all('id_barang', $id);
		$this->load->view('barang/edit',$data);
	}

	function actionedit()
	{
		$angka 				= ltrim($this->input->post('harga_barang'),"Rp. ");
		$angka1				= ltrim($this->input->post('sewa_barang'),"Rp. ");
		$harga_barang	= str_replace(".", "", $angka);
		$sewa_barang  = str_replace(".", "", $angka1);
		$data = array(
				'nama_barang'         	=> $this->input->post('nama_barang'),
				'nominal_barang'        => $harga_barang,
				'sewa_barang'         	=> $sewa_barang,
				'stock_barang'					=> $this->input->post('stock_barang')
		);

		$this->model_barang->update($this->input->post('id'), $data);
		redirect('barang');
	}

	function actiondelete($id)
	{
			$this->model_barang->delete($id);
			redirect('barang');
	}

}
