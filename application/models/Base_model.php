<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {
	
	protected $table	= null;
	protected $folder	= null;
	protected $page		= null;
	
	# GET
	
	public function getItems($params = [], $order = null, $limit = null, $offset = null)
	{
		$this->setOrder($order);
		
		return $this->db
			->get_where($this->table, $params, $limit, $offset)
			->result_array();
	}
	
	public function getItem($field, $value = null)
	{
		return $this->db
			->get_where($this->table, $this->_params_to_array($field, $value))
			->row_array();
	}
	
	public function getCount($field = null, $value = null)
	{
		return $this->db
			->where($this->_params_to_array($field, $value))
			->count_all_results($this->table);
	}
	
	public function setOrder($order)
	{
		if($order == 'RANDOM')
			$this->db->order_by('', 'RANDOM');
		else
			$this->db->order_by(str_replace(['|', '//'], [' ', ', '], $order));
	}
	
	
	# ACTIONS
	
	public function insert($data)
	{
		if(!$this->db->insert($this->table, $data))
		{
			$error = $this->db->error();
			$message = fa('warning fa-fw mr5') . ' Ошибка при добавлении записи в базу данных.' .
				'<div><strong>Код ошибки: ' . $error['code'] . '.</strong> ' . $error['message'] . '</div>';
				
			throw new Exception($message);
		}
		
		return true;
	}
	
	public function update($data, $param)
	{
		if(is_array($param)) $where = $param;
		else $where['id'] = $param;
		
		if(!$this->db->update($this->table, $data, $where))
		{
			$error = $this->db->error();
			$message = fa('warning fa-fw mr5') . ' Ошибка при обновлении записи в базе данных.' .
				'<div><strong>Код ошибки: ' . $error['code'] . '.</strong> ' . $error['message'] . '</div>';
				
			throw new Exception($message);
		}
		
		return true;
	}
	
	public function delete($param)
	{
		if(is_array($param)) $where = $param;
		else $where['id'] = $param;
		
		if(!$this->db->delete($this->table, $where))
		{
			$error = $this->db->error();
			$message = fa('warning fa-fw mr5') . ' Ошибка при удалении записи из базы данных.' .
				'<div><strong>Код ошибки: ' . $error['code'] . '.</strong> ' . $error['message'] . '</div>';
				
			throw new Exception($message);
		}
		
		return true;
	}
	
	
	# FILES
	
	public function file_config()
	{
		return [
			'upload_path'	=> './'.PATH_UPLOADS.'/'.$this->folder.'/',
			'allowed_types'	=> 'gif|jpg|png|jpeg',
			'max_size'		=> 2048,
			'encrypt_name'	=> true,
			'remove_spaces'	=> false,
			'overwrite'		=> true,
		];
	}
	
	public function file_load($key)
	{
		$error = false;
		$filename = null;
		
		if(!empty($_FILES[$key]['name']))
		{
			$this->load->helper('file');
			
			if($this->upload->do_upload($key))
			{
				$file = $this->upload->data();
				$filename = $file['file_name'];
				
				$this->thumb_create('img', $filename);
				
			} else {
				
				throw new Exception(fa('warning fa-fw mr5').' Ошибка загрузки изображения <strong>'.$_FILES[$key]['name'].'</strong>' .
					'<ul class="note-list">'.$this->upload->display_errors('<li>', '</li>').'</ul>');
			
			}
		}
		
		return $filename;
	}
	
	public function file_clear($id, $key)
	{
		return $this->update([$key => null], $id);
	}
	
	public function file_delete($file)
	{
		$paths = array(
			'/'.PATH_UPLOADS.'/'.$this->folder.'/'.$file,
			'/'.PATH_UPLOADS.'/'.$this->folder.'/thumb/'.$file,
		);
		deletefile($paths);
	}
	
	public function thumb_create($key, $filename)
	{
		$thumb = $this->thumb_size($key);
		if(!empty($thumb))
		{
			$this->load->library('SimpleImage');
			
			if($thumb['type'] == 'best_fit')
			{
				$this->simpleimage
					->load(PATH_UPLOADS.'/'.$this->folder.'/'.$filename)
					->best_fit($thumb['x'], $thumb['y'])
					->save(PATH_UPLOADS.'/'.$this->folder.'/thumb/'.$filename);
			} else {
				$this->simpleimage
					->load(PATH_UPLOADS.'/'.$this->folder.'/'.$filename)
					->thumbnail($thumb['x'], $thumb['y'])
					->save(PATH_UPLOADS.'/'.$this->folder.'/thumb/'.$filename);
			}
		}
	}
	
	public function thumb_size()
	{
		$this->db->select('thumb_x, thumb_y, thumb_type');
		$item = $this->query->item('pages_site', ['alias' => $this->page]);
		
		if(empty($item)) return array();
		
		return array(
			'x' => $item['thumb_x'],
			'y' => $item['thumb_y'],
			'type' => $item['thumb_type'],
		);
	}
	
	
	# HELPERS
	
	function check_unique($str, $key, $not_id = null)
	{
		$params[$key] = $str;
		
		if($not_id) $params['id !='] = $not_id;
		
		$check = $this->getCount($params);
		if($check == 0) return true;
		
		return false;
	}
	
	function _params_to_array($field, $value)
	{
		$params = array();
		
		if(is_array($field)) $params = $field;
		elseif(!is_null($field)) $params[$field] = $value;
		
		return $params;
	}
}