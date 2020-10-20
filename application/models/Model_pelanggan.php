<?php
class Model_pelanggan extends CI_Model
{
	protected $_table = 'pelanggan';
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
			$this->db->order_by('id_pelanggan', 'DESC');
      return $this->db->get($this->_table)->result_array();
  }

	public function getallbyparam($key,$id)
	{
		$this->db->where($key,$id);
		$this->db->order_by('id_pelanggan', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

	function update($id, $data)
  {
		$this->db->where('id_pelanggan', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('id_pelanggan' => $data));
	}
}
?>
