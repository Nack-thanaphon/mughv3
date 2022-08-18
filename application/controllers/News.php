<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->helper('menu_helper'); // call helpers fucntion
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
        $url_title = $data['news'][0]['n_name'];

        $url_slug = url_title($url_title, 'dash', TRUE);
        redirect(base_url('News/Result/' . $news_id . '/' . $url_slug));
    }


    public function Result($id)
    {
        $data['news'] = $this->News_model->get_news_single($id);
        $url_title['title'] = $data['news'][0]['n_name'];
        $url_title['img'] = $data['news'][0]['n_image'];

        $this->load->view('includes/header', $url_title);
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


    public function counter()
    {
        $this->News_model->counter();
    }
    
    public function get_news_bymonthlist()
    {
        $getData = $this->input->post('m_list');
        $month = DatetoInt($getData);
        $data = $this->News_model->get_news_bymonthlist($month);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
