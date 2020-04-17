<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Reviews
 * @property Reviews_model reviews
 */

class Reviews extends SITE_Controller {
	
	public	$page = 'reviews';
	private	$model = '';
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->model('reviews_model', 'reviews');
	}
	
	public function index()
	{
		$this->init($this->page);
		
		$params = ['visibility' => 1, 'pub_date <=' => date('Y-m-d H:i:s')];
		
		$count = $this->reviews->getCount($params);
		$pagination = site_pagination($this->page, $count);
		
		$this->data['items'] = $this->reviews->getItems($params, 'pub_date DESC', $pagination['per_page'], $pagination['offset']);
		
		$this->load->library('pagination');
		$this->pagination->initialize($pagination);
		
		$this->data['canonical'] = $this->page;
		
		$this->breadcrumbs->add($this->data['pageinfo']['name'], $this->page);
		
		$this->output('pages/reviews');
	}
}
