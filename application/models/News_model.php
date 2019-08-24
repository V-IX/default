<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'news';
		$this->folder		= 'news';
		$this->page			= 'news';
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
			
		$return['mod_date'] = date('Y-m-d H:i:s');
		
		unset($return['date'], $return['time'], $return['old_img']);
		
		return $return;
	}
}