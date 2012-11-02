<?php
class UserMapper extends CI_Model{
	
	const admin = 0;
	const expert = 1;
	const nurse = 2;
	const doctor = 3;
	
	//用于添加用户的返回标示
	const user_exit = 2;
	const user_success = 1;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function auth() {
		$this->db->where('username', $this->input->post('username'));
	
		$user = $this->db->get('user');
		
		$userArray = $user->result_array();
		$password = $userArray[0]['password'];
		
		if (crypt($this->input->post('password'), $password) == $password){
			unset($userArray[0]['password']);
			$user_session['auth'] = $userArray[0];
//			$user['auth']['auth_flag'] = 1;
			$this->session->set_userdata($user_session);
			
			//return true;
		}
		//return false;
	}
	
	public function add() {
		$result = null;
		$this->db->where('username', $this->input->post('username'));
		$user = $this->db->get('user');
		
		if ($user->num_rows() > 0) {
			$result = self::user_exit;
		}else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => crypt($this->input->post('password')),
				'real_name' => $this->input->post('real_name'),
				'depart_id' => $this->input->post('depart_id'),
				'flag' => $this->input->post('flag'),	
			);
		
			$this->db->insert('user', $data);
			$result = self::user_success;
		}
		
		return $result;
	}
	
	public function get_all_users() {
		$this->db->where('flag != ', self::admin);
		$this->db->select('user.id, username, real_name, depart_name, flag');
		$this->db->from('user');
		$this->db->join('depart', 'depart.id=user.depart_id');
		$users = $this->db->get();
		
		//var_dump($users->result_array());
		return $users->result_array();
	}
	
	public function get_all_experts() {
		$this->db->where('flag = ', self::expert);
		$this->db->select('id, real_name');
		$this->db->from('user');
		$experts = $this->db->get();
		return $experts->result_array();
	}
	
	public function delete() {
		return $this->db->delete('user', array('id'=>$this->input->post('id')));
	}
}

?>