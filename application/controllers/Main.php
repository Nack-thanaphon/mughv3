<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/script');
		$this->load->view('main');
		$this->load->view('includes/search');
		$this->load->view('includes/footer');
	}
}
