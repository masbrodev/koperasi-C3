<?php
class Model_pasien extends CI_Model
{
	protected $_table = 'pasien';
	function __construct()
	{
		parent::__construct();
	}

	function add($data)
  {
      $this->db->insert($this->_table, $data);
  }

  function rawat($key, $value){
    return $this->db->get_where($this->_table, array($key => $value))->result_array();
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
		$this->db->where('id_pasien', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('id_pasien' => $data));
	}
}
?>
