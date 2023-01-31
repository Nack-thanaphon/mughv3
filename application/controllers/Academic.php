<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Academic extends MY_Controller
{

    public function index()
    {
        $this->data['title'] = 'Academic';
        $this->data['type'] = $this->Academic_model->gettype();
        $this->data['date'] = $this->Academic_model->getmonth();

        $this->middle = 'academic/index';

        $this->layout();
    }

    public function getacademics()
    {
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $month = $this->input->post('month');

        $data = $this->Academic_model->getData($title, $type, $month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
