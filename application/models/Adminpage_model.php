<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage_model extends CI_Model {
	
	private $_table = 'pages_admin';
	
	public function getItems($limit = false, $offset = false, $order = false, $params = array())
	{
		return $this->query->items($this->_table, $limit, $offset, $order, $params);
	}
	
	public function getItem($field, $value = null)
	{
		return $this->query->item($this->_table, $field, $value);
	}
	
	public function tree()
	{
		$parents = $this->getItems(false, false, 'num|ASC', ['id_parent' => 0, 'access' => 1]);
		if(empty($parents)) return array();
		
		$tree = array();
		foreach($parents as $item)
		{
			$tree[$item['id']] = $item;
			$tree[$item['id']]['childs'] = array();
		}
		
		$childs = $this->getItems(false, false, 'num|ASC', ['id_parent !=' => 0, 'access' => 1]);
		if(!empty($childs))
		{
			foreach($childs as $child)
			{
				if(array_key_exists($child['id_parent'], $tree)) $tree[$child['id_parent']]['childs'][] = $child;
			}
		}
		
		return $tree;
	}
	
	public function counters()
	{
		$return = [
			'feedback' => [
				'count' => $this->query->items_count('feedback', array('is_read' => 0)),
				'color' => 'success',
			],
			'reviews' => [
				'count' => $this->query->items_count('reviews', array('is_read' => 0)),
				'color' => 'error',
			],
		];
		
		return $return;
	}
}