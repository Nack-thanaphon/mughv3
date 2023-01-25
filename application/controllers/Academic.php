<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Academic extends MY_Controller
{

    public function index()
    {
        $this->data['title'] = 'ข่าวสาร บทความ';
        $this->data['type'] = $this->News_model->get_newstype();
        $this->data['date'] = $this->News_model->get_news_month();

        $this->middle = 'academic/index';

        $this->layout();
    }

    public function ourProgram()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('education/ourProgram.php');
        $this->load->view('layout/footer');
    }
    public function ourCourses()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('education/ourCourses.php');
        $this->load->view('layout/footer');
    }
    public function ourOnehealth()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('education/ourOnehealth.php');
        $this->load->view('layout/footer');
    }
}
