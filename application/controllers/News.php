<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('news/index.php');
        $this->load->view('includes/search');
        $this->load->view('includes/footer');
    }
    public function singlenews()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('news/detail.php');
        $this->load->view('includes/search');
        $this->load->view('includes/footer');
    }

   
}
