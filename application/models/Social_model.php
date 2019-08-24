<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Social_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'social';
	}
	
	# HELPER
	
	public function post()
	{
		$return = $this->input->post();
		
		$return['visibility'] = !empty($return['visibility'])
			? $return['visibility'] ? 1 : 0
			: 0;
		
		return $return;
	}
	
	# VALIDATE
	
	public function validate()
	{
		$rules = array(
			array(
				'field' => 'title',
				'label' => 'Заголовок',
				'rules'   => 'trim|required|max_length[255]',
			),
			array(
				'field' => 'link',
				'label' => 'Ссылка',
				'rules'   => 'trim',
			),
			array(
				'field' => 'num',
				'label' => 'Номер по порядку',
				'rules'   => 'trim|integer',
			),
		);
		
		$this->load->library('form_validation');
		return $this->form_validation
			->set_error_delimiters('<div class="form-error">', '</div>')
			->set_rules($rules)
			->run();
	}
}