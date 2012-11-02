<?php
class DrugMapper extends CI_Model{
	
	const ZY = 1;
	const XY = 2;
	const ZCY = 3;
	
	const drug_exit = 2;
	const drug_success = 1;

	const drug_shortage = 3;
	
	const drug_shortage_msg = '药品药库库存不足！';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_type_drugs($type) {
		switch($type){
			case self::ZY :
				$this->db->where('type', self::ZY);
				break;
			case self::XY :
				$this->db->where('type', self::XY);
				break;
			case self::ZCY:
				$this->db->where('type', self::ZCY);
				break;
		}
		
		$drugs = $this->db->get('drug');
		return $drugs->result_array();
		
	}
	
	public function get_all_drugs() {
		$this->db->select();
		$drugs = $this->db->get('drug');
		return $drugs->result_array();
	}
	
	public function delete() {
		return $this->db->delete('drug', array('id'=>$this->input->post('id')));
	}
	
	public function add() {
		$result = null;
		$this->db->where('name', $this->input->post('name'));
		$drug = $this->db->get('drug');
		if ($drug->num_rows() > 0) {
			$result = self::drug_exit;
		}else {
			$data = array(
					'type' => $this->input->post('type'),
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
					'sum' => $this->input->post('sum'),
			);
		
			$this->db->insert('drug', $data);
			$result = self::drug_success;
		}
		
		return $result;
	}

	public function update_sum($drugs_data) {
		foreach ($drugs_data as $key => $drug_data) {

			$this->db->select();
			$this->db->where('id', $drug_data['id']);
			$this->db->where('sum >=', $drug_data['sum']);
			$drug_query = $this->db->get('drug');
			if ($drug_query->num_rows() > 0) {
				$drug_result = $drug_query->row_array();
				$drugs_data[$key]['sum'] = $drug_result['sum'] - $drugs_data[$key]['sum'];
			}else {
				return array('code'=>self::drug_shortage, 'msg'=>self::drug_shortage_msg);
			}
		}

		$this->db->update_batch('drug', $drugs_data, 'id');
		return array('code'=>self::drug_success);
	}
	
	public function check_sum($drugs_data) {
		
	}
	
}

?>