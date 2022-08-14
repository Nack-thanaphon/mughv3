<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
		$this->load->model('Event_model');
		$this->load->model('helper_model');
		$ci = get_instance();
		$ci->load->helper('menu_helper'); // call helpers fucntion
	}
	public function index()
	{
		$data['news'] = $this->News_model->get_newest();
		$data['event'] = $this->Event_model->get_eventest();

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/script');
		$this->load->view('main', $data);
		$this->load->view('includes/search');
		$this->load->view('includes/footer');
	}
	public function search()
	{

		$data['result'] = $this->helper_model->search();
		$data['countresult'] = $this->data['result'] = count($this->helper_model->search());
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/script');
		$this->load->view('search/index', $data);
		$this->load->view('includes/footer');
	}
}
