<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCreator {

	protected $params;
	
	/* config for html wrap */
	
	protected $_tag = 'div';
	protected $_row_class = 'row form-group';
	protected $_col_label_class = 'col-3 form-collabel';
	protected $_col_input_class = 'col-9 form-colinput';
	
	/* data for input */
	
	protected $name = null;
	
	protected $required = null;
	
	protected $input_params = null;
	protected $input_type = null;
	protected $input_value = null;
	protected $input_info = null;
	protected $input_options = null;
	protected $input_after = null;
	
	protected $label = null;
	protected $label_info = null;
	protected $label_after = null;
	
	protected $text_editor = null;
	protected $file_name = null;
	protected $file_path = null;
	protected $file_delete = null;

	# INIT
	
	public function __construct($params = array())
	{
		foreach($params as $k => $v)
			$this->$k = $v;
			
			
		log_message('info', 'AdminCreator Class Initialized');
	}
	
	
	# CREATE
	
	public function create()
	{
		// open row
		$html = '<' . $this->_tag . ' class="' . $this->_row_class . '">';
		
			// create left part
			$html .= $this->create_leftpart();
			
			// create right part
			$html .= $this->create_rightpart();
		
		// close row
		$html .= '</' . $this->_tag . '>';
		
		$this->clear();
		
		return $html;
	}
	
	public function create_leftpart()
	{
		$html = '<' . $this->_tag . ' class="' . $this->_col_label_class . (($this->input_type == 'checkbox' or $this->input_type == 'radio') ? ' _nopadding' : null) . '">';
		
		foreach(['label', 'required', 'label_info', 'label_after'] as $h)
			$html .= $this->$h;
		
		$html .= '</' . $this->_tag . '>';
		
		return $html;
	}
	
	public function create_rightpart()
	{
		$html = '<' . $this->_tag . ' class="' . $this->_col_input_class . '">';
		
		$html .= $this->create_input();
		
		$html .= '</' . $this->_tag . '>';
		
		return $html;
	}
	
	public function create_input()
	{
		$name = $this->name;
		
		$params = $this->input_params;
		if(!is_array($params))
			$params = array();
		
		$params['name'] = $name;
		$params['id'] = $this->_get_input_id();
		
		switch($this->input_type)
		{
			case 'textarea':
				$input = $this->_html_textarea($params);
				break;
				
			case 'select':
				$input = $this->_html_select($params);
				break;
				
			case 'file':
				$input = $this->_html_file($params);
				break;
			
			case 'checkbox':
				$input = $this->_html_checkbox($params);
				break;
			
			case 'radio':
				$input = $this->_html_radio($params);
				break;
			
			default:
				$input = $this->_html_input($params);
		}
		
		$input .= form_error($name) . $this->input_info . $this->input_after;
		
		return $input;
	}
	
	
	# SET DATA
	
	public function set_name($name)
	{
		$this->name = $name;
		return $this;
	}
	
	public function set_type($type)
	{
		$this->input_type = $type;
		return $this;
	}
	
	public function set_label($label)
	{
		$this->label = $label;
		return $this;
	}
	
	public function set_required()
	{
		$this->required = ' <span class="required">*</span>';
		return $this;
	}
	
	public function set_params($params = array())
	{
		$this->input_params = $params;
		return $this;
	}
	
	public function set_value($value)
	{
		$this->input_value = $value;
		return $this;
	}
	
	public function set_options($options)
	{
		$this->input_options = $options;
		return $this;
	}
	
	public function set_editor()
	{
		$this->text_editor = true;
		return $this;
	}
	
	public function input_info($text)
	{
		$this->input_info = '<div class="form-info text-gray">'.$text.'</div>';
		return $this;
	}
	
	public function input_after($text)
	{
		$this->input_after = $text;
		return $this;
	}
	
	public function label_info($text)
	{
		$this->label_info = '<div class="form-info text-gray">'.$text.'</div>';
		return $this;
	}
	
	public function label_after($text)
	{
		$this->label_after = $text;
		return $this;
	}
	
	public function file_origin($name, $path)
	{
		$this->file_name = $name;
		$this->file_path = $path;
		return $this;
	}
	
	public function file_delete($text)
	{
		$this->file_delete = $text;
		return $this;
	}
	
	
	# CLEAR DATA
	
	public function clear()
	{
		$data = [
			'name', 'required',
			'input_params', 'input_type', 'input_value', 'input_info', 'input_options', 'input_after',
			'label', 'label_info', 'label_after',
			'text_editor',
			'file_name', 'file_path', 'file_delete',
		];
		
		foreach($data as $h)
			$this->$h = null;
			
		return $this;
	}
	
	
	# HELPERS
	
	protected function _html_input($params)
	{
		if(!array_key_exists('type', $params))
			$params['type'] = 'text';
		
		if(!array_key_exists('class', $params))
			$params['class'] = 'form-input';
		
		$params['value'] = set_value($params['name'], $this->input_value);
		
		return '<input ' . $this->_params_to_str($params) . ' />';
	}
	
	protected function _html_textarea($params)
	{
		if(!array_key_exists('class', $params))
			$params['class'] = 'form-input';
		
		if(!array_key_exists('rows', $params))
			$params['rows'] = 3;
		
		$html = '<textarea ' . $this->_params_to_str($params) . '>' . set_value($params['name'], $this->input_value) . '</textarea>';
		
		if($this->text_editor === TRUE)
		{
			$html .= '<script>CKEDITOR.replace("' . $this->_get_input_id() . '");</script>';
		}
		
		return $html;
	}
	
	protected function _html_select($params)
	{
		$options = $this->input_options;
		if(!is_array($options)) $options = array();
		
		if(!array_key_exists('class', $params))
			$params['class'] = 'form-input';
		
		$select = '<select ' . $this->_params_to_str($params) . '>';
		
		foreach($options as $value => $label)
			$select .= '<option value="' . $value . '" ' . set_select($params['name'], $value, $value == $this->input_value) . '>' . $label . '</option>';
			
		return $select . '</select>';
	}
	
	protected function _html_checkbox($params)
	{
		$params['type'] = 'checkbox';
		return '<input ' . $this->_params_to_str($params) . ($this->input_value ? ' checked' : null) . ' />';
	}
	
	protected function _html_radio($params)
	{
		$params['type'] = 'radio';
		return '<input ' . $this->_params_to_str($params) . ($this->input_value ? ' checked' : null) . ' />';
	}
	
	protected function _html_file($params)
	{
		$params['type'] = 'file';
		$return = '<input ' . $this->_params_to_str($params) . ' data-toggle="formfile" />';
		
		if(class_exists('Upload'))
			$return .= $this->upload->display_errors('<div class="form-error">', '</div>');
		
		if(!is_null($this->file_name))
		{
			$return .= '<div class="form-file-preview" data-formfile="preview">';
			$return .= '<div class="form-file-img">';
			$return .= check_img(rtrim($this->file_path, '/') . '/' . $this->file_name);
			$return .= '</div>';
			
			if(!is_null($this->file_delete))
			{
				$return .= '<div class="form-info"><a href="' . base_url($this->file_delete) . '" data-formfile="remove" data-formfile-remove="' . $this->name . '">удалить изображение</a></div>';
			}
			
			$return .= '</div>';
		}
		
		return $return;
	}
	
	protected function _params_to_str($params)
	{
		$return = '';
		
		foreach($params as $k => $v)
			$return .= ' '.$k.'="'.$v.'"';
			
		return $return;
	}
	
	protected function _get_input_id()
	{
		if(!empty($this->input_params['id']))
			return $this->input_params['id'];
		else
			return 'admin_input_'.$this->name;
	}
}
