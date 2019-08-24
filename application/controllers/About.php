<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends SITE_Controller {
	
	public function index()
	{
		$this->init('about');
		
		$this->breadcrumbs->add($this->data['pageinfo']['name'], 'about');
		
		$this->add_script('assets/plugins/share42/share.js');
		
		$this->output('pages/about');
	}
	
	public function pages()
	{
		$alias = uri(2);
		
		$this->init('about');
		
		$this->load->model('pages_model', 'pages');
		
		$item = $this->pages->getItem(['alias' => $alias, 'visibility' => 1]);
		if(empty($item)) show_404();
		
		$this->data['item'] = $item;
		
		$this->breadcrumbs->add($this->data['item']['title'], $alias);
		
		$this->add_script('assets/plugins/share42/share.js');
		
		$this->output('pages/page');
	}
}