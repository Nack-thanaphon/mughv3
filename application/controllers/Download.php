<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('menu_helper'); // call helpers fucntion
        $this->load->model('Helper_model');
        
    }
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('download/index.php');
        $this->load->view('layout/search');
        $this->load->view('layout/footer');
    }

}
