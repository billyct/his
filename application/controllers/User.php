<?php
class User extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('UserMapper');
		$this->load->model('DepartMapper');
	}
	
	public function index() {
		$usermapper = $this->UserMapper;
		if ($this->session->userdata('auth') != null) {
			$data['session'] = $this->session->all_userdata();
			$data['users'] = $this->UserMapper->get_all_users();
			$user_session = $this->session->userdata('auth');
			switch ($user_session['flag']){
				case $usermapper::admin :
					$this->load->view('admin/dashboard', $data);
					break;
				case $usermapper::expert :
					$this->load->view('doctor/dashboard', $data);
					break;
				case $usermapper::nurse :
					$this->load->view('nurse/dashboard', $data);
					break;
				case $usermapper::doctor :
					$data['depart_name'] = $this->DepartMapper->get_by_id($user_session['depart_id']);
					$this->load->view('doctor/dashboard', $data);
					break;
			}
			
			
		}else {
			$this->load->view('login/index');
		}
		
	}
	
	public function login() {
		$this->UserMapper->auth();
		redirect('/');
		
		//redirect('/user/dashboard');
		
	}

	
	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}

?>