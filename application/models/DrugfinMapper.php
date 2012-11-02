<?php
class DrugfinMapper extends CI_Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function add($case_id) {
		$data = array(
			'case_id' => $case_id
		);
		$this->db->insert('drugfin', $data);
	}
}

?>