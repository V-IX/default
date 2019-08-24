<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'pages';
	}
	
	
	# HELPER
	
	public function post()
	{
		$return = $this->input->post();
		
		$return['visibility'] = !empty($return['visibility'])
			? $return['visibility'] ? 1 : 0
			: 0;
			
		$return['mod_date'] = date('Y-m-d H:i:s');
		
		return $return;
	}
}