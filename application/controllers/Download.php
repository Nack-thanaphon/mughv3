<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends MY_Controller
{


    public function index()
    {

        // $this->data['news'] = $this->Download_model->get_newsall();
        $this->data['type'] = $this->Download_model->get_newstype();
        $this->data['date'] = $this->Download_model->get_news_month();

        $this->middle = 'download/index';

        $this->layout();
    }

    public function views($id)
    {
        $this->data['news'] = $this->Download_model->getnewssingleImg($id);
        $this->data['title'] = $this->data['news'][0]['title'];
        $this->data['img'] = $this->data['news'][0]['cover'];

        $this->middle = 'news/view';
        $this->layout();
    }

    public function getdownload()
    {
        $title =$this->input->post('title');
        $type =$this->input->post('type');
        $month =$this->input->post('month');

        $data = $this->Download_model->getdownloadData($title,$type,$month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}
