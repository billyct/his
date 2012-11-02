<?php
//病例

class CaseMapper extends CI_Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function add_case() {
		$doctor_talk = $this->input->post('doctor_talk');
		$patient_talk = $this->input->post('patient_talk');
		$patient_id = $this->input->post('patient_id');
		$reg_id = $this->input->post('reg_id');
		
		$casedata = array(
				'doctor_talk' => $doctor_talk,
				'patient_talk' => $patient_talk,
				'patient_id' => $patient_id,
				'reg_id' => $reg_id,
		);
		
		$this->db->insert('case', $casedata);
	}
	
	public function add_case_drug($case_id) {
		$drugs_data = $this->input->post('drugs_data');
		
		foreach ($drugs_data as $drug) {
			$data = array(
					'drug_id' => $drug['drug_id'],
					'case_id' => $case_id,
					'sum'     => $drug['drug_sum'],
			);
			$this->db->insert('case_drug', $data);
		}
	}
	
	public function find_case($id) {
		$this->db->select('drug.id, drug.name, drug.price, case_drug.sum');
		$this->db->where('case_drug.case_id', $id);
		$this->db->from('case_drug');
		$this->db->join('drug', 'drug.id=case_drug.drug_id');
		$drugs_query = $this->db->get();
		
		return $drugs_query->result_array();
	}
	
	public function find_case_p($id) {
		$this->db->select('drug.id, case_drug.sum');
		$this->db->where('case_drug.case_id', $id);
		$this->db->from('case_drug');
		$this->db->join('drug', 'drug.id=case_drug.drug_id');
		$drugs_query = $this->db->get();
	
		return $drugs_query->result_array();
	}
}

?>