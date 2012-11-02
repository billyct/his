<?php
class DepartMapper extends CI_Model{
	
	const depart_exit = 2;
	const depart_success = 1;
	
	
	public function __construct() {
		parent::__construct();
	}
	
	public function add() {		
		$result = null;
		$this->db->where('depart_name', $this->input->post('depart_name'));
		$user = $this->db->get('depart');
		
		if ($user->num_rows() > 0) {
			$result = self::depart_exit;
		}else {
			$data = array(
					'depart_name' => $this->input->post('depart_name'),
			);
		
			$this->db->insert('depart', $data);
			$result = self::depart_success;
		}
		
		return $result;
		
	}
	
	public function get_all_departs() {
		$this->db->select();
		$this->db->where('id !=', 0);
		$departs = $this->db->get('depart');
		return $departs->result_array();
	}
	
	public function get_by_id($id) {
		$this->db->where('id', $id);
		$this->db->select('depart_name');
		$names = $this->db->get('depart');
		$namesArray = $names->result_array();
		return $namesArray[0]['depart_name'];
	}
	
	public function delete() {
		return $this->db->delete('depart', array('id'=>$this->input->post('id')));
	}
}

?>