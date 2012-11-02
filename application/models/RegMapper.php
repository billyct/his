<?php
class RegMapper extends CI_Model{
	
	const flag_expert = 1;
	const flag_doctor = 3;
	
	const reg_valid = 1;
	const reg_invalid = 0;
	
	const success = 1;
	const error = 0;
	const depart_error = "你挂号的不是该科室,请去正确的科室就医";
	const expert_error = "你挂号的不是该专家,请去正确的专家那就医";
	const reg_invalid_error = "你的挂号单已经失效";
	const msg_error = "有错误，未知错误";
	
	public function __construct() {
		parent::__construct();
	}
	
	//用于护士查询
	public function get_all_regs() {
 		$this->db->select('reg.id, id_card, reg.flag, depart_name, real_name as expert_name, user.id as user_id, reg.patient_id');
 		$this->db->where('flag_reg = ', 1);
 		$this->db->from('reg');
 		$this->db->join('patient', 'reg.patient_id=patient.id');
  		$this->db->join('depart', 'depart.id=reg.depart_id');
  		$this->db->join('user', 'user.id=reg.expert_id');
// 		$this->db->select();
// 		$this->db->from('reg');
		$regs = $this->db->get();
		
		
		return $regs->result_array();
	}
	//用于护士查询
	public function get_reg_by_id($id) {
		$this->db->select('reg.id, id_card, reg.flag, depart_name, real_name as expert_name, user.id as user_id, reg.patient_id');
		$this->db->where('reg.id = ', $id);
		$this->db->from('reg');
		$this->db->join('patient', 'reg.patient_id=patient.id');
		$this->db->join('depart', 'depart.id=reg.depart_id');
		$this->db->join('user', 'user.id=reg.expert_id');
		// 		$this->db->select();
		// 		$this->db->from('reg');
		$regs = $this->db->get();
		$regsArray = $regs->result_array();
		
		return $regsArray[0];
	}
	
	//注销该挂号单
	public function cancel_reg($id) {
		$data = array('flag_reg'=>0);
		$this->db->where('id', $id);
		$this->db->update('reg', $data);
	}
	
	//用于医生，专家查询
	public function find_reg($id) {
		$result = null;
		$user_session = $this->session->userdata('auth');
		$this->db->select('patient.id as patient_id, patient.id_card, patient.name, patient.gender, patient.age, patient.address, patient.phone, reg.depart_id, reg.expert_id, reg.flag_reg, reg.flag');
		$this->db->where('reg.id', $id);
		$this->db->from('reg');
		$this->db->join('patient', 'reg.patient_id=patient.id');
		$reg_query = $this->db->get();
		$reg = $reg_query->row();
		
		//判断挂号是否失效
		if($reg->flag_reg == self::reg_invalid) {
			$result = array('code' => self::error, 'msg' => self::reg_invalid_error);
			return $result;
		}
		//判断是不是该科室的挂号
		if ($reg->flag == self::flag_doctor) {
			if ($reg->depart_id != $user_session['depart_id']) {
				$result = array('code' => self::error, 'msg' => self::depart_error);
				return $result;
			}
		}
		
		//判断是不是该专家的挂号
		if($reg->flag == self::flag_expert) {
			if ($reg->expert_id != $user_session['id']) {
				$result = array('code' => self::error, 'msg' => self::expert_error);
				return $result;
			}	
		}
		
		$result = array('code' => self::success, 'data' => $reg);
		return $result;

	}
	
	
	public function add() {
		//需要判断病人是否存在
		$this->db->where('id_card', $this->input->post('id_card'));
		$patients = $this->db->get('patient');
		
		$patient_id = null;
		
		if ($patients->num_rows() > 0) {
			$patient = $patients->row();
			$patient_id = $patient->id;
		} else {
			$patientdata = array(
					'id_card' => $this->input->post('id_card'),
					'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'age' => $this->input->post('age'),
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
			);
			
			$this->db->insert('patient', $patientdata);
			
			$patient_id = $this->db->insert_id();
		}
		
		
		$regdata = array(
				'patient_id' => $patient_id,
				'flag' => $this->input->post('flag'),
				'expert_id' => $this->input->post('expert_id'),
				'depart_id' => $this->input->post('depart_id'),
				'create_at' => date('Y-M-d H:i:s'),
				'flag_reg' => self::reg_valid,//1表示有效，0表示无效
		);
		
		$this->db->insert('reg', $regdata);

	}
	
	public function delete() {
		return $this->db->delete('reg', array('id'=>$this->input->post('id')));
	}
}

?>