<?php
class Doctor extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('UserMapper');
		$this->load->model('DrugMapper');
		$this->load->model('RegMapper');
		$this->load->model('CaseMapper');
		$this->load->library('ResultBack', 'resultback');
	}
	
	public function work() {
		$drugmapper = $this->DrugMapper;
		$data['drugsZY'] = $drugmapper->get_all_type_drugs($drugmapper::ZY);
		$data['drugsXY'] = $drugmapper->get_all_type_drugs($drugmapper::XY);
		$data['drugsZCY'] = $drugmapper->get_all_type_drugs($drugmapper::ZCY);
		$this->load->view('doctor/work', $data);
	}
	
	public function findReg() {
		$id = $this->input->post('id');
		$regmapper = $this->RegMapper;
		$result = $regmapper->find_reg($id);
		if($result['code'] == $regmapper::error) {
			$this->resultback->setCM($this->resultback->getError(), $result['msg']);
		} else {
			//$regmapper->cancel_reg($id);
			$this->resultback->setCMD($this->resultback->getSuccess(), '挂号查询成功', $result['data']);
		}
		
		echo json_encode($this->resultback->getCMD());
	}
	
	public function addDrug() {
		try {
			$this->CaseMapper->add_case();
			$case_id = $this->db->insert_id();
			$this->CaseMapper->add_case_drug($case_id);
			$this->RegMapper->cancel_reg($this->input->post('reg_id'));
			$this->resultback->setCM($this->resultback->getSuccess(), '开药成功,病例号：'.$case_id.'<br />请通过病例号去取药！');
		} catch (Exception $e) {
			$this->resultback->setCM($this->resultback->geeError(), '开药失败');
		}
		
		echo json_encode($this->resultback->getCM());
	}
}

?>