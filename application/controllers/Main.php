<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}
	public function index()
	{

		$data['news'] = $this->News_model->get_newest();
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/script');
		$this->load->view('main', $data);
		$this->load->view('includes/search');
		$this->load->view('includes/footer');
	}
}
