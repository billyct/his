<?php
class Nurse extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('UserMapper');
		$this->load->model('DepartMapper');
		$this->load->model('RegMapper');
		$this->load->model('PatientMapper');
		$this->load->model('CaseMapper');
		$this->load->model('DrugMapper');
		$this->load->model('DrugfinMapper');
		$this->load->library('ResultBack', 'resultback');
	
	}
	
	public function reg() {
		$data['experts'] = $this->UserMapper->get_all_experts();
		$data['departs'] = $this->DepartMapper->get_all_departs();
		$data['regs'] = $this->RegMapper->get_all_regs();
		$this->load->view('nurse/reg', $data);
	}
	
	public function addReg() {
		$regmapper = $this->RegMapper;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_card', '身份证', 'required');
		$this->form_validation->set_rules('name', '姓名', 'required');
		$this->form_validation->set_rules('gender', '性别', 'required');
		$this->form_validation->set_rules('age', '年龄', 'required');
		$this->form_validation->set_rules('address', '地址', 'required');
		$this->form_validation->set_rules('phone', '手机/电话号码', 'required');
		$this->form_validation->set_rules('flag', '挂号类别', 'required');
		$this->form_validation->set_rules('depart_id', '科室', 'required');
		$this->form_validation->set_rules('expert_id', '专家', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->resultback->setCM($this->resultback->getError(), '表单填写不正确，挂号失败');
		} else {
			$regmapper->add();
			$this->resultback->setCMD(
					$this->resultback->getSuccess(),
					'挂号成功',
					$regmapper->get_reg_by_id($this->db->insert_id())
			);
		}
		
		echo json_encode($this->resultback->getCMD());
	}
	
	
	public function deleteReg() {
		if($this->RegMapper->delete()) {
			$this->resultback->setCM($this->resultback->getSuccess(), '删除挂号单成功');
		}else {
			$this->resultback->setCM($this->resultback->getError(), '删除挂号单失败');
		}
	
		echo json_encode($this->resultback->getCM());
	}
	
	public function show_patient($id, $by = 1) {
		echo json_encode($this->PatientMapper->get_patient($id, $by));
	}
	
	public function drug() {
		$this->load->view('nurse/drug');
	}
	
	public function findDrug() {
		try {
			$id = $this->input->post('case_id');
			$drugs = $this->CaseMapper->find_case($id);
			$tatol = 0;
			foreach ($drugs as $drug) {
				$tatol += $drug['price']*$drug['sum'];
			}
			$drugs_data_back = array(
					'drugs' => $drugs,
					'total' => $tatol,
			);
			
			$this->resultback->setCMD($this->resultback->getSuccess(), '药物查询成功', $drugs_data_back);
		} catch (Exception $e) {
			$this->resultback->setCM($this->resultback->getError(), '药物查询失败');
		}
		
		echo json_encode($this->resultback->getCMD());
	}
	
	public function prescribe() {
		try {
			$drugmapper = $this->DrugMapper;
			$case_id = $this->input->post('case_id');
			$drugs_data = $this->CaseMapper->find_case_p($case_id);
			$resultback_array = $drugmapper->update_sum($drugs_data);
			switch ($resultback_array['code']){
				case $drugmapper::drug_shortage:
					$this->resultback->setCM($this->resultback->getError(), $resultback_array['msg']);
					break;
				case $drugmapper::drug_success:
					$this->DrugfinMapper->add($case_id);
					$this->resultback->setCM($this->resultback->getSuccess(), '开药成功');
					break;
			}
		} catch (Exception $e) {
			$this->resultback->setCM($this->resultback->getError(), '开药失败');
		}
		
		echo json_encode($this->resultback->getCM());
	}
}

?>