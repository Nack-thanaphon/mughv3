<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Helper_model');
    }
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('about/index.php');
        $this->load->view('layout/footer');
    }


    public function contactus()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('about/contact_us.php');
        $this->load->view('layout/footer');
    }
    public function hur()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('hur/index.php');
        $this->load->view('layout/footer');
    }
    public function hur_detail()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('hur/hur_detail.php');
        $this->load->view('layout/footer');
    }
    public function iac()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('about/iac.php');
        $this->load->view('layout/footer');
    }
    public function mission()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('about/mission.php');
        $this->load->view('layout/footer');
    }
    public function fq()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('about/fq.php');
        $this->load->view('layout/footer');
    }
    public function scope()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('about/scope.php');
        $this->load->view('layout/footer');
    }

    public function ourMembers()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('member/index');
    
    }


    public function members()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/script');
        $this->load->view('member/members.php');
        $this->load->view('layout/footer');
    }





    public function sendmail()
    {

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $title = $this->input->post('title');
        $detail = $this->input->post('detail');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp3.netcore.co.in',
            'smtp_port' => 25,
            'smtp_user' => 'MUGH.mahidol@gmail.com',
            'smtp_pass' => 'f6e64gq6',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->from($email);
        $this->email->to('MUGH.mahidol@gmail.com');
        $this->email->cc($email);
        $this->email->bcc('');

        $this->email->subject($title);
        $this->email->message($detail);

        if (!$this->email->send()) {
            // Generate error
            echo "Email is not sent!!";
        } else {
            redirect(base_url('/'));
        }
        // echo $this->email->print_debugger();
    }
}
