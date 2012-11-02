<?php
class ResultBack {
	private $code;
	private $msg;
	private $data;
	
	const success = '1';
	const error = '0';
	
	public function getSuccess(){
		return self::success;
	}
	
	public function getError() {
		return self::error;
	}
	
	public function setCM($code, $msg) {
		$this->setCode($code);
		$this->setMsg($msg);
	}
	
	public function setCMD($code, $msg, $data) {
		$this->setCode($code);
		$this->setMsg($msg);
		$this->setData($data);
	}
	
	public function getCM(){
		return array('code' => $this->getCode(), 'msg' => $this->getMsg());
	}
	
	public function getCMD() {
		return array('code' => $this->getCode(), 'msg' => $this->getMsg(), 'data' => $this->getData());
	}
	
	/**
	 * @return the $code
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @return the $msg
	 */
	public function getMsg() {
		return $this->msg;
	}

	/**
	 * @return the $data
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param field_type $code
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * @param field_type $msg
	 */
	public function setMsg($msg) {
		$this->msg = $msg;
	}

	/**
	 * @param field_type $data
	 */
	public function setData($data) {
		$this->data = $data;
	}
}

?>