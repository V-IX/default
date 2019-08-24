<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends Base_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'settings';
		$this->folder		= 'settings';
		$this->siteparam 	= ['id' => 1];
	}
	
	public function siteinfo()
	{
		return $this->getItem($this->siteparam);
	}
	
	public function siteinfo_update($data)
	{
		return $this->update($data, $this->siteparam);
	}
	
	
	# HELPER
	
	public function post()
	{
		$return = $this->input->post();
		
		unset($return['old_img']);
		
		$return['enable'] = !empty($return['enable'])
			? $return['enable'] ? 1 : 0
			: 0;
		
		return $return;
	}
	
	
	# CACHE
	
	public function cache()
	{
		if(!$this->db->query('UPDATE '.$this->table.' SET version = version + 0.1'))
		{
			$error = $this->db->error();
			$message = fa('warning fa-fw mr5') . ' Ошибка при обновлении записи в базе данных.' .
				'<div><strong>Код ошибки: ' . $error['code'] . '.</strong> ' . $error['message'] . '</div>';
				
			throw new Exception($message);
		}
		
		return true;
	}
}