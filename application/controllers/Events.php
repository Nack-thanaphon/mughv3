<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('Helper_model');

        $this->load->helper('menu_helper'); // call helpers fucntion
    }
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('events/index.php');
        // $this->load->view('layout/search');
        $this->load->view('layout/footer');
    }


    public function singleEvent($event_id = NULL)
    {

        $data['event'] = $this->Event_model->get_event_single($event_id);
        $url_title = $data['event'][0]['name'];

        $url_slug = url_title($url_title, 'dash', TRUE);
        redirect(base_url('Events/Result/' . $event_id . '/' . $url_slug));
    }


    public function Result($id)
    {
        $data['event'] = $this->Event_model->get_event_single($id);
        $url_title['title'] = $data['event'][0]['title'];

        $this->load->view('layout/header', $url_title);
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('events/detail.php', $data);
        $this->load->view('layout/search');
        $this->load->view('layout/footer');
    }

    public function get_events()
    {
        $data = $this->Event_model->get_events();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    public function get_event_bymonth()
    {
        $data = $this->Event_model->get_event_bymonth();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_event_bymonthlist()
    {
        $getData = $this->input->post('m_list');
        $month = DatetoInt($getData);
        $data = $this->Event_model->get_event_bymonthlist($month);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
