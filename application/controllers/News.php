<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends MY_Controller
{

    public function index()
    {

        // $this->data['news'] = $this->News_model->get_newsall();
        $this->data['type'] = $this->News_model->get_newstype();
        $this->data['date'] = $this->News_model->get_news_month();

        $this->middle = 'news/index';

        $this->layout();
    }

    public function views($id)
    {
        $this->data['news'] = $this->News_model->getnewssingleImg($id);
        $this->data['title'] = $this->data['news'][0]['title'];
        $this->data['img'] = $this->data['news'][0]['cover'];

        $this->middle = 'news/view';
        $this->layout();
    }

    public function getnews()
    {
        $title =$this->input->post('title');
        $type =$this->input->post('type');
        $month =$this->input->post('month');

        $data = $this->News_model->getnewsData($title,$type,$month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

   
}
