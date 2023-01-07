<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Newsletter_model');
        $this->load->model('Helper_model');

        $this->load->helper('menu_helper'); // call helpers fucntion
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('newsleter/index.php');
        // $this->load->view('layout/search');
        $this->load->view('layout/footer');
    }
    public function get_news()
    {
        $data = $this->Newsletter_model->get_news();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_news_bymonth()
    {
        $data = $this->Newsletter_model->get_news_bymonth();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    public function counter()
    {
        $this->Newsletter_model->counter();
    }
    
 
}
