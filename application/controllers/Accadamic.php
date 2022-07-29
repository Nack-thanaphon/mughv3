<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accadamic extends CI_Controller
{

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('accadamic/index.php');
        $this->load->view('includes/footer');
    }

    public function factury()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('accadamic/factury');
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
