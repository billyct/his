<?php
class Admin extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('UserMapper');
		$this->load->model('DepartMapper');
		$this->load->model('DrugMapper');
		$this->load->library('ResultBack', 'resultback');
		
	}
	
	public function users() {
		$data['users'] = $this->UserMapper->get_all_users();
		$data['departs'] = $this->DepartMapper->get_all_departs();
		$this->load->view('admin/users', $data);
	}
	
	public function addUser() {
		$usermapper = $this->UserMapper;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		$this->form_validation->set_rules('real_name', '真实姓名', 'required');
		$this->form_validation->set_rules('flag', '用户类别', 'required');
		//$this->form_validation->set_rules('depart_id', '科室', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->resultback->setCM($this->resultback->getError(), '表单填写不正确，添加用户失败');
		} else {
			$resultback_code = $this->UserMapper->add();
			switch ($resultback_code) {
				case $usermapper::user_success:
					$this->resultback->setCMD(
							$this->resultback->getSuccess(),
							'添加用户成功',
							array(
								'id' => $this->db->insert_id(),
								'depart_name' => $this->DepartMapper->get_by_id($this->input->post('depart_id')),
							)
					);
					break;
				case $usermapper::user_exit:
					$this->resultback->setCM($this->resultback->getError(), '用户名已经存在！,添加用户失败');
					break;
				default:
					break;
			}

		}
		
		echo json_encode($this->resultback->getCMD());
	}
	
	public function deleteUser() {
		if($this->UserMapper->delete()) {
			$this->resultback->setCM($this->resultback->getSuccess(), '删除用户成功');
		}else {
			$this->resultback->setCM($this->resultback->getError(), '删除用户失败');
		}
		
		echo json_encode($this->resultback->getCM());
	}
	
	public function depart() {
		$data['departs'] = $this->DepartMapper->get_all_departs();
		$this->load->view('admin/departs', $data);
	}
	
	public function addDepart() {
		$depart_mapper = $this->DepartMapper;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('depart_name', '科室名', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->resultback->setCM($this->resultback->getError(), '表单填写不正确，添加科室失败');
		} else {
			$resultback_code = $depart_mapper->add();
			switch ($resultback_code) {
				case $depart_mapper::depart_success:
					$this->resultback->setCMD(
						$this->resultback->getSuccess(),
						'添加科室成功',
						array(
							'id' => $this->db->insert_id(),
						)
					);
					break;
				case $depart_mapper::depart_exit:
					$this->resultback->setCM($this->resultback->getError(), '科室已经存在！,添加用户失败');
					break;
				default:
					break;
			}
		
		}
		
		echo json_encode($this->resultback->getCMD());
	}
	
	
	public function deleteDepart() {
		if($this->DepartMapper->delete()) {
			$this->resultback->setCM($this->resultback->getSuccess(), '删除科室成功');
		}else {
			$this->resultback->setCM($this->resultback->getError(), '删除科室失败');
		}
	
		echo json_encode($this->resultback->getCM());
	}
	
	public function getDeparts() {
		echo json_encode($this->DepartMapper->get_all_departs());
	}
	
	public function drugs() {	
		$drugs = $this->DrugMapper->get_all_drugs();
		$data['drugs'] = $drugs;
		$this->load->view('admin/drugs', $data);
	}
	
	public function deleteDrug() {
		if($this->DrugMapper->delete()) {
			$this->resultback->setCM($this->resultback->getSuccess(), '删除药品成功');
		}else {
			$this->resultback->setCM($this->resultback->getError(), '删除药品失败');
		}
		
		echo json_encode($this->resultback->getCM());
	}
	
	public function addDrug() {
		$drug_mapper = $this->DrugMapper;
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('type', '药品类型', 'required');
		$this->form_validation->set_rules('name', '药品名', 'required');
		$this->form_validation->set_rules('price', '药品单价', 'required');
		$this->form_validation->set_rules('sum', '药品库存', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->resultback->setCM($this->resultback->getError(), '表单填写不正确，添加药品失败');
		}else {
			$resultback_code = $drug_mapper->add();
			switch ($resultback_code) {
				case $drug_mapper::drug_success:
					$this->resultback->setCMD(
					$this->resultback->getSuccess(),
					'添加药品成功',
					array(
					'id' => $this->db->insert_id(),
					)
					);
					break;
				case $drug_mapper::drug_exit:
					$this->resultback->setCM($this->resultback->getError(), '药品已经存在！,添加药品失败');
					break;
				default:
					break;
			}
		}
		
		echo json_encode($this->resultback->getCMD());
	}
}

?>