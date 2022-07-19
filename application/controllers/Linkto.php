<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Linkto extends CI_Controller
{
    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('linkto/index.php');
        $this->load->view('includes/footer');
    }

    public function national()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('linkto/national.php');
        $this->load->view('includes/footer');
    }
    public function international()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('linkto/international.php');
        $this->load->view('includes/footer');
    }
}
