<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends ADMIN_Controller {
	
	public $page = 'users';
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->model = $this->users_admin_model;
		
		$this->init($this->page);
	}
	
	public function index()
	{
		$count = $this->model->getCount();
		$pagination = admin_pagination($this->page.'/index', $count);
		
		$this->data['items'] = $this->model->getItems(null, 'login|ASC', $pagination['per_page'], $pagination['offset']);
		
		$this->data['access'] = $this->model->getAccess();
		
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
				$this->validate('users_create');
				
				$insert = $this->model->post_insert();
				
				$this->model->insert($insert);
				
				set_flash('result', action_result('success', fa('check mr5').' Пользователь <strong>"'.$insert['login'].'"</strong> успешно добавлен!', true));
				redirect('admin/'.$this->page);
			
			} catch(Exception $e) {
				
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->data['access'] = $this->model->getAccessList();
		
		$this->breadcrumbs->add('Добавить', '');
		
		$this->output($this->page.'/create');
	}
	
	public function edit()
	{
		$id = uri(4);
		
		$item = $this->model->getItem('id', $id);
		if(empty($item))
		{
			set_flash('result', action_result('error', fa('warning mr5').' Пользователь не найден!', true));
			redirect('admin/'.$this->page);
		}
		
		if($_POST)
		{
			try
			{
				$this->validate('users_update');
				
				$insert = $this->model->post();
				
				$this->model->update($insert, $id);
				
				set_flash('result', action_result('success', fa('check mr5').' Пользователь <strong>"'.$insert['login'].'"</strong> успешно обновлен!', true));
				redirect(uri(5) == 'close' ? '/admin/'.$this->page : current_url());
			
			} catch(Exception $e) {
				
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->data['item'] = $item;
		
		$this->data['access'] = $this->model->getAccessList();
		
		$this->breadcrumbs->add('Редактирование', '');
		
		$this->output($this->page.'/edit');
	}
	
	public function password()
	{
		$id = $this->data['userid'];
		
		if($_POST)
		{
			try
			{
				$this->validate('users_password');
				
				$insert = $this->model->post_password();
				
				if(!password_verify($this->input->post('old_password'), $this->data['userinfo']['password']))
					throw new Exception(fa('warning mr5').' Старый пароль указан неверно!');
				
				$this->model->update(['password' => $insert['password'], 'hash' => $insert['hash']], $id);
				
				$adminhash = init_cookie('adminhash', password_hash($id.$insert['hash'], PASSWORD_DEFAULT));
				set_cookie($adminhash);
				
				set_flash('result', action_result('success', fa('check mr5').' Ваш пароль успешно изменен!', true));
				redirect('admin/'.$this->page);
			
			} catch(Exception $e) {
				
				$this->data['error'] = $e->getMessage();
			}
		}
		
		$this->breadcrumbs->add('Изменения пароля', '');
		
		$this->output($this->page.'/password');
	}
	
	public function view()
	{
		$this->data['item'] = $this->model->getItem('idItem', uri(4));
		if(empty($this->data['item']))
		{
			set_flash('result', action_result('error', fa('warning mr5').' Пользователь не найден!', true));
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
			if($_POST && $this->input->post('delete') == 'delete' && $id != $this->userid)
			{
				$item = $this->model->getItem('id', $id);
				if(empty($item))
					throw new Exception(fa('warning mr5').' Пользователь не найден!');
				
				$this->model->delete($id);
				$error = false;
			}
		}  catch(Exception $e) {
			$error = $e->getMessage();
		}
		
		if($error)
		{
			set_flash('result', action_result('error', $error, true));
		} else {
			set_flash('result', action_result('success', fa('trash mr5').' Пользователь <strong>"'.$item['login'].'"</strong> успешно удален!', true));
		}
		
		redirect('admin/'.$this->page);
	}
	
	
	# HELPERS
	
	
	# VALIDATION
	
	public function check_login($value, $id = null)
	{
		if($this->model->check_unique($value, 'login', $id)) return true;
		$this->form_validation->set_message('check_login', '{field} <strong>'.$value.'</strong> уже есть в базе!');
		return false;
	}
	
	public function check_email($value, $id = null)
	{
		if($this->model->check_unique($value, 'email', $id)) return true;
		$this->form_validation->set_message('check_email', '{field} <strong>'.$value.'</strong> уже есть в базе!');
		return false;
	}
	
	public function check_phone($value, $id = null)
	{
		if($value == '') return true;
		if($this->model->check_unique($value, 'phone', $id)) return true;
		$this->form_validation->set_message('check_phone', '{field} <strong>'.$value.'</strong> уже есть в базе!');
		return false;
	}
}