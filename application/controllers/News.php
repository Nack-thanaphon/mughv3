<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('news/index.php');
        $this->load->view('includes/search');
        $this->load->view('includes/footer');
    }
    public function singlenews($news_id = NULL)
    {

        $data['news'] = $this->News_model->get_news_single($news_id);
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('news/detail.php', $data);
        $this->load->view('includes/search');
        $this->load->view('includes/footer');
    }
    public function get_news()
    {
        $data = $this->News_model->get_news();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_news_bymonth()
    {
        $data = $this->News_model->get_news_bymonth();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_news_bymonthlist()
    {
        $month = $this->input->post('m_list');
        $data = $this->News_model->get_news_bymonthlist($month);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
