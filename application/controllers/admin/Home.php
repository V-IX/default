<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends ADMIN_Controller {
	
	public $page = 'home';
	
	public function index()
	{
		$this->init($this->page);
		
		$this->load->model('feedback_model');
		$this->data['counter']['feedback'] = $this->feedback_model->getCount(['is_read' => 0]);
		$this->data['feedbacks'] = $this->feedback_model->getItems(['is_read' => 0], 'add_date|DESC', 10);
		
		$this->load->model('news_model');
		$this->data['counter']['news'] = $this->news_model->getCount();
		$this->data['news'] = $this->news_model->getItems(null, 'add_date|DESC', 3);
		
		$this->load->model('articles_model');
		$this->data['counter']['articles'] = $this->articles_model->getCount();
		$this->data['articles'] = $this->articles_model->getItems(null, 'add_date|DESC', 3);
		
		$this->load->model('pages_model');
		$this->data['counter']['pages'] = $this->pages_model->getCount();
		
		$this->output('common/index');
	}
	
	public function common()
	{
		$this->init($this->page);
		
		$this->breadcrumbs->add('Элементы управления', null);
		
		$this->output('common/common');
	}
	
	public function errors()
	{
		$this->init($this->page);
		
		$this->data['pageinfo']['title'] = 'Ошибка 404';
		$this->data['pageinfo']['mTitle'] = 'Ошибка 404';
		
		$this->breadcrumbs->add('Ошибка 404', null);
		
		$this->output('common/404');
	}
}
