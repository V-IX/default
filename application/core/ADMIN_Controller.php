<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN_Controller extends CI_Controller
{
	public $data = array();
	protected $model = '';

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('base_model');
		$this->load->model('settings_model');
		$this->load->model('adminpage_model');
		$this->load->model('users_admin_model');
		
		$this->load->library('AdminCreator');
		$this->load->helper('admin');
	}

	public function init($alias)
	{
		$siteinfo = $this->site_info();
		
		$userid = get_cookie('adminid');
		$hash = get_cookie('adminhash');
		
		if(is_null($userid))
		{
			set_flash('result', action_result('error', fa('times mr5'). ' Для доступа в админ-панель необходима авторизация!'));
			redirect('/admin/login');
		}
		
		$user = $this->user_info($userid);
		
		if (empty($user) or !password_verify($user['id'].$user['hash'], $hash)) {
			$this->users_admin_model->logout();
			redirect('/admin/login');
		}
		
		if ($user['access'] != 'admin') {
			set_flash('result', action_result('error', fa('times mr5'). ' У вас нет доступа в панель управления!'));
			redirect('/admin/login');
		}
		
		$this->data = [
			'siteinfo' 		=> $siteinfo,
			'cms' 			=> $this->cms_info(),
			'sidenav' 		=> $this->admin_nav(),
			'pageinfo' 		=> $this->admin_page($alias),
			'admin_bells' 	=> $this->admin_counters(),
			'folder' 		=> $alias,
			
			'error' 		=> false,
			
			'userid'		=> $userid,
			'userinfo'		=> $user,
			
			'version'		=> '?v='.$siteinfo['version'],
			'styles'		=> [],
			'scripts'		=> [],
		];

		$this->breadcrumbs->add($this->data['pageinfo']['name'], $this->data['pageinfo']['link']);
	}
	
	public function output($view = null)
	{
		$this->adminseo();
		
		if(!is_null($view))
			$this->data['view'] = $view;
		
		$template = empty($this->data['template'])
			? 'admin/common/template'
			: $this->data['template'];
		
		$this->load->view($template, $this->data);
	}
	
	private function adminseo()
	{
		$title = htmlspecialchars(isset($this->data['item']['title'])
			? $this->data['item']['title']
			: $this->data['pageinfo']['title']);

		$this->data['seo'] = [
			'title'	=> $title,
			'pagetitle'	=> $title . ' - ' . htmlspecialchars($this->data['siteinfo']['title']) . ' Admin',
		];
	}

	/* admin */

	private function site_info()
	{
		$return = $this->settings_model->siteinfo();
		if (empty($return)) exit('No current settings');
		return $return;
	}

	private function cms_info()
	{
		return [
			'title' => $this->config->config['cms_title'],
			'version' => $this->config->config['cms_version'],
			'copyright' => $this->config->config['cms_copyright'],
		];
	}

	private function admin_nav()
	{
		return $this->adminpage_model->tree();
	}

	private function user_info($userid)
	{
		return $this->users_admin_model->getItem('id', $userid);
	}

	private function admin_page($alias)
	{
		return $this->adminpage_model->getItem('alias', $alias);
	}

	private function admin_counters()
	{
		return $this->adminpage_model->counters();
	}
	
	
	# HELPERS
	
	public function add_style($files)
	{
		if(is_array($files))
		{
			foreach($files as $file) $this->data['styles'][] = $file;
		} else {
			$this->data['styles'][] = $files;
		}
		
		return $this;
	}
	
	public function add_script($files)
	{
		if(is_array($files))
		{
			foreach($files as $file) $this->data['scripts'][] = $file;
		} else {
			$this->data['scripts'][] = $files;
		}
		
		return $this;
	}
	
	
	# EXTRA HELPERS
	
	public function check_alias($value, $id = null)
	{
		if($this->model->check_unique($value, 'alias', $id)) return true;
		$this->form_validation->set_message('check_alias', '{field} <strong>'.$value.'</strong> уже есть в базе!');
		return false;
	}
	
	public function validate($group, $prefix = true)
	{
		if($prefix) $group = 'admin_'.$group;
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		
		if($this->form_validation->run($group))
			return true;
		
		$message = fa('warning fa-fw mr5') . ' Проверьте правильность заполненных полей.' .
			'<ul class="note-list">'.validation_errors('<li>', '</li>').'</ul>';
			
		throw new Exception($message);
	}
}

define('EMPTY_TEXT', '<span class="text-gray">не указано<span>');
define('ICON_SUFFIX', ' fa-fw text-gray');

define('META_TITLE_TOTAL', 65);
define('META_TITLE_ALLOW', 60);
define('META_DESCRIPTION_TOTAL', 225);
define('META_DESCRIPTION_ALLOW', 215);