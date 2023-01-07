<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends MY_Controller
{


	public function index()
	{
		$data['news'] = $this->News_model->get_newest();
		$data['event'] = $this->Event_model->get_eventest();
		$data['banner'] = $this->Gallery_model->getbanner();
		$data['download'] = $this->Helper_model->getfile();

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/script');
		$this->load->view('main', $data);
		$this->load->view('layout/footer');
	}
	public function search()
	{

		$data['result'] = $this->Helper_model->search();
		$data['countresult'] = $this->data['result'] = count($this->Helper_model->search());
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/script');
		$this->load->view('search/index', $data);
		$this->load->view('layout/footer');
	}

	public function getip()
	{
		$ip = $this->input->ip_address();

	}
}
