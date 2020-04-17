<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class News
 * @property News_model model
 */

class News extends ADMIN_Controller {

	public $page = 'news';
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->model('news_model');
		$this->model = $this->news_model;
		
		$this->init($this->page);
	}
	
	public function index()
	{
		$count = $this->model->getCount();
		$pagination = admin_pagination($this->page.'/index', $count);
		
		$this->data['items'] = $this->model->getItems(null, 'pub_date DESC', $pagination['per_page'], $pagination['offset']);
		
		$this->load->library('pagination');
		$this->pagination->initialize($pagination);
		
		$this->output($this->page.'/index');
	}
	
	public function create()
	{
		$this->load->library('upload', $this->model->file_config());
		
		if($_POST)
		{
			try
			{
				$this->validate($this->page);
				
				$insert = $this->model->post();
				
				$file = $this->model->file_load('img');
				if($file) $insert['img'] = $file;
				
				$this->model->insert($insert);
				
				set_flash('result', action_result('success', fa('check mr5').' Запись <strong>"'.$insert['title'].'"</strong> успешно добавлена!', true));
				redirect('admin/'.$this->page);
			}
			catch(Exception $e)
			{
				if(!empty($file)) $this->model->file_delete($file);
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->data['size'] = $this->model->thumb_size();
		
		$this->add_script([
			PATH_PLUGINS.'/ckeditor/ckeditor.js',
			PATH_PLUGINS.'/ui-datepicker/jquery-ui.min.js',
			PATH_PLUGINS.'/jquery.inputmask/jquery.inputmask.min.js',
		]);
		$this->add_style([
			PATH_PLUGINS.'/ui-datepicker/jquery-ui.css',
		]);
		
		$this->breadcrumbs->add('Добавить', '');
		
		$this->output($this->page.'/create');
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
		
		$this->load->library('upload', $this->model->file_config());
		
		if($_POST)
		{
			try
			{
				$this->validate($this->page);
				
				$insert = $this->model->post();
				
				$file = $this->model->file_load('img');
				if($file) $insert['img'] = $file;
				
				$this->model->update($insert, $id);
				
				if($file) $this->model->file_delete($item['img']);
				
				set_flash('result', action_result('success', fa('check mr5').' Запись <strong>"'.$insert['title'].'"</strong> успешно обновлена!', true));
				redirect(uri(5) == 'close' ? '/admin/'.$this->page : current_url());
			}
			catch(Exception $e)
			{
				if(!empty($file)) $this->model->file_delete($file);
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->data['item'] = $item;
		
		$this->data['size'] = $this->model->thumb_size();
		
		$this->add_script([
			PATH_PLUGINS.'/ckeditor/ckeditor.js',
			PATH_PLUGINS.'/ui-datepicker/jquery-ui.min.js',
			PATH_PLUGINS.'/jquery.inputmask/jquery.inputmask.min.js',
		]);
		$this->add_style([
			PATH_PLUGINS.'/ui-datepicker/jquery-ui.css',
		]);
		
		$this->breadcrumbs->add('Редактирование', '');
		
		$this->output($this->page.'/edit');
	}
	
	public function view()
	{
		$this->data['item'] = $this->model->getItem('id', uri(4));
		if(empty($this->data['item']))
		{
			set_flash('result', action_result('error', fa('warning mr5').' Запись не найдена!', true));
			redirect('admin/'.$this->page);
		}
		
		$this->breadcrumbs->add('Просмотр', '');
		
		$this->output($this->page.'/view');
	}
	
	public function delete()
	{
		$id = uri(4);
		$error = fa('warning mr5').' Ошибка данных POST!';
		
		try
		{
			if($_POST && $this->input->post('delete') == 'delete')
			{
				$item = $this->model->getItem('id', $id);
				if(empty($item))
					throw new Exception(fa('warning mr5').' Запись не найдена!');
				
				$this->model->delete($id);
				$this->model->file_delete($item['img']);
				$error = false;
			}
		}
		catch(Exception $e)
		{
			$error = $e->getMessage();
		}
		
		if($error)
		{
			set_flash('result', action_result('error', $error, true));
		} else {
			set_flash('result', action_result('success', fa('trash mr5').' Запись <strong>"'.$item['title'].'"</strong> успешно удалена!', true));
		}
		
		redirect('admin/'.$this->page);
	}
	
	
	# AJAX

	public function ajaxImageDelete()
	{
		$error = 'Ошибка данных POST';

		$id = uri(4);
		$type = $this->input->post('type');

		try
		{
			if($this->input->post('delete_img') == 'delete' && !empty($type))
			{
				$item = $this->model->getItem('id', $id);
				if(empty($item))
					throw new Exception('Запись не найдена!');

				$this->model->file_clear($id, $type);
				$this->model->file_delete($item[$type]);
				$error = false;
			}
		}
		catch(Exception $e)
		{
			$error = strip_tags($e->getMessage());
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['error' => $error]));
	}
}
