<?php
class model_cicilan extends CI_Model
{
	protected $_table = 'cicilan';
	function __construct()
	{
		parent::__construct();
	}


	function get_all($key = NULL, $value = NULL)
  {
      if($key != NULL)
      {
				$this->db->join('pelanggan','cicilan.pelanggan_id = pelanggan.id_pelanggan');
				$this->db->join('pinjaman','cicilan.pinjaman_id = pinjaman.id_pinjaman');
        return $this->db->get_where($this->_table, array($key => $value))->row_array();
      }
			$this->db->join('pelanggan','cicilan.pelanggan_id = pelanggan.id_pelanggan');
			$this->db->join('pinjaman','cicilan.pinjaman_id = pinjaman.id_pinjaman');
			$this->db->order_by('id_cicilan', 'DESC');
      return $this->db->get($this->_table)->result_array();
  }

	public function cicilan_terakhir($id)
	{
		$this->db->order_by('id_cicilan', 'DESC');
		$this->db->limit(1);
		return $this->db->get($this->_table)->result_array();
	}

	function add($data)
	{
		$this->db->insert($this->_table, $data);

		// return $uang_pinjaman;
	}

	function edit($id, $data)
  {
		$this->db->where('id_cicilan', $id);
		$this->db->update($this->_table, $data);
	}

	function update($id, $data)
  {
		$this->db->where('id_cicilan', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('pelanggan_id' => $data));
	}
}
?>
