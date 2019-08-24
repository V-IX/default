<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'feedback';
	}
	
	# ACTIONS
	
	/*public function insert()
	{
		$insert = $this->post();
		
		$error = $this->query->insert($this->_table, $insert);
		if($error)
		{
			return $error;
		} else {
			$insert['idItem'] = $this->query->insert_id();
			$this->sendMail($insert);
			return false;
		}
	}
	
	public function sendMail($data)
	{
		$site = $this->settings_model->getItem();
		$data['site'] = $site;
		$this->load->library('email');
		
		$config = array (
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);
		
		$this->email->initialize($config);
		$this->email->from($site['email'], $site['title']);
		$this->email->to($site['email']);
		$this->email->subject('Обратная связь - '.$data['title']);
		$message = $this->load->view('site/emails/feedback', $data, TRUE);
		$this->email->message($message);
		$this->email->send();
	}*/
	
	public function post()
	{
		return $this->input->post();
	}
}