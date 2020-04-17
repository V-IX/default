<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Login
 * @property Users_admin_model users
 * @property Email_model email_model
 */

class Login extends ADMIN_Controller {
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->users = $this->users_admin_model;
	}

    public function index()
	{
		$this->data['error'] = false;
		
		if($_POST)
		{
			try
			{
				$this->validate('login');
				
				$login = $this->input->post('login');
				$password = $this->input->post('password');
				
				$user = $this->users->getItem('login', $login);
				if(empty($user))
					throw new Exception(fa('warning mr5').' '.'Пользователь не найден!');
				
				if(!password_verify($password, $user['password']))
					throw new Exception(fa('warning mr5').' '.'Пароль указан неверно!');
				
				if($user['access'] != ACCESS_ADMIN)
					throw new Exception(fa('warning mr5').' '.'У Вас нет доступа в панель управления!');
				
				set_cookie(init_cookie('adminid', $user['id']));
				set_cookie(init_cookie('adminhash', password_hash($user['id'].$user['hash'], PASSWORD_DEFAULT)));
				
				set_flash('result', action_result('success', fa('check mr5') . ' Добро пожаловать, <strong>' . $user['name'] . '</strong>! Команда <a href="http://narisuemvse.by" target="_blank">Narisuemvse.by</a> желают Вам ' . $this->users->time_period() . '!'));
				
				redirect('admin');
			}
			catch(Exception $e)
			{
				$this->data['error'] = action_result('error', $e->getMessage());
			}
		}
		
		$this->data['flash'] = $this->session->flashdata('result');
		$this->data['settings'] = $this->settings_model->siteinfo();
		
		$this->load->view('admin/common/login', $this->data);
	}

	public function logout()
	{
		$this->users->logout();
		redirect('/');
	}

	public function recovery()
	{
		$this->data['error'] = false;
		
		if($_POST)
		{
			try
			{
				$this->validate('recovery');
				
				$login = $this->input->post('login');
				
				$user = $this->users->getItem('login', $login);
				if(empty($user))
					throw new Exception(fa('warning mr5').' '.'Пользователь не найден!');
				
				$password = $this->users->generate_password();
				$hash = $this->users->generate_hash();
				
				$this->users->update(['password' => password_hash($password, PASSWORD_DEFAULT), 'hash' => $hash], ['login' => $login]);
				
				$this->load->model('email_model');
				$this->email_model->send(['password' => $password], 'passwordRecovery', 'Восстановление пароля', $user['email']);
				
				set_flash('result', action_result('info', fa('check mr5') . " Пароль для пользователя <strong>{$login}</strong> был выслан на контактный e-mail"));
				redirect('admin/login');
			}
			catch(Exception $e)
			{
				$this->data['error'] = action_result('error', $e->getMessage());
			}
		}
		
		$this->data['settings'] = $this->settings_model->siteinfo();
		
		$this->load->view('admin/common/recovery', $this->data);
	}
	
	public function testmail()
	{
		$this->load->model('email_model');
		
		$this->email_model->preview(['password' => uniqid()], 'passwordRecovery');
	}
}
