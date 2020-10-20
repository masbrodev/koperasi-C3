<?php
class Model_pinjaman extends CI_Model
{
	protected $_table = 'pinjaman';
	protected $_table2 = 'cicilan';
	function __construct()
	{
		parent::__construct();
	}

	function add($data)
  {
      $this->db->insert($this->_table, $data);
  }

  function add2($data2)
  {
	  $this->db->insert($this->_table2, $data2);
  }

	function get_all($key = NULL, $value = NULL)
  {
    if($key != NULL)
    {
      $this->db->select('*');
      $this->db->join('pelanggan','pinjaman.peminjam_id = pelanggan.id_pelanggan');
			$this->db->join('barang','pinjaman.barang_pinjaman = barang.id_barang','LEFT');
		$this->db->join('cicilan','pinjaman.id_pinjaman = cicilan.pinjaman_id','LEFT');
      return $this->db->get_where($this->_table, array($key => $value))->row_array();
    }
    $this->db->select('*');
		$this->db->join('pelanggan','pinjaman.peminjam_id = pelanggan.id_pelanggan');
		$this->db->join('barang','pinjaman.barang_pinjaman = barang.id_barang','LEFT');
		$this->db->join('cicilan','pinjaman.id_pinjaman = cicilan.pinjaman_id','LEFT');
    $this->db->order_by('id_pinjaman', 'DESC');
    return $this->db->get($this->_table)->result_array();
  }

	function get_all_cicilan($key = NULL, $value = NULL)
  {
    // if($key != NULL)
    // {
    //   $this->db->select('*');
    //   $this->db->join('pelanggan','pinjaman.peminjam_id = pelanggan.id_pelanggan');
	// 		$this->db->join('barang','pinjaman.barang_pinjaman = barang.id_barang','LEFT');
	// 		$this->db->join('cicilan','pinjaman.id_pinjaman = cicilan.pinjaman_id','LEFT');
    //   return $this->db->get_where($this->_table, array($key => $value))->row_array();
    // }
    $this->db->select('*');
		$this->db->join('pelanggan','pinjaman.peminjam_id = pelanggan.id_pelanggan');
		$this->db->join('barang','pinjaman.barang_pinjaman = barang.id_barang','LEFT');
		$this->db->join('cicilan','pinjaman.id_pinjaman = cicilan.pinjaman_id','LEFT');
    $this->db->order_by('id_pinjaman', 'DESC');
    return $this->db->get($this->_table)->result_array();
  }

	function cetak_laporan($tanggal)
	{
		$this->db->select('*');
		$this->db->join('pelanggan','pinjaman.peminjam_id = pelanggan.id_pelanggan');
		$this->db->join('barang','pinjaman.barang_pinjaman = barang.id_barang','LEFT');
		$this->db->join('cicilan','pinjaman.id_pinjaman = cicilan.pinjaman_id','LEFT');
		$this->db->like('pinjaman.tanggal_pinjaman',$tanggal);
    $this->db->order_by('id_pinjaman', 'DESC');
    return $this->db->get($this->_table)->result_array();
	}

	function update($id, $data)
  {
		$this->db->where('id_pinjaman', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('peminjam_id' => $data));
	}
}
?>
