<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education extends CI_Controller
{

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('education/index.php');
        $this->load->view('includes/footer');
    }

    public function ourProgram()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('education/ourProgram.php');
        $this->load->view('includes/footer');
    }
    public function ourCourses()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('education/ourCourses.php');
        $this->load->view('includes/footer');
    }
    public function ourOnehealth()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('education/ourOnehealth.php');
        $this->load->view('includes/footer');
    }
}
