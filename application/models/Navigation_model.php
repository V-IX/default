<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'navigation';
	}

    public function getTree($params = array())
    {
		$return = [];
		$params_parents = $params;
		$params_childs = $params;
		
        $params_parents['id_parent'] = 0;
        $parents = $this->getItems($params_parents, 'num DESC');
        if(empty($parents)) return $return;
		
        foreach($parents as $parent)
        {
            $current = false;

            $check = trim($parent['link'], '/');
            $check_arr = explode('/', $check);
            if($check_arr[0] != 'about' and $check_arr[0] == uri(1)) $current = true;
            if($check_arr[0] == 'about' and uri(1) == 'about') {
                if(isset($check_arr[1]) and $check_arr[1] == uri(2)) $current = true;
                elseif(!isset($check_arr[1]) and !uri(2)) $current = true;
            }

            $parent['current'] = $current;
			$parent['childs'] = [];

            $return[$parent['id']] = $parent;
        }

        $params_childs['id_parent !='] = 0;
        $childs = $this->getItems($params_childs, 'num DESC');

        foreach($childs as $child)
		{
			if(!empty($return[$child['id_parent']]))
			{
				$return[$child['id_parent']]['childs'][] = $child;
			}
		}

        return $return;
    }
	
	
	# HELPER
	
	public function post()
	{
		$return = $this->input->post();
		
		$return['visibility'] = !empty($return['visibility'])
			? $return['visibility'] ? 1 : 0
			: 0;
		
		$return['noindex'] = !empty($return['noindex'])
			? $return['noindex'] ? 1 : 0
			: 0;
		
		return $return;
	}
}