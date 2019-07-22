<?php
class Model_room extends CI_Model
{
	protected $_table = 'room';
	function __construct()
	{
		parent::__construct();
	}

  function available(){
      $this->db->where('status', '0');
      return $this->db->get($this->_table)->result_array();
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
      return $this->db->get($this->_table)->result_array();
  }

	function update($id, $data)
  {
		$this->db->where('nomor_room', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('nomor_room' => $data));
	}
}
?>
