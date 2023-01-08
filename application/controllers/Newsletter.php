<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter extends MY_Controller
{
    
    public function index()
    {

        $this->data['title'] = 'จดหมายข่าว';
        $this->data['type'] = '';
        $this->data['date'] = $this->Newsletter_model->get_month();

        $this->middle = 'newsletter/index';

        $this->layout();
    }

    public function views($id)
    {
        $this->data['news'] = $this->Newsletter_model->getnewssingleImg($id);
        $this->data['title'] = $this->data['news'][0]['title'];
        $this->data['img'] = $this->data['news'][0]['cover'];

        $this->middle = 'news/view';
        $this->layout();
    }

    public function getnewsletter()
    {
        $title =$this->input->post('title');
        $type =$this->input->post('type');
        $month =$this->input->post('month');

        $data = $this->Newsletter_model->getdownloadData($title,$type,$month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
 
}
