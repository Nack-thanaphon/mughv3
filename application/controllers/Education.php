<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('menu_helper'); // call helpers fucntion
    }
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('education/index.php');
        $this->load->view('layout/footer');
        
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
