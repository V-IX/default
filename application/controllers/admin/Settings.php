<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends ADMIN_Controller {
	
	public $page = 'settings';
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->model = $this->settings_model;
		
		$this->init($this->page);
	}
	
	public function index()
	{
		$this->output($this->page.'/index');
	}
	
	public function edit()
	{
		$this->load->library('upload', $this->model->file_config());
		
		if($_POST)
		{
			try
			{
				$this->validate($this->page);
				
				$insert = $this->model->post();
				
				$file = $this->model->file_load('img');
				if($file) $insert['img'] = 'logo.' . pathinfo(PATH_UPLOADS.'/settings/' . $file, PATHINFO_EXTENSION);
				
				$this->model->siteinfo_update($insert);
				
				if($file)
				{
					$this->model->file_delete($this->data['siteinfo']['img']);
					rename('./'.PATH_UPLOADS.'/settings/'.$file, './'.PATH_UPLOADS.'/settings/'. $insert['img']);
				}
				
				set_flash('result', action_result('success', fa('check mr5').' Настройки успешно изменены!', true));
				redirect(uri(4) == 'close' ? '/admin/'.$this->page : current_url());
			}
			catch(Exception $e)
			{
				if(!empty($file)) $this->model->file_delete($file);
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->breadcrumbs->add('Редактирование', '');
		
		$this->output($this->page.'/edit');
	}
	
	public function cache()
	{
		try
		{
			$this->model->cache();
		}
		catch(Exception $e)
		{
			$error = $e->getMessage();
		}
		
		if(!empty($error))
		{
			set_flash('result', action_result('error', $error, true));
		} else {
			set_flash('result', action_result('success', fa('refresh mr5').' <strong>Кэш сайта</strong> успешно обновлен!', true));
		}
		
		redirect('admin/'.$this->page);
	}
	
	public function robots()
	{
		$file = './robots.txt';
		
		if($_POST)
		{
			$text = $this->input->post('text');
			file_put_contents($file, $text);
			
			set_flash('result', action_result('success', fa('check mr5').' <strong>Robots.txt</strong> успешно обновлен!', true));
			redirect(uri(4) == 'close' ? '/admin/'.$this->page : current_url());
		}
		
		$this->data['file'] = file_get_contents($file);
		
		$this->breadcrumbs->add('Robots.txt', '');
		
		$this->output($this->page.'/editor');
	}
	
	public function htaccess()
	{
		$file = './.htaccess';
		
		if($_POST)
		{
			$text = $this->input->post('text');
			file_put_contents($file, $text);
			
			set_flash('result', action_result('success', fa('check mr5').' <strong>.htaccess</strong> успешно обновлен!', true));
			redirect(uri(4) == 'close' ? '/admin/'.$this->page : current_url());
		}
		
		$this->data['file'] = file_get_contents($file);
		
		$this->breadcrumbs->add('.htaccess', '');
		
		$this->output($this->page.'/editor');
	}
}
