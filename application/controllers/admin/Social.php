<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Social
 * @property Social_model model
 */

class Social extends ADMIN_Controller {

	public $page = 'social';
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->model('social_model');
		$this->model = $this->social_model;
		
		$this->init($this->page);
		
	}
	
	public function index()
	{
		$count = $this->model->getCount();
		$pagination = admin_pagination(uri(2).'/index', $count, 20);
		
		$this->data['items'] = $this->model->getItems(null, 'num|DESC', $pagination['per_page'], $pagination['offset']);
		
		$this->load->library('pagination');
		$this->pagination->initialize($pagination);
		
		$this->output($this->page.'/index');
	}
	
	public function edit()
	{
		$id = uri(4);
		
		$item = $this->model->getItem('id', $id);
		if(empty($item))
		{
			set_flash('result', action_result('error', fa('warning mr5').' Запись не найдена!', true));
			redirect('admin/'.$this->page);
		}
		
		if($_POST)
		{
			try
			{
				$this->validate($this->page);
				
				$insert = $this->model->post();
				
				$this->model->update($insert, $id);
				
				set_flash('result', action_result('success', fa('check mr5').' Запись <strong>"'.$insert['title'].'"</strong> успешно обновлена!', true));
				redirect(uri(5) == 'close' ? '/admin/'.$this->page : current_url());
			}
			catch(Exception $e)
			{
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->data['item'] = $item;
		
		$this->breadcrumbs->add('Редактирование', '');
		
		$this->output($this->page.'/edit');
	}
}
