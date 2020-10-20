<?php
class Model_barang extends CI_Model
{
	protected $_table = 'barang';
	function __construct()
	{
		parent::__construct();
	}

	function add($data)
  {
      $this->db->insert($this->_table, $data);
  }

	function get_all($key = NULL, $value = NULL)
  {
      if($key != NULL)
      {
          return $this->db->get_where($this->_table, array($key => $value))->row_array();
      }
			$this->db->order_by('id_barang', 'DESC');
      return $this->db->get($this->_table)->result_array();
  }

	function update($id, $data)
  {
		$this->db->where('id_barang', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('id_barang' => $data));
	}

  function get_barang_by_tingkat($id)
  {
    $this->db->where('tingkat_barang', $id);
    return $this->db->get($this->_table)->result_array();
  }
}
?>
