<?php
class PatientMapper extends CI_Model{
	
	const id = 1;
	const id_card = 2;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_patient($id, $by=self::id) {
		switch ($by) {
			case self::id :
				$this->db->where('id = ', $id);
				break;
			case self::id_card :
				$this->db->where('id_card = ', $id);
				break;
		}
		
		$patient = $this->db->get('patient');
		return $patient->row();
	}
	
}

?>