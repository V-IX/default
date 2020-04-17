<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class SITE_Controller
 * @property CI_Loader load
 * @property CI_Input input
 * @property CI_Output output
 * @property CI_Config config
 * @property CI_DB_query_builder db
 * @property CI_Form_validation form_validation
 * @property CI_Pagination pagination
 * @property CI_Security security
 * @property CI_Session session
 * @property Base_model base_model
 * @property Settings_model settings_model
 * @property Pageinfo_model pageinfo_model
 * @property Navigation_model navigation_model
 * @property Users_site_model users_site_model
 * @property Social_model social_model
 * @property Breadcrumbs breadcrumbs
 */

class SITE_Controller extends CI_Controller
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('base_model');
		$this->load->model('settings_model');
		$this->load->model('pageinfo_model');
		$this->load->model('navigation_model');
		$this->load->model('users_site_model');
		$this->load->model('social_model');
	}
	
	# BASIC

	public function init($page = null)
	{
		$siteinfo = $this->site_info();
		
		// check enable
		
		$this->check_enable($siteinfo['enable']);
		
		
		// create data
		
		$this->data = [
			'siteinfo'	=> $siteinfo,
			'pageinfo'	=> $this->site_page($page),
			
			'nav_header'	=> $this->nav('top'),
			'nav_footer'	=> $this->nav('footer'),
			
			'socials'	=> $this->social(),
			
			'error'		=> false,
			'csrf'		=> $this->security->get_csrf_hash(),
			
			'version'	=> '?v='.$siteinfo['version'],
			'styles'	=> [],
			'scripts'	=> [],
		];
		
		
		// check auth

		$userid = get_cookie('userid');
		$hash = get_cookie('hash');
		$user = [];

		if (!is_null($userid))
		{
			$user = $this->users_site_model->getItem(['id' => $userid, 'delete' => 0]);

			if (empty($user) or !password_verify($user['id'].$user['hash'], $hash))
			{
				$user = [];
				$this->users_site_model->logout();
			}
		}

		if (uri(1) == 'cabinet')
		{
			if (empty($user))
			{
				set_flash('site', action_result('error', fa5s('exclamation-triangle mr5') . ' Для входа в кабинет необходима авторизация!'));	
				redirect('login');
			}

			$this->data['cmenu'] = $this->nav_cabinet();
			$cabinet_page = $this->site_page('cabinet');
			$this->breadcrumbs->add($cabinet_page['name'], uri(1));
		}

		$this->data['userid'] = $userid;
		$this->data['userinfo'] = $user;
	}
	
	public function output($view = null)
	{
		$this->data['seo'] = $this->siteseo();
		
		if(!is_null($view))
			$this->data['view'] = $view;
		
		$template = empty($this->data['template'])
			? 'site/common/template'
			: $this->data['template'];
		
		$this->load->view($template, $this->data);
	}

	public function siteseo()
	{
		$seo = [];

		$siteinfo = $this->data['siteinfo'];
		$pageinfo = $this->data['pageinfo'];
		$item = $this->data['item'] ?? [];

		if (isset($item['meta_title'])) $seo['title'] = $item['meta_title'];
		elseif (isset($pageinfo['meta_title'])) $seo['title'] = $pageinfo['meta_title'];
		else $seo['title'] = $siteinfo['meta_title'];

		if (isset($item['meta_description'])) $seo['description'] = $item['meta_description'];
		elseif (isset($pageinfo['meta_description'])) $seo['description'] = $pageinfo['meta_description'];
		else $seo['description'] = $siteinfo['meta_description'];
		
		$seo['keywords'] = '';
		
		$seo['canonical'] = base_url($this->data['canonical'] ?? $this->uri->uri_string);

		return $seo;
	}
	
	private function check_enable($enable)
	{
		if($enable == 0)
		{
			$admin = get_cookie('adminid');
			if(empty($admin) && uri(1) != 'cap')
				redirect('cap');
		}
	}
	
	# COMMON FUNCTIONS

	private function site_info()
	{
		$return = $this->settings_model->siteinfo();
		if (empty($return)) exit('No current settings');
		return $return;
	}

	public function site_page($page)
	{
		if(is_null($page)) return [];
		return $this->pageinfo_model->getItem('alias', $page);
	}
	
	public function social()
	{
		return $this->social_model->getItems(['visibility' => 1], 'num DESC');
	}

	private function nav($position = 'top')
	{
		return $this->navigation_model->getTree(['visibility' => 1, 'position' => $position]);
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

	private function nav_cabinet()
	{
		return array(
			array(
				'title' => 'Персональная информация',
				'link' => 'cabinet/profile',
				'alias' => 'profile',
				'icon' => fa5s('user-edit fa-fw'),
			),
			array(
				'title' => 'Выход',
				'link' => 'login/logout',
				'alias' => 'logout',
				'icon' => fa5s('sign-out-alt fa-fw'),
			),
		);
	}
	
	public function validate($group)
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		
		if($this->form_validation->run($group))
			return true;
		
		$message = fa5s('exclamation-triangle fa-fw mr5') . ' Проверьте правильность заполненных полей.' .
			'<ul class="note-list">'.validation_errors('<li>', '</li>').'</ul>';
			
		throw new Exception($message);
	}
}