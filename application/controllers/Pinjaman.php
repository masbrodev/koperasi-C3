<?php
class Pinjaman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pinjaman');
		$this->load->model('model_barang');
		$this->load->model('model_pelanggan');
		$this->load->model('model_cicilan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'pinjaman';
		$data['data'] 	= $this->model_pinjaman->get_all();

		$this->load->view('pinjaman/index',$data);
	}

	public function harga_barang()
	{
		$data			 = $this->model_barang->get_all('id_barang', $_POST['id']);
		echo json_encode($data['sewa_barang']);
	}

	function add()
	{
		$data['page']				= 'pinjaman';
		$data['pelanggan']	= $this->model_pelanggan->getallbyparam('status_pelanggan','1');
		$data['barang']			= $this->model_barang->get_all();
		$data['one'] = $this->db->select("*")->limit(1)->order_by('id_pinjaman',"DESC")->get("pinjaman")->result_array();
		$this->load->view('pinjaman/add',$data);
	}

	function actionadd()
	{
		if($this->input->post('tipe_pinjaman') == 'cicil'){
			$cicilan_pinjaman = $this->input->post('cicilan_pinjaman');
			$durasi_pinjaman  = $this->input->post('durasi_pinjaman');
		}else{
			$cicilan_pinjaman = $this->input->post('nominal_pinjaman');
			$durasi_pinjaman  = '1';
		}

		if ($this->input->post('jenis_pinjaman') == 'barang') {
			$barang = $this->model_barang->get_all('id_barang',$this->input->post('barang_pinjaman'));
			$stock_barang = $barang['stock_barang'] - 1;
			$data_barang  = array(
															'stock_barang'		=>	$stock_barang
													 );
			$this->model_barang->update($this->input->post('barang_pinjaman'), $data_barang);
		}

			$data = array(
					'nomor_pinjaman'			=> date('dYmHis'),
					'peminjam_id'       	=> $this->input->post('peminjam_id'),
					'jenis_pinjaman'      => $this->input->post('jenis_pinjaman'),
					'tipe_pinjaman'				=> $this->input->post('tipe_pinjaman'),
					'barang_pinjaman'			=> $this->input->post('barang_pinjaman'),
					'uang_pinjaman'				=> $this->input->post('uang_pinjaman'),
					'nominal_pinjaman'		=> $this->input->post('nominal_pinjaman'),
					'cicilan_pinjaman'		=> $cicilan_pinjaman,
					'durasi_pinjaman'			=> $durasi_pinjaman,
					'tanggal_pinjaman'		=> date('Y-m-d H:i:s')
			);

			$data2 = array(
					'pelanggan_id'        => $this->input->post('peminjam_id'),
					'pinjaman_id'    	 		=> $this->input->post('pelanggan_id'),
					'cicilan_ke'    			=> 0,
					'sisa_cicilan'       	=> $durasi_pinjaman,
					'bayar_cicilan'       => $this->input->post('nominal_pinjaman'),
					'denda_cicilan'       => 0,
					'tanggal_bayar'       => 0
			);

			$this->model_pinjaman->add($data);
			$this->model_pinjaman->add2($data2);

			$data_pelanggan = array(
					'status_pelanggan'       => '1'
			);

			$this->model_pelanggan->update($this->input->post('peminjam_id'),$data_pelanggan);
			redirect('pinjaman');
	}

	function edit($id)
	{
		$data['page']		= 'pinjaman';
		$data['data']		= $this->model_pinjaman->get_all('id_pinjaman', $id);
		$data['barang']	= $this->model_barang->get_all();
		$this->load->view('pinjaman/edit',$data);
	}

	function actionedit()
	{
		if($this->input->post('tipe_pinjaman') == 'cicil'){
			$cicilan_pinjaman = $this->input->post('cicilan_pinjaman');
			$durasi_pinjaman  = $this->input->post('durasi_pinjaman');
		}else{
			$cicilan_pinjaman = '';
			$durasi_pinjaman  = '';
		}

		$pinjaman 		= $this->model_pinjaman->get_all('id_pinjaman',$this->input->post('id_pinjaman'));
		if ($this->input->post('jenis_pinjaman') == 'barang') {
			if($pinjaman['barang_pinjaman'] != $this->input->post('barang_pinjaman')){
				$barang 			= $this->model_barang->get_all('id_barang',$this->input->post('barang_pinjaman'));
				$stock_barang = $barang['stock_barang'] - 1;
				$data_barang  = array(
																'stock_barang'		=>	$stock_barang
														 );
				$this->model_barang->update($this->input->post('barang_pinjaman'), $data_barang);
				$barang2 							= $this->model_barang->get_all('id_barang',$pinjaman['barang_pinjaman']);
				$stock_barang_update 	= $barang2['stock_barang'] + 1;
				$data_barang_lama  		= array(
																'stock_barang'		=>	$stock_barang_update
														 		);
				$this->model_barang->update($pinjaman['barang_pinjaman'], $data_barang_lama);
			}
			$barang_pinjaman = $this->input->post('barang_pinjaman');
			$uang_pinjaman   = '';
		}else{
			if(!empty($pinjaman['barang_pinjaman'])){
				$barang2 							= $this->model_barang->get_all('id_barang',$pinjaman['barang_pinjaman']);
				$stock_barang_update 	= $barang2['stock_barang'] + 1;
				$data_barang_lama  		= array(
																'stock_barang'		=>	$stock_barang_update
																);
				$this->model_barang->update($pinjaman['barang_pinjaman'], $data_barang_lama);
				$barang_pinjaman = '';
				$uang_pinjaman   = $this->input->post('uang_pinjaman');
			}else{
				$barang_pinjaman = '';
				$uang_pinjaman   = $this->input->post('uang_pinjaman');
			}
		}

			$data = array(
					'jenis_pinjaman'      => $this->input->post('jenis_pinjaman'),
					'tipe_pinjaman'				=> $this->input->post('tipe_pinjaman'),
					'barang_pinjaman'			=> $barang_pinjaman,
					'uang_pinjaman'				=> $uang_pinjaman,
					'nominal_pinjaman'		=> $this->input->post('nominal_pinjaman'),
					'cicilan_pinjaman'		=> $cicilan_pinjaman,
					'durasi_pinjaman'			=> $durasi_pinjaman
			);

			$this->model_pinjaman->update($this->input->post('id_pinjaman'),$data);
			redirect('pinjaman');
	}

	function actiondelete($id)
	{
			$this->model_cicilan->delete($id);
			$data_pelanggan = array(
					'status_pelanggan'       => '0'
			);

			$this->model_pelanggan->update($id,$data_pelanggan);
			$this->model_pinjaman->delete($id);
			redirect('pinjaman');
	}

}
