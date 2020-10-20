<?php
class Pembayaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_cicilan');
		$this->load->model('model_pinjaman');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'pembayaran';
		$data['data'] 	= $this->model_pinjaman->get_all_cicilan();
		$this->load->view('pembayaran/index',$data);
	}

	function bayar($id)
	{
		$data['page']		= 'pembayaran';
		$data['data']		= $this->model_pinjaman->get_all('nomor_pinjaman', $id);
		$this->load->view('pembayaran/add',$data);
	}

	function actionbayar()
	{
		  $id 					= $this->input->post('nomor_pinjaman');
		  $data_cicilan = $this->model_cicilan->get_all($this->input->post('nomor_pinjaman'), $id);
			if ($this->input->post('telat') == 'ya') {
				$denda = $this->input->post('biaya_telat');
				$total = str_replace('Rp',' ',str_replace('.','',$this->input->post('total_bayar')));
			}else{
				$denda = '0';
				$total = str_replace('Rp. ',' ',str_replace(',','',$this->input->post('total_bayar')));
			}

				$cicilan_ke   = $this->input->post('cicilan_ke') + 1;
				$sisa_cicilan = $this->input->post('sisa_cicilan') - 1;


						$data = array(
					'pelanggan_id'        => $this->input->post('pelanggan_id'),
					'pinjaman_id'    	 		=> $this->input->post('pinjaman_id'),
					'cicilan_ke'    			=> $cicilan_ke,
					'sisa_cicilan'       	=> $sisa_cicilan,
					'bayar_cicilan'       => $total,
					'denda_cicilan'       => $denda,
					'tanggal_bayar'       => date('Y-m-d H:i:s')
			);

			$this->model_cicilan->edit($this->input->post('id_cicilan'), $data);
			redirect('pembayaran');
			
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
