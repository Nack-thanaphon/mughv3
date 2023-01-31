<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends MY_Controller
{
    public function index()
    {

        $this->data['title'] = 'Gallery';
        $this->data['type'] = '';
        $this->data['date'] = $this->Gallery_model->get_month();

        $this->middle = 'gallery/index';

        $this->layout();
    }

    public function views($id)
    {
        $this->data['news'] = $this->Gallery_model->getnewssingleImg($id);
        $this->data['title'] = $this->data['news'][0]['title'];
        $this->data['img'] = $this->data['news'][0]['cover'];

        $this->middle = 'news/view';
        $this->layout();
    }


    
    public function getImageDataById()
    {
        $id = $this->input->post('id');
    
        $data = $this->Gallery_model->getImageDataById($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function getImageData()
    {
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $month = $this->input->post('month');

        $data = $this->Gallery_model->getImageData($title, $type, $month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
