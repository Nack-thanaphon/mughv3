<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Linkto extends CI_Controller
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
        $this->load->view('linkto/index.php');
        $this->load->view('layout/footer');
        
    }

    public function national()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('linkto/national.php');
        $this->load->view('layout/footer');
    }
    public function international()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('linkto/international.php');
        $this->load->view('layout/footer');
    }
}
