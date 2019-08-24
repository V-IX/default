<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'reviews';
		$this->folder		= 'reviews';
		$this->page			= 'reviews';
	}
	
	public function insert_user()
	{
		$insert = $this->post();
		
		$error = $this->query->insert($this->_table, $insert);
		if($error)
		{
			return $error;
		} else {
			$insert['idItem'] = $this->query->insert_id();
			$insert['title'] = 'Новый отзыв';
			$this->load->model('feedback_model');
			$this->feedback_model->sendMail($insert);
			return false;
		}
	}
	
	# HELPER
	
	public function post()
	{
		$return = $this->input->post();
			
		$date = $return['date'] ?? date('d.m.Y');
		$time = $return['time'] ?? date('H:i');
		$return['pub_date'] = date('Y-m-d H:i:s', strtotime($date.' '.$time));
		
		$return['visibility'] = !empty($return['visibility'])
			? $return['visibility'] ? 1 : 0
			: 0;
		
		unset($return['date'], $return['time'], $return['old_img']);
		
		return $return;
	}
}